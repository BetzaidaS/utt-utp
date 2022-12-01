<?php
class registrosolicitud
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

    //Función usada para insertar la solicitud a la base de datos (Crear solicitud)
    public function makeRequest1()
    {
        $destino = $_POST['Destino'];
        $fecha_salida = $_POST['Fecha_salida'];
        $fecha_llegada = $_POST['Fecha_llegada'];
        $hora_salida = $_POST['Hora_salida'];
        $hora_llegada = $_POST['Hora_salida'];
        $cant_personas   = $_POST['Cant_personas'];
        $instrucciones   = $_POST['Instruciones'];
        try {
            $stm = $this->pdo->prepare("INSERT INTO solicitud ( Destino, Fecha_salida, Fecha_llegada, Hora_salida, Hora_llegada, Cant_personas, Instrucciones)
                                        VALUES ('$destino','$fecha_salida','$fecha_llegada','$hora_salida', '$hora_llegada','$cant_personas','$instrucciones')");
            $stm->execute();

            $this->msg = "Su registro se ha guardado exitosamente!";
            header("Location:/att/vista/c-estadoSolicitud.php?msg= Datos registrados");
        } catch (Exception $e) {
            if ($e->errorInfo[1] == 1062) { // error 1062 es de duplicación de datos 
                $this->msg = "la solicitud se está registrado en el sistema";
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
