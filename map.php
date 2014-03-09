<?
    session_start();
    include("controller/funciones.php")
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--<link rel="shortcut icon" href="docs-assets/ico/favicon.png">-->
    <title>Instalaciones Upemor</title>
    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
  </head>
<!-- NAVBAR -->
  <body>
    <div class="navbar-wrapper">
      <div class="container">
        <div class="navbar navbar-inverse navbar-static-top" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">Upemor AR</a>
            </div>
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="active"><?echo "<a href='index.php?id_edificio=".$id_edificio."'>".$id_edificio."</a></li>";?>
                <li><a href="salones.php">Salones</a></li>
                <li><a href="labs.php">Laboratorios</a></li>
                <li><a href="aulasextra.php">Aulas Extra</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Departamentos<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <?
                      while ($rowDept=mysql_fetch_array($deptos)){ 
                        echo "<li><a href='deptos.php?id_depto=".$rowDept['iddepartamentos']."'>".$rowDept['nombre']."</a></li>";
                      }
                    ?>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
      <!-- START THE FEATURETTES -->
      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading"><span class="text-muted">Dirección</span></h2>
          <p class="lead">Boulevard Cuauhnáhuac #566, Col. Lomas del Texcal, Jiutepec, Morelos. CP 62550.</p>
          <p class="lead">Tel: (777) 229-3500       Email: informes@upemor.edu.mx</p>
        </div>
        <div class="col-md-5">
          <div class="img_responsive">
            <iframe src="https://mapsengine.google.com/map/u/0/embed?mid=zcVrdSrSP5co.k7JFMTduAj94" style="width:100%;height:400px;"></iframe>
          </div>
        </div>
      </div>
      <hr class="featurette-divider">
      <!-- /END THE FEATURETTES -->
      <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="">Back to top</a></p>
        <p>&copy; 2013 Upemor &middot;</p>
      </footer>

    </div><!-- /.container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <script src="docs-assets/js/holder.js"></script>
  </body>
</html>