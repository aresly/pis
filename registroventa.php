<?php
require('conexion.php');

session_start();
$usuario = $_SESSION['convert'];

	//$form = $_POST['formulario'];
	$cliente = test_input($_POST['cliente']);
	$pago = test_input($_POST['options']);
	$cantidad = test_input($_POST['cantidad']);
	$producto = test_input($_POST['producto']);
	$fecha =  test_input($_POST['fecha']);
	$precio = 0;
	$codProceso = 0;
	$codVenta = 0;
	$total = 0;


	$sqlPrecio ="SELECT precio from producto where cod_producto = '$producto'";
	$resultado1 = mysqli_query($conexion,$sqlPrecio);

	if ($row = mysqli_fetch_row($resultado1)) {
	    $precio = trim($row[0]);
	}

	$sqlProceso = "INSERT INTO proceso_producto(precio_venta, peso, cantidad_procesada, cod_actividad	) VALUES('$precio','2','$cantidad',1)";
	$resultado2 = mysqli_query($conexion,$sqlProceso);

	$sqlTotal = "SELECT sum(precio_venta * cantidad_procesada) as pro FROM proceso_producto";
	$resultadoTotal = mysqli_query($conexion,$sqlTotal);

	while ($valores = mysqli_fetch_array($resultadoTotal )) {
		$total =  $valores['pro'];
	}

	$sql = "INSERT INTO factura_venta (fecha , pago, total, cod_cliente, cod_usuario) VALUES ('$fecha','$pago','$total','$cliente','$usuario')";
	$resultadoSqlFact = mysqli_query($conexion,$sql);
	
	$sqlCodProceso  = "SELECT max(cod_proceso) as cod FROM proceso_producto";
	$resultadoCodProceso = mysqli_query($conexion,$sqlCodProceso);

	while ($valores = mysqli_fetch_array($resultadoCodProceso)) {
		$codProceso =  $valores['cod'];
	}


	$sqlCodVenta = "SELECT max(cod_venta) as ven FROM factura_venta";
	$resultadoCodVenta = mysqli_query($conexion,$sqlCodVenta);

	while ($valores = mysqli_fetch_array($resultadoCodVenta)) {
		$codVenta =  $valores['ven'];
	}
	
	$sqlDetalle = "INSERT INTO detalle_venta(cod_proceso, cod_venta, precio, cantidad, cod_producto) VALUES('$codProceso','$codVenta','$precio','$cantidad','$producto')";
	$resultadoCodVenta = mysqli_query($conexion,$sqlDetalle);
	

	if($resultado2)
		header("location: sales.php");
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