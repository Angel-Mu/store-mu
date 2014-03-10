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
    <title>SmartphoNeate</title>
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
              <a class="navbar-brand" href="index.php">SmartphoNeate</a>
            </div>
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li><a href="index.php">Inicio</a></li>
                <li class="active"><a href="catalogo.php">Catálogo</a></li>
                <li><a href="carrito.php"><span class="glyphicon glyphicon-shopping-cart"></span>&nbspVer Carrito</a></li>
              </ul>
              <form class="navbar-form navbar-right">
                <div class="form-group">
                  <input type="text" placeholder="Buscar..." class="form-control">
                </div>
                <div class="form-group">
                  <select name="filtro" id="filtro" class="form-control" placeholder="Filtro de busqueda">
                  <option value="marca">Marca</option>
                  <option value="modelo">Modelo</option>
                </select>
                </div>
                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span>&nbspBuscar</button>                
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->
    <div class="container marketing">
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