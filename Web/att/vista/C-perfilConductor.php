<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="" />
  <title>Perfil conductor</title>
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
    <?php
    require('compl/C-header.php');
    ?>
  </header>

  <div class="py-4" style="background-color:#ffffff" id="">
    <br>
    <div class="container">
      <div>
        <center>
          <h2 style="color:#68086c">Perfil del conductor</h2>
        </center>
        <br>

        <div class="row ">
          <div class="col-3">
            <img src="https://castillotrans.eu/wp-content/uploads/2019/06/77461806-icono-de-usuario-hombre-hombre-avatar-avatar-pictograma-pictograma-vector-ilustraci%C3%B3n.jpg" alt="" width="200px">
          </div>
          <div>
            <br><br>
            <h2 style="color: #000000"><?php echo $conductor->nombre." ".$conductor->apellido;?></h2><br>
            <h3 style="color: #000000"><?php echo $conductor->cedula;?></h3>
          </div>

        </div>

        <br><br>

        <div>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" style="background-color: #68086c; color: #ffffff;">Correo
                Electrónico</span>
            </div>
            <label type="text" class="form-control"><?php echo $conductor->email;?></label>
          </div>
        </div>
        <br>
      </div><br><br>
    </div>

    <footer>
      <?php
      require_once('compl/footer.php');
      ?>
    </footer>
</body>
</html>