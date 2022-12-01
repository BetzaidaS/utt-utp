<?php
class Conductor{
	private $pdo;

	public function __construct(){
		try{
			$this->pdo = new PDO('mysql:host=localhost;dbname=att;charset=utf8', 'root', ''); 
		}catch(Exception $e){
			die($e->getMessage());
		}
	}

    public function ObtenerConductores($id_conductor){
        try{
			$stm = $this->pdo->prepare("SELECT conductor.id_conductor, usuario.nombre, usuario.apellido, usuario.cedula, usuario.email 
			FROM conductor INNER JOIN usuario ON conductor.id_usuario = usuario.id_usuario AND conductor.id_usuario = ?;");
			$stm->execute(array($id_conductor));
			return $stm->fetch(PDO::FETCH_OBJ);
		}catch(Exception $e){
			die($e->getMessage());
		}
    }
}