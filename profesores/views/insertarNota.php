<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include "../../profesores/includes/db.php"; // Asegúrate de que la ruta es correcta.

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['id_especialidades'])) {
    $id_alumno = $_POST['estudianteId'];
    $id_materia = $_SESSION['id_especialidades'];
    $nota1 = $_POST['nota1'];
    $nota2 = $_POST['nota2'];
    $nota3 = $_POST['nota3'];
    $promedio = ($nota1 + $nota2 + $nota3) / 3;

    if ($promedio - floor($promedio) >= 0.5) {
        $promedio = round($promedio);
    }
    

    $aprobado = ($promedio >= 5) ? "Aprobado" : "Reprobado";

    $query = "INSERT INTO notas (id_estudiante, id_materia, nota1, nota2, nota3, total, aprobacion) VALUES (?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = $conexion->prepare($query)) {
        $stmt->bind_param("iisssss", $id_alumno, $id_materia, $nota1, $nota2, $nota3, $promedio, $aprobado);

        if ($stmt->execute()) {
            // Notas guardadas exitosamente
        } else {
            // No se pudo guardar las notas
        }
        $stmt->close();
    } else {
        // Error de preparación
    }
    $conexion->close();
    exit();
}
?>

