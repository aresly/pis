<?php
	include("conexion.php");

	


		$idpost= test_input($_POST['cedulaEdit']);
        $usuario= test_input($_POST['usuarioEdit']);
        $password= test_input($_POST['passwordEdit']);
        $nombre= test_input($_POST['nombreEdit']);
        $apellido= test_input($_POST['apellidoEdit']);
        $email= test_input($_POST['emailEdit']);
        $telefono= test_input($_POST['telefonoEdit']);
        $contrasena = md5($password);
        $rol = test_input($_POST['optionsEdit']);	



		$nom="update usuario set 
		usuario='$usuario',
		password='$contrasena',
		nombre='$nombre',
		apellido='$apellido',
        correo='$email',
        telefono='$telefono',
        cedula='$idpost',
        cod_rol='$rol'
		where cedula='$idpost'";
		$res= mysqli_query($conexion, $nom) or die(mysqli_error($conexion));
		
        if($res){
            echo "Se actualizo";
        }
		
		
		
		
		header("Location: usuarios.php?success=Se ha actualizado correctamente");

	    function test_input($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
    
        }
		



?>