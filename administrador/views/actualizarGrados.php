<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id=$_GET['id_grados'];
    $descripcion=$_POST['descripcion'];
    $duracion=$_POST['duracion'];

   
    include('../../administrador/includes/db.php');
    $sql = "UPDATE grados SET descripcion='$descripcion', duracion='$duracion' WHERE id_grados=$id";
    $result=mysqli_query($conexion,$sql);
    header('Location: ../../administrador/views/grados.php');
}
?>