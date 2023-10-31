<?php
include("../../administrador/includes/db.php");

if (isset($_POST['materia'])) {
    $materia = trim($_POST['materia']);
   

if ($materia == '') {
    
        echo 'Ingrese datos validos';
    } else {
        $consulta = "INSERT INTO especialidades (especialidad) VALUES ('$materia')";
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