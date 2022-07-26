<?php
require('conexion.php');

session_start();
$usuario = $_SESSION['convert'];

	//$form = $_POST['formulario'];
	$id = $_GET['id'];
	$aid = $_GET['aid'];
	$prod = $_GET['prod'];
	$num = intval($aid);
	
	if ($prod == 'MAIZ'){
		$num = intval($aid) + 1;
		if($num > 2){
			$num = 2;
		}
	}else{
		$num = intval($aid) + 1;
	}
	// update estado from detalle_compra table
	$sql = "UPDATE detalle_compra SET cod_actividad = '$num' WHERE cod_det_compra = '$id'";
	$resultado = mysqli_query($conexion,$sql);
	if($resultado)
		{
			//alert
			//echo "<script>alert('Actividad actualizada');</script>";
			//redirect
			echo "<script>window.location.href='actividad.php';</script>";
		}else{
			//alert
			echo "<script>alert('No se puede actualizar');</script>";
			//redirect
			echo "<script>window.location.href='actividad.php';</script>";
		}
?>