<?php
include("../../administrador/includes/db.php");

if (isset($_POST['grado']) && isset($_POST['duracion'])) {
    $grado = trim($_POST['grado']);
    $duracion = trim($_POST['duracion']);

if ($grado == ''|| $duracion == '') {
    
        echo 'Ingrese datos validos';
    } else {
        $consulta = "INSERT INTO grados (descripcion, duracion) VALUES ('$grado', '$duracion')";
        $resultado = mysqli_query($conexion, $consulta);

        if ($resultado) {
            echo 'Los Datos Se Guardaron Correctamente';
        } else {
            echo 'Ocurrió un error al guardar los datos: ' . mysqli_error($conexion);
        }
    }
} else {
    echo 'No data';
}

$conexion->close();
