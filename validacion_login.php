<?php
include("db.php");

session_start(); // Inicia la sesión

// Verificar si se enviaron los datos del formulario
if (isset($_POST['correo']) && isset($_POST['password'])) {
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    // Realiza la consulta en la tabla de profesores y verifica el id_estado
    $query = "SELECT pr.*, ac.id_actividad FROM profesores as pr
    JOIN actividad as ac ON pr.id_estado = ac.id_actividad
    WHERE pr.correo = '$correo' AND pr.password = '$password'";

    $result = $conexion->query($query);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Verifica el id_estado del profesor
        if ($row['id_actividad'] != 2) {
            // El usuario es un profesor con id_estado distinto de 2
            $_SESSION['correo'] = $correo;
            $_SESSION['nivel_acceso'] = 'profesor';
            $_SESSION['nombre_usuario'] = $row['nombre'];
            header('Location: ../sistema-escolar/director/views/index.php');
            exit();
        } else {
            // El profesor tiene id_estado igual a 2, no se le permite el acceso
            echo "<script language='JavaScript'>
                alert('Error: Usted No tiene acceso al sistema.');
                window.location.href = './index.php';
            </script>";
            exit();
        }
    }

    // Si el usuario no se encontró en la tabla de profesores, continúa con las otras verificaciones
    $query = "SELECT * FROM administrador WHERE correo = '$correo' AND password = '$password'";
    $result = $conexion->query($query);

    if ($result->num_rows == 1) {
        // El usuario es un administrador
        $_SESSION['correo'] = $correo;
        $_SESSION['nivel_acceso'] = 'administrador';
        header('Location: ../sistema-escolar/administrador/index.php');
        exit();
    }

    $query = "SELECT * FROM directores WHERE correo = '$correo' AND password = '$password'";
    $result = $conexion->query($query);

    if ($result->num_rows == 1) {
        // El usuario es un director
        $_SESSION['correo'] = $correo;
        $_SESSION['nivel_acceso'] = 'director';
        header('Location: ../sistema-escolar/director/index.php');
        exit();
    }

    // Si el usuario no se encontró en ninguno de los niveles, muestra un mensaje de error.
    echo "<script language='JavaScript'>
         alert('Error: Usuario o Contraseña Son Incorrectas');
         window.location.href = './index.php';
        </script>";
}
// Credenciales incorrectas

$conexion->close();
?>
