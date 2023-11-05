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

                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#AgregarModal">
                        <span class="glyphicon glyphicon-plus"></span> Agregar <i class="fa fa-plus-circle" aria-hidden="true"></i> </a></button>

                </div>
                <?php include "../../director/views/modalAgregarProfesor.php"; ?>
                <?php include "../../profesores/views/agregarNota.php"; ?>





                <div class="card-body">
                    <div class="table-responsive">

                        <table id="dataTableProfe" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NOMBRE</th>
                                    <th>APELLIDOS</th>
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
                                        <!-- Imprime aquí más columnas si es necesario -->

                                        <td>

                                            <button type="button" class="btn btn-primary ingresar-notas" data-bs-toggle="modal" data-bs-target="#IngresarNotasModal" data-id="<?php echo $fila['id']; ?>" data-nombre="<?php echo $fila['nombre'] . ' ' . $fila['apellidos']; ?>">
                                                Ingresar Notas
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


    </body>

    <?php include "../../profesores/includes/footer.php"; ?>



    </html>