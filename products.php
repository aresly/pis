<?php
require('conexion.php');
			if (session_status() !== PHP_SESSION_ACTIVE){
				session_start();
			}
			$usuario = $_SESSION['usuario'];  
			$convert= $_SESSION['convert'];

        if($_SESSION['rol'] != 1 and $_SESSION['rol'] != 4){
            header("location: home.php");
            }

      $consultausuario = "SELECT usuario.nombre, usuario.apellido, rol.nombre FROM usuario, rol where usuario.cod_rol = rol.cod_rol AND usuario.cedula=$convert";
	   $query= mysqli_query($conexion,$consultausuario);
	   if ($row = mysqli_fetch_row($query)) 
	   {
		   $nombre = trim($row[0]);
            $apellido = trim($row[1]);
            $rol = trim($row[2]);
	   } 
         

		
?>
<!DOCTYPE html>
<html lang="es">

<head>
   <title>Productos</title>
   

   <!-- Meta -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="description" content="Quantum Able Bootstrap 4 Admin Dashboard Template by codedthemes">
   <meta name="keywords" content="appestia, Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
   <meta name="author" content="codedthemes">

   <!-- Favicon icon -->
   <link rel="shortcut icon" href="assets/images/logomaiz.png" type="image/x-icon">
   <link rel="icon" href="assets/images/logomaiz.png" type="image/x-icon">


   <!-- Google font-->
   <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,500,700" rel="stylesheet">

   <!-- themify -->
   <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">

   <!-- iconfont -->
   <link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">

   <!-- simple line icon -->
   <link rel="stylesheet" type="text/css" href="assets/icon/simple-line-icons/css/simple-line-icons.css">

   <!-- Required Fremwork -->
   <link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap/css/bootstrap.min.css">

   <!-- Style.css -->
   <link rel="stylesheet" type="text/css" href="assets/css/main.css">

   <!-- Responsive.css-->
   <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
   <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>





</head>

