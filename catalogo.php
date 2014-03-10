<?
  include("controller/funciones.php");
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
                <li><a href="index.php">Inicio</a></li>
                <li class="active"><a href="catalogo.php">Catálogo</a></li>
                <li><a href="carrito.php"><span class="glyphicon glyphicon-shopping-cart"></span>&nbspVer Carrito</a></li>
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
    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->
    <div id="resultado"></div><br><br><br><br>
    <div class="container marketing">
      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-2">
          
        </div>
        <div class="col-lg-8">
          <?
            $consulta = mysql_query("SELECT * FROM celular order by id_celular DESC;");
            echo '
            <table class="table table-bordered">
            <tr>
            <td>Marca</td>
            <td>Modelo</td>
            <td>Precio</td>
            <td align="center" colspan=2>Acción</td>
            </tr>';
            while ($reg=mysql_fetch_array($consulta)) {
              echo '
              <tr>
              <td>'.$reg['marca'].'</td>
              <td>'.$reg['modelo'].'</td>
              <td>'.$reg['precio'].'</td>
              <td><a class="btn btn-md btn-primary" href="#" onclick="detallesCat('.$reg['id_celular'].');"><span class="glyphicon glyphicon-info-sign">&nbspDetalles</a></span></td>
              <td><a class="btn btn-md btn-primary" href="#" onclick="agregarCarrito('.$reg['id_celular'].',1,'.$reg['precio'].');"><span class="glyphicon glyphicon-shopping-cart">&nbspAgregar</a></span></td>
              </tr>';
            }
            echo '</table>';
          ?>
      </div><!-- /.row -->
      <div class="col-lg-2"></div>
      <!-- FOOTER -->
      
    </div><!-- /.container -->
    <hr class="featurette-divider">
      <footer>
        <p class="pull-right"><a href="">Back to top</a></p>
        <p>&copy; 2014 Upemor &middot;</p>
      </footer>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <script src="docs-assets/js/holder.js"></script>
  </body>
</html>