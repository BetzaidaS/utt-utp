<?php
class Reporte{
	private $pdo;

	public function __construct(){
		try{
			$this->pdo = new PDO('mysql:host=localhost;dbname=att;charset=utf8', 'root', ''); 
		}catch(Exception $e){
			die($e->getMessage());
		}
	}

    public function ObtenerReportes(){
        try{
			$stm = $this->pdo->prepare("SELECT reporte.id_reporte, usuario.nombre, usuario.apellido, reporte.motivo, reporte.detalles FROM reporte INNER JOIN usuario INNER JOIN conductor ON reporte.id_conductor = conductor.id_conductor 
			AND conductor.id_usuario = usuario.id_usuario;");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}catch (Exception $e){
			die($e->getMessage());
		}
    }
}