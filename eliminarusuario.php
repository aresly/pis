<?php
	include("conexion.php");

	$idpost= $_POST['id'];
	
	$ideliminar="delete from usuario where cedula='$idpost'";
	mysqli_query($conexion,$ideliminar)or die( mysqli_error($conexion));



?>