<?
header("Content-Type: text/html;charset=utf-8");
include('funciones.php');
include('manageFile.php');
//uso de la funcion verificar_usuario()


  if (verificar_usuario()){?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <script type="text/javascript" src="../js/ajax.js"></script>
    <script type="text/javascript" src="../js/multiplefiles.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">
    <title>EP2</title>
    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="../carousel.css" rel="stylesheet">
    <style type="text/css">
      #tabla{
        margin-top: 10%;
        /*background-color: #A4A4A4;*/
        border-radius: 3px;
      }
    </style>
    
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
              <a class="navbar-brand">SmartphoNeate</a>
            </div>
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li><a href="admin_CRUD.php">CRUD</a></li>
                <li><a href="salir.php">Cerrar Sesión</a></li>
                <li><a href="reporte_fpdf.php">Reportes</a></li>
                <li class="active"><a href="bitacora.php">Ver Bitácora</a></li>
              </ul>
              <form class="navbar-form navbar-right">
                <div class="form-group">
                  <input type="text" id="buscador" placeholder="Buscar..." class="form-control" onkeyup="buscar_admin();">
                </div>
                <div class="form-group">
                  <select name="filtro" id="filtro" class="form-control" placeholder="Filtro de busqueda">
                  <option value="marca">Marca</option>
                  <option value="modelo">Modelo</option>
                </select>
                </div>
                <a href="#" class="btn btn-md btn-primary" onclick="buscar_admin();"><span class="glyphicon glyphicon-search"></span></a></button>                
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div id="tabla" align="center">
        <table class="table table-bordered" id="tablaBitacora">
          <tr>
            <td>Fecha</td>
            <td>Hora</td>
            <td>Operacion</td>
            <td>Tablas</td>
            <td>Usuario</td>
          </tr>
        </table>
      <div id="resultado">
      </div>
    </div>
      <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2014 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
  </body>
</html>
<?    
        cadenaJson();
} else {
  //si el usuario no es verificado volvera al formulario de ingreso
  ?><head><meta charset="utf-8"><?
  echo "<script>alert(\"Por favor inicie su sesión.\"); location.href=\"../index.php\";</script>";
}
?>