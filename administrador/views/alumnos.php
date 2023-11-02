<?php include "../../administrador/includes/header.php"; ?>


<body>
    <!-- Button trigger modal -->

    <body id="page-top">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- DataTales Example -->
            <div class="card shadow mb-1">
                <div class="card-header pt-3">
                    <h6 class="m-0 font-weight-bold text-primary">Lista de Alumnos</h6>
                    <br>

                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#AgregarModal">
                        <span class="glyphicon glyphicon-plus"></span> Agregar <i class="fa fa-plus-circle" aria-hidden="true"></i> </a></button>

                </div>
                <?php include "../../administrador/views/modalAggAlumno.php"; ?>
                <?php include "../../administrador/views/modalActuaAlumno.php"; ?>






                <div class="card-body">
                    <div class="table-responsive">

                        <table id="dataTableAlumno" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <!-- <th>ID</th> -->
                                    <th>NOMBRE</th>
                                    <th>APELLIDOS</th>
                                    <th>CORREO</th>
                                    <th>TELEFONO</th>
                                    <th>EDAD</th>
                                    <th>NACIMIENTO</th>
                                    <th>GRADO</th>
                                    <th></th>

                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                include("administrador/includes/db.php");
                                $result = mysqli_query($conexion, "SELECT * FROM alumnos as al 
                                JOIN grados as gr ON al.id_grado=gr.id_grados");
                                while ($fila = mysqli_fetch_assoc($result)) :

                                ?>
                                    <tr>
                                       
                                        <td><?php echo $fila['nombre']; ?></td>
                                        <td><?php echo $fila['apellidos']; ?></td>
                                        <td><?php echo $fila['correo']; ?></td>
                                        <td><?php echo $fila['telefono']; ?></td>
                                        <td><?php echo $fila['edad']; ?></td>
                                        <td><?php echo $fila['birthdate']; ?></td>
                                        <td><?php echo $fila['descripcion']; ?></td>


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
                                    <!-- <th>ID</th> -->
                                    <th>NOMBRE</th>
                                    <th>APELLIDOS</th>
                                    <th>CORREO</th>
                                    <th>TELEFONO</th>
                                    <th>EDAD</th>
                                    <th>NACIMIENTO</th>
                                    <th>GRADO</th>
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
                    window.location.href = '../../administrador/views/eliminarAlumno.php?id=' + id;
                }
            });
        }
    </script>


    <?php include "../../administrador/includes/footer.php"; ?>



    </html>