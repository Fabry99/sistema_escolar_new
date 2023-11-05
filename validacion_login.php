<?php
include("db.php");

session_start(); // Inicia la sesión

// Verificar si se enviaron los datos del formulario
if (isset($_POST['correo']) && isset($_POST['password'])) {
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    // Realiza la consulta en la tabla de profesores y verifica el id_estado
    $query = "SELECT pr.*, ac.id_actividad, gr.descripcion, es.especialidad, es.id_especialidades
    FROM profesores as pr
    JOIN actividad as ac ON pr.id_estado = ac.id_actividad
    JOIN grados as gr ON pr.id_grado=gr.id_grados
    JOIN especialidades as es ON pr.id_especialidad=es.id_especialidades
    WHERE pr.correo = '$correo' AND pr.password = '$password'";

    $result = $conexion->query($query);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if ($row['id_actividad'] != 2) {
            // El usuario es un profesor con id_estado distinto de 2
            $_SESSION['id_especialidades'] = $row['id_especialidades'];
            $_SESSION['correo'] = $correo;
            $_SESSION['nivel_acceso'] = 'profesor';
            $_SESSION['nombre_usuario'] = $row['nombre'];
            $_SESSION['grados'] = $row['descripcion'];
            $_SESSION['id_profesor'] = $row['id']; // Asegúrate de que esta es la columna correcta para el ID del profesor en tu tabla.
            $_SESSION['id_grado'] = $row['id_grado']; // Aquí almacenas el id_grado en la sesión.
    
            // Ahora, para obtener los alumnos, debes utilizar el id_grado del profesor.
            $id_grado = $row['id_grado']; // Usamos la variable $id_grado para la consulta de alumnos.
            $query_alumnos = "SELECT * FROM alumnos WHERE id_grado = '$id_grado'";
            $result_alumnos = $conexion->query($query_alumnos);
    
            $alumnos = array();
            while($row_alumno = $result_alumnos->fetch_assoc()) {
                array_push($alumnos, $row_alumno);
            }
            $_SESSION['alumnos'] = $alumnos;
            
            // Redirige a la página de profesores
            header('Location: ../sistema-escolar/profesores/views/index.php');
            exit();
        }     
        } else {
            // El profesor tiene id_estado igual a 2, no se le permite el acceso
            echo "<script language='JavaScript'>
                alert('Error: Usted No tiene acceso al sistema.');
                window.location.href = './index.php';
            </script>";
            exit();
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
        $row = $result->fetch_assoc();
        // El usuario es un director
        $_SESSION['correo'] = $correo;
        $_SESSION['nivel_acceso'] = 'director';
        $_SESSION['nombre_usuario'] = $row['nombre'];
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
