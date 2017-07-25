<!DOCTYPE html>
<?php require "../Controlador/AeroLineaController.php";?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Aero-Lineas </title>

    <!-- Bootstrap CSS -->    
    <link href="NiceAdmin/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="NiceAdmin/css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="NiceAdmin/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="NiceAdmin/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="NiceAdmin/css/style.css" rel="stylesheet">
    <link href="NiceAdmin/css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->
  </head>

  <body>
  <!-- container section start -->
  <section id="container" class="">
      <!--header start-->
         <?php require("snippers/menusuperior.php");?>
      <!--header end-->

      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <?php require("snippers/menuizquierdo.php");?>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->

      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header" style="color: black; "><i class="fa fa-files-o"></i>Gestionar AeroLineas</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="index.php">Inicio</a></li>
                        <li><i class="icon_document_alt"></i>AeroLineas</li>
                        <li><i class="fa fa-files-o"></i>Gestionar AeroLineas</li>
                    </ol>
                </div>
            </div>                         
          <div class="col-lg-9 col-md-12">            
          <div class="panel panel-default">
            <div class="panel-heading">
              <h2><i class="fa fa-flag-o red"></i><strong>AeroLinea &nbsp;&nbsp;&nbsp;&nbsp;</strong></h2> <a class="btn btn-primary" href="crearAerolinea.php" ><i class="icon_plus_alt2"></i>Nueva AeroLinea</a>
              <div class="panel-actions">
                <a href="gestionarAerolineas.php" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
                <a href="index.php" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
                
              </div>
            </div>
            <div class="panel-body">
              <table class="table bootstrap-datatable countries">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>Razon Social</th>
                    <th>Nit</th>
                    <th>Direccion</th>
                    <th>Correo</th>
                    <th>Telefono</th>                                     
                  </tr>
                </thead>   
                <tbody>                  
                  <?php echo AerolineaController::gestionarAerolinea(); ?>
                  
                </tbody>
              </table>
            </div>
  
          </div>  

        </div><!--/col-->







              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
      <div class="text-right">
        <div class="credits">
            <!-- 
                All the links in the footer should remain intact. 
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
            -->
            <a href="https://bootstrapmade.com/free-business-bootstrap-themes-website-templates/">AeroLinea </a> by <a href="https://bootstrapmade.com/">Travel to Colombia</a>
        </div>
    </div>
  </section>
  <!-- container section end -->

    <!-- javascripts -->
    <script src="NiceAdmin/js/jquery.js"></script>
    <script src="NiceAdmin/js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="NiceAdmin/js/jquery.scrollTo.min.js"></script>
    <script src="NiceAdmin/js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- jquery validate js -->
    <script type="text/javascript" src="NiceAdmin/js/jquery.validate.min.js"></script>

    <!-- custom form validation script for this page-->
    <script src="NiceAdmin/js/form-validation-script.js"></script>
    <!--custome script for all page-->
    <script src="NiceAdmin/js/scripts.js"></script>    


  </body>
</html>