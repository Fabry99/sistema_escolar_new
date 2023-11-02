<?php



$id = $_GET['id_especialidades'];
require_once("../../administrador/includes/db.php");
$query = mysqli_query($conexion, "DELETE FROM especialidades WHERE id_especialidades = '$id'");

header('Location: ../views/materias.php?m=1');

?>