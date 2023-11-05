<?php
include("../../director/includes/db.php");

if (isset($_POST['nombre']) && isset($_POST['apellidos']) && isset($_POST['telefono']) && isset($_POST['correo']) && isset($_POST['edad']) && isset($_POST['id_grados'])  && isset($_POST['birthdate'])) {
    $nombre = trim($_POST['nombre']);
    $apellidos = trim($_POST['apellidos']);
    $telefono = trim($_POST['telefono']);
    $correo = trim($_POST['correo']);
    $edad = $_POST['edad'];
    $id_grados = $_POST['id_grados'];
    $birthdate = $_POST['birthdate'];
// Use 'id_estado' directly from the POST data

    // Ensure that $id_estado is a numeric value to prevent SQL injection
    if ( !is_numeric($id_grados) ) {
        echo 'Invalid ID value';
    } else {
        $consulta = "INSERT INTO alumnos (nombre, apellidos, correo, edad, telefono, birthdate, id_grado) VALUES ('$nombre', '$apellidos', '$correo', '$edad', '$telefono', '$birthdate' , '$id_grados')";
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