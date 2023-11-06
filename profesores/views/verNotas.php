<!-- Modal -->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>

<style>
    .input-icon {
        position: relative;
        display: inline-block;
    }

    .input-icon input[type="submit"] {
        padding-left: 2.5em;
        /* Espacio para el icono a la izquierda del botón */
    }

    .input-icon span {
        position: absolute;
        top: 0;
        left: 0;
        /* Cambiamos 'right' a 'left' */
        bottom: 0;
        width: 2.5em;
        /* Ancho del espacio para el icono */
        display: flex;
        justify-content: center;
        align-items: center;
        pointer-events: none;
        /* Permite hacer clic a través del icono */
        color: white;
    }

    .hidden-form {
        display: none;
    }
</style>
<?php
include(" ../../director/includes/db.php");
$sql = "SELECT * FROM alumnos";
$result = mysqli_query($conexion, $sql);

while ($fila = $result->fetch_assoc()) {
    $field0name = $fila['id'];
    $field1name = $fila['nombre'];
    $field2name = $fila['apellidos'];
    $field3name = $fila['correo'];
    $field4name = $fila['edad'];
    $field5name = $fila['telefono'];
    $field6name = $fila['birthdate'];
    $field7name = $fila['id_grado'];
?>
    <div class="modal fade" id="editar<?php echo $fila['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editar">Actualizar Datos de Alumno</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="myForm">
                        <div class="mb-3">
                            <label for="nombreEstudiante" class="form-label">Nombre del Estudiante</label>
                            <input type="text" class="form-control" id="nombre" value="<?= $field1name . ' ' . $field2name ?>" readonly>
                        </div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>MATERIA</th>
                                    <th>PERIODO 1</th>
                                    <th>PERIODO 2</th>
                                    <th>PERIODO 3</th>
                                    <th>PROMEDIO</th>
                                    <th>RESULTADO</th>
                                    <!-- Add more table headings as needed -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Query to fetch data from the database
                                $dataSql = "SELECT es.especialidad, n.* FROM notas as n JOIN 
                                especialidades as es on n.id_materia=es.id_especialidades
                                 WHERE id_estudiante= $field0name";
                                $dataResult = mysqli_query($conexion, $dataSql);

                                while ($dataRow = mysqli_fetch_assoc($dataResult)) {

                                    echo "<tr";
                                    // Check the value of "aprobacion" and apply a CSS class for styling the entire row
                                    if ($dataRow['aprobacion'] == 'Reprobado') {
                                        echo " class='table-danger'";
                                    }
                                    echo ">";
                                    echo "<td>" . $dataRow['especialidad'] . "</td>";
                                    echo "<td>" . $dataRow['nota1'] . "</td>";
                                    echo "<td>" . $dataRow['nota2'] . "</td>";
                                    echo "<td>" . $dataRow['nota3'] . "</td>";
                                    echo "<td>" . $dataRow['total'] . "</td>";
                                    echo "<td>" . $dataRow['aprobacion'] . "</td>";
                                    // Add more table cells for additional columns
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>

                        <div class="modal-footer">
                            <form action="generarPDF.php" method="post" class="hidden-form">
                                <button type="submit" class="btn btn-danger" style="display: none;">
                                    <i class="bi bi-file-earmark-pdf"></i> Generar PDF
                                </button>
                            </form>

                            <form action="generarPDF.php" method="post">
                                <input type="hidden" name="alumno_id" value="<?php echo $field0name; ?>">
                                <div class="input-icon">
                                    <input class="btn btn-danger" type="submit" value="Generar PDF">
                                    <span class="bi bi-file-earmark-pdf"></span>
                                </div>
                            </form>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>

</body>

</html>