<body class="sidebar-mini fixed">
    <div class="wrapper">
        <!-- Navbar-->
        <header class="main-header-top hidden-print">
            <a href="home.php" class="logo">AGROGUALE</a>
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#!" data-toggle="offcanvas" class="sidebar-toggle"></a>

                <!-- Navbar Right Menu-->
                <div class="navbar-custom-menu f-right">

                <ul class="top-nav">
                    <!-- window screen -->
                    <li class="pc-rheader-submenu">
                        <a href="#!" class="drop icon-circle" onclick="javascript:toggleFullScreen()">
                            <i class="icon-size-fullscreen"></i>
                        </a>

                    </li>
                    <!-- User Menu-->
                    <li class="dropdown">
                        <a href="#!" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle drop icon-circle drop-image">
                            <span><img class="img-circle " src="assets/images/widget/usuario.png" style="width:40px;" alt="User Image"></span>
                            <span><?php echo($usuario); ?> <i class=" icofont icofont-simple-down"></i></span>

                        </a>
                        <ul class="dropdown-menu settings-menu">
                            <li><a href="perfil.php"><i class="icon-user"></i>Mi Perfil</a></li>
                            <li class="p-0">
                            <div class="dropdown-divider m-0"></div>
                            </li>
                            <li><a href="logout.php"><i class="icon-logout"></i> Cerrar sesión</a></li>

                        </ul>
                    </li>
                </ul>
                </div>
            </nav>
        </header>
        
        <!-- Side-Nav-->
        <aside class="main-sidebar hidden-print ">
        <section class="sidebar" id="sidebar-scroll">
                <!-- Sidebar Menu-->
                <ul class="sidebar-menu">
                <li class="treeview"><a class="waves-effect waves-dark">
                    <span><h6><?php echo($nombre.' '.$apellido); ?></h6><small><?php echo($rol); ?></small></span></a>
                </li>
                    <li class="nav-level">--- Navegación</li>
                    <li class="treeview">
                        <a class="waves-effect waves-dark" href="home.php">
                            <i class="icon-home"></i><span> Inicio</span>
                        </a>                
                    </li>
                    <li class="nav-level">--- Páginas</li>
                    <?php if($_SESSION['rol'] != 4){ ?>
                      <li class="treeview"><a class="waves-effect waves-dark" href="sales.php"><i class="ti-shopping-cart text-danger-color"></i><span>Ventas</span></a></li>
                    <?php } ?>
                    <?php if($_SESSION['rol'] != 4){ ?>
                      <li class="treeview"><a class="waves-effect waves-dark" href="compras.php"><i class="ti-credit-card text-success-color"></i><span>Compras</span></a></li>
                    <?php } ?>
                    <?php if($_SESSION['rol'] == 4 || $_SESSION['rol'] == 1){ ?>
                      <li class="treeview"><a class="waves-effect waves-dark" href="actividad.php"><i class="ti-layout-column3 text-primary-color"></i><span>Actividad</span></a></li>
                    <?php } ?>
                    <?php if($_SESSION['rol'] != 4){ ?>
                      <li class="treeview"><a class="waves-effect waves-dark" href="providers.php"><i class="ti-truck text-danger-color"></i><span>Proveedores</span></a></li>
                    <?php } ?>
                    <?php if($_SESSION['rol'] != 4){ ?>
                      <li class="treeview"><a class="waves-effect waves-dark" href="client.php"><i class="ti-harddrives text-primary-color"></i><span>Clientes</span></a></li>
                    <?php } ?>
                    <?php if($_SESSION['rol'] != 4){ ?>
                      <li class="treeview"><a class="waves-effect waves-dark" href="usuarios.php"><i class="ti-user text-success-color"></i><span>Usuarios</span></a></li>
                    <?php } ?>
                    <?php if($_SESSION['rol'] == 4 || $_SESSION['rol'] == 1){ ?>
                    <li class="treeview active"><a class="waves-effect waves-dark" href="products.php"><i class="ti-briefcase text-primary-color"></i><span>Productos</span></a></li>
                    <?php } ?>
                    <?php if($_SESSION['rol'] == 4 || $_SESSION['rol'] == 1){ ?>
                    <li class="treeview"><a class="waves-effect waves-dark" href="inventory.php"><i class="ti-clipboard text-danger-color"></i><span>Inventario</span></a></li>
                    <?php } ?>
                    <?php if($_SESSION['rol'] != 4){ ?>
                    <li class="treeview"><a class="waves-effect waves-dark" href="prediccion.php"><i class="icon-speedometer text-success-color"></i><span>Predicción</span></a></li>
                    <?php } ?>
                    <?php if($_SESSION['rol'] != 4){ ?>
                    <li class="treeview"><a class="waves-effect waves-dark" href="configuracion.php"><i class="icon-settings text-primary-color"></i><span>Configuración</span></a></li>
                    <?php } ?>
                </ul>
            </section>
        </aside>
      
        <div class="content-wrapper">
            <!-- Container-fluid starts -->
            <div class="container-fluid">

                <!-- Header Starts -->
                <div class="row">
                    <div class="col-sm-12 p-0">
                        <div class="main-header">
                            <h4>Productos</h4>
                            <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                                <li class="breadcrumb-item">
                                <a href="home.php">
                                    <i class="icofont icofont-home"></i>
                                </a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Productos</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- Header end -->

                
                <!-- Row start -->
                <div class="row">
                    <div class="col-sm-12 ">
                        <!-- Hover effect table starts -->
                        <div class="card ">
                            <div class="card-header">
                                
                            </div>
                            <div class="card-block ">
                                                                        
                                <ul class="nav nav-tabs nav-justified" role="tablist">
                                    <li class="nav-item">
                                    <a href="#tabNewAdmin"  class="nav-link active" data-toggle="tab" role="tab" aria-controls="tabNewAdmin" aria-selected="true">NUEVO</a>
                                    </li>
                                    <li class="nav-item">
                                    <a href="#tabListAdmin" class="nav-link" data-toggle="tab" role="tab" aria-controls="tabListAdmin" aria-selected="false">LISTA</a>
                                    </li>
                                </ul>
                                <div class="tab-content ">
                                    <div class="tab-pane fade in active " role="tabpanel" aria-labelledby="tabNewAdmin" id="tabNewAdmin">
                                        <div class="row boot-ui">
                                            <div class="col-sm-12 col-xs-12 waves-effect waves-light">
                                                <div class="grid-material bg-success">NUEVO PRODUCTO</div>
                                            </div>
                                        </div>
                                        <form action="registroproducto.php" method="post">
                                            <div class="col-sm-6">
                                                <h5 class="text-condensedLight">Datos Productos</h5>
                                                <input hidden value="1" name='form'>
                                                <div class="form-group">
                                                    <label class="form-control-label" for="nombre">Nombre</label>
                                                    <input class="form-control" type="text" pattern="(^[a-zA-ZáéíóúÁÉÍÓÚ\s]{3,10})" id="nombre" name="nombre">
                                                    <span class="form-text text-muted error" hidden>Nombre incorrecto</span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-control-label" for="descripcion">Descripción</label>
                                                    <input class="form-control" type="text" pattern="(^[a-zA-ZáéíóúÁÉÍÓÚ\s]{3,40})" id="descripcion" name="descripcion">
                                                    <span class="form-text text-muted error" hidden>Descripción incorrecta</span>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-control-label" for="precio">Precio</label>
                                                    <input class="form-control" type="tel" pattern="-?[0-9+()- ]*(\.[0-9]+)?" id="precio" name="precio">
                                                    <span class="form-text text-muted" hidden>Precio incorrecto</span>
                                                </div>
                                                <div class="text-center">
                                                    <button name="nprod"  class="btn btn-success btn-icon waves-effect waves-light" id="btn-addAdmin" data-toggle="tooltip" data-placement="top" title="Agregar Producto">
                                                        <i class="icofont icofont-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>

                                       
                                    </div>

                                    <div class="tab-pane fade col-md-12" role="tabpanel" aria-labelledby="profile-tab" id="tabListAdmin">
                                            <div class="row boot-ui">
                                                <div class="col-sm-12 col-xs-12 waves-effect waves-light">
                                                    <div class="grid-material bg-success">LISTA DE COMPRAS</div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Código</th>
                                                            <th>Nombre</th>
                                                            <th>Descripción</th>
                                                            <th>Precio</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php  
                                                        $consulta1="SELECT * FROM producto";
                                                        $resultado1 = mysqli_query($conexion,$consulta1);
                                                        $n=1;
                                                        while ($valores = mysqli_fetch_array($resultado1)) {
                                                                
                                                            echo '<tr>
                                                                <td>#00'.$valores['cod_producto'].'</td>
                                                                <td>'.$valores['nombre'].'</td>
                                                                <td>'.$valores['descripcion'].'</td>
                                                                <td>$'.$valores['precio'].'</td>
                                                               </tr>';
                                                                $n = $n+1;
                                                        
                                                        }				

                                                    ?>

                                                    </tbody>
                                                </table>
                                            </div>
                                        
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <!-- Hover effect table ends -->
                    </div>
                </div>    
                <!-- Row end -->
            </div>
            <!-- Container-fluid ends -->
        </div>
   </div>

  

   <!--=====================================
