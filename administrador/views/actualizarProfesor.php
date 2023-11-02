<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id=$_GET['id'];
    $contra=$_POST['contra'];
    $apellidos=$_POST['apellidos'];
    $dui=$_POST['dui'];
    $correo=$_POST['correo'];
    $id_especialidades=$_POST['id_especialidad'];
    $id_grados=$_POST['id_grado'];
    $id_estado=$_POST['id_estado'];
    $nombre = $_POST['nombre'];
    include('../../administrador/includes/db.php');
    $sql="update profesores set nombre='$nombre', apellidos='$apellidos', dui='$dui', correo='$correo', id_especialidad='$id_especialidades', id_grado='$id_grados', id_estado='$id_estado', password = '$contra' where id=$id";
    $result=mysqli_query($conexion,$sql);
    header('Location: ../../administrador/views/profesores.php');
}
?>