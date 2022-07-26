<?php
require('conexion.php');
			if (session_status() !== PHP_SESSION_ACTIVE){
				session_start();
			}
			$usuario = $_SESSION['usuario'];  
			$convert= $_SESSION['convert'];

        // echo "<script>alert('$_SESSION[rol]')</script>";
         


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
   <title>Inicio</title>

   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
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

   <!-- Chartlist chart css -->
   <link rel="stylesheet" href="assets/plugins/chartist/dist/chartist.css" type="text/css" media="all">

   <!-- Weather css -->
   <link href="assets/css/svg-weather.css" rel="stylesheet">


   <!-- Style.css -->
   <link rel="stylesheet" type="text/css" href="assets/css/main.css">

   <!-- Responsive.css-->
   <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">

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
                <li class=" active treeview">
                    <a class="waves-effect waves-dark" href="home.php">
                        <i class="icon-home"></i><span> Inicio</span>
                    </a>                
                </li>
                <li class="nav-level">--- Páginas</li>
                <?php if($_SESSION['rol'] == 3 || $_SESSION['rol'] == 1){ ?>
                  <li class="treeview"><a class="waves-effect waves-dark" href="sales.php"><i class="ti-shopping-cart text-danger-color"></i><span>Ventas</span></a></li>
                <?php } ?>
                <?php if($_SESSION['rol'] == 2 || $_SESSION['rol'] == 1){ ?>
                <li class="treeview"><a class="waves-effect waves-dark" href="compras.php"><i class="ti-credit-card text-success-color"></i><span>Compras</span></a></li>
                  <?php } ?>
                  <?php if($_SESSION['rol'] == 4 || $_SESSION['rol'] == 1){ ?>
                <li class="treeview"><a class="waves-effect waves-dark" href="actividad.php"><i class="ti-layout-column3 text-primary-color"></i><span>Actividad</span></a></li>
                  <?php } ?>
                  <?php if($_SESSION['rol'] == 3 || $_SESSION['rol'] == 2 || $_SESSION['rol'] == 1){ ?>
                <li class="treeview"><a class="waves-effect waves-dark" href="providers.php"><i class="ti-truck text-danger-color"></i><span>Proveedores</span></a></li>
                  <?php } ?>
                  <?php if($_SESSION['rol'] == 3 || $_SESSION['rol'] == 2 || $_SESSION['rol'] == 1){ ?>
                <li class="treeview"><a class="waves-effect waves-dark" href="client.php"><i class="ti-harddrives text-primary-color"></i><span>Clientes</span></a></li>
                  <?php } ?>
                  <?php if($_SESSION['rol'] == 1){ ?>
                <li class="treeview"><a class="waves-effect waves-dark" href="usuarios.php"><i class="ti-user text-success-color"></i><span>Usuarios</span></a></li>
                  <?php } ?>
                  <?php if($_SESSION['rol'] == 4 || $_SESSION['rol'] == 1){ ?>
                <li class="treeview"><a class="waves-effect waves-dark" href="products.php"><i class="ti-briefcase text-primary-color"></i><span>Productos</span></a></li>
                  <?php } ?>
                  <?php if($_SESSION['rol'] == 4 || $_SESSION['rol'] == 2 || $_SESSION['rol'] == 1){ ?>
                <li class="treeview"><a class="waves-effect waves-dark" href="inventory.php"><i class="ti-clipboard text-danger-color"></i><span>Inventario</span></a></li>
                  <?php } ?>
                  <?php if($_SESSION['rol'] == 1){ ?>
                <li class="treeview"><a class="waves-effect waves-dark" href="prediccion.php"><i class="icon-speedometer text-success-color"></i><span>Predicción</span></a></li>
                <li class="treeview"><a class="waves-effect waves-dark" href="configuracion.php"><i class="icon-settings text-primary-color"></i><span>Configuración</span></a></li>
                  <?php } ?>
            </ul>
         </section>
      </aside>


      <div class="content-wrapper">
         <!-- Container-fluid starts -->
         <!-- Main content starts -->
         <div class="container-fluid">
            <div class="row">
               <div class="main-header">
                  <h4>Inicio</h4>
               </div>
            </div>


            <!-- 1-3-block row start -->
            <div class="row">
               <div class="col-lg-4">
                  <div class="card" >
                     <div class="user-block-2">
                        <img width="190px"  style="background-color: white;" class="img-fluid" src="assets/images/widget/usuario.png" alt="user-header">
                        <h5 style="font-size: 45px; text-shadow: -2px -2px 1px #000, 2px 2px 1px #000, -2px 2px 1px #000, 2px -2px 1px #000;"><?php echo($nombre); echo " "; echo($apellido); ?></h5>
                        <h6 style="font-size: 35px; text-shadow: -2px -2px 1px #000, 2px 2px 1px #000, -2px 2px 1px #000, 2px -2px 1px #000; ">@<?php echo($usuario); ?></h6>
                        
                     </div>
                     
                  </div>
               </div>
               <div class="col-lg-8">
                     <img class="img-fluid" src="assets/images/banner1.jpeg" alt="image" width="1000px" >
                    
               </div>
               
            </div>
            
            <!-- 1-3-block row end -->

            <!-- 2-1 block start -->
            
            <!-- 2-1 block end -->
         </div>
         <!-- Main content ends -->
         <!-- Container-fluid ends -->
         
      </div>
   </div>


   <!-- Warning Section Starts -->
   <!-- Older IE warning message -->
   <!--[if lt IE 9]>
      <div class="ie-warning">
          <h1>Warning!!</h1>
          <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
          <div class="iew-container">
              <ul class="iew-download">
                  <li>
                      <a href="http://www.google.com/chrome/">
                          <img src="assets/images/browser/chrome.png" alt="Chrome">
                          <div>Chrome</div>
                      </a>
                  </li>
                  <li>
                      <a href="https://www.mozilla.org/en-US/firefox/new/">
                          <img src="assets/images/browser/firefox.png" alt="Firefox">
                          <div>Firefox</div>
                      </a>
                  </li>
                  <li>
                      <a href="http://www.opera.com">
                          <img src="assets/images/browser/opera.png" alt="Opera">
                          <div>Opera</div>
                      </a>
                  </li>
                  <li>
                      <a href="https://www.apple.com/safari/">
                          <img src="assets/images/browser/safari.png" alt="Safari">
                          <div>Safari</div>
                      </a>
                  </li>
                  <li>
                      <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                          <img src="assets/images/browser/ie.png" alt="">
                          <div>IE (9 & above)</div>
                      </a>
                  </li>
              </ul>
          </div>
          <p>Sorry for the inconvenience!</p>
      </div>
      <![endif]-->
   <!-- Warning Section Ends -->

   <!-- Required Jqurey -->
   <script src="assets/plugins/Jquery/dist/jquery.min.js"></script>
   <script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
   <script src="assets/plugins/tether/dist/js/tether.min.js"></script>

   <!-- Required Fremwork -->
   <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

   <!-- Scrollbar JS-->
   <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
   <script src="assets/plugins/jquery.nicescroll/jquery.nicescroll.min.js"></script>

   <!--classic JS-->
   <script src="assets/plugins/classie/classie.js"></script>

   <!-- notification -->
   <script src="assets/plugins/notification/js/bootstrap-growl.min.js"></script>

   <!-- Sparkline charts -->
   <script src="assets/plugins/jquery-sparkline/dist/jquery.sparkline.js"></script>

   <!-- Counter js  -->
   <script src="assets/plugins/waypoints/jquery.waypoints.min.js"></script>
   <script src="assets/plugins/countdown/js/jquery.counterup.js"></script>

   <!-- Echart js -->
   <script src="assets/plugins/charts/echarts/js/echarts-all.js"></script>

   <script src="https://code.highcharts.com/highcharts.js"></script>
   <script src="https://code.highcharts.com/modules/exporting.js"></script>
   <script src="https://code.highcharts.com/highcharts-3d.js"></script>

   <!-- custom js -->
   <script type="text/javascript" src="assets/js/main.min.js"></script>
   <script type="text/javascript" src="assets/pages/dashboard.js"></script>
   <script type="text/javascript" src="assets/pages/elements.js"></script>
   <script src="assets/js/menu.min.js"></script>
<script>
var $window = $(window);
var nav = $('.fixed-button');
$window.scroll(function(){
    if ($window.scrollTop() >= 200) {
       nav.addClass('active');
    }
    else {
       nav.removeClass('active');
    }
});
</script>

</body>

</html>
