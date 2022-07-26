<!DOCTYPE html>
<html lang="es">
<head>
	<title>Registrarse | Agrocorn</title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="description" content="codedthemes">
	<meta name="keywords"
	content=", Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
	<meta name="author" content="codedthemes">

	<!-- Favicon icon -->
	<link rel="shortcut icon" href="assets/images/logomaiz.png" type="image/x-icon">
	<link rel="icon" href="assets/images/logomaiz.png" type="image/x-icon">

	<!-- Google font-->
   <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,500,700" rel="stylesheet">

	<!--ico Fonts-->
	<link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">

    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap/css/bootstrap.min.css">

	<!-- Style.css -->
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">

	<!-- Responsive.css-->
	<link rel="stylesheet" type="text/css" href="assets/css/responsive.css">

	<script>
		function validacioncedula(nom){
			var ced = document.getElementById(nom).value;
			
			if(Number.isInteger(ced)){
				document.getElementById('ced_error').innerHTML = "es int";
				

			}else{
				
				var totcaracteres = ced.length;
				if (totcaracteres == 10){
					var num_region = ced.substring(0,2);
					if (num_region>=1 && num_region<=24){
						ult_digito = ced.substring(9,10);
						valor2 = parseInt(ced.substring(1,2),10);
						valor4 = parseInt(ced.substring(3,4),10);
						valor6 = parseInt(ced.substring(5,6),10);
						valor8 = parseInt(ced.substring(7,8),10);
						suma_pares = valor2 + valor4 + valor6 + valor8;
						valor1 = parseInt(ced.substring(0,1),10);
						valor1 = valor1*2;
						if(valor1>9){
							valor1 = (valor1-9)
						}
						valor3 = parseInt(ced.substring(2,3),10);
						valor3 = valor3*2;
						if(valor3>9){
							valor3= (valor3-9)
						}
						valor5 = parseInt(ced.substring(4,5),10);
						valor5 = valor5*2;
						if(valor5>9){
							valor5 = (valor5-9)
						}
						valor7 = parseInt(ced.substring(6,7),10);
						valor7 = valor7*2;
						if(valor7>9){
							valor7 = (valor7-9)
						}
						valor9 = parseInt(ced.substring(8,9),10);
						valor9 = valor9*2;
						if (valor9>9){
							valor9 = (valor9-9)
						}

						var suma_impares = valor1 + valor3 + valor5 + valor7 + valor9;
						var suma = suma_pares + suma_impares;
						var strsum = suma.toString();
						var dis = parseInt(strsum.substring(0,1),10);
						dis = ((dis+1)*10);
						var digito = dis - suma;
						if(digito==10){
							digito = '0';
						}
						if (digito == ult_digito){
							document.getElementById('ced_error').style.color = "red";
							document.getElementById('ced_error').innerHTML = "Cédula correcta";
							$(document).ready(function() {
								setTimeout(function() {
									$("#ced_error").fadeOut(1500);
								},2000);
							
							});
						}else{
							document.getElementById('ced_error').style.color = "red";
							document.getElementById('ced_error').innerHTML = "Cédula incorrecta";
						}
					}

					
				}
			}
		}
		function validacion(id){
			var elem = document.getElementById(id);
			if(elem.checkValidity()){
				elem.style.borderColor= "green";
			}else{
				elem.style.borderColor= "red";
			}
		}
		function validacioncontras(id,ps){
			var elem = document.getElementById(id);
			if(elem.checkValidity()){
				elem.style.borderColor= "green";
				$(document).ready(function() {
					setTimeout(function() {
						$("#"+ps).fadeOut(1500);
					},1000);
				
				});	
			}else
				elem.style.borderColor="red";
				document.getElementById(ps).style.color = "red";
				document.getElementById(ps).innerHTML = "La contraseña de contener al menos 8 caracteres una letra mayúscula, letra minúscula y un digito";
				
		}

		function validatepswd(nom,name,ps) {
			let x = document.getElementById(nom).value;
			let y = document.getElementById(name).value;
			if (x == y) {
				document.getElementById(ps).style.color = "red";
				document.getElementById(ps).innerHTML = "Las contraseñas coinciden";
				$(document).ready(function() {
					setTimeout(function() {
						$("#"+ps).fadeOut(1500);
					},5000);
				
				});	
			} else{
				document.getElementById(ps).style.color = "red";
				document.getElementById(ps).innerHTML = "Las contraseñas NO coinciden";

			}
		}

		function validateForm(nom,name) {

			let x = document.getElementById(nom).value;
			if (x.length == 0 ||  /^\s+$/.test(x) ) {
				document.getElementById(name).style.color = "red";
				document.getElementById(name).innerHTML = "El campo "+nom +" está vacío";
				
			}else{
                $(document).ready(function() {
					setTimeout(function() {
						$("#"+name).fadeOut(1500);
					},5000);
				
				});	
            }
			
			
			
		}
		function soloLetras(e,name) {
			var key = e.keyCode || e.which,
			tecla = String.fromCharCode(key).toLowerCase(),
			letras = " áéíóúabcdefghijklmnñopqrstuvwxyz",
			especiales = [8, 37, 39, 46],
			tecla_especial = false;

			for (var i in especiales) {
			if (key == especiales[i]) {
				tecla_especial = true;
				break;
			}
			}

			if (letras.indexOf(tecla) == -1 && !tecla_especial) {
				document.getElementById(name).style.color = "red";
				document.getElementById(name).innerHTML = "Solo puede ingresar letras";
				$(document).ready(function() {
					setTimeout(function() {
						$("#"+name).fadeOut(1500);
					},2000);
				
				});
			return false;
			}
		}

		function soloNumeros(e,name) {
			var key = e.keyCode || e.which,
			tecla = String.fromCharCode(key).toLowerCase(),
			letras = " 0123456789",
			especiales = [8, 37, 39, 46],
			tecla_especial = false;

			for (var i in especiales) {
			if (key == especiales[i]) {
				tecla_especial = true;
				break;
			}
			}

			if (letras.indexOf(tecla) == -1 && !tecla_especial) {
				document.getElementById(name).style.color = "red";
				document.getElementById(name).innerHTML = "Solo puede ingresar numeros";
				$(document).ready(function() {
					setTimeout(function() {
						$("#"+name).fadeOut(1500);
					},2000);
				
				});
			return false;
			}
			
		}
		
    </script>


