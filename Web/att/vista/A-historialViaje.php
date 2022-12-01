<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="" />
  <title>Historial de viajes - Admistrador</title>
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <title>Solicitante</title>
</head>

<body>
  <header>
    <?php
    require('compl/A-header.php');
    ?>
  </header>

  <div class="py-4" style="background-color:#ffffff" id="">
    <div class="container">

      <br>
      <center>
        <h2 style="color: black;">Historial de viajes</h2>
      </center>
      <br>
      <form class="form-horizontal form-material" name="formulario" method="POST" action="./?op=actualizarA" enctype="multipart/form-data">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-3 col-md-4">
            <select name="cedSoli" class="form-select" aria-label="Default select example" style="width: 190px;">
              <option selected>Cédula Solicitante</option>
            </select>
          </div>

          <div class="col-lg-3 col-md-4">
            <select name="cedChof" class="form-select" aria-label="Default select example" style="width: 190px;">
              <option selected>Cédula Chofer</option>
            </select>
          </div>

          <div class="col-lg-3 col-md-4">
            <select name="fecha_salida" class="form-select" aria-label="Default select example" style="width: 190px;">
              <option selected value="null">Fecha</option>
              <?php foreach ($listaFec as $f) { ?>
                <option value="<?php echo $f->fecha_salida; ?>"><?php echo $f->fecha_salida; ?></option>
              <?php } ?>
            </select>
          </div>

          <div class="col-lg-3 col-md-4">
            <button class="btn btn-success" style="width: 120px;">Filtrar</button>
          </div>

        </div>
      </form>
      <br><br>

      <div class="card bg-light" style="border-radius: 1rem;" class="shadow p-3 mb-5 bg-white rounded">
        <table class="table table-hover">
          <thead>
            <tr style=color:#070707;>
              <th scope="col">#</th>
              <th scope="col">Fecha</th>
              <th scope="col">Lugar</th>
              <th scope="col">Cédula del Solicitante</th>
              <th scope="col">Correo Solicitante</th>
              <th scope="col">Cédula del Conductor</th>
              <th scope="col">Conductor</th>
              <th scope="col">Placa Vehículo</th>
              <th scope="col">Cantidad de Pasajeros</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($listaIzq as $izq) {
              foreach ($listaDer as $der) {
                if ($izq->id_viaje == $der->id_viaje) {
            ?>
                  <tr>
                    <td><?php echo $izq->id_viaje; ?></td>
                    <td><?php echo $izq->fecha_salida; ?></td>
                    <td><?php echo $izq->destino; ?></td>
                    <td><?php echo $izq->cedula; ?></td>
                    <td><?php echo $izq->email; ?></td>
                    <td><?php echo $der->cedula; ?></td>
                    <td><?php echo $der->nombre . " " . $der->apellido; ?></td>
                    <td><?php echo $der->num_placa; ?></td>
                    <td><?php echo $der->cant_personas; ?></td>
                  </tr>
            <?php
                }
              }
            }
            ?>
          </tbody>
        </table>
      </div>
      <br><br>
    </div>
  </div>

  <div class="col-6 col-md-2">
  </div>
  <footer>
    <?php
    require('compl/footer.php');
    ?>
  </footer>
</body>

</html>