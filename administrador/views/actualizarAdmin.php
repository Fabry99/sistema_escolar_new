<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id=$_GET['id'];
    $contra=$_POST['contra'];
    $correo=$_POST['correo'];
    $nombre=$_POST['nombre'];

   
    include('../../administrador/includes/db.php');
    $sql="UPDATE administrador SET `correo`='$correo',`password`='$contra',`nombre`='$nombre' WHERE id=$id";
    $result=mysqli_query($conexion,$sql);
    header('Location: ../../administrador/views/administradores.php');
}
?>