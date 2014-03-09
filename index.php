<?
    session_start();
    include("controller/funciones.php");
    $_SESSION['id_edificio']=$_GET['id_edificio'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <title>Instalaciones Upemor</title>
    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
  </head>
<!-- NAVBAR
================================================== -->
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
                <li class="active"><?echo "<a href='index.php?id_edificio=".$_GET['id_edificio']."'>".$id_edificio."</a></li>";?>
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
    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="item active">
          <img src="holder.js/900x500/auto/#777:#7a7a7a/text:First slide" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h1>Bienvenido Upemor-AR</h1>
              <p>En este sitio te presentamos la información detallada del edificio al que haz entrado por medio de nuestra aplicación de Realidad Aumentada</p>
              <p><a class="btn btn-lg btn-primary" href="#" onclick="javascript:alert('Proyecto de Estancia II\nÁngel Malavar, Erick Noriega, Abráham Sáyago\nIIF 7°\nAsesor: Edgardo González\nUpemor 2013')" role="button">Acerca de</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="images/upemor.jpg" style="height:125%;width:80%" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h1><?$data_edif=mysql_fetch_array($edif); echo $data_edif['nombre'];?></h1>
              <p><?echo $data_edif['informacion'];?></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="images/google-map-logo.jpg" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h1>Upemor</h1>
              <p>Boulevard Cuauhnáhuac 566, Col. Lomas del Texcal, Jiutepec, Morelos. CP 62550</p>
              <p><a class="btn btn-lg btn-primary" href="map.php" role="button">Ver mapa</a></p>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div><!-- /.carousel -->
    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->
    <div class="container marketing">
      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-4">
          <img class="img-circle" src="images/logo_upemor.jpg" alt="Generic placeholder image" style="width:140px;height:140px;">
          <h2>Upemor</h2>
          <p>Somos una institución de educación superior comprometida con la equidad, la calidad educativa, la prevención de la contaminación y la protección del ambiente, así como la seguridad de nuestra comunidad universitaria, para la formación de profesionistas...</p>
          <p><a class="btn btn-default" href="http://www.upemor.edu.mx" role="button" target="_blank">Página Oficial &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="images/servesc.jpg" style="width:140px;height:140px;" alt="Generic placeholder image">
          <h2>Sistema de Gestión Escolar</h2>
          <p>Aquí podrás encontrar la información necesaria respecto a admisiones, inscripciones, reinscripciones, trámites, cuotas, reglamentos, entre otros.</p>
          <p><a class="btn btn-default" href="http://sge.upemor.edu.mx/CCV/alumnos/InicioSesionAlumno.ccv" role="button" target="_blank">Acceder &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="images/correo.png" style="width:140px;height:140px;" alt="Generic placeholder image">
          <h2>Correo</h2>
          <p>Necesitas ir a la bandeja de entrada de tu correo institucional. Puedes hacerlo desde el siguiente enlace.</p>
          <p><a class="btn btn-default" target="_blank" href="https://www.google.com/a/upemor.edu.mx/ServiceLogin?service=mail&passive=true&rm=false&continue=https://mail.google.com/a/upemor.edu.mx/&ss=1&ltmpl=default&ltmplcache=2" role="button">Web Mail &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->
      <!-- FOOTER -->
      <hr class="featurette-divider">
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