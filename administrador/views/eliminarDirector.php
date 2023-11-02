<?php



$id = $_GET['id'];
require_once("../../administrador/includes/db.php");
$query = mysqli_query($conexion, "DELETE FROM directores WHERE id = '$id'");

header('Location: ../views/directores.php?m=1');

?>

