<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>

<body></body>
<?php
include(" ../../administrador/includes/db.php");
$sql = "SELECT * FROM especialidades";
$result = mysqli_query($conexion, $sql);

while ($fila = $result->fetch_assoc()) {
    $field0name = $fila['id_especialidades'];
    $field1name = $fila['especialidad'];


?>

    <div class="modal fade" id="editar<?php echo $fila['id_especialidades']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editar">Actualizar Materia</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="updateForm<?php echo $fila['id_especialidades']; ?>" action="../../administrador/views/actualizarMateria.php?id_especialidades=<?= $field0name ?>" method="post">
                        <div class="row">

                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="materia" class="form-label">Materia:</label>
                                    <input value="<?= $field1name ?>" name="materia" class="form-control" id="materia<?php echo $fila['id_especialidades']; ?>">
                                </div>
                            </div>

                        </div>
                        
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="confirmUpdate('<?php echo $fila['id_especialidades']; ?>')">Guardar Cambios</button>
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
        const name = document.querySelector(`#materia${rowId}`).value;
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