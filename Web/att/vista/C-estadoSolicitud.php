<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="" />
    <title>Estado De Solicitud</title>
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
    <div class="row g-0 text-center">
        <div class="col-sm-6 col-md-3 justify-content-center">
        </div>
        <main>
            <div class="content">
                <div class="container">
                    <div class="card bg-light" style="border-radius: 1rem;">
                        <div class="center">
                            <h3>Estado de Solicitud</h3>
                        </div>
                        <div class="box box-primary">
                            <div class="box-body">
                                <table width="100%" class="table table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Fecha</th>
                                            <th>Descripción</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>                                    
                                        <?php
                                            $estado = array("En Proceso...","Aprobado", "Rechazado");
                                        foreach ($solicitudes as $s) {

                                        ?>
                                            <tr>
                                                <td>No.<?php echo $s->id_solicitud; ?>
                                                </td>
                                                <td><?php echo $s->created_at; ?></td>
                                                <td><?php echo "La solicitud para el ".$s->fecha_salida." con destino ".$s->destino." con ".$s->cant_personas." pasajeros."; ?>
                                                </td>
                                                <td><?php echo $estado[$s->estado_solicitud]; ?>
                                                </td>
                                                <td class="text-end">
                                                    <a href="" class="btn btn-outline-info btn-rounded"><i class="fas fa-info-circle" i></i></a>
                                                </td>
                                            </tr>
                                        <?php   }   ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <div class="col-6 col-md-2 justify-content-center">
        </div>
    </div>

    <footer>
        <?php
        require_once('compl/footer.php');
        ?>
    </footer>
</body>

</html>