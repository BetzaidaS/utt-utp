<?php
    class User
    {
        private $pdo;

        public $id;
        public $id_tipo_usuario;
        public $nombre;
        public $apellido;
        public $email;
        public $pass;
        public $foto;

        public function __CONSTRUCT()
        {
            $this->model = array();
            try {
                $this->pdo = Db::StartUp();     
            } catch(Exception $e) {
                die($e->getMessage());
            }
        }

        //Consulta si existe dicho usuario en la Base de Datos
        public function consult(user $data){
            try{
                $stm = $this->pdo->prepare("SELECT * FROM usuario WHERE email = ? AND pass = ?");
                $stm->execute(array($data->email, $data->pass));
                return $stm->fetch(PDO::FETCH_OBJ);
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        //Consulta 
        public function consultF(user $data){
            try{
                $stm = $this->pdo->prepare("SELECT * FROM usuario u JOIN funcionario f ON u.id_usuario = f.id_usuario WHERE u.email = ? AND u.pass = ?");
                $stm->execute(array($data->email, $data->pass));
                return $stm->fetch(PDO::FETCH_OBJ);
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }


        //Consulta usada para obtener la info de un usuario porr medio del ID
        public function get($id)
        {
            try 
            {
                $stm = $this->pdo
                        ->prepare("SELECT * FROM usuario WHERE id_usuario = ?");
                        

                $stm->execute(array($id));
                return $stm->fetch(PDO::FETCH_OBJ);
            } catch (Exception $e) 
            {
                die($e->getMessage());
            }
        }

        //Consulta usada para obtener todos los usuarios
        public function getAllUsers(){
            try 
            {
                $stm = $this->pdo->prepare("SELECT * FROM usuario");
                        
                $stm->execute();
                return $stm->fetchAll(PDO::FETCH_OBJ);
            } catch (Exception $e) 
            {
                die($e->getMessage());
            }
        }

        //Consulta usada para obtener todos los conductores disponibles para viajes
        public function getAvailableDrivers(){
            try 
            {
                $stm = $this->pdo->prepare("SELECT u.nombre, u.apellido, c.id_conductor, c.estado FROM usuario u JOIN conductor c ON u.id_usuario = c.id_usuario");
                        
                $stm->execute();
                return $stm->fetchAll(PDO::FETCH_OBJ);
            } catch (Exception $e) 
            {
                die($e->getMessage());
            }
        }

        public function updateDriver($id){
            try 
            {
                $stm = $this->pdo->prepare("UPDATE conductor SET estado = estado + 1
                                            WHERE id_conductor = ?");        
                $stm->execute(array($id));

                return $stm->fetchAll(PDO::FETCH_OBJ);
            } catch (Exception $e) 
            {
                die($e->getMessage());
            }
        }



    }
?>