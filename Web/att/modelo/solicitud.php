<?php
class Solicitud
{
    private $pdo;

    public $id_solicitud;
    public $destino;
    public $fecha_salida;
    public $fecha_llegada;
    public $hora_salida;
    public $hora_llegada;
    public $cant_personas;

    public $nombre;
    public $apellido;

    public function __CONSTRUCT()
    {
        try {
            $this->pdo = Db::StartUp();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //Función usada para insertar la solicitud a la base de datos (Crear solicitud)
    public function makeRequest($data)
    {
        try {
            $stm = $this->pdo->prepare("INSERT INTO solicitud ( destino, fecha_salida, fecha_llegada, hora_salida, hora_llegada, cant_personas, instrucciones)
                                        VALUES (?,?,?,?,?,?,?)");
            $stm->execute(
                array(
                    $data->destino,
                    $data->fecha_salida,
                    $data->fecha_llegada,
                    $data->hora_salida,
                    $data->hora_llegada,
                    $data->cant_personas,
                    $data->instrucciones,
                )
            );

            $this->msg = "Su registro se ha guardado exitosamente!";
        } catch (Exception $e) {
            if ($e->errorInfo[1] == 1062) {
                $this->msg = "la solicitud se ha registrado exitosamente";
            } else {
                $this->msg = "Error al guardar los datos";
            }
        }
        echo '<script type="text/JavaScript">
                alert("' . $this->msg . '")
              </script>';
        return $this->msg;
    }




    //Función usada para mostrar todas las solicitudes al Administrador
    public function consult()
    {
        try {
            $stm = $this->pdo->prepare("SELECT s.id_solicitud, u.nombre, u.apellido, s.destino, s.fecha_salida FROM solicitud_funcionario sf 
                                                                JOIN solicitud s ON sf.id_solicitud = s.id_solicitud 
                                                                JOIN funcionario f ON sf.id_funcionario = f.id_funcionario 
                                                                JOIN usuario u ON f.id_usuario = u.id_usuario
                                        WHERE estado_solicitud = 0");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //Función usada para mostrar el estado de las solicitudes a los funcionarios 
    public function selectRequestPerOfficial($id)
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM solicitud s JOIN solicitud_funcionario sf ON s.id_solicitud = sf.id_solicitud 
                                                                  JOIN funcionario f ON sf.id_funcionario = f.id_funcionario 
                                        WHERE f.id_usuario = ?");
            $stm->execute(array($id));
            return  $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //Función usada para mostrar la información de las solicitudes por id
    public function selectPerRequest($id)
    {
        try {
            $stm = $this->pdo->prepare("SELECT s.id_solicitud, s.destino, s.fecha_salida, s.created_at, s.cant_personas, sf.id_funcionario, u.nombre, u.apellido FROM solicitud s 
                                                                    JOIN solicitud_funcionario sf ON s.id_solicitud = sf.id_solicitud 
                                                                    JOIN funcionario f ON sf.id_funcionario = f.id_funcionario 
                                                                    JOIN usuario u ON f.id_usuario = u.id_usuario 
                                        WHERE s.id_solicitud = ?");
            $stm->execute(array($id));
            return  $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function update($id, $estado)
    {
        try {
            $stm = $this->pdo->prepare("UPDATE solicitud_funcionario SET estado_solicitud = ? 
                                        WHERE id_solicitud = ?");
            $stm->execute(array($estado, $id));

            $this->msg = "Su registro se ha Actualizado exitosamente!&t=text-success";
        } catch (Exception $e) {
            $this->msg = "Error al actualizar los datos&t=text-danger";
        }
        return $this->msg;
    }

    public function getLastRequest()
    {
        try {
            $stm = $this->pdo->prepare("SELECT id_solicitud FROM solicitud ORDER BY id_solicitud DESC LIMIT 1");
            $stm->execute();
            return  $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function assignRequests($idf, $ids)
    {
        try {
            $stm = $this->pdo->prepare("INSERT INTO solicitud_funcionario (id_funcionario, id_solicitud, estado_solicitud)
                                        VALUES (?,?,?)");
            $stm->execute(array($idf, $ids, 0));

            $this->msg = "Su registro se ha Actualizado exitosamente!&t=text-success";
        } catch (Exception $e) {
            $this->msg = "Error al actualizar los datos&t=text-danger";
        }
        return $this->msg;
    }


    public function ObtenerSolicitudes()
    {
        try {
            $stm = $this->pdo->prepare("SELECT solicitud.id_solicitud, usuario.nombre, usuario.apellido,solicitud.destino, solicitud.motivo, solicitud.cant_personas 
			FROM solicitud INNER JOIN solicitud_funcionario INNER JOIN funcionario INNER JOIN usuario
			ON solicitud.id_solicitud = solicitud_funcionario.id_solicitud AND solicitud_funcionario.id_funcionario = funcionario.id_funcionario 
			AND funcionario.id_usuario = usuario.id_usuario;");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
