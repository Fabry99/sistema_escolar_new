<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id=$_GET['id_especialidades'];
    $especialidad=$_POST['materia'];


   
    include('../../administrador/includes/db.php');
    $sql = "UPDATE especialidades SET especialidad='$especialidad' WHERE id_especialidades=$id";
    $result=mysqli_query($conexion,$sql);
    header('Location: ../../administrador/views/materias.php');
}
?>