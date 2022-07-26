<?php
require('conexion.php');

	if(isset($_POST['form'])){
		$form = $_POST['form'];

	}else{
		$form = 0;
	}

	
	$usuario= test_input($_POST['usuario']);
	$password= test_input($_POST['password']);
	$nombre= test_input($_POST['nombre']);
	$apellido= test_input($_POST['apellido']);
	$email= test_input($_POST['email']);
	$telefono= test_input($_POST['telefono']);
	$cedula= test_input($_POST['cedula']);
	$contrasena = md5($password);
	date_default_timezone_set('America/Bogota');
	$fecha = date('Y-m-d H:i:s',time());
	$rol = test_input($_POST['options']);



	$consulta = "SELECT * FROM usuario where cedula= '$cedula'";
	$result = mysqli_query($conexion, $consulta);
	$filas = mysqli_num_rows($result);
	if($filas){
		?>

		<?php
			if($form=='1'){
				header('location: usuarios.php');
				die();
			}
			else{
				include('register1.php');
			}
			
		?>
		<script>
			document.getElementById("mensaje").innerHTML="Ya existe este usuario con número de cédula";
		</script>

		<?php
	}
	else{
		$sql1= "INSERT INTO usuario (usuario , password, nombre, apellido,cedula,correo,telefono,cod_rol) VALUES ('$usuario','$contrasena','$nombre','$apellido','$cedula','$email','$telefono','$rol')";
		if(mysqli_query($conexion, $sql1)){
			if($form=='1'){
				header('location: usuarios.php');
				die();
			}else{
				header('location: index.html');
				die();
			}
		}
		else{
			echo "Error: ". $sql1 . "" . mysqli_error($conexion);
		}
		
	}
    function test_input($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;

	}


?>