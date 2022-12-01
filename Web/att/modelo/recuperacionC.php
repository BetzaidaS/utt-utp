<?php
require 'config.php';

if (!isset($_GET["token"])) { exit("No se puede encontrar la pagina"); }

$token = $_GET["token"];

$getEmailQuery = mysqli_query($conexion, "SELECT email FROM recuperacion_pass WHERE token='$token'");
if (mysqli_num_rows($getEmailQuery)==0){ exit("No se puede encontrar la pagina"); }

if (isset($_POST["password"])){
$pass = $_POST["password"];
echo($pass);
$pass = md5($pass);

$row = mysqli_fetch_array($getEmailQuery);
$email = $row["email"];

$query = mysqli_query($conexion, "UPDATE usuario SET pass='$pass' WHERE email='$email'");

if ($query){ $query=mysqli_query($conexion, "DELETE FROM recuperacion_pass WHERE token ='$token'");

  function function_alert($message) {echo "<script>alert('$message');</script>";}
  function_alert("Su contraseña ha sido cambiada exitosamente");
  header('Location:?op=acceder');
}
else { function_alert("El token ya no existe"); }

}

?>

 <!DOCTYPE html>
 <html lang="es">

 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="shortcut icon" href="" />
   <title>Recuperar Contraseña</title>
   <!-- logo-->
   <link rel="icon" type="image/x-icon" href="../img/tropical_utp_logo-modified.png" />
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
   <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
   <link href="../Css/estilo.css" rel="stylesheet">

   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
     integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 </head>

 <body>

   <header>
   <div class="navbar-nav">
        </div>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#68086c;"
      class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
      <a class="navbar-brand py-0" href="#">Recuperacion de contraseña</a>
    </nav>
   </header>

   <!--izquierda-->
   <div class="row g-0 text-center">
     <div class="col-sm-6 col-md-2">
     </div>

     <!--Centro-->
     <div class="col-sm-6 col-md-8">
     <div class="container py-4 h-150" class="shadow2">

         <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col col-xl-10">
          <div class="card bg-light" style="border-radius: 1rem;">
          <div class="card-header">
             Recuperar contraseña
          </div>

<div class="card-body p-6 p-lg-2 text-black">
<div class="container register-form">
<div class="form">

 <form method="POST">
   <input type="password" name="password" placeholder="Nueva contraseña">
   <br>
   <input type="submit" name="submit" value="Recuperar contraseña" class="btn Pbotones" style="background-color: #68086c">
 </form>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>


       <!-- Derecha -->
       <div class="col-6 col-md-2">
         
       </div>
     </div>


   <footer class="navbar navbar-expand-md navbar-dark sticky-top piePagina" style="background-color: #68086c;">
   </footer>

 </body>

 </html>
