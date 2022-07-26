<?php
	include("conexion.php");

    if(isset($_POST['form'])){
		$form = $_POST['form'];
        if($form=='1'){
            $tabla = "cliente";
        }
        elseif($form=='2'){
            $tabla = "proveedor";

        }

	}else{
		$form = 0;
	}

	
	$ideliminar="delete from $tabla where cedula='$idpost'";
	mysqli_query($conexion,$ideliminar)or die( mysqli_error($conexion));



?>