MODAL AGREGAR USUARIO
======================================-->

<div id="modalUsuario" class="modal fade"  role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form class="myForm" role="form" method="post" action="agregarcultivo.php">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header bg-warning" style="color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar cultivo</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA HECTAREA -->
            
            <div class="form-group">
              
              <div class="input-group ">
              
                <span class="input-group-addon"><i class="fa ti-direction-alt"></i></span> 

                <input type="number" min="1" class="form-control input-lg" name="nuevahectarea" placeholder="Ingresar hectárea" required>

              </div>

            </div>

            <!-- ENTRADA PARA DESCRIPCION -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa ti-align-justify"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevadescripcion" placeholder="Ingresar descripción" id="nuevoUsuario" required>

              </div>

            </div>

            <!-- ENTRADA PARA FECHA INICIO -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa ti-calendar"></i></span> 

                <input type="date" class="form-control input-lg" name="nuevafechainicio" placeholder="Ingresar fecha de inicio" required>

              </div>

            </div>
            <i class="fas fa-align-justify"></i>
            <i class="fas fa-calendar-alt"></i>


          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cultivo</button>

        </div>


      </form>

    </div>

  </div>

</div>

   <!--=====================================
MODAL EDITAR USUARIO
======================================-->

<div id="modalAgregarUsuario" class="modal fade"  role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form class="myForm" role="form" method="post" action="editarusuario.php">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header bg-success" style="color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Usuario</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <input type="hidden" name="idEdit" id="idEdit" >
              

            <div class="form-group row">
                <label for="nombre" class="col-md-2 col-form-label form-control-label">Nombre</label>
                <div class="col-md-10">
                    <input class="form-control" type="text" pattern="-?[A-Za-záéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="nombreEdit" name="nombreEdit">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-2 col-form-label form-control-label" for="apellido">Apellido</label>
                <div class="col-md-10">
                    <input class="form-control" type="text" pattern="-?[A-Za-záéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="apellidoEdit" name="apellidoEdit">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label form-control-label" for="cedula">Cédula de Identidad</label>
                <div class="col-md-10">
                    <input class="form-control" type="tel" pattern="-?[0-9+()- ]*(\.[0-9]+)?" id="cedulaEdit" name="cedulaEdit">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label form-control-label" for="telefono">Teléfono</label>
                <div class="col-md-10">
                    <input class="form-control" type="tel" pattern="-?[0-9+()- ]*(\.[0-9]+)?"  id="telefonoEdit" name="telefonoEdit">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label form-control-label" for="email">Correo electrónico</label>
                <div class="col-md-10">
                    <input class="form-control" type="email" id="emailEdit" name="emailEdit">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label form-control-label" for="usuario">Usuario</label>
                <div class="col-md-10">
                    <input class="form-control" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ]*(\.[0-9]+)?" id="usuarioEdit" name="usuarioEdit">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label form-control-label" for="password">Contraseña</label>
                <div class="col-md-10">
                    <input class="form-control" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ]*(\.[0-9]+)?"  type="password" id="passwordEdit" name="passwordEdit">
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-form-label form-control-label">Roles</label>
                <div class="form-check">
                    <label for="option-1" class="form-check-label">
                        <input type="radio" class="form-check-input" id="option-1Edit" name="optionsEdit" value="1">
                        <img class=" img-circle" src="assets/images/avatar-3.png" alt="avatar" style="height: 45px; width: 45px;">
                        Administrador
                    </label>
                </div>
                <div class="form-check">
                    <label for="option-2" class="form-check-label">
                        <input type="radio" class="form-check-input" id="option-2Edit" name="optionsEdit" value="2">
                        <img class="img-circle" src="assets/images/avatar-3.png"alt="avatar" style="height: 45px; width: 45px;">
                        Compras
                    </label>
                </div>
                <div class="form-check">
                    <label for="option-3" class="form-check-label">
                        <input type="radio" class="form-check-input" id="option-3Edit" name="optionsEdit" value="3">
                        <img class="img-circle" src="assets/images/avatar-3.png" alt="avatar" style="height: 45px; width: 45px;">
                        Ventas
                    </label>
                </div>
                <div class="form-check">
                    <label for="option-4" class="form-check-label">
                        <input type="radio" class="form-check-input" id="option-4Edit" name="optionsEdit" value="4">
                        <img class="img-circle" src="assets/images/avatar-3.png" alt="avatar" style="height: 45px; width: 45px;">
                        Almacén
                    </label>
                </div>
            </div>




          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-success">Guardar </button>

        </div>


      </form>

    </div>

  </div>

