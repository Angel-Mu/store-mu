<?
    session_start();
    include("controller/funciones.php");
    $_SESSION['id_depto']=$_GET['id_depto'];
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
                <li><a href="aulasextra.php">Aulas Extra</a></li>
                <li class="dropdown active">
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
        <?
          $query="select * from oficina where oficina.iddepartamentos='$id_depto'";
          $oficinaTable=mysql_query($query);
          $query2="select * from departamentos where iddepartamentos='$id_depto'";
          $deptoInfo=mysql_query($query2);
          $deptoInfo=mysql_fetch_array($deptoInfo);
        ?>
        <div class="col-md-4">
          <h2 class='featurette-heading'><span class='text-muted'>Información general de <? echo $deptoInfo['nombre'];?></span></h2>
          <p class="lead"><? echo $deptoInfo['info_general'];?></p>
          <p class="lead"><? echo $deptoInfo['horario_atencion'];?></p>
        </div>
        <div class="col-md-8">
          <h2 class="featurette-heading"><span class="text-muted">Oficinas</span></h2>
          <table class='table table-bordered table-striped office'>
            <thead>
              <tr>
                <th>Oficina</th>
                <th>Responsable</th>
                <th>Puesto</th>
                <th>Acerca de</th>
              </tr>
            </thead>
            <tbody>
            <?
              while ($oficina=mysql_fetch_array($oficinaTable)){
                echo "<tr>
                        <td>".$oficina['nombre']."</td>
                        <td>".$oficina['responsable']."</td>
                        <td>".$oficina['puesto']."</td>
                        <td>".$oficina['info_general']."</td>
                      </tr>";
              }
            ?>
            </tbody>
          </table>
        </div>
      </div>
      <hr class="featurette-divider">
    <!-- Wrap the rest of the page in another container to center all the content. -->
      <!-- FOOTER -->
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