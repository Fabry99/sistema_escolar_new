<!-- Modal -->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>
<div class="modal fade" id="AgregarModal" tabindex="-1" aria-labelledby="AgregarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="AgregarModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="myForm" onsubmit="return saveData()">
                    <div class="row">

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="apellidos" class="form-label">Apellidos</label>
                                <input type="text" name="apellidos" id="apellidos" class="form-control" required>
                            </div>
                        </div>


                    </div>
                    <div class="row">

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="dui" class="form-label">DUI</label>
                                <input type="text" name="dui" id="dui" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="correo" class="form-label">Correo</label>
                                <input type="text" name="correo" id="correo" class="form-control" required>
                            </div>
                        </div>


                    </div>

                    <div class="row">


                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="id_estado" class="form-label">Actividad</label><br>
                                <select name="id_estado" id="id_estado" class="form-control">
                                    <option value="">Selecciona una opción</option>
                                    <?php
                                    include("director/includes/db.php");

                                    $sql = "SELECT * FROM actividad ";
                                    $resultado = mysqli_query($conexion, $sql);
                                    while ($consulta = mysqli_fetch_array($resultado)) {
                                        echo '<option value="' . $consulta['id_actividad'] . '">' . $consulta['estado'] . ' ' . $consulta['nombre'] . '</option>';
                                    }
                                    ?>
                                </select>
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
                var nombre = $('#nombre').val().trim();
                var apellidos = $('#apellidos').val().trim();
                var dui = $('#dui').val().trim();
                var correo = $('#correo').val().trim();
                var id_estado = $('#id_estado').val();

                if (nombre === '' || apellidos === '' || dui === '' || correo === '' || id_estado === '') {
                    Swal.fire({
                        title: 'Error',
                        text: 'Todos los campos son obligatorios',
                        icon: 'error'
                    });
                    return;
                }

                // DUI validation (Custom validation, modify as needed)
                var duiPattern = /^\d{8}-\d{1}$/;
                if (!duiPattern.test(dui)) {
                    Swal.fire({
                        title: 'Error',
                        text: 'El DUI no tiene el formato correcto',
                        icon: 'error'
                    });
                    return;
                }

                $(this).prop('disabled', true); // Disable the button

                $.ajax({
                    type: 'POST',
                    url: '../../director/views/agregarProfesor.php',
                    data: {
                        nombre: nombre,
                        apellidos: apellidos,
                        dui: dui,
                        correo: correo,
                        id_estado: id_estado
                    },
                    success: function(data) {
                        Swal.fire({
                            title: '¡Mensaje!',
                            text: data,
                            icon: 'success',
                            showConfirmButton: false,
                            timer: '1500'
                        }).then(function() {
                            window.location = "../../director/views/profesores.php";
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