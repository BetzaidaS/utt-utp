<?php

include("conbd.php");


if (isset($_POST['Destino']) && isset($_POST['Fecha_salida']) && isset($_POST['Hora_salida']) && isset($_POST['Cant_personas'])) {

    $destino = $_POST['Destino'];
    $fecha_salida = $_POST['Fecha_salida'];
    $fecha_llegada = $_POST['Fecha_llegada'];
    $hora_salida = $_POST['Hora_salida'];
    $hora_llegada = $_POST['Hora_salida'];
    $cant_personas   = $_POST['Cant_personas'];
    $instrucciones   = $_POST['Instruciones'];

    try {
        $insercion = $pdo->prepare("INSERT INTO solicitud ( Destino, Fecha_salida, Fecha_llegada, Hora_salida, Hora_llegada, Cant_personas, Instrucciones)
                                        VALUES ('$destino','$fecha_salida','$fecha_llegada','$hora_salida', '$hora_llegada','$cant_personas','$instrucciones')");
        $insercion->execute();
        header("Location:/att/vista/C-estadoSolicitud.php?msg= Datos registrados");
    } catch (PDOException $e) {
        if ($e->errorInfo[1] == 1062) {
            $msg = ' El correo ya esta registrada su solicitud ';
        } else {
            echo $e;
        }
    }
} else {
    echo 'No se envio desde el formulario';
}
