<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id=$_GET['id_especialidades'];
    $especialidad=$_POST['materia'];


   
    include('../../director/includes/db.php');
    $sql = "UPDATE especialidades SET especialidad='$especialidad' WHERE id_especialidades=$id";
    $result=mysqli_query($conexion,$sql);
    header('Location: ../../director/views/materias.php');
}
?>