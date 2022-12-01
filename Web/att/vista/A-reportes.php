<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="" />
  <title>Reportes de vehículo - Administrador</title>
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

  <!--izquierda-->
  <div class="row g-0 text-center">
    <div class="col-sm-6 col-md-2">

    </div>

    <!--Centro-->
    <div class="col-sm-6 col-md-8">
      <div class="container py-4 h-150" class="shadow2">

        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col col-xl-10">
            <br>
            <center>
              <h2 style="color: black;">Reportes de Vehículos</h2>
            </center>
            <br>
            <div class="card-body p-6 p-lg-2 text-black">
              <div class="container register-form">
                <div class="form">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col"></th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Conductor</th>
                        <th scope="col">ID conductor</th>
                        <th scope="col">ID vehiculo</th>
                        <th scope="col">ID viaje</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">
                          <div class="form-check">
                            <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="option1" aria-label="..." data-toggle="tooltip" data-placement="top" title="Marcar leido">
                          </div>
                        </th>
                        <td>DD/MM/AA</td>
                        <td>John Doe</td>
                        <td>#0000</td>
                        <td>#000</td>
                        <td>#0000</td>
                      </tr>
                      <tr>
                        <th scope="row">
                          <div class="form-check">
                            <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="option1" aria-label="..." data-toggle="tooltip" data-placement="top" title="Marcar leido">
                          </div>
                        </th>
                        <td>DD/MM/AA</td>
                        <td>John Doe</td>
                        <td>#0000</td>
                        <td>#000</td>
                        <td>#0000</td>
                      </tr>
                      <tr>
                        <th scope="row">
                          <div class="form-check">
                            <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="option1" aria-label="..." data-toggle="tooltip" data-placement="top" title="Marcar leido">
                          </div>
                        </th>
                        <td>DD/MM/AA</td>
                        <td>John Doe</td>
                        <td>#0000</td>
                        <td>#000</td>
                        <td>#0000</td>
                      </tr>
                      <tr>
                        <th scope="row">
                          <div class="form-check">
                            <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="option1" aria-label="..." data-toggle="tooltip" data-placement="top" title="Marcar leido">
                          </div>
                        </th>
                        <td>DD/MM/AA</td>
                        <td>John Doe</td>
                        <td>#0000</td>
                        <td>#000</td>
                        <td>#0000</td>
                      </tr>
                      <tr>
                        <th scope="row">
                          <div class="form-check">
                            <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="option1" aria-label="..." data-toggle="tooltip" data-placement="top" title="Marcar leido">
                          </div>
                        </th>
                        <td>DD/MM/AA</td>
                        <td>John Doe</td>
                        <td>#0000</td>
                        <td>#000</td>
                        <td>#0000</td>
                      </tr>
                      <tr>
                        <th scope="row">
                          <div class="form-check">
                            <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="option1" aria-label="..." data-toggle="tooltip" data-placement="top" title="Marcar leido">
                          </div>
                        </th>
                        <td>DD/MM/AA</td>
                        <td>John Doe</td>
                        <td>#0000</td>
                        <td>#000</td>
                        <td>#0000</td>
                      </tr>
                    </tbody>
                  </table>
                  <div class="pt-1 mb-3">
                    <nav aria-label="Page navigation example">
                      <ul class="pagination justify-content-center">
                        <li class="page-item">
                          <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                          </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                          <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                          </a>
                        </li>
                      </ul>
                    </nav>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br><br>
  </div>

  <footer>
    <?php
    require('compl/footer.php');
    ?>
  </footer>
</body>

</html>