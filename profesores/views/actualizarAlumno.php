<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id=$_GET['id'];
    $nombre=$_POST['nombre'];
    $apellidos=$_POST['apellidos'];
    $correo=$_POST['correo'];
    $edad=$_POST['edad'];
    $telefono=$_POST['telefono'];
    $birthdate=$_POST['birthdate'];
    $id_grados=$_POST['id_grado'];
   
    include('../../director/includes/db.php');
    $sql="update alumnos set nombre='$nombre', apellidos='$apellidos', correo='$correo', edad='$edad', telefono='$telefono', birthdate='$birthdate', id_grado='$id_grados' where id=$id";
    $result=mysqli_query($conexion,$sql);
    header('Location: ../../director/views/alumnos.php');
}
?>