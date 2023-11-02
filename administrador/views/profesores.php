<?php include "../../administrador/includes/header.php"; ?>


<body>
    <!-- Button trigger modal -->

    <body id="page-top">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- DataTales Example -->
            <div class="card shadow mb-1">
                <div class="card-header pt-3">
                    <h6 class="m-0 font-weight-bold text-primary">Lista de Profesores</h6>
                    <br>

                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#AgregarModal">
                        <span class="glyphicon glyphicon-plus"></span> Agregar <i class="fa fa-plus-circle" aria-hidden="true"></i> </a></button>

                </div>
                <?php include "../../administrador/views/modalAgregarProfesor.php"; ?>
                <?php include "../../administrador/views/modalActualizarProfe.php"; ?>





                <div class="card-body">
                    <div class="table-responsive">

                        <table id="dataTableProfe" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NOMBRE</th>
                                    <th>APELLIDOS</th>
                                    <th>DUI</th>
                                    <th>CORREO</th>
                                    <th>ESPECIALIDAD</th>
                                    <th>GRADO</th>
                                    <th>ACTIVIDAD</th>
                                    <th></th>

                                </tr>
                            </thead>

                            <style>
                                .verde{
                                    background-color: #57D386;
                                    color: white;
                                    font-size: 14px;
                                    padding-left: 9px;
                                    padding-right: 9px;
                                    padding-top: 5px;
                                    padding-bottom: 5px;

                                }
                                .oscuro{
                                    background-color: #B9B9B9;
                                    color: white;
                                    font-size: 13px;
                                    padding: 5px;
                                }
                            </style>

                            <tbody>
                                <?php
                                include("administrador/includes/db.php");
                                $result = mysqli_query($conexion, "SELECT * FROM profesores as pr 
                                JOIN actividad as ac ON pr.id_estado=ac.id_actividad 
                                JOIN especialidades as esp ON pr.id_especialidad=esp.id_especialidades
                                JOIN grados as gr ON pr.id_grado=gr.id_grados");
                                while ($fila = mysqli_fetch_assoc($result)) :
                                    $estado = ($fila['id_actividad'] == '1') ? 'Activo' : 'Inactivo';
                                    $color_clase = ($fila['id_actividad'] == '1') ? 'verde' : 'oscuro';

                                ?>
                                    <tr>
                                        <td><?php echo $fila['id']; ?></td>
                                        <td><?php echo $fila['nombre']; ?></td>
                                        <td><?php echo $fila['apellidos']; ?></td>
                                        <td><?php echo $fila['dui']; ?></td>
                                        <td><?php echo $fila['correo']; ?></td>
                                        <td><?php echo $fila['especialidad']; ?></td>
                                        <td><?php echo $fila['descripcion']; ?></td>
                                        <td><span class="badge <?php echo $color_clase; ?>"><?php echo $estado; ?></span></td>


                                        <td>
                                            <button type="button" class="btn btn-warning m-1" data-bs-toggle="modal" data-bs-target="#editar<?php echo $fila['id']; ?>">
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
                                    <th>DUI</th>
                                    <th>CORREO</th>
                                    <th>ESPECIALIDAD</th>
                                    <th>GRADO</th>
                                    <th>ACTIVIDAD</th>
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