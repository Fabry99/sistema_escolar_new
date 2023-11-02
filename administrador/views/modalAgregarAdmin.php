<!-- Modal -->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>
<div class="modal fade" id="AgregarModal" tabindex="-1" aria-labelledby="AgregarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="AgregarModalLabel">Agregar administrador</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="myForm">
                    <div class="row">

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="correo" class="form-label">Correo</label>
                                <input type="text" name="correo" id="correo" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" required>
                            </div>
                        </div>


                    </div>

                    <div class="row">

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" name="password" id="password" class="form-control" required>
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
                var correo = $('#correo').val().trim();
                var nombre = $('#nombre').val().trim();
                var password = $('#password').val().trim();


                if (correo === '' || nombre === '' || password === '') {
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
                    url: '../../administrador/views/agregarAdmin.php',
                    data: {
                        correo: correo,
                        nombre: nombre,
                        password: password,

                    },
                    success: function(data) {
                        Swal.fire({
                            title: '¡Mensaje!',
                            text: data,
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function() {
                            window.location = "../../administrador/views/administradores.php";
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