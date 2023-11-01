<?php 
include("db.php");

?>

<?php
session_start(); // Inicia la sesión

// Verificar si se enviaron los datos del formulario
if (isset($_POST['correo']) && isset($_POST['password'])) {
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    // Consulta a la base de datos para verificar el correo y la contraseña
    $query = "SELECT * FROM profesores WHERE correo = '$correo' AND password = '$password'";
    $result = $conexion->query($query);

    if ($result->num_rows == 1) {
        // Usuario es un profesor
        $_SESSION['correo'] = $correo;
        $_SESSION['nivel_acceso'] = 'profesor';
        header('Location: ../sistema-escolar/director/views/index.php');
        exit();
    } else {
        // Si no es profesor, verifica si es director
        $query = "SELECT * FROM directores WHERE correo = '$correo' AND password = '$password'";
        $result = $conexion->query($query);

        if ($result->num_rows == 1) {
            // Usuario es un director
            $_SESSION['nivel_acceso'] = 'director';
        } else {
            // Si no es director, verifica si es administrador
            $query = "SELECT * FROM administradores WHERE correo = '$correo' AND password = '$password'";
            $result = $conexion->query($query);

            if ($result->num_rows == 1) {
                // Usuario es un administrador
                $_SESSION['nivel_acceso'] = 'administrador';
            } else {
                // Credenciales incorrectas
                echo "Credenciales incorrectas. Por favor, inténtalo de nuevo.";
            }
        }
    }
    // Redirige al usuario a la página correspondiente según su nivel de acceso
} else {
    echo "Por favor, complete el formulario de inicio de sesión.";
}

$conexion->close();
?>
