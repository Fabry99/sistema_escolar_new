<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Asegúrate de que session_start() se llama al principio del archivo.
include "../../profesores/includes/header.php";
include "profesores/includes/db.php"; // Asegúrate de que la ruta es correcta.

// Aquí asumimos que $id_grado_profesor es el ID del grado del profesor que ha iniciado sesión.
$id_grado_profesor = $_SESSION['id_grado'];
?>

<body>
    <!-- Button trigger modal -->

    <body id="page-top">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- DataTales Example -->
            <div class="card shadow ">
                <div class="card-header ">
                    <h3 class="text-primary">
                        Grado:
                        <?php
                        $nombreUsuario = $_SESSION['grados'];
                        echo $nombreUsuario; ?>
                    </h3>
                    <br>

                    <form action="PDFprofesor.php" method="post">
                        <input type="hidden" name="id_grado_profesor"  value="<?php echo $id_grado_profesor; ?> ">
                        <div class="input-icon">
                            <input class="btn btn-danger" type="submit" value="Generar PDF">
                            <span class="bi bi-file-earmark-pdf"></span>
                        </div>
                    </form>
                </div>
                <?php include "../../profesores/views/verNotas.php"; ?>
                <?php include "../../profesores/views/agregarNota.php"; ?>





                <div class="card-body">
                    <div class="table-responsive">

                        <table id="dataAlumnos" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NOMBRE</th>
                                    <th>APELLIDOS</th>
                                    <th>EDAD</th>
                                    <th></th>
                                    <!-- Agrega o elimina columnas según corresponda -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Asegúrate de que esta consulta refleje los campos correctos de la tabla de alumnos.
                                $query = "SELECT * FROM alumnos WHERE id_grado = ?";
                                $stmt = $conexion->prepare($query);
                                $stmt->bind_param("i", $id_grado_profesor);
                                $stmt->execute();
                                $result = $stmt->get_result();

                                while ($fila = $result->fetch_assoc()) : ?>
                                    <tr>
                                        <td><?php echo $fila['id']; ?></td>
                                        <td><?php echo $fila['nombre']; ?></td>
                                        <td><?php echo $fila['apellidos']; ?></td>
                                        <td><?php echo $fila['edad']; ?></td>
                                        <!-- Imprime aquí más columnas si es necesario -->

                                        <td>

                                            <button type="button" class="btn btn-primary ingresar-notas" data-bs-toggle="modal" data-bs-target="#IngresarNotasModal" data-id="<?php echo $fila['id']; ?>" data-nombre="<?php echo $fila['nombre'] . ' ' . $fila['apellidos']; ?>">
                                                <i class="bi bi-pencil-square"></i> Asignar Nota
                                            </button>
                                            <button type="button" class="btn btn-danger m-1" data-bs-toggle="modal" data-bs-target="#editar<?php echo $fila['id']; ?>">
                                                <i class="bi bi-eye-fill"></i> Ver Notas
                                            </button>



                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>NOMBRE</th>
                                    <th>APELLIDOS</th>
                                    <th></th>


                                </tr>
                            </tfoot>
                        </table>
                        <!-- End of Main Content -->

                    </div>
                    <!-- End of Content Wrapper -->

                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                // Asumiendo que usas jQuery
                $('.ingresar-notas').click(function() {
                    // Establece los valores en los campos del modal
                    var estudianteId = $(this).attr('data-id'); // Asegúrate de que cada botón tenga este atributo
                    var estudianteNombre = $(this).attr('data-nombre'); // Asegúrate de que cada botón tenga este atributo

                    $('#estudianteId').val(estudianteId);
                    $('#nombreEstudiante').val(estudianteNombre);
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                $('.ver-notas').click(function() {
                    var estudianteId = $(this).data('id');
                    var estudianteNombre = $(this).data('nombre');

                    // Coloca el nombre del estudiante en el campo de nombre del modal
                    $('#nombreEstudiante').val(estudianteNombre);

                    // Realiza una solicitud AJAX para cargar las notas del estudiante
                    $.ajax({
                        type: 'POST',
                        url: '../../profesores/views/verNotas.php', // Reemplaza 'cargar_notas.php' con la URL correcta para cargar las notas del estudiante
                        data: {
                            estudianteId: estudianteId
                        },
                        success: function(data) {
                            // Inserta los datos de las notas en la tabla dentro del modal
                            $('#notasTable').html(data);
                        },
                        error: function(xhr, status, error) {
                            alert('Error al cargar las notas: ' + error);
                        }
                    });
                });
            });
        </script>




    </body>

    <?php include "../../profesores/includes/footer.php"; ?>



    </html>