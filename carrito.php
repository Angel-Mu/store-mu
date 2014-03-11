<?
  include("controller/funciones.php");
  if($_COOKIE['carroCompra']==null){
    $consCarrito = mysql_query("select * from carrito order by id_carrito DESC;");
    $car=mysql_fetch_array($consCarrito);
    $newCar=$car['id_carrito']+1;
    setcookie("carroCompra", $newCar, time()+3600);
  }
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
                <li><a href="catalogo.php">Catálogo</a></li>
                <li class="active"><a href="carrito.php"><span class="glyphicon glyphicon-shopping-cart"></span>&nbspVer Carrito</a></li>
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
        <div class="col-lg-2">
        </div>
        <div class="col-lg-8" id="resultado"></div><br><br><br><br>
        <div class="col-lg-2">
        </div>
      </div>
    </div>
    <div class="container marketing">
      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-2">
          
        </div>
        <div class="col-lg-8" id="resultadosCarrito">
          <?
              if($_COOKIE['carroCompra']!=null){
                $consulta = mysql_query("SELECT * FROM carrito inner join celular on celular.id_celular=carrito.id_celular where id_carrito=".$_COOKIE['carroCompra']);
                $cons = mysql_query("SELECT * FROM carrito inner join celular on celular.id_celular=carrito.id_celular where id_carrito=".$_COOKIE['carroCompra']);
                $lst = mysql_affected_rows();
                if($lst!=0) {
                echo '
                <table class="table table-bordered">
                <tr>
                <td>Foto</td>
                <td>Marca</td>
                <td>Modelo</td>
                <td>Cantidad</td>
                <td>Precio</td>
                <td>Total</td>
                <td>Acción</td>
                </tr>';
                while ($list=mysql_fetch_array($consulta)) {
                  echo '
                    <tr>
                    <td><img src='.$list['imagen'].' style="width:80px;height:80px;"></td>
                    <td>'.$list['marca'].'</td>
                    <td>'.$list['modelo'].'</td>
                    <td>'.$list['cantidad'].'</td>
                    <td>'.$list['precio'].'</td>
                    <td>'.$list['total'].'</td>
                    <td><a class="btn btn-md btn-primary" href="#" onclick="delItem('.$list['contador'].');"><span class="glyphicon glyphicon-remove">&nbspQuitar</a></span></td>
                    </tr>';
                }
                  echo '</table>';
                  echo '<a class="btn btn-md btn-primary" href="#" onclick="comprar();"><span class="glyphicon glyphicon-usd">&nbspComprar</span></a>';
                  echo '<a class="btn btn-md btn-primary" href="#" onclick="delCart();"><span class="glyphicon glyphicon-trash">&nbspVaciar</span></a>';
                }else{
                  echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>No hay elementos en el carrito</strong> Puede ser que haya expirado su carrito o que no haya cargado ningún artículo</div>";
                }
              }else{
                 echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>No hay elementos en el carrito</strong> Puede ser que haya expirado su carrito o que no haya cargado ningún artículo</div>";
              }
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