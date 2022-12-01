<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="" />
    <title>Solicitudes - Admistrador</title>
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
    <style >
        .accordion {
            background-color: #ccc;
            color: #1d1d1b;
            cursor: pointer;
            padding: 18px;
            width: 100%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 18px;
            font-weight: bold;
            transition: 0.4s;
        }

        .active,
        .accordion:hover {
            background-color: #efbbff;
        }

        .panel {
            padding: 0 18px;
            display: none;
            background-color: white;
            overflow: hidden;
        }
    </style>

</head>

<body>
    <header>
        <?php
        require('compl/A-header.php');
        ?>
    </header>
    
    <div class="content">
        <div class="container"> 
            <br><br>
                <center>
                <h2 style="color: black;">Solicitudes</h2>
                </center>
            <br>
            <div class="box box-primary">
                <div class="box-body">
                    <?php
                    
                    $i=0;
                    foreach ($solicitudes as $s) {
                    ?>
                    <form method="POST" action="?op=asignacionSolicitudA">
                        <button type="button" class="accordion"><?php echo $s->nombre." ".$s->apellido;?></button>
                        <div class="panel">
                            <label for="id"><b><p>No. Solicitud:</p></b></label>
                            <input type="text" id="id" name="id" value="<?php echo $s->id_solicitud;?>" readonly style="background-color: transparent; border: none; font-weight: bold;"/>
                            <p>Destino: <?php echo $s->destino; ?></p>
                            <p>Fecha de Viaje: <?php echo $s->fecha_salida; ?></p>
                            <input type="submit" value="Asignar" class="btn btn-outline-success mb-2">
                            <input type="submit" value="Rechazar" class="btn btn-outline-danger mb-2"><br>
                        </div>
                    </form>
                    <?php  $i++; }   ?>
                </div>
            </div>
        </div>
        <br><br>
    </div>

    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.display === "block") {
                    panel.style.display = "none";
                } else {
                    panel.style.display = "block";
                }
            });
        }
    </script>
    </div>
    <footer>
        <?php
        require('compl/footer.php');
        ?>
    </footer>
</body>

</html>