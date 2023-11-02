<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>

<body></body>
<?php
include(" ../../administrador/includes/db.php");
$sql = "SELECT * FROM directores";
$result = mysqli_query($conexion, $sql);

while ($fila = $result->fetch_assoc()) {
    $field0name = $fila['id'];
    $field1name = $fila['password'];
    $field2name = $fila['apellidos'];
    $field3name = $fila['dui'];
    $field4name = $fila['telefono'];
    $field5name = $fila['correo'];
    $field6name = $fila['nombre'];
    $field7name = $fila['id_estado'];


?>

    <div class="modal fade" id="editar<?php echo $fila['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editar">Actualizar Datos de Director</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="updateForm<?php echo $fila['id']; ?>" action="../../administrador/views/actualizarDirector.php?id=<?= $field0name ?>" method="post">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre:</label>
                                    <input value="<?= $field6name ?>" name="nombre" class="form-control" id="nombre<?php echo $fila['id']; ?>">
                                </div>

                            </div>



                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="apellidos" class="form-label">Apellidos:</label>
                                    <input value="<?= $field2name ?>" name="apellidos" class="form-control" id="apellidos<?php echo $fila['id']; ?>">
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="dui" class="form-label">DUI:</label>
                                    <input value="<?= $field3name ?>" name="dui" class="form-control" id="dui<?php echo $fila['id']; ?>">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="telefono" class="form-label">Telefono:</label>
                                    <input value="<?= $field4name ?>" name="telefono" class="form-control" id="telefono<?php echo $fila['id']; ?>">
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="correo" class="form-label">Correo:</label>
                                    <input value="<?= $field5name ?>" name="correo" class="form-control" id="correo<?php echo $fila['id']; ?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="contra" class="form-label">Contraseña:</label>
                                    <input value="<?= $field1name ?>" type="password" name="contra" class="form-control" id="contra<?php echo $fila['id']; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">

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
            text: `¿Está seguro de actualizar los datos a ${name}?`,
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