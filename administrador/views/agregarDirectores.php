<?php
include("../../administrador/includes/db.php");

if (isset($_POST['nombre']) && isset($_POST['apellidos']) && isset($_POST['dui']) && isset($_POST['telefono'])&& isset($_POST['correo'])&& isset($_POST['password']) && isset($_POST['id_estado'])) {
    $nombre = trim($_POST['nombre']);
    $apellidos = trim($_POST['apellidos']);
    $dui = trim($_POST['dui']);
    $telefono = trim($_POST['telefono']);
    $correo = trim($_POST['correo']);
    $password = trim($_POST['password']);
    $id_estado = $_POST['id_estado']; 


    if (!is_numeric($id_estado) ) {
        echo 'Invalid ID value';
    } else {
        $consulta = "INSERT INTO directores (nombre, apellidos, dui,telefono,correo,password, id_estado) VALUES ('$nombre', '$apellidos', '$dui', '$telefono', '$correo', '$password', $id_estado)";
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
?>