</div>

   <!--=====================================
MODAL ELIMINAR USUARIO
======================================-->

<div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="modalEliminarLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
          
          <div class="modal-header">
            <h5 class="modal-title" id="modalEliminarLabel">Eliminar usuario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            ¿Desea eliminar el usuario?

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-danger eliminar" data-dismiss="modal">Eliminar</button>
          </div>  
      </div>
    </div>
</div>

   <!-- Required Jqurey -->
   <script src="assets/plugins/jquery/dist/jquery.min.js"></script>
   <script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
   <script src="assets/plugins/tether/dist/js/tether.min.js"></script>

   <!-- Required Fremwork -->
   <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

   <!-- waves effects.js -->
   <script src="assets/plugins/Waves/waves.min.js"></script>

   <!-- Scrollbar JS-->
   <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
   <script src="assets/plugins/jquery.nicescroll/jquery.nicescroll.min.js"></script>

   <!--classic JS-->
   <script src="assets/plugins/classie/classie.js"></script>

   <!-- notification -->
   <script src="assets/plugins/notification/js/bootstrap-growl.min.js"></script>

   <!-- custom js -->
   <script type="text/javascript" src="assets/js/main.min.js"></script>
   <script type="text/javascript" src="assets/pages/elements.js"></script>
   <script src="assets/js/menu.min.js"></script>
   <script>
  $(document).ready(function(){
    var idEliminar = -1;
    var idEditar =-1;
    var fila;

    $(".btnEliminar").click(function(){
      idEliminar=$(this).data('id');
    });
    $(".eliminar").click(function(){
      $.ajax({
        url: "eliminarusuario.php",
        method: 'POST',
        data: {
          id:idEliminar
        }
      })
      location.reload();

    });


    $(".btnEditar").click(function(){
      idEditar=$(this).data('id');
      var nombre=$(this).data('nombre');
      var apellido=$(this).data('apellido');
      var telefono=$(this).data('telefono');
      var correo=$(this).data('correo');
      var usuario=$(this).data('usuario');
      var password=$(this).data('password');
      var rol=$(this).data('rol');
      $("#cedulaEdit").val("0"+idEditar);
      $("#nombreEdit").val(nombre);
      $("#apellidoEdit").val(apellido);
      $("#telefonoEdit").val("0"+telefono);
      $("#emailEdit").val(correo);
      $("#usuarioEdit").val(usuario);
      $("#passwordEdit").val(password);
      $("#option-"+rol+"Edit").prop("checked", true)
      

    });
    
  });
 

</script>
</body>

</html>
