<?
    session_start();
    include("controller/funciones.php");
?><html lang="es">
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
                <li><?echo "<a href='index.php?id_edificio=".$id_edificio."'>".$id_edificio."</a></li>";?>
                <li><a href="salones.php">Salones</a></li>
                <li><a href="labs.php">Laboratorios</a></li>
                <li class="active"><a href="aulasextra.php">Aulas Extra</a></li>
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
    <!-- Marketing messaging and featurettes
    ================================================== -->
	<div class="row featurette">
		<div class="col-md-12">
			<?
				$query="select * from aulas_extra where idedificio='$id_edificio' order by nombre";
				$aulasTable=mysql_query($query);
      ?>
				<h2 class='featurette-heading'><span class='text-muted'>Instalaciones de la Universidad con diferentes actividades</span></h2>
				<table class='table table-bordered table-striped office'>
				  <thead>
            <tr>
              <th>Nombre</th>
              <th>Función</th>
              <th>Información</th>
              <th>Ubicación</th>
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
                    </tr>";
            }
          ?>
          </tbody>
        </table>
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
    <script src="dist/js/bootstrap.min.js"></script>
    <script src="docs-assets/js/holder.js"></script>
  </body>
</html>