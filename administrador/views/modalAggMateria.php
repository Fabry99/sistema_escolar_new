<!-- Modal -->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>
<div class="modal fade" id="AgregarModal" tabindex="-1" aria-labelledby="AgregarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="AgregarModalLabel">Agregar Materia</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="myForm">
                    <div class="row">

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="materia" class="form-label">Materia</label>
                                <input type="text" name="materia" id="materia" class="form-control" required>
                            </div>
                        </div>

                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" value="Guardar" id="register" class="btn btn-success" name="registrar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function() {
        $('#register').click(function(e) {
            e.preventDefault(); // Prevent the default form submission

            if (!$(this).prop('disabled')) {
                // Input field validations
                var materia = $('#materia').val().trim();
                if (materia === '') {
                    Swal.fire({
                        title: 'Error',
                        text: 'Todos los campos son obligatorios',
                        icon: 'error'
                    });
                    return;
                }
                $(this).prop('disabled', true); // Disable the button

                $.ajax({
                    type: 'POST',
                    url: '../../administrador/views/aggMateria.php',
                    data: {
                        materia: materia,
                    },
                    success: function(data) {
                        Swal.fire({
                            title: '¡Mensaje!',
                            text: data,
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function() {
                            window.location = "../../administrador/views/materias.php";
                        });
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            title: 'Error',
                            text: xhr.responseText,
                            icon: 'error'
                        });
                    },
                    complete: function() {
                        $('#register').prop('disabled', false); // Enable the button after request completion
                    }
                });
            }
        });
    });
</script>


</body>

</html>