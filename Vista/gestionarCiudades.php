<!DOCTYPE html>
<?php require "../Controlador/CiudadesController.php";?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Rutas/Ciudades </title>

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
                    <h3 class="page-header" style="color: black; "><i class="fa fa-files-o"></i>Administrar Ciudades</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="index.php">Inicio</a></li>
                        <li><i class="icon_document_alt"></i>Ciudades</li>
                        <li><i class="fa fa-files-o"></i>Administrar Ciudades</li>
                    </ol>
                </div>
            </div>
                        


                  <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Ingrese los campos requeridos para una Ciudad
                          </header>
                          <?php if(!empty($_GET['respuesta'])){ ?>
                              <?php if ($_GET['respuesta'] == "correcto"){ ?>
                                  <div class="alert alert-success alert-dismissible fade in" role="alert">
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                      </button>
                                      <strong>La Ciudad!</strong> se ha creado correctamente.
                                  </div>
                              <?php }else {?>
                                  <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                      </button>
                                      <strong>Error!</strong> No se pudo ingresar la ciudad intentalo nuevamente!!
                                  </div>
                              <?php } ?>
                          <?php } ?>

                          <div class="panel-body">
                              <div class="form">
                                <form class="form-validate form-horizontal" method="post" action="../Controlador/CiudadesController.php?action=crear">

                                      <div class="form-group ">
                                          <label for="cemail" class="control-label col-lg-2">Departamento <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="Departamento" name="Departamento" type="text" required />
                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="cemail" class="control-label col-lg-2">Ciudad <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="Ciudad" name="Ciudad" type="text" required />
                                          </div>
                                      </div>
                                     
                                                                        
                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-primary" type="submit">Enviar</button>

                                              <button class="btn btn-default" type="button"><a href="gestionarCiudades.php">Cancelar</a></button>
                                          </div>
                                      </div>
                                  </form>
                              </div>

                          </div>
                      </section>
                  </div>
              </div>




          <div class="col-lg-9 col-md-12">  
          <div class="panel panel-default">
            <div class="panel-heading">
              <h2><i class="fa fa-flag-o red"></i><strong>Ciudades</strong></h2>

              <div class="panel-actions">
                <a href="index.html#" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
                <a href="index.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
                <a href="index.html#" class="btn-close"><i class="fa fa-times"></i></a>
              </div>
            </div>
            <div class="panel-body">
              <table class="table bootstrap-datatable countries">
                <thead>
                  <tr>

                    <th>Id</th>
                    <th>Departamento</th>
                    <th>Ciudad</th>                                        
                    <th>Acciones</th>
                  </tr>
                </thead>   
                <tbody>
                <?php echo CiudadesController::gestionarCiudades(); ?>

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