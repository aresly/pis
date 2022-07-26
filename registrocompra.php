<?php
require('conexion.php');

session_start();
$usuario = $_SESSION['convert'];

	//$form = $_POST['formulario'];
	$prov = test_input($_POST['proveedor']);
	$producto = test_input($_POST['producto']);
	$estado = test_input($_POST['actividad']);
	$cantidad = test_input($_POST['cantidad']);
	$fecha =  date('Y-m-d');
	$precio = 0;
	$codProceso = 0;
	$codVenta = 0;
	$total = 0;


	$sqlPrecio ="SELECT precio from producto where cod_producto = '$producto'";
	$resultado1 = mysqli_query($conexion,$sqlPrecio);

	while ($valores = mysqli_fetch_array($resultado1)) {
		$precio =  $valores['precio'];
	}

	$sqlProceso = "INSERT INTO proceso_producto(precio_venta, peso, cantidad_procesada, cod_actividad) VALUES('$precio','2','$cantidad', $estado)";
	$resultado2 = mysqli_query($conexion,$sqlProceso);

	$sqlTotal = "SELECT sum(precio_venta * cantidad_procesada) as pro FROM proceso_producto where cod_proceso = ( Select max(cod_proceso) from proceso_producto);";
	$resultadoTotal = mysqli_query($conexion,$sqlTotal);

	while ($valores = mysqli_fetch_array($resultadoTotal )) {
		$total =  $valores['pro'];
	}

	$sql = "INSERT INTO factura_compra (fecha , cod_proveedor, cod_usuario) VALUES ('$fecha','$prov','$usuario')";
	$resultadoSqlFact = mysqli_query($conexion,$sql);
	
	$sqlCodProceso  = "SELECT max(cod_proceso) as cod FROM proceso_producto";
	$resultadoCodProceso = mysqli_query($conexion,$sqlCodProceso);

	while ($valores = mysqli_fetch_array($resultadoCodProceso)) {
		$codProceso =  $valores['cod'];
	}


	$sqlCodVenta = "SELECT max(cod_compra) as ven FROM factura_compra";
	$resultadoCodVenta = mysqli_query($conexion,$sqlCodVenta);

	while ($valores = mysqli_fetch_array($resultadoCodVenta)) {
		$codVenta =  $valores['ven'];
	}
	
	$sqlDetalle = "INSERT INTO detalle_compra(cantidad, precio, cod_compra, cod_producto, cod_actividad) VALUES('$cantidad','$precio', '$codVenta', '$producto', '$estado')";
	$resultadoCodVenta = mysqli_query($conexion,$sqlDetalle);
	

	if($resultado2)
		header("location: compras.php");
		//echo "$sqlProceso <br> $sql <br> $sqlDetalle";
	else
		echo 'No funciono';

    function test_input($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;

	}


?>