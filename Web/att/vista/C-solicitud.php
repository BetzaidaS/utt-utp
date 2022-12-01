<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="" />
  <title>Solicitud</title>
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
                Solicitud
              </div>
              <div class="card-body p-6 p-lg-2 text-black">

                <div class="container register-form">
                <form method="POST" action="?op=solicitudC">
                    <div class="note">
                      <p>LLenar el Formulario de Solicitud de Vehiculo.</p>
                    </div>
                    <div class="form-content">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="form-label" for="form2Example17">Destino</label>
                            <textarea id="destino" class="form-control form-control-lg" name="destino" rows="5" cols="43" required>lugar, calle, numero de edificio etc.. </textarea>
                          </div>
                          <div class="form-group">
                            <label class="form-label" for="form2Example17">Fecha de salida</label>
                            <input type="date" required id="fecha_salida" name="fecha_salida" class="form-control form-control-lg" />
                          </div>
                          <div class="form-group">
                            <label class="form-label" for="form2Example17">Fecha de llegada</label>
                            <input type="date" required name="fecha_llegada" id="fecha_llegada" class="form-control form-control-lg" />
                          </div>
                          <div class="form-group">
                            <label class="form-label" for="form2Example17">Cantidad de Personas</label>
                            <input type="text" required id="cant_personas" name="cant_personas" class="form-control form-control-lg" />
                          </div>

                        </div>
                        <!-- Mitad-->
                        <div class="col-md-6">
                          <div class="form-group">
                          </div>
                          <div class="form-group">
                            <label class="form-label" for="form2Example17">Hora de salida</label>
                            <input type="time" id="hora_salida" class="form-control form-control-lg" name="hora_salida" min="06:00" max="18:00" required>
                            <small>Horario de Trabajo de 6:00 am a 6:00 pm</small>
                          </div>
                          <div class="form-group">
                            <label class="form-label" for="form2Example17">Hora de Regreso</label>
                            <input type="time" class="form-control form-control-lg" id="hora_llegada" name="hora_llegada" min="06:00" max="18:00" required>
                            <small>si su viaje se encuentra fuera de las horas laborales por favor solicitar salvo
                              conducto</small>
                          </div>
                          <div class="form-group">
                            <input type="checkbox" id="salvo Conducto" name="salvoC" value="salvo">
                            <label class="form-label">Solicitar Salvo Conducto</label><br>
                          </div>
                          <div class="form-group">
                            <label class="form-label" for="story">Indicaciones</label>
                            <textarea id="instrucciones" class="form-control form-control-lg" name="instrucciones" rows="5" cols="43">Indicaciones, Descripción del viaje...</textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="pt-1 mb-3">
                      <center><input type="submit" class="btn Pbotones" value="Enviar" style="background-color: #68086c; color: white;"></center>
                    </div>
                  </div>
                </form>
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
  </div>
  </div>
  </div>

  <footer>
    <?php
    require_once('compl/footer.php');
    ?>
  </footer>
</body>

</html>