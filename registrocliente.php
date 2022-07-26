<?php
require('conexion.php');

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

	
	
	$nombre= test_input($_POST['nombre']);
	$apellido= test_input($_POST['apellido']);
	$email= test_input($_POST['email']);
	$telefono= test_input($_POST['telefono']);
	$cedula= test_input($_POST['cedula']);
	


	$consulta = "SELECT * FROM $tabla where cedula= '$cedula'";
	$result = mysqli_query($conexion, $consulta);
	$filas = mysqli_num_rows($result);
	if($filas){
		?>

		<?php
			if($form=='1'){
				include('client.php');
			}
			elseif($form=='2'){
                include('providers.php');
    
            }
			
		?>
		<script>
			document.getElementById("mensaje").innerHTML="Ya existe este" + $tabla + "con número de cédula";
		</script>

		<?php
	}
	else{
		$sql1= "INSERT INTO $tabla (nombre, apellido,cedula,correo,telefono) VALUES ('$nombre','$apellido','$cedula','$email','$telefono')";
		if(mysqli_query($conexion, $sql1)){
			if($form=='1'){
				header('location: client.php');
				die();
			}else{
				header('location: providers.php');
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