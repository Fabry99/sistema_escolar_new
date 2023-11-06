<?php
session_start();
require('../../fpdf.php'); // Incluye el archivo FPDF
require('../../includes/db.php'); // Incluye el archivo de conexión a la base de datos

if (isset($_POST['id_grado_profesor'])) {
    $id_grado_profesor = $_POST['id_grado_profesor'];

    // Realiza la consulta SQL para obtener los datos de los alumnos con el id_grado igual al del profesor
    $query = "SELECT * FROM alumnos WHERE id_grado = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("i", $id_grado_profesor);
    $stmt->execute();
    $result = $stmt->get_result();

    // Crear una instancia de FPDF
    $pdf = new FPDF();
    $pdf->AddPage();
    $nombreUsuario = $_SESSION['grados'];

    // Agregar un título al PDF
    $pdf->SetFont('Arial', 'B', 19);
    $pdf->Cell(190, 10, 'Centro Escolar Santa Teresita', 0, 1, 'C');
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(190, 10, 'Reporte de Alumnos', 0, 1, 'C');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(190, 10, 'Grado: ' . $nombreUsuario, 0, 1, 'C');

    $pdf->Image('../../img/santa-teresita-removebg-preview.png', 15, 15, 30);

    $pdf->SetY(50);

    // Obtener el nombre del profesor (grado)
 

    // Agregar el nombre del profesor (grado) al PDF


    // Crear una tabla para mostrar los datos de los alumnos
    $pdf->Ln(3);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(80, 10, 'NOMBRE', 1, 0, 'C');
    $pdf->Cell(80, 10, 'APELLIDOS', 1, 0, 'C');
    $pdf->Cell(30, 10, 'EDAD', 1, 0, 'C');
    $pdf->Ln();

    $pdf->SetFont('Arial', '', 12);

    while ($row = mysqli_fetch_assoc($result)) {
        $nombre = utf8_decode($row['nombre']); // Decodificar el nombre
        $apellidos = utf8_decode($row['apellidos']); // Decodificar los apellidos

        $pdf->Cell(80, 10, $nombre, 1);
        $pdf->Cell(80, 10, $apellidos, 1);
        $pdf->Cell(30, 10, $row['edad'], 1, 0, 'C');
        $pdf->Ln();
    }

    // Generar el PDF y mostrarlo en el navegador
    $pdf->Output();
} else {
    // Manejar el caso en el que no se reciba el id_grado_profesor correctamente
    echo "Error: ID de grado del profesor no proporcionado.";
}
?>
