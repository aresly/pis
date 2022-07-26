<?php

include('conexion.php');


session_start();


$usuario= test_input($_POST['usuario']);
$password= test_input($_POST['password']);
$_SESSION['usuario']=$usuario;
$contrasena= md5($password);

date_default_timezone_set('America/Bogota');
$fecha = date('Y-m-d H:i:s', time());


	$consulta= "SELECT * FROM usuario where usuario='$usuario' and password='$contrasena'";
	$resultado= mysqli_query($conexion, $consulta);
	$filas=mysqli_num_rows($resultado);
	if($filas){

		mysqli_data_seek($resultado, 0);
			$extraido = mysqli_fetch_array($resultado);
			$convert = $extraido['cedula'];
			$_SESSION['convert']=$convert;
			$_SESSION['rol']=$extraido['cod_rol'];
			//script alert session rol
		
		//require('../home.php');
		header("location: home.php");


	}
	else{


		include("index.html");
		
		$consulta1= "SELECT * FROM usuario where usuario='$usuario'";
		$resultado1= mysqli_query($conexion, $consulta1);
		$filas1=mysqli_num_rows($resultado1);
		if($filas1){
			
			?>
			<script>
				document.getElementById("mensaje").innerHTML="Usuario existente, contraseña incorrecta.</p>";
				
			</script> 
			<?php
			
		}
		else{
			
			?>
			<script>
				document.getElementById("mensaje").innerHTML="Usuario no existente";
				
			</script> 
			<?php

			

			//header("location:../login1.html");
		}
		die();

	}
	//mysqli_free_result($resultado);
	mysqli_close($conexion);


	function test_input($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;

	}


?>
