<?php
class regis
{
    private $pdo;

    public $id_solicitud;
    public $destino;
    public $fecha_salida;
    public $fecha_llegada;
    public $hora_salida;
    public $hora_llegada;
    public $cant_personas;
    public $instrucciones;

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



    public function crearsolicitud(solicitud $data)
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
}
