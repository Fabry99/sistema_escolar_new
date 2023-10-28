<?php
include("../../director/includes/db.php");

if (isset($_POST['nombre']) && isset($_POST['apellidos']) && isset($_POST['dui']) && isset($_POST['correo']) && isset($_POST['id_especialidades']) && isset($_POST['id_grados']) && isset($_POST['id_estado'])) {
    $nombre = trim($_POST['nombre']);
    $apellidos = trim($_POST['apellidos']);
    $dui = trim($_POST['dui']);
    $correo = trim($_POST['correo']);
    $id_especialidades = $_POST['id_especialidades'];
    $id_grados = $_POST['id_grados'];
    $id_estado = $_POST['id_estado']; // Use 'id_estado' directly from the POST data

    // Ensure that $id_estado is a numeric value to prevent SQL injection
    if (!is_numeric($id_estado) || !is_numeric($id_grados) || !is_numeric($id_especialidades)) {
        echo 'Invalid ID value';
    } else {
        $consulta = "INSERT INTO profesores (nombre, apellidos, dui, correo, id_especialidad, id_grado, id_estado) VALUES ('$nombre', '$apellidos', '$dui', '$correo', '$id_especialidades', '$id_grados', $id_estado)";
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

