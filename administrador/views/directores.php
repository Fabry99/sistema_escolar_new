<?php include "../../administrador/includes/header.php"; ?>


<body>
    <!-- Button trigger modal -->

    <body id="page-top">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- DataTales Example -->
            <div class="card shadow mb-1">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Lista de Directores</h6>
                    <br>

                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#AgregarModal">
                        <span class="glyphicon glyphicon-plus"></span> Agregar <i class="fa fa-plus-circle" aria-hidden="true"></i> </a></button>

                </div>
                <?php include "../../administrador/views/modalAggDirectores.php"; ?>
                <?php include "../../administrador/views/modalActualizarDirector.php"; ?>





                <div class="card-body">
                    <div class="table-responsive">

                        <table id="dataTableDirector" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NOMBRE</th>
                                    <th>APELLIDOS</th>
                                    <th>DUI</th>
                                    <th>CORREO</th>
                                    <th>TELEFONO</th>
                                    <th>ESTADO</th>
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
                                $result = mysqli_query($conexion, "SELECT * FROM directores as dr JOIN actividad as ac ON dr.id_estado = ac.id_actividad");
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
                                        <td><?php echo $fila['telefono']; ?></td>
                                        <td><span class="badge <?php echo $color_clase; ?>"><?php echo $estado; ?></span></td>

                                        <td>
                                            <button type="button" class="btn btn-warning m-1" data-bs-toggle="modal" data-bs-target="#editar<?php echo $fila['id']; ?>">
                                                <i class="fa fa-edit"></i>
                                            </button>

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
                                    <th>TELEFONO</th>
                                    <th>ESTADO</th>
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
                    window.location.href = '../../administrador/views/eliminarDirector.php?id=' + id;
                }
            });
        }
    </script>


    <?php include "../../administrador/includes/footer.php"; ?>



    </html>