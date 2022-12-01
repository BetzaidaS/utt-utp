<?php
class Viaje
{
    private $pdo;

    public $id_viaje;
    public $id_solicitud;
    public $id_conductor;
    public $id_funcionario;
    public $id_vehiculo;
    public $estado_viaje;

    public function __CONSTRUCT()
    {
        try {
            $this->pdo = Db::StartUp();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getAllTravels()
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM viaje");

            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function assignTravel(viaje $data)
    {
        try {
            $stm = $this->pdo->prepare("INSERT INTO viaje (id_solicitud, id_conductor, id_funcionario, id_vehiculo, estado_viaje)
                                        VALUES (?,?,?,?,?)");
            $stm->execute(
                array(
                    $data->id_solicitud,
                    $data->id_conductor,
                    $data->id_funcionario,
                    $data->id_vehiculo,
                    $data->estado_viaje
                )
            );

            $this->msg = "Su registro se ha guardado exitosamente!";
        } catch (Exception $e) {
            if ($e->errorInfo[1] == 1062) { // error 1062 es de duplicación de datos 
                $this->msg = "El viaje ya está registrado en el sistema";
            } else {
                $this->msg = "Error al guardar los datos";
            }
        }
        echo '<script type="text/JavaScript">
                alert("' . $this->msg . '")
              </script>';
        return $this->msg;
    }



    public function SalvoConductos()
    {
        try {
            $stm = $this->pdo->prepare("SELECT viaje.id_viaje, usuario.nombre, usuario.apellido, viaje.motivo 
			FROM usuario INNER JOIN viaje ON viaje.motivo <> 'null' AND viaje.id_usuario = usuario.id_usuario;");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function TablaIzquierda()
    {
        try {
            $stm = $this->pdo->prepare("SELECT viaje.id_viaje, solicitud.fecha_salida, solicitud.destino, usuario.cedula, usuario.email
			FROM viaje INNER JOIN solicitud INNER JOIN usuario WHERE usuario.id_tipo_usuario = 2 AND solicitud.id_solicitud = viaje.id_solicitud GROUP BY viaje.id_viaje;");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function TablaDerecha()
    {
        try {
            $stm = $this->pdo->prepare("SELECT usuario.cedula, viaje.id_viaje, usuario.nombre, usuario.apellido, vehiculo.num_placa, solicitud.cant_personas
			FROM viaje INNER JOIN vehiculo INNER JOIN solicitud INNER JOIN usuario WHERE usuario.id_tipo_usuario = 1 AND solicitud.id_solicitud = viaje.id_solicitud 
			AND viaje.id_vehiculo = vehiculo.id_vehiculo GROUP BY viaje.id_viaje;");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function fecha_salida()
    {
        try {
            $stm = $this->pdo->prepare("SELECT solicitud.fecha_salida FROM solicitud INNER JOIN viaje WHERE solicitud.id_solicitud = viaje.id_solicitud 
            GROUP BY solicitud.fecha_salida;");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function TablaIzquierdaFiltro($fecha_salida)
    {
        try {
            $stm = $this->pdo->prepare("SELECT viaje.id_viaje, solicitud.fecha_salida, solicitud.destino, usuario.cedula, usuario.email 
            FROM viaje INNER JOIN solicitud INNER JOIN usuario WHERE usuario.id_tipo_usuario = 2 AND solicitud.id_solicitud = viaje.id_solicitud 
            AND solicitud.fecha_salida = ? GROUP BY viaje.id_viaje;");
            $stm->execute(array($fecha_salida));
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function TablaDerechaFiltro($fecha_salida)
    {
        try {
            $stm = $this->pdo->prepare("SELECT usuario.cedula, viaje.id_viaje, usuario.nombre, usuario.apellido, vehiculo.num_placa, solicitud.cant_personas 
            FROM viaje INNER JOIN vehiculo INNER JOIN solicitud INNER JOIN usuario WHERE usuario.id_tipo_usuario = 1 AND solicitud.id_solicitud = viaje.id_solicitud 
            AND viaje.id_vehiculo = vehiculo.id_vehiculo AND solicitud.fecha_salida = ? GROUP BY viaje.id_viaje;");
            $stm->execute(array($fecha_salida));
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
