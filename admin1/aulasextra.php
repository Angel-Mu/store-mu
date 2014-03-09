<?
    session_start();
    include("../controller/funciones.php");
    if (verificar_user()){
?><html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon" />
    <title>Upemor AR</title>
    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../carousel.css" rel="stylesheet">
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
                <li><a href="edificios.php">Edificios</a></li>
                <li><a href="salones.php">Salones</a></li>
                <li><a href="labs.php">Laboratorios</a></li>
                <li class="active"><a href="aulasextra.php">Aulas Extra</a></li>
                <li><a href="deptos.php">Departamentos</a></li>
                <li><a href="oficinas.php">Oficinas</a></li>
                <li><a href="salir.php">Salir</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Marketing messaging and featurettes
    ================================================== -->
	<div class="row featurette">
		<div class="col-md-12">
			<?
				$query="select * from aulas_extra order by nombre";
				$aulasTable=mysql_query($query);
      ?>
				<h2 class='featurette-heading'><span class='text-muted'>Aulas Extra</span></h2>
				<table class='table table-bordered table-striped office'>
				  <thead>
            <tr>
              <th>Nombre</th>
              <th>Función</th>
              <th>Información</th>
              <th>Ubicación</th>
              <th colspan="2">Acción</th>
            </tr>
          </thead>
          <tbody>
          <?
            while ($aulas=mysql_fetch_array($aulasTable)){
              echo "<tr>
                      <td>".$aulas['nombre']."</td>
                      <td>".$aulas['funcion']."</td>
                      <td>".$aulas['informacion']."</td>
                      <td>".$aulas['idedificio']."</td>
                      <td><a class='links' href='actAulas.php?idaulas_extra=".$aulas['idaulas_extra']."'><span class='glyphicon glyphicon-pencil'></span></a></td>
                      <td><a class='links' href='delAulas.php?idaulas=".$aulas['idaulas_extra']."'><span class='glyphicon glyphicon-remove'></span></a></td>
                    </tr>";
            }
          ?>
          </tbody>
        </table>
        <form action="formAulas.php">
          <button type="submit" class="btn btn-default">Nueva Aula</button>
        </form>
      </div>
		</div>
    <!-- Wrap the rest of the page in another container to center all the content. -->
      <!-- FOOTER -->
    <hr class="featurette-divider">
  	<footer>
  		<p class="pull-right"><a href="">Back to top</a></p>
  		<p>&copy; 2013 Upemor &middot;</p>
  	</footer>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="../dist/js/bootstrap.min.js"></script>
    <script src="../docs-assets/js/holder.js"></script>
  </body>
</html>
<?      
    } else {
        //si el usuario no es verificado volvera al formulario de ingreso
        ?><meta charset="utf-8"><?
        echo "<script>alert('Lo sentimos, debe iniciar sesión para ver este contenido'); location.href='login.html';</script>";
    }
?>