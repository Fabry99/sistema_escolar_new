<?php



$id = $_GET['id'];
require_once("../../director/includes/db.php");
$query = mysqli_query($conexion, "DELETE FROM alumnos WHERE id = '$id'");

header('Location: ../views/alumnos.php?m=1');

?>
