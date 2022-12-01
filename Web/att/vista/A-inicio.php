<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="" />
  <title>Inicio - Admistrador</title>
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
    require_once('compl/A-header.php');
    ?>
  </header>


  <center>
    <div class="py-4" style="background-color:#ffffff" id="">
      <div class="container">
        <br>
        <br>
        <div class="card" style="width: 70rem; border-color: #68086c;">
          <div class="card-header" style="background-color: #68086c; color: white;">
            <h5> Salvo Conducto de Emergencia</h5>
          </div>
          <div class="card-body">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Conductor</th>
                  <th scope="col">Motivo</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($listaSalvoConducto as $lista) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $lista->id_viaje; ?></th>
                        <td><?php echo $lista->nombre." ".$lista->apellido; ?></td>
                        <td><?php echo $lista->motivo; ?></td>
                        <td>
                          <button type="button" class="btn btn-success" >Aprobar</button>
                          <button type="button" class="btn btn-danger">Rechazar</button>
                        </td>
                    </tr>
                <?php
                }
                ?> 
              </tbody>
            </table>
          </div>
        </div>
        <br><br>
        <div class="card" style="width: 70rem; border-color: #68086c;">
          <div class="card-header" style="background-color: #68086c; color: white;">
            <h5> Solicitudes de Viajes</h5>
          </div>
          <div class="card-body">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Solicitante</th>
                  <th scope="col">Motivo</th>
                  <th scope="col">Cantidad de personas</th>
                  <th scope="col">Destino</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
              <?php
                foreach ($listaSolicitud as $lista) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $lista->id_solicitud; ?></th>
                        <td><?php echo $lista->nombre." ".$lista->apellido; ?></td>
                        <td><?php echo $lista->motivo; ?></td>
                        <td><?php echo $lista->cant_personas; ?></td>
                        <td><?php echo $lista->destino; ?></td>
                        <td>
                        <a type="button" class="btn btn-info"  href="?op=asignacionSolicitudA">Tramitar</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
        <br><br>
        <div class="card" style="width: 70rem; border-color: #68086c;">
          <div class="card-header" style="background-color: #68086c; color: white;">
            <h5>Reportes</h5>
          </div>
          <div class="card-body">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Conductor</th>
                  <th scope="col">Motivo</th>
                  <th scope="col">Detalles</th>
                  <th scope="col">Foto</th>
                </tr>
              </thead>
              <tbody>
              <?php
                foreach ($listaReporte as $lista) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $lista->id_reporte; ?></th>
                        <td><?php echo $lista->nombre." ".$lista->apellido; ?></td>
                        <td><?php echo $lista->motivo; ?></td>
                        <td><?php echo $lista->detalles; ?></td>
                        <td>
                          <button type="button" class="btn btn-secondary">Ver</button>
                        </td>
                    </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
        <br><br>
      </div>
  </center>

  <footer>
    <?php
    require_once('compl/footer.php');
    ?>
  </footer>
</body>

</html>