<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer\src\PHPMailer.php';
require 'PHPMailer\src\SMTP.php';
require 'PHPMailer\src\Exception.php';
require 'config.php';

if (isset($_POST["email"])) {
  $emailTo = $_POST["email"];

  $token=uniqid(true);
  $query = mysqli_query($conexion, "INSERT INTO recuperacion_pass(token, email)VALUES('$token','$emailTo')");
  if(!$query){ exit("Error"); }

  //Create an instance; passing `true` enables exceptions
  $mail = new PHPMailer(true);

  try {
      //Server settings
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = 'attutp@gmail.com';                     //SMTP username
      $mail->Password   = 'becxeguahesxydsg';                               //SMTP password
      $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
      $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

      //Recipients
      $mail->setFrom('attutp@gmail.com', 'Mailer');
      $mail->addAddress("$emailTo");     //Add a recipient
      $mail->addReplyTo('no-reply@att.com', 'No Reply');

      //Content
      $url = "http://". $_SERVER["HTTP_HOST"] .dirname($_SERVER["PHP_SELF"]) . "/?op=recuperacionC&token=$token";
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'Recuperacion de contraseña';
      $mail->Body    = "<h1>Usted solicito la recuperacion de su contraseña</h1>
                          Utiliza el siguiente <a href='$url'>enlace</a> para hacerlo";

      $mail->send();

      function function_alert($message) { echo "<script>alert('$message');</script>"; }
      function_alert("Se ha enviado un correo con el enlace para recuperar contraseña");
      header('Location:?op=acceder');
  } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
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
    <br>
  <br>
  <br>
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
<br>
  <br>
  <br>
  <input type="text" name="email" placeholder="Email" autocomplete="off">
  <br>
  <br>
  <br>
  <input type="submit" name="submit" value="Enviar Enlace" class="btn Pbotones" style="background-color: #68086c; color:white">
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

</body>

</html>
