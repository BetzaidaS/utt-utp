<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="" />
  <title>Conductores - Administrador</title>
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

      <br><br>
      <center>
        <h2 style="color: black;">Listado de Conductores</h2>
      </center>
      <br>
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col col-xl-10">
            <div class="card-body p-6 p-lg-2 text-black">
              <div class="container register-form">
                <div class="form">
                  <table class="table table-hover table-responsive">
                    <thead>
                      <tr>
                        <th scope="col">Foto del conductor</th>
                        <th scope="col">Nombre del conductor</th>
                        <th scope="col">ID conductor</th>
                        <th scope="col">Cedula</th>
                        <th scope="col">Tipo de Licencia</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Sede</th>
                      </tr>
                    </thead>
                    <tbody>

                      <tr>
                        <td><img src="https://castillotrans.eu/wp-content/uploads/2019/06/77461806-icono-de-usuario-hombre-hombre-avatar-avatar-pictograma-pictograma-vector-ilustraci%C3%B3n.jpg" alt="Generic placeholder image" class="img-thumbnail" style="width: 50px; height: 50px;">
                        </td>
                        <td>John Doe</td>
                        <td>#0000</td>
                        <td>00-0000-0000</td>
                        <td>T0</td>
                        <td>Disponibilidad</td>
                        <td>Sede</td>
                      </tr>
                      <tr>
                        <td><img src="https://castillotrans.eu/wp-content/uploads/2019/06/77461806-icono-de-usuario-hombre-hombre-avatar-avatar-pictograma-pictograma-vector-ilustraci%C3%B3n.jpg" alt="Generic placeholder image" class="img-thumbnail" style="width: 50px; height: 50px;">
                        </td>
                        <td>John Doe</td>
                        <td>#0000</td>
                        <td>00-0000-0000</td>
                        <td>T0</td>
                        <td>Disponibilidad</td>
                        <td>Sede</td>
                      </tr>
                      <tr>
                        <td><img src="https://castillotrans.eu/wp-content/uploads/2019/06/77461806-icono-de-usuario-hombre-hombre-avatar-avatar-pictograma-pictograma-vector-ilustraci%C3%B3n.jpg" alt="Generic placeholder image" class="img-thumbnail" style="width: 50px; height: 50px;">
                        </td>
                        <td>John Doe</td>
                        <td>#0000</td>
                        <td>00-0000-0000</td>
                        <td>T0</td>
                        <td>Disponibilidad</td>
                        <td>Sede</td>
                      </tr>
                      <tr>
                        <td><img src="https://castillotrans.eu/wp-content/uploads/2019/06/77461806-icono-de-usuario-hombre-hombre-avatar-avatar-pictograma-pictograma-vector-ilustraci%C3%B3n.jpg" alt="Generic placeholder image" class="img-thumbnail" style="width: 50px; height: 50px;">
                        </td>
                        <td>John Doe</td>
                        <td>#0000</td>
                        <td>00-0000-0000</td>
                        <td>T0</td>
                        <td>Disponibilidad</td>
                        <td>Sede</td>
                      </tr>
                      <tr>
                        <td><img src="https://castillotrans.eu/wp-content/uploads/2019/06/77461806-icono-de-usuario-hombre-hombre-avatar-avatar-pictograma-pictograma-vector-ilustraci%C3%B3n.jpg" alt="Generic placeholder image" class="img-thumbnail" style="width: 50px; height: 50px;">
                        </td>
                        <td>John Doe</td>
                        <td>#0000</td>
                        <td>00-0000-0000</td>
                        <td>T0</td>
                        <td>Disponibilidad</td>
                        <td>Sede</td>
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
  </div><br><br>

  <footer>
    <?php
    require('compl/footer.php');
    ?>
  </footer>
</body>

</html>