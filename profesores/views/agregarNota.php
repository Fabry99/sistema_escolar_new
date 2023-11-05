<div class="modal fade" id="IngresarNotasModal" tabindex="-1" aria-labelledby="IngresarNotasModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="IngresarNotasModalLabel">Ingresar Notas del Estudiante</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formNotas" method="post">
                    <!-- El nombre del estudiante se mostrará aquí pero no se enviará, ya que es solo para visualización -->
                    <div class="mb-3">
                        <label for="nombreEstudiante" class="form-label">Nombre del Estudiante</label>
                        <input type="text" class="form-control" id="nombreEstudiante" readonly>
                    </div>

                    <!-- El ID del estudiante y el ID de la materia se enviarán en campos ocultos -->
                    <input type="hidden" name="estudianteId" id="estudianteId">
                    <input type="hidden" name="id_materia" id="idMateriaModal" value="<?php echo $_SESSION['id_especialidades']; ?>">

                    <!-- Campos para las notas -->
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="nota1" class="form-label">Periodo 1</label>
                                <input placeholder="Nota 1" type="text" name="nota1" class="form-control" id="nota1" pattern="^\d+(\.\d+)?$" title="Por favor, ingrese un número válido o un número decimal">
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="nota2" class="form-label">Periodo 2</label>
                                <input placeholder="Nota 2" type="text" name="nota2" class="form-control" id="nota2" pattern="^\d+(\.\d+)?$" title="Por favor, ingrese un número válido o un número decimal">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="nota3" class="form-label">Periodo 3</label>
                                <input placeholder="Nota 3" type="text" name="nota3" class="form-control" id="nota3" pattern="^\d+(\.\d+)?$" title="Por favor, ingrese un número válido o un número decimal">
                            </div>
                        </div>
                    </div>

                    <!-- Botones del modal -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <input type="submit" value="Guardar" id="register" class="btn btn-success" name="registrar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function() {
        $('#formNotas').submit(function(e) {
            e.preventDefault(); // Prevenir el envío predeterminado del formulario

            if (!$(this).find('button[type="submit"]').prop('disabled')) {
                // Validaciones de campos de entrada
                var estudianteId = $('#estudianteId').val().trim();
                var id_materia = $('#idMateriaModal').val().trim();
                var nota1 = parseFloat($('#nota1').val().trim());
                var nota2 = parseFloat($('#nota2').val().trim());
                var nota3 = parseFloat($('#nota3').val().trim());

                if (estudianteId === '' || id_materia === '' || isNaN(nota1) || isNaN(nota2) || isNaN(nota3)) {
                    Swal.fire({
                        title: 'Error',
                        text: 'Por favor, complete todos los campos y asegúrese de que las notas sean números válidos.',
                        icon: 'error'
                    });
                    return;
                }
                nota1 = parseFloat(nota1.toFixed(2));
                nota2 = parseFloat(nota2.toFixed(2));
                nota3 = parseFloat(nota3.toFixed(2));

                // Comprobar si las notas son mayores o iguales a 10 sin decimales
                if ((nota1 >= 10 && nota1 % 1 !== 0) || (nota2 >= 10 && nota2 % 1 !== 0) || (nota3 >= 10 && nota3 % 1 !== 0)) {
                    Swal.fire({
                        title: 'Error',
                        text: 'Las notas de 10 no pueden tener decimales.',
                        icon: 'error'
                    });
                    return;
                }
                // Establecer los valores de estudianteId e id_materia en el formulario
                $('#estudianteId').val(estudianteId);
                $('#id_materia').val(id_materia);

                $(this).find('button[type="submit"]').prop('disabled', true); // Deshabilitar el botón

                $.ajax({
                    type: 'POST',
                    url: '../../profesores/views/insertarNota.php',
                    data: {
                        estudianteId: estudianteId,
                        id_materia: id_materia,
                        nota1: nota1,
                        nota2: nota2,
                        nota3: nota3
                    },
                    success: function(data) {
                        Swal.fire({
                            title: '¡Éxito!',
                            text: data,
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function() {
                            window.location = "../../profesores/views/index.php";
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
                        $('#formNotas').find('button[type="submit"]').prop('disabled', false); // Habilitar el botón después de completar la solicitud
                    }
                });
            }
        });
    });
</script>