</head>
<body>
	<section class="login common-img-bg" style=" overflow: auto;">
		<!-- Container-fluid starts -->
		<div class="container-fluid ">
			<div class="row">
					<div class="col-sm-12">
						<div class="login-card card-block bg-white col-sm-12">
							<form class="md-float-material" action="registro.php" method="post">
								<div class="text-center">
									<img src="assets/images/logomaizmin.png" alt="logo" style="height: 100px;">
									
								</div>
								<h3 class="text-center txt-primary">Crear una cuenta </h3>
								<p class="mensaje text-center f-w-600" style="color: red;" id="mensaje"></p>
								<div class="row">
									<div class="col-md-6">
										<div class="md-input-wrapper">
											<input type="text" id="nombre" name="nombre" value="<?php if(isset($_POST["nombre"])){ echo $_POST["nombre"];} ?>" onkeypress="return soloLetras(event,'name_error')" oninput="validateForm('nombre','name_error');validacion('nombre')" class="md-form-control" pattern="(^[a-zA-ZáéíóúÁÉÍÓÚ\s]{3,40})" maxlength="30" required="">
											<label>Nombre</label>
											<p class="error" id="name_error"></p>
										</div>
									</div>
									<div class="col-md-6">
										<div class="md-input-wrapper">
											<input type="text" id="apellido" name="apellido" value="<?php if(isset($_POST["apellido"])){ echo $_POST["apellido"];} ?>" onkeypress="return soloLetras(event,'apel_error')" oninput="validateForm('apellido','apel_error'); validacion('apellido')" class="md-form-control" pattern="(^[a-zA-ZáéíóúÁÉÍÓÚ\s]{3,40})" required="">
											<label>Apellido</label>
											<p class="error" id="apel_error"></p>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="md-input-wrapper">
											<input type="text" id="cedula" name="cedula" value="<?php if(isset($_POST["cedula"])){ echo $_POST["cedula"];} ?>" onkeypress="return soloNumeros(event,'ced_error')"  oninput="validateForm('cedula','ced_error'); validacion('cedula'); validacioncedula('cedula')" class="md-form-control" pattern="(^[0-9]{10}$)" maxlength="10" required="required">
											<label>Cédula de Identidad</label>
											<p class="error" id="ced_error"></p>
										</div>
									</div>
									<div class="col-md-6">
										<div class="md-input-wrapper">
											<input type="email" id="email" name="email" value="<?php if(isset($_POST["email"])){ echo $_POST["email"];} ?>"  oninput="validateForm('email','email_error'); validacion('email')" class="md-form-control" required="required">
											<label>Correo Electrónico</label>
											<p class="error" id="email_error"></p>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="md-input-wrapper">
											<input type="text" id="usuario" name="usuario" value="<?php if(isset($_POST["usuario"])){ echo $_POST["usuario"];} ?>" oninput="validateForm('usuario','usuario_error'); validacion('usuario')" class="md-form-control" pattern="(^[0-9a-zA-ZáéíóúÁÉÍÓÚ\s]{3,40})" required="required">
											<label>Usuario</label>
											<p class="error" id="usuario_error"></p>
										</div>
									</div>
									<div class="col-md-6">
										<div class="md-input-wrapper">
											<input type="text" id="telefono" name="telefono" value="<?php if(isset($_POST["telefono"])){ echo $_POST["telefono"];} ?>" onkeypress="return soloNumeros(event,'telf_error')" oninput="validateForm('telefono','telf_error'); validacion('telefono')" class="md-form-control" required="required">
											<label>Teléfono</label>
											<p class="error" id="telf_error"></p>
										</div>
									</div>
								</div>
								<div class="md-input-wrapper">
									<input type="password" id="password" name="password" value="<?php if(isset($_POST["password"])){ echo $_POST["password"];} ?>" oninput="validateForm('password','pswd_error'); validacioncontras('password','pswd_error')" class="md-form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required="required">
									<label>Contraseña</label>
									<p class="error" id="pswd_error"></p>
								</div>
								<div class="md-input-wrapper">
									<input type="password" id="password2" name="password2" value="<?php if(isset($_POST["password2"])){ echo $_POST["password2"];} ?>" oninput="validateForm('password2','pswd2_error'); validatepswd('password','password2','pswd2_error'); validacion('password2')" class="md-form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required="required">
									<label>Confirmar contraseña</label>
									<p class="error" id="pswd2_error"></p>
								</div>
								<fieldset class="form-group">
									<label class="form-control-label">Roles</label>
									<div class="form-check">
										<label for="option-1" class="form-check-label">
											<input type="radio" class="form-check-input" id="option-1" name="options" value="1">
											<img class=" img-circle" src="assets/images/avatar-3.png" alt="avatar" style="height: 45px; width: 45px;">
											Administrador
										</label>
									</div>
									<div class="form-check">
										<label for="option-2" class="form-check-label">
											<input type="radio" class="form-check-input" id="option-2" name="options" value="2">
											<img class="img-circle" src="assets/images/avatar-3.png"alt="avatar" style="height: 45px; width: 45px;">
											Compras
										</label>
									</div>
									<div class="form-check">
										<label for="option-3" class="form-check-label">
											<input type="radio" class="form-check-input" id="option-3" name="options" value="3">
											<img class="img-circle" src="assets/images/avatar-3.png" alt="avatar" style="height: 45px; width: 45px;">
											Ventas
										</label>
									</div>
									<div class="form-check">
										<label for="option-4" class="form-check-label">
											<input type="radio" class="form-check-input" id="option-4" name="options" value="4">
											<img class="img-circle" src="assets/images/avatar-3.png" alt="avatar" style="height: 45px; width: 45px;">
											Almacén
										</label>
									</div>
								</fieldset>


								<div class="col-xs-10 offset-xs-1">
									<input type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20" value="Registrarse"/>
								</div>
								<div class="row">
									<div class="col-xs-12 text-center">
										<span class="text-muted">Ya tengo una cuenta</span>
										<a href="index.html" class="f-w-600 p-l-5"> Iniciar sesión</a>

									</div>
								</div>
							</form>
							<!-- end of form -->
						</div>
						<!-- end of login-card -->
					</div>
					<!-- end of col-sm-12 -->
				</div>
				<!-- end of row-->
			</div>
			<!-- end of container-fluid -->
	</section>



   <!-- Required Jqurey -->
   <script src="assets/plugins/jquery/dist/jquery.min.js"></script>
   <script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
   <script src="assets/plugins/tether/dist/js/tether.min.js"></script>

   <!-- Required Fremwork -->
   <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

   <!--text js-->
   <script type="text/javascript" src="assets/pages/elements.js"></script>
</body>
</html>
