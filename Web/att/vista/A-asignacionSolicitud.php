<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="" />
  <title>Asignación de solicitud - Administrador</title>
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
    require('compl/A-header.php');
    ?>
  </header>
  <div class="col-sm-6 row-cols-md-4">
  </div>

  <div class="center">
    <div class="container px-8 py-4 h-150" class="shadow2">
      <div class="row d-flex center h-150">
        <div class="col col-xl-10">
          <div class="card bg-light" style="border-radius: 1rem;">
            <div class="card-header center">
              <h2 style="color: black;">Asignación de Solicitud</h2>
            </div>
            <div class="card-body p-8 p-lg-2 text-black">
              <div class="container register-form">
                <div class="form">
                  <form method="POST" action="?op=aceptarSolicitudA">
                    <div class="form-content">
                      <?php foreach ($assign as $a) {
                      } ?>
                      <div class="form-group">
                        <label class="form-label" for="form2Example17">Solicitante</label>
                        <input type="text" disabled id="name" name="name" class="form-control form-control-lg" value="<?php echo $a->nombre . " " . $a->apellido; ?> " />
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="form-label" for="form2Example17">ID Solicitante</label>
                            <input type="text" readonly id="solicitante" name="id_f" class="form-control form-control-lg" value="<?php echo $a->id_funcionario; ?>" />
                          </div>
                          <div class="form-group">
                            <label class="form-label" for="form2Example17">Destino</label>
                            <input type="text" disabled id="destino" class="form-control form-control-lg" placeholder="<?php echo $a->destino; ?>" />
                          </div>
                          <div class="form-group">
                            <label class="form-label" for="form2Example17">Fecha de solicitud</label>
                            <input type="text" disabled id="fecha" class="form-control form-control-lg" placeholder="<?php echo $a->created_at; ?>" />
                          </div>
                          <div class="form-group">
                            <label class="form-label" for="form2Example17">Conductor (Viajes asignados)</label>
                            <select class="form-control form-control-lg" name="driver" id="driver" required>
                              <?php foreach ($driver as $d) { ?>
                                <option value="<?php echo $d->id_conductor; ?>"><?php echo $d->nombre . " " . $d->apellido . " (" . $d->estado . ")"; ?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                        <!-- Mitad-->
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="form-label" for="form2Example17">No. Solicitud</label>
                            <input type="text" readonly id="solicitud" name="id_s" class="form-control form-control-lg" placeholder="<?php echo $a->id_solicitud; ?>" value="<?php echo $a->id_solicitud; ?>" />
                          </div>
                          <div class="form-group">
                            <label class="form-label" for="form2Example17">Cantidad de Pasajeros</label>
                            <input type="text" disabled id="passengers" class="form-control form-control-lg" placeholder="<?php echo $a->cant_personas; ?>" />
                          </div>
                          <div class="form-group">
                            <label class="form-label" for="form2Example17">Fecha solicitada</label>
                            <input type="text" disabled id="datev" class="form-control form-control-lg" placeholder="<?php echo $a->fecha_salida; ?>" />
                          </div>
                          <div class="form-group">
                            <label class="form-label" for="form2Example17">Vehículo (Cant. Pasajeros)</label>
                            <select class="form-control form-control-lg" name="car" id="car" required>
                              <?php foreach ($transport as $t) { ?>
                                <option value="<?php echo $t->id_vehiculo; ?>"><?php echo $t->tipo_vehiculo . " (" . $t->cant_pasajeros . ")"; ?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="pt-1 mb-3">
                        <center>
                          <input type="submit" name="assign" class="btn Pbotones btn-outline-success mb-2" value="Asignar">
                          <input type="submit" name="decline" class="btn Pbotones btn-outline-danger mb-2" value="Rechazar">
                        </center>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer>
    <?php
    require('compl/footer.php');
    ?>
  </footer>
</body>

</html>