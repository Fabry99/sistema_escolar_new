<?php



$id = $_GET['id'];
require_once("../../administrador/includes/db.php");
$query = mysqli_query($conexion, "DELETE FROM administrador WHERE id = '$id'");

header('Location: ../views/administradores.php?m=1');

?>