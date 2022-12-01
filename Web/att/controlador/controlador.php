<?php
session_start();
require_once("modelo/user.php");
require_once("modelo/solicitud.php");
require_once("modelo/vehiculo.php");
require_once("modelo/viaje.php");

include_once("modelo/conductor.php");
include_once("modelo/reporte.php");
class Controller
{

    private $model;
    private $model2;
    private $model3;
    private $model4;
    private $model5;
    private $model6;
    private $model7;

    private $model8;
    private $model9;
    private $model10;
    private $model11;

    public function __CONSTRUCT()
    {
        $this->model = new User();
        $this->model2 = new Solicitud();
        $this->model3 = new Solicitud();
        $this->model4 = new User();
        $this->model5 = new Vehiculo();
        $this->model6 = new Vehiculo();
        $this->model7 = new Viaje();

        $this->model8 = new Conductor();
        $this->model9 = new Reporte();
        $this->model10 = new Solicitud();
        $this->model11 = new Viaje();
    }

    public function Index()
    {
        require("vista/login.php");
    }

    public function SolicitudesAdmin()
    {
        $solicitudes = new Solicitud();
        $solicitudes = $this->model2->consult();

        require("vista/A-solicitudes.php");
    }

    public function ViajesCursoAdmin()
    {
        require("vista/A-viajesCurso.php");
    }

    public function InventarioVehiculoAdmin()
    {
        $car = new Vehiculo();
        $car = $this->model5->getAllVehicules();

        require("vista/A-inventarioVehiculo.php");
    }

    public function ReportesAdmin()
    {
        require("vista/A-reportes.php");
    }

    public function ConductoresAdmin()
    {
        require("vista/A-conductores.php");
    }

    public function RegistroVehiculoAdmin()
    {
        require("vista/A-registroVehiculo.php");
    }

    public function AsignacionSolicitudAdmin()
    {
        $assign = new Solicitud();
        $assign = $this->model3->selectPerRequest($_POST['id']);

        $driver = new User();
        $driver = $this->model4->getAvailableDrivers();

        $transport = new Vehiculo();
        $transport = $this->model6->getTypeVehicle();

        require("vista/A-asignacionSolicitud.php");
    }

    public function AceptarSolicitud()
    {
        $id_sol = $_REQUEST['id_s'];

        if (isset($_POST['assign'])) {
            $travel = new Viaje();

            $id_con = $_REQUEST['driver'];

            $travel->id_solicitud = $id_sol;
            $travel->id_conductor = $id_con;
            $travel->id_funcionario = $_REQUEST['id_f'];
            $travel->id_vehiculo = $_REQUEST['car'];
            $travel->estado_viaje = 'A';

            $this->resp = $this->model7->assignTravel($travel);
            $this->res = $this->model3->update($id_sol, 1);
            $this->model->updateDriver($id_con);

            header('Location:?op=inicioA&msg=' . $this->resp . '&up=' . $this->res);
        } elseif (isset($_POST['decline'])) {
            $this->model3->update($id_sol, 2);

            header('Location:?op=inicioA&msg=Se+ha+rechazado+la+solicitud');
        }
    }

    public function Inicio()
    {
        $user = new User();
        $user = $this->model->get($_SESSION['id']);
        require("vista/C-solicitud.php");
    }



    public function SolicitudConductor()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $soli = new Solicitud();
            $soli->destino = $_POST['destino'];
            $soli->fecha_salida = $_POST['fecha_salida'];
            $soli->fecha_llegada = $_POST['fecha_llegada'];
            $soli->hora_salida = $_POST['hora_salida'];
            $soli->hora_llegada = $_POST['hora_llegada'];
            $soli->cant_personas = $_POST['cant_personas'];
            $soli->instrucciones = $_POST['instrucciones'];

            $this->resp = $this->model3->makeRequest($soli);
            $id = $this->model2->getLastRequest();

            $this->up = $this->model2->assignRequests($_SESSION['id_tipo'], $id);

            header('Location:?op=estadoSolicitudC&msg=' . $this->resp . '&up=' . $this->res);
        }
    }


    public function EstadoSolicitudConductor()
    {
        $user = new User();
        $user = $this->model->get($_SESSION['id']);

        $solicitudes  = new Solicitud();
        $solicitudes = $this->model3->selectRequestPerOfficial($_SESSION["id"]);

        require("vista/C-estadoSolicitud.php");
    }

    public function recuperarContrasena()
    {
        require_once("modelo/recuperacion.php");
    }

    public function recuperarContrasenaC()
    {
        require_once("modelo/recuperacionC.php");
    }


    public function access()
    {
        $signInUser = new User();

        $signInUser->email = $_REQUEST['email'];
        $signInUser->pass = md5($_REQUEST['pwd']);

        //Verificamos si existe en la base de datos
        if ($resultado = $this->model->consult($signInUser)) {
            $_SESSION["acceso"] = true;
            $_SESSION["foto"] = $resultado->foto;
            $_SESSION["id"] = $resultado->id_usuario;
            $_SESSION["user"] = $resultado->nombre . " " . $resultado->apellido;
            if ($resultado->id_tipo_usuario == 0) {
                header('Location:?op=inicioA');
            } elseif($resultado->id_tipo_usuario == 2) {
                $resultado = $this->model->consultF($signInUser);
                $_SESSION["id_tipo"] = $resultado->id_funcionario;
                header('Location:?op=inicioC');
            } else {
                header('Location:?op=appC');
            }
        } else {
            header('Location:?&msg=Su contraseña o usuario está incorrecto');
        }
    }

    public function conductorApp(){
        require("vista/C-API.php");
    }




    public function Perfil()
    {
        $conductor = $this->model8->ObtenerConductores(1);
        require("vista/C-perfilConductor.php");
    }

    public function InicioAdmin()
    {
        $listaReporte = $this->model9->ObtenerReportes();
        $listaSolicitud = $this->model10->ObtenerSolicitudes();
        $listaSalvoConducto = $this->model11->SalvoConductos();
        require("vista/A-inicio.php");
    }

    public function HistorialViajeAdmin()
    {
        $listaFec = $this->model11->fecha_salida();

        $listaIzq = $this->model11->TablaIzquierda();
        $listaDer = $this->model11->TablaDerecha();
        require("vista/A-historialViaje.php");
    }

    public function Filtrar()
    {
        $listaFec = $this->model11->fecha_salida();

        $fecha_salida = $_REQUEST['fecha_salida'];

        $listaIzq = $this->model11->TablaIzquierdaFiltro($fecha_salida);
        $listaDer = $this->model11->TablaDerechaFiltro($fecha_salida);
        require("vista/A-historialViaje.php");
    }
}
