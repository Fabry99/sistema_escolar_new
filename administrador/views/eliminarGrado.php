<?php



$id = $_GET['id_grados'];
require_once("../../administrador/includes/db.php");
$query = mysqli_query($conexion, "DELETE FROM grados WHERE id_grados = '$id'");

header('Location: ../views/grados.php?m=1');

?>