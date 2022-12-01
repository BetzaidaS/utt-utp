<?php
class Vehiculo
{
    private $pdo;

    public $id_vehiculo;
    public $num_placa;
    public $tipo_vehiculo;
    public $tipo_motor;
    public $combustible;
    public $modelo;
    public $marca;
    public $año;
    public $vin;
    public $num_revisado;
    public $num_poliza;
    public $cant_pasajeros;
    public $cant_puertas;	
    public $kilometraje;
    public $estado;

    public function __CONSTRUCT()
    {
        try{
			$this->pdo = Db::StartUp();     
		}
		catch(Exception $e){
			die($e->getMessage());
		}
    }

    // Consukta que muestre todos los vehículos de la BD
    public function getAllVehicules(){
        try 
        {
            $stm = $this->pdo->prepare("SELECT * FROM vehiculo");
                    
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    //Consulta que muestra los vehículos según su tipo y cantidad de pasajeros para asignarlos a un viaje
    public function getTypeVehicle(){
        try 
        {
            $stm = $this->pdo->prepare("SELECT DISTINCT tipo_vehiculo, cant_pasajeros, id_vehiculo FROM vehiculo");
                    
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
}
?>