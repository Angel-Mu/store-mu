<?
    session_start();
    include("controller/conexion.php");
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
    <title>SmartphoNeate</title>
    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
    <script src="js/functions.js"></script>
    
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
              <a class="navbar-brand" href="index.php">SmartphoNeate</a>
            </div>
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Inicio</a></li>
                <li><a href="catalogo.php">Catálogo</a></li>
                <li><a href="carito.php"><span class="glyphicon glyphicon-shopping-cart">&nbspVer Carrito</span></a></li>
              </ul>
              <form class="navbar-form navbar-right">
                <div class="form-group">
                  <input type="text" id="buscador" placeholder="Buscar..." class="form-control" onkeyup="buscar();">
                </div>
                <div class="form-group">
                  <select name="filtro" id="filtro" class="form-control" placeholder="Filtro de busqueda">
                  <option value="marca">Marca</option>
                  <option value="modelo">Modelo</option>
                </select>
                </div>
                <a href="#" class="btn btn-md btn-primary" onclick="buscar();"><span class="glyphicon glyphicon-search"></span></a></button>                
              </form>
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
          <img src="images/logos.jpg" style="height:100%;width:100%" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h1 style="color:black;">Bienvenido a SmartphoNeate</h1>
              <p style="color:black;">En este sitio encontrarás los teléfonos más novedosos y por si fuera poco a un excelente precio. Somos la mejor opción en cuanto a equipos liberados se refiere</p>
              <p><a class="btn btn-lg btn-primary" href="#" onclick="javascript:alert('EPII - Programación en Internet\nÁngel Malavar, Ricardo Cárdenas, Oscar Moreno\nIIF 7°\nProf: Rosario Eloisa Huerta\nUpemor 2014')" role="button">Acerca de</a></p>
            </div>
          </div>
        </div>
        <?
          $con=mysql_query("select * from celular order by id_celular DESC;");
          $i=0;
          while ($res=mysql_fetch_array($con)){
            $i++;
            echo "<div class='item'>
              <img src='".$res['imagen']."' style='height:125%;width:80%'>
              <div class='container'>
                <div class='carousel-caption'>
                  <p><a class='btn btn-lg btn-primary' href='#' onclick='mostrarDetalles(".$res['id_celular'].")'>Ver Detalles</a></p>
                </div>
              </div>
            </div>";
            if($i>2){
              break;
            }
          }     
        ?>
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div><!-- /.carousel -->
    <!-- Marketing messaging and featurettes
    ================================================== -->
    <div id="resultado"><h3 style="display:none;">Resultados de Busqueda</h3></div>
    <!-- Wrap the rest of the page in another container to center all the content. -->
    <div id="patrocinadores" class="container marketing">
      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-4">
          <img class="img-circle" src="images/safe_image.png" alt="Generic placeholder image" style="width:140px;height:140px;">
          <h2>Iphoneate</h2>
          <p>Enterate de las noticias más recientes, reviews de apps, tweaks, etc, Recomendada si eres fan de Apple...</p>
          <p><a class="btn btn-default" href="http://iphoneate.com/" role="button" target="_blank">Página Oficial &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="images/gpoAndroidLogo.png" style="width:140px;height:140px;" alt="Generic placeholder image">
          <h2>Grupo Android</h2>
          <p>Aquí podrás encontrar la todo lo que necesites saber acerca de Android y noticias de google, ROMS personalizadas, tutoriales y demás. Excelente sitio para los fans de Android</p>
          <p><a class="btn btn-default" href="http://www.grupoandroid.com/page/index.html" role="button" target="_blank">Página Oficial</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="images/octiluslogo.png" style="width:140px;height:140px;" alt="Generic placeholder image">
          <h2>Correo</h2>
          <p>Ya tienes tu smartphone nuevo! Personalizalo como más te guste con los accesorios más novedosos y </p>
          <p><a class="btn btn-default" target="_blank" href="http://octilus.com.mx/" role="button">Tienda online &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->
      <!-- FOOTER -->
      <hr class="featurette-divider">
      <footer>
        <p class="pull-right"><a href="">Back to top</a></p>
        <p>&copy; 2014 Upemor &middot;</p>
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