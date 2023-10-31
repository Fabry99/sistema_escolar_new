<?php include "../../administrador/includes/header.php"; ?>


<body>
    <!-- Button trigger modal -->

    <body id="page-top">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Lista de Grados</h6>
                    <br>

                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#AgregarModal">
                        <span class="glyphicon glyphicon-plus"></span> Agregar <i class="fa fa-plus-circle" aria-hidden="true"></i> </a></button>

                </div>
                <?php include "../../administrador/views/modalAggGrado.php"; ?>
               <?php include "../../administrador/views/modalActualizarGrados.php";?>





                <div class="card-body">
                    <div class="table-responsive">

                        <table id="dataTableGrados" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>

                                    <th>Grado</th>
                                    <th>Duracion</th>
                                    <th>Cantidad de Alumnos</th>
                                    <th>Profesores</th>
                                    <th></th>

                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                include("administrador/includes/db.php");
                                $result = mysqli_query($conexion, "SELECT g.*, COUNT(DISTINCT al.id) AS numero_alumnos, 
                                GROUP_CONCAT(Distinct p.nombre ORDER BY p.nombre SEPARATOR '\n') AS profesores
                         FROM grados g
                         LEFT JOIN profesores p ON g.id_grados = p.id_grado AND p.id_estado <> 2
                         LEFT JOIN alumnos al ON g.id_grados = al.id_grado
                         GROUP BY g.id_grados");
                                while ($fila = mysqli_fetch_assoc($result)) :
                                ?>
                                    <tr>
                                        <td><?php echo $fila['descripcion']; ?></td>
                                        <td><?php echo $fila['duracion']; ?></td>
                                        <td><?php echo $fila['numero_alumnos']; ?></td>
                                        <td style="white-space: pre-line;"><?php echo $fila['profesores']; ?></td>
                                        <td>

                                            <div class="d-grid gap-2 col-6 mx-auto">
                                                
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editar<?php echo $fila['id']; ?>">
                                                <i class="fa fa-edit "></i></a></button>
                                            </div>
                                            

                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Grado</th>
                                    <th>Duracion</th>
                                    <th>Cantidad de alumnos</th>
                                    <th>Profesores</th>
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
                    window.location.href = '../../administrador/views/eliminarProfesor.php?id=' + id;
                }
            });
        }
    </script>


    <?php include "../../administrador/includes/footer.php"; ?>



    </html>