<?php
require('../../fpdf.php'); // Incluye el archivo FPDF
require('../../includes/db.php'); // Incluye el archivo de conexión a la base de datos

if (isset($_POST['alumno_id'])) {
    $alumno_id = $_POST['alumno_id'];

    // Realiza la consulta SQL para obtener los datos del alumno
    $alumnoQuery = "SELECT * FROM alumnos as al JOIN grados as gr on al.id_grado=gr.id_grados WHERE id = $alumno_id";
    $alumnoResult = mysqli_query($conexion, $alumnoQuery);

    if ($alumnoRow = mysqli_fetch_assoc($alumnoResult)) {
        $nombreAlumno = $alumnoRow['nombre'] . ' ' . $alumnoRow['apellidos'];
        $gradoAlumno = $alumnoRow['descripcion'];

        // Realiza la consulta SQL para obtener los datos de las notas desde la base de datos
        $query = "SELECT es.especialidad, n.* FROM notas as n JOIN especialidades as es on n.id_materia=es.id_especialidades WHERE id_estudiante = $alumno_id";
        $result = mysqli_query($conexion, $query);

        // Crear una instancia de FPDF
        $pdf = new FPDF();
        $pdf->AddPage();

        // Agregar un título al PDF
        $pdf->SetFont('Arial', 'B', 19);
        $pdf->Cell(190, 10, 'Centro Escolar Santa Teresita', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 15);
        $pdf->Cell(190, 10, 'Reporte de Notas', 0, 1, 'C');


        // Agregar el logo en la esquina superior izquierda
        $pdf->Image('../../img/santa-teresita-removebg-preview.png', 15, 15, 30);

        // Desplazamos la posición Y para el nombre y el grado
        $pdf->SetY(50);

        // Agregar el nombre del alumno y el grado debajo del logo
        $pdf->ln(2);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(190, 10, utf8_decode('Alumno: ' . $nombreAlumno), 0, 1, 'L');
        $pdf->Cell(190, 10, 'Grado: ' . $gradoAlumno, 0, 1, 'L');

        $pdf->Ln(5);
        // Crear una tabla para mostrar los datos
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(50, 10, 'MATERIA', 1);
        $pdf->Cell(25, 10, 'PERIODO 1', 1);
        $pdf->Cell(25, 10, 'PERIODO 2', 1);
        $pdf->Cell(25, 10, 'PERIODO 3', 1);
        $pdf->Cell(25, 10, 'PROMEDIO', 1);
        $pdf->Cell(40, 10, 'RESULTADO', 1);
        $pdf->Ln();

        $pdf->SetFont('Arial', '', 12);
        while ($row = mysqli_fetch_assoc($result)) {
            // Guarda la posición Y actual
            $y = $pdf->GetY();

            if ($row['aprobacion'] == 'Reprobado') {
                // Si es "Reprobado", establece el color de fondo de la fila en rojo
                $pdf->SetFillColor(246, 157, 157);
            } else {
                // De lo contrario, deja el fondo blanco
                $pdf->SetFillColor(255, 255, 255);
            }

            $pdf->Cell(50, 10, $row['especialidad'], 1, 0, '', 1); // El último parámetro '1' establece que se llene la celda con el color de fondo
            $pdf->Cell(25, 10, $row['nota1'], 1, 0, 'C', 1);
            $pdf->Cell(25, 10, $row['nota2'], 1, 0, 'C', 1);
            $pdf->Cell(25, 10, $row['nota3'], 1, 0, 'C', 1);
            $pdf->Cell(25, 10, $row['total'], 1, 0, 'C', 1);
            $pdf->Cell(40, 10, $row['aprobacion'], 1, 1, 'C', 1);

            // Restaurar el fondo de la celda a blanco para las filas siguientes
            $pdf->SetFillColor(255, 255, 255);

            // Restaurar la posición Y para la siguiente fila
            $pdf->SetY($y + 10);
        }




        // Generar el PDF y mostrarlo en el navegador
        $pdf->Output();
    } else {
        echo "Error: No se encontró el alumno con ID $alumno_id.";
    }
} else {
    // Manejar el caso en el que no se reciba el ID del alumno correctamente
    echo "Error: ID del alumno no proporcionado.";
}
