<?php
session_start(); // Asegúrate de que session_start() se llama al principio del archivo.
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
            <div class="card shadow mb-1">
                <div class="card-header py-2">
                    <h6 class="m-0 font-weight-bold text-primary">Lista de Profesores</h6>
                    <br>

                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#AgregarModal">
                        <span class="glyphicon glyphicon-plus"></span> Agregar <i class="fa fa-plus-circle" aria-hidden="true"></i> </a></button>

                </div>
                <?php include "../../director/views/modalAgregarProfesor.php"; ?>
                <?php include "../../director/views/modalActualizarProfe.php"; ?>





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
                                        <td><?php echo $fila['id_alumno']; ?></td>
                                        <td><?php echo $fila['nombre']; ?></td>
                                        <td><?php echo $fila['apellidos']; ?></td>
                                        <!-- Imprime aquí más columnas si es necesario -->

                                        <td>
                                            <button type="button" class="btn btn-warning m-1" data-bs-toggle="modal" data-bs-target="#editar<?php echo $fila['id_alumno']; ?>">
                                                <i class="fa fa-edit "></i></a></button>

                                            <button type="button" class="btn btn-danger m-1" onclick="confirmDelete(<?php echo $fila['id']; ?>, '<?php echo $fila['nombre']; ?>')">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
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
    </body>
    <script>
        function confirmDelete(id, nombre) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: `Esta acción eliminará a ${nombre}. ¿Estás seguro de eliminar a ${nombre}?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, eliminar',
                confirmButtonColor: '#3085d6',
                cancelButtonText: 'Cancelar',
                cancelButtonColor: '#C4044A'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to the delete URL with the ID
                    window.location.href = '../../director/views/eliminarProfesor.php?id=' + id;
                }
            });
        }
    </script>


    <?php include "../../director/includes/footer.php"; ?>



    </html>