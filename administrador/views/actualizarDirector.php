<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id=$_GET['id'];
    $contra=$_POST['contra'];
    $apellidos=$_POST['apellidos'];
    $dui=$_POST['dui'];
    $telefono=$_POST['telefono'];
    $correo=$_POST['correo'];
    $nombre=$_POST['nombre'];
    $id_estado=$_POST['id_estado'];
    
   
    include('../../administrador/includes/db.php');
    $sql="UPDATE directores SET nombre='$nombre', apellidos='$apellidos', dui='$dui', telefono= '$telefono', correo='$correo', password='$contra', id_estado='$id_estado' where id=$id";
    $result=mysqli_query($conexion,$sql);
    header('Location: ../../administrador/views/directores.php');
}
?>