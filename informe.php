<?php
   require('conexion.php');

   if (session_status() !== PHP_SESSION_ACTIVE){
      session_start();
   }
   $usuario = $_SESSION['usuario'];  
   $convert= $_SESSION['convert'];

   
?>
<!DOCTYPE html>
<html lang="es">

<head>
   <title>Informe | Agrocorn</title>
   <!-- HTML5 Shim and Respond.js IE9 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
   <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->

   <!-- Meta -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="description" content="codedthemes">
   <meta name="keywords" content=", Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
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



</head>

<body class="sidebar-mini fixed">
   <div class="wrapper">
      <div class="loader-bg">
         <div class="loader-bar">
         </div>
      </div>
      <!-- Navbar-->
      <header class="main-header-top hidden-print">
         <a href="home.php" class="logo"><img width="700px" class="img-fluid able-logo" src="assets/images/logoprueba.png" alt="Theme-logo"></a>

         <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#!" data-toggle="offcanvas" class="sidebar-toggle"></a>

            <!-- Navbar Right Menu-->
            <div class="navbar-custom-menu f-right">

               <ul class="top-nav">
                  <!--Notification Menu-->
                    
                  <li class="dropdown notification-menu">
                     <a href="#!" data-toggle="dropdown" aria-expanded="false" class="dropdown-toggle">
                        <i class="icon-bell"></i>
                        <span class="badge badge-danger header-badge">9</span>
                     </a>
                     <ul class="dropdown-menu">
                        <li class="not-head">You have <b class="text-primary">4</b> new notifications.</li>
                        <li class="bell-notification">
                           <a href="javascript:;" class="media">
                              <span class="media-left media-icon">
                    <img class="img-circle" src="assets/images/avatar-1.png" alt="User Image">
                  </span>
                              <div class="media-body"><span class="block">Lisa sent you a mail</span><span class="text-muted block-time">2min ago</span></div>
                           </a>
                        </li>
                        <li class="bell-notification">
                           <a href="javascript:;" class="media">
                              <span class="media-left media-icon">
                    <img class="img-circle" src="assets/images/avatar-2.png" alt="User Image">
                  </span>
                              <div class="media-body"><span class="block">Server Not Working</span><span class="text-muted block-time">20min ago</span></div>
                           </a>
                        </li>
                        <li class="bell-notification">
                           <a href="javascript:;" class="media"><span class="media-left media-icon">
                    <img class="img-circle" src="assets/images/avatar-3.png" alt="User Image">
                  </span>
                                    <div class="media-body"><span class="block">Transaction xyz complete</span><span class="text-muted block-time">3 hours ago</span></div></a>
                        </li>
                        <li class="not-footer">
                           <a href="#!">See all notifications.</a>
                        </li>
                     </ul>
                  </li>

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
                <li class="nav-level">--- Navegación</li>
                <li class="  treeview">
                    <a class="waves-effect waves-dark" href="home.php">
                        <i class="icon-speedometer"></i><span> Inicio</span>
                    </a>                
                </li>
                <li class="nav-level">--- Páginas</li>
                <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="ti-direction-alt text-warning-color"></i><span> Cultivos</span><i class="icon-arrow-down"></i></a>
                  <ul class="treeview-menu">
                           <li><a class="waves-effect waves-dark" href="cultivo.php"><i class="icon-arrow-right"></i> Administrar cultivo</a></li>
                  </ul>
               </li>
               <li class="active treeview"><a class="waves-effect waves-dark" href="#!"><i class="ti-clipboard "></i><span> Control</span><i class="icon-arrow-down"></i></a>
                  <ul class="treeview-menu">
                           <li><a class="waves-effect waves-dark" href="control.php"><i class="icon-arrow-right"></i> Administrar control</a></li>
                           <li class="active"><a class="waves-effect waves-dark" href="riego.php"><i class="icon-arrow-right"></i> Riego</a></li>
                           <li><a class="waves-effect waves-dark" href="abono.php"><i class="icon-arrow-right"></i> Abono</a></li>
                           <li><a class="waves-effect waves-dark" href="fumigacion.php"><i class="icon-arrow-right"></i> Fumigación</a></li>
                           <li><a class="waves-effect waves-dark" href="plaga.php"><i class="icon-arrow-right"></i> Plaga</a></li>
                           
                  </ul>
               </li>
               <li class="treeview"><a class="waves-effect waves-dark" href="gastos.php"><i class="ti-arrow-down text-danger-color"></i><span> Gastos</span></a></li>
               <li class="treeview"><a class="waves-effect waves-dark" href="calendario.php"><i class="ti-calendar"></i><span> Calendario</span></a></li>
               <li class="treeview"><a class="waves-effect waves-dark" href="ganancia.php"><i class="ti-arrow-up text-primary-color"></i><span> Ganancia</span></a></li>
               <li class="treeview"><a class="waves-effect waves-dark" href="prediccion.php"><i class="icon-speedometer text-success-color"></i><span> Predicción</span></a></li>

            </ul>
         </section>
      </aside>

      <div class="content-wrapper">
         <!-- Container-fluid starts -->
         <div class="container-fluid">
            <!-- Main content starts -->
            <div>
               <div class="row">
                  <div class="col-xl-12 p-0">
                     <div class="main-header">
                        <h4>Informe</h4>
                        <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                           <li class="breadcrumb-item"><a href="home.php"><i class="icofont icofont-home"></i></a>
                           </li>
                           <li class="breadcrumb-item"><a href="informe.php">Informe</a>
                           </li>
                        </ol>
                     </div>
                  </div>
               </div>
            </div>

            <section class="panels-wells">

               <div class="card">
                  <div class="card-header">
                     <form class="" action="" method="post">
                        <div class="form-group row">
                           <div class="col-md-4">
                              <label>Seleccione un cultivo: </label>
                           </div>
                           <div class="col-xs-6"> 
                              <select class="form-control" name="category" id="category" class="form-control" >
                                 <option hidden value="0">Seleccionar</option>

                                    <?php
                                    
                                    $consulta1="SELECT codigo, hectarea, descripcion FROM cultivo where codigo_usuario=$convert";
                                    $resultado1 = mysqli_query($conexion,$consulta1);
                                    while ($valores = mysqli_fetch_array($resultado1)) {
                                       
                                       echo '<option value="'.$valores['codigo'].'">'.$valores['descripcion'].' </option>';
                                 
                                       }				

                                    ?>
                              </select>
                           </div>
                        </div>
                     </form>
                     
                     <form action="generarpdf.php" method="POST" target="_blank">
                     <input type="hidden" name="cultivo" id="cultivo" class="" placeholder="" value="">
                     <button class="btn btn-primary" type="submit">Generar PDF</button>
                     </form>
                        
       
                  </div>

                  <div class="card-block">
                  
                     <div class="row" id="datos">
                     
                     
         
                        <!-- end of row -->
                     </div>
                  </div>
               </div>

            </section>
            
         </div>
         <!-- Container-fluid ends -->
      </div>

   </div>
  

    
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script language="javascript">
      $(document).ready(function(){
         $("#category").change(function () {
            $("#category option:selected").each(function () {
                  var id = $(this).val();
                  document.getElementById("cultivo").value = id;
                  		
            });
         });
      });
 
      
   </script>
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

</body>

</html>
