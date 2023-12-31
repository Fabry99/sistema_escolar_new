<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>

<body></body>
<?php
include(" ../../administrador/includes/db.php");
$sql = "SELECT * FROM profesores";
$result = mysqli_query($conexion, $sql);

while ($fila = $result->fetch_assoc()) {
    $field0name = $fila['id'];
    $field1name = $fila['password'];
    $field2name = $fila['apellidos'];
    $field3name = $fila['dui'];
    $field4name = $fila['correo'];
    $field5name = $fila['id_especialidad'];
    $field6name = $fila['id_grado'];
    $field7name = $fila['id_estado'];
    $field8name = $fila['nombre'];
?>

    <div class="modal fade" id="editar<?php echo $fila['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editar">Actualizar Datos</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="updateForm<?php echo $fila['id']; ?>" action="../../administrador/views/actualizarProfesor.php?id=<?= $field0name ?>" method="post">
                        <div class="row">

                        <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre:</label>
                                    <input value="<?= $field8name ?>" type="text" name="nombre" id="nombre<?php echo $fila['id']; ?>" class="form-control" >
                                </div>
                            </div>
                           



                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="apellidos" class="form-label">Apellidos:</label>
                                    <input value="<?= $field2name ?>" type="text" name="apellidos" id="apellidos<?php echo $fila['id']; ?>" class="form-control">
                                </div>
                            </div>

                        </div>
                        <div class="row">

                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="dui" class="form-label">DUI:</label>
                                    <input value="<?= $field3name ?>" type="text" name="dui" id="dui<?php echo $fila['id']; ?>" class="form-control">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="correo" class="form-label">Correo:</label>
                                    <input value="<?= $field4name ?>" type="text" name="correo" id="correo<?php echo $fila['id']; ?>" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                       
                        <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="contra" class="form-label">Contraseña:</label>
                                    <input value="<?= $field1name ?>" type="password" name="contra" class="form-control" id="contra<?php echo $fila['id']; ?>">
                                </div>
                            </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="id_especialidad" class="form-label">Materia</label><br>
                                <select name="id_especialidad" id="id_especialidad<?php echo $fila['id']; ?>" class="form-control">
                                    <option value="">Selecciona una opción</option>
                                    <?php
                                    include("administrador/includes/db.php");

                                    $sql = "SELECT * FROM especialidades ";
                                    $resultado = mysqli_query($conexion, $sql);
                                    while ($consulta = mysqli_fetch_array($resultado)) {
                                        $selected = ($field5name == $consulta['id_especialidades']) ? 'selected' : '';
                                        echo '<option value="' . $consulta['id_especialidades'] . '" ' . $selected . '>' . $consulta['especialidad'] . ' ' . $consulta['nombre'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                
                    </div>

                        <div class="row">

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="id_estado" class="form-label">Grado</label><br>
                                <select name="id_grado" id="id_grado<?php echo $fila['id']; ?>" class="form-control">
                                    <option value="">Selecciona una opción</option>
                                    <?php
                                    include("administrador/includes/db.php");

                                    $sql = "SELECT * FROM grados ";
                                    $resultado = mysqli_query($conexion, $sql);
                                    while ($consulta = mysqli_fetch_array($resultado)) {
                                        $selected = ($field6name == $consulta['id_grados']) ? 'selected' : '';
                                        echo '<option value="' . $consulta['id_grados'] . '" ' . $selected . '>' . $consulta['descripcion'] . ' ' . $consulta['nombre'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="id_estado<?php echo $fila['id']; ?>" class="form-label">Actividad:</label><br>
                                    <select name="id_estado" id="id_estado<?php echo $fila['id']; ?>" class="form-control">
                                        <?php
                                        include("../../administrador/includes/db.php");

                                        $sql = "SELECT * FROM actividad ";
                                        $resultado = mysqli_query($conexion, $sql);

                                        while ($consulta = mysqli_fetch_array($resultado)) {
                                            $selected = ($field7name == $consulta['id_actividad']) ? 'selected' : '';
                                            echo '<option value="' . $consulta['id_actividad'] . '" ' . $selected . '>' . $consulta['estado'] . ' ' . $consulta['nombre'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>




                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="confirmUpdate('<?php echo $fila['id']; ?>')">Guardar Cambios</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php
}
?>

<script>
    function confirmUpdate(rowId) {
        const name = document.querySelector(`#nombre${rowId}`).value;
        Swal.fire({
            title: 'Confirmar Actualización',
            text: `¿Está seguro de actualizar los datos de ${name}?`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Guardar',
            cancelButtonText: 'Cancelar',
        }).then((result) => {
            if (result.isConfirmed) {
                document.querySelector(`#updateForm${rowId}`).submit();
            }
        });
    }
</script>

<!-- Your page content here -->
</body>

</html>