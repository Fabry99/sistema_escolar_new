<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id=$_GET['id'];
    $nombre=$_POST['nombre'];
    $apellidos=$_POST['apellidos'];
    $dui=$_POST['dui'];
    $correo=$_POST['correo'];
    $id_estado=$_POST['id_estado'];
    include('../../director/includes/db.php');
    $sql="update profesores set nombre='$nombre', apellidos='$apellidos', dui='$dui', correo='$correo', id_estado='$id_estado' where id=$id";
    $result=mysqli_query($conexion,$sql);
    header('Location: ../../director/views/profesores.php');
}
?>