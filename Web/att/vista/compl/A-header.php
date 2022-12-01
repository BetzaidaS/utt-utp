<?php
    @session_start();// Comienzo de la sesión

    if ($_SESSION["acceso"] != true) {
        header('Location: ?op=error');
    }    
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="" />
  <!-- logo-->
  <link rel="icon" type="image/x-icon" href="../img/tropical_utp_logo-modified.png" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
  <link href="./public/css/estilo.css" rel="stylesheet">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
  <header>
    <div>
      <nav class="navbar navbar-light py-0 padding-top:0">
        <a class="navbar-brand" href="#">
          <img src="./public/imag/tropical_utp_logo.jpg" class="img-circle" width="100" height="100" class="d-inline-block align-top" alt="">
          Universidad Tecnológica de Panamá</a>
        <div class="navbar-nav">
          <a class="nav-item nav-link" href="?op=login">Cerrar Sesión</a>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#68086c;" class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
      <a class="navbar-brand py-0" style="font-weight: bold; color: #ffffff">Servicio de Solicitud de Vehículos</a>
      <ul class="menu">
        <li class="nav-item"><a class="nav-link" href="?op=solicitudesA">Solicitudes</a></li>
        <li class="nav-item"><a class="nav-link" href="?op=historialViajeA">Historial de Viajes</a></li>
        <li class="nav-item"><a class="nav-link" href="?op=viajesCursoA">Viajes en Curso</a></li>
        <li class="nav-item"><a class="nav-link" href="?op=inventarioVehiculoA">Inventario de Vehículos</a></li>
        <li class="nav-item"><a class="nav-link" href="?op=reportesA">Reportes de Vehículos</a></li>
        <li class="nav-item"><a class="nav-link" href="?op=conductoresA">Conductores</a></li>
        <li class="nav-item"><a class="nav-link" href="?op=registroVehiculoA">Registro de Vehículos</a></li>
      </ul>
      </div>
    </nav>
  </header>
</body>

</html>