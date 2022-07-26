<?php
require('conexion.php');

session_start();
$usuario = $_SESSION['convert'];

	//$form = $_POST['formulario'];
	$n = strtoupper(test_input($_POST['nombre']));
	$d = strtoupper(test_input($_POST['descripcion']));
	$p = test_input($_POST['precio']);



	$sqlPrecio ="SELECT * from producto where nombre = '$n'";
	$resultado1 = mysqli_query($conexion,$sqlPrecio);
	$numero = mysqli_num_rows($resultado1);


	if($numero > 0){
		echo "<script>alert('El producto ya existe');</script>";
		// redirect to products.php page with javascript
		echo "<script>window.location.href='products.php'</script>";
	}else{
		//insert data into db
		$sql = "INSERT INTO producto (nombre, descripcion, precio, stock, peso) VALUES ('$n','$d','$p', 1, 1)";
		$resultadoSql = mysqli_query($conexion,$sql);
		if($resultadoSql)
			echo "<script>window.location.href='products.php'</script>";
		//else
			//echo "Error al insertar";
	}

    function test_input($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;

	}


?>