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



		$idpost= test_input($_POST['cedulaEdit']);
        $nombre= test_input($_POST['nombreEdit']);
        $apellido= test_input($_POST['apellidoEdit']);
        $email= test_input($_POST['emailEdit']);
        $telefono= test_input($_POST['telefonoEdit']);
 	



		$nom="update $tabla set 
		nombre='$nombre',
		apellido='$apellido',
        correo='$email',
        telefono='$telefono',
        cedula='$idpost'
		where cedula='$idpost'";
		$res= mysqli_query($conexion, $nom) or die(mysqli_error($conexion));
		
        if($res){
            echo "Se actualizo";
        }
		
		
		if($form=='1'){
            header("Location: client.php?success=Se ha actualizado correctamente");
        }
        elseif($form=='2'){
            header("Location: providers.php?success=Se ha actualizado correctamente");
        }
		
		

	    function test_input($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
    
        }
		



?>