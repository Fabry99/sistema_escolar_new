<!-- Modal -->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>
<div class="modal fade" id="AgregarModal" tabindex="-1" aria-labelledby="AgregarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="AgregarModalLabel">Agregar Alumno</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="myForm" >
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
                                <label for="telefono" class="form-label">Telefono</label>
                                <input type="text" name="telefono" id="telefono" class="form-control" required>
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
                                <label for="edad" class="form-label">Edad</label>
                                <input type="text" name="edad" id="edad" class="form-control" >
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="id_grado" class="form-label">Grado</label><br>
                                <select name="id_grados" id="id_grados" class="form-control">
                                    <option value="">Selecciona una opción</option>
                                    <?php
                                    include("administrador/includes/db.php");

                                    $sql = "SELECT * FROM grados ";
                                    $resultado = mysqli_query($conexion, $sql);
                                    while ($consulta = mysqli_fetch_array($resultado)) {
                                        echo '<option value="' . $consulta['id_grados'] . '">' . $consulta['descripcion'] . ' ' . $consulta['nombre'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                    <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="birthdate" class="form-label">Fecha de Nacimiento</label>
                                <input type="date" name="birthdate" id="birthdate" class="form-control" required>
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
                var telefono = $('#telefono').val().trim();
                var correo = $('#correo').val().trim();
                var edad = $('#edad').val().trim();
                var id_grados = $('#id_grados').val();
                var birthdate = $('#birthdate').val();

                if (nombre === '' || apellidos === '' || telefono === '' || correo === '' || edad === '' || id_grados === '' || birthdate === '') {
                    Swal.fire({
                        title: 'Error',
                        text: 'Todos los campos son obligatorios',
                        icon: 'error'
                    });
                    return;
                }

                // DUI validation (Custom validation, modify as needed)
                var telefonoPattern = /^\d{8}$/;
                if (!telefonoPattern.test(telefono)) {
                    Swal.fire({
                        title: 'Error',
                        text: 'El Telefono no tiene el formato correcto',
                        icon: 'error'
                    });
                    return;
                }

                $(this).prop('disabled', true); // Disable the button

                $.ajax({
                    type: 'POST',
                    url: '../../administrador/views/agregarAlumno.php',
                    data: {
                        nombre: nombre,
                        apellidos: apellidos,
                        telefono: telefono,
                        correo: correo,
                        edad: edad,
                        id_grados: id_grados,
                        birthdate: birthdate
                    },
                    success: function(data) {
                        Swal.fire({
                            title: '¡Mensaje!',
                            text: data,
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function() {
                            window.location = "../../administrador/views/alumnos.php";
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