<?php
include("../../administrador/includes/db.php");

if (isset($_POST['correo']) || isset($_POST['nombre']) || isset($_POST['password']) ) {
    $correo = trim($_POST['correo']);
    $nombre = trim($_POST['nombre']);
    $password = trim($_POST['password']);
   

if ($correo == '' || $nombre =='' || $password == '') {
    
        echo 'Ingrese datos validos';
    } else {
        $consulta = "INSERT INTO administrador (correo, password, nombre) VALUES ('$correo','$password','$nombre')";
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