<?php
require('conexion.php');
			if (session_status() !== PHP_SESSION_ACTIVE){
				session_start();
			}
			$usuario = $_SESSION['usuario'];  
			$convert= $_SESSION['convert'];

      if($_SESSION['rol'] != 1 and $_SESSION['rol'] != 4 and $_SESSION['rol'] != 2){
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
   <title>Inventario</title>
   

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


   <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.12.0/i18n/es-ES.json'
            }
        });
    });
</script>



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
                    <?php if($_SESSION['rol'] != 4 && $_SESSION['rol'] != 2){ ?>
                      <li class="treeview"><a class="waves-effect waves-dark" href="sales.php"><i class="ti-shopping-cart text-danger-color"></i><span>Ventas</span></a></li>
                    <?php } ?>
                    <?php if($_SESSION['rol'] != 4 && $_SESSION['rol'] == 2 || $_SESSION['rol'] == 1){ ?>
                      <li class="treeview"><a class="waves-effect waves-dark" href="compras.php"><i class="ti-credit-card text-success-color"></i><span>Compras</span></a></li>
                    <?php } ?>
                    <?php if($_SESSION['rol'] == 4 || $_SESSION['rol'] == 1){ ?>
                      <li class="treeview"><a class="waves-effect waves-dark" href="actividad.php"><i class="ti-layout-column3 text-primary-color"></i><span>Actividad</span></a></li>
                    <?php } ?>
                    <?php if($_SESSION['rol'] != 4 && $_SESSION['rol'] == 2 || $_SESSION['rol'] == 1){ ?>
                      <li class="treeview"><a class="waves-effect waves-dark" href="providers.php"><i class="ti-truck text-danger-color"></i><span>Proveedores</span></a></li>
                    <?php } ?>
                    <?php if($_SESSION['rol'] != 4  && $_SESSION['rol'] == 2 || $_SESSION['rol'] == 1){ ?>
                      <li class="treeview"><a class="waves-effect waves-dark" href="client.php"><i class="ti-harddrives text-primary-color"></i><span>Clientes</span></a></li>
                    <?php } ?>
                    <?php if($_SESSION['rol'] != 4 && $_SESSION['rol'] != 2){ ?>
                      <li class="treeview"><a class="waves-effect waves-dark" href="usuarios.php"><i class="ti-user text-success-color"></i><span>Usuarios</span></a></li>
                    <?php } ?>
                    <?php if($_SESSION['rol'] == 4 || $_SESSION['rol'] == 1){ ?>
                    <li class="treeview"><a class="waves-effect waves-dark" href="products.php"><i class="ti-briefcase text-primary-color"></i><span>Productos</span></a></li>
                    <?php } ?>
                    <?php if($_SESSION['rol'] == 4 || $_SESSION['rol'] == 1 || $_SESSION['rol'] == 2){ ?>
                    <li class="treeview active"><a class="waves-effect waves-dark" href="inventory.php"><i class="ti-clipboard text-danger-color"></i><span>Inventario</span></a></li>
                    <?php } ?>
                    <?php if($_SESSION['rol'] != 4 && $_SESSION['rol'] != 2){ ?>
                    <li class="treeview"><a class="waves-effect waves-dark" href="prediccion.php"><i class="icon-speedometer text-success-color"></i><span>Predicción</span></a></li>
                    <?php } ?>
                    <?php if($_SESSION['rol'] != 4 && $_SESSION['rol'] != 2){ ?>
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
                            <h4>Inventario</h4>
                            <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                                <li class="breadcrumb-item">
                                <a href="home.php">
                                    <i class="icofont icofont-home"></i>
                                </a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Lista de existencias</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                    <div class="col-sm-6" style="margin-top: 0px;">
                       <div class="card" style="padding: 10px; text-align: center">
                         <h1>Existencias de arroz</h1>
                         <h3 id="ah">NA</h3>
                       </div>
                    </div>

                    <div class="col-sm-6" style="margin-top: 0px;">
                       <div class="card" style="padding: 10px; text-align: center">
                         <h1>Existencias de Maíz</h1>
                         <h3 id="as">NA</h3>
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
                              <h5>Lista de existencias</h5>
                            </div>
                            <div class="card-block ">
                                                                        
                                <div class="col-sm-12 table-responsive">
                                    <table id="myTable" class="table">
                                        <thead>
                                            <tr>
                                                <th>Código</th>
                                                <th>Producto</th>
                                                <th>Cantidad</th>
                                                <th>Estado</th>
                                                <th>Fecha de ingreso</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php  
                                            $consulta1="SELECT a.nombre as Actividad, a.cod_actividad as aid, p.nombre as Producto , dc.cantidad, fc.fecha, dc.cod_det_compra as compraid
                                            FROM pis8sa.detalle_compra dc 
                                            inner join pis8sa.actividad a on a.cod_actividad = dc.cod_actividad
                                            inner join pis8sa.producto p on p.cod_producto = dc.cod_producto
                                            inner join pis8sa.factura_compra fc on fc.cod_compra = dc.cod_compra";
                                            $resultado1 = mysqli_query($conexion,$consulta1);
                                            $n=1;

                                            $ah = 0;
                                            $as = 0;
                                            $ap = 0;
                                            $mh = 0;
                                            $mp = 0;

                                            while ($valores = mysqli_fetch_array($resultado1)) {
                                                    
                                                echo '<tr>
                                                    <td>#00'.$valores['compraid'].'</td>
                                                    <td>'.$valores['Producto'].'</td>
                                                    <td>'.$valores['cantidad'].' Q</td>';
                                                    echo "<td>";
                                                    if($valores['Actividad']=='Humedo'){
                                                        if($valores['Producto'] == 'ARROZ'){
                                                            $ah = $ah + intval($valores['cantidad']);
                                                        }elseif($valores['Producto'] == 'MAIZ'){
                                                            $mh = $mh + intval($valores['cantidad']);
                                                        }
                                                        echo "<div style='font-size: 10px; border-radius: 20px' class='btn bg-primary'>Húmedo</div>";
                                                    }elseif($valores['Actividad']=='Seco'){
                                                      if($valores['Producto'] == 'ARROZ'){
                                                        $as = $as + intval($valores['cantidad']);
                                                    }
                                                        echo "<div style='font-size: 10px; border-radius: 20px' class='btn bg-success'>Seco</div>";
                                                    }elseif($valores['Actividad']=='Pelado'){
                                                      if($valores['Producto'] == 'ARROZ'){
                                                        $ap = $ap + intval($valores['cantidad']);
                                                    }elseif($valores['Producto'] == 'MAIZ'){
                                                        $mp = $mp + intval($valores['cantidad']);
                                                    }
                                                        echo "<div style='font-size: 10px; border-radius: 20px' class='btn bg-warning'>Pelado</div>";
                                                    }
                                                    echo "</td>";
                                                    echo '
                                                    <td>'.$valores['fecha'].'</td>
                                                    </tr>';
                                                    $n = $n+1;
                                            
                                            }		

                                            $totalarroz = $ah + $as + $ap;
                                            $totalmaiz = $mh + $mp;
                                            
                                            echo "<script>
                                                document.getElementById('ah').innerHTML = '$totalarroz'+' Q';
                                                document.getElementById('as').innerHTML = '$totalmaiz'+' Q';
                                            </script>";

                                        ?>

                                        </tbody>
                                    </table>
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
