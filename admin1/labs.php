<?
    session_start();
    include("../controller/funciones.php");
    $_SESSION['idedificio']=$_GET['idedificio'];
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
    <link href="../dist/css/lightbox.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../carousel.css" rel="stylesheet">
    <script type="text/javascript" src="../dist/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="../dist/js/modernizr.custom.js"></script>
    <script type="text/javascript" src="../dist/js/lightbox-2.6.min.js"></script>
    <script type="text/javascript">
      function refresh(id){
        location.href="labs.php?idedificio="+id;
      }
    </script>
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
                <li class="active"><a href="labs.php">Laboratorios</a></li>
                <li><a href="aulasextra.php">Aulas Extra</a></li>
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
    <div class="col">
      <form name="input">
        <select class="form-control" name="salonId" onchange="refresh(this.value);">
          <option value="0"></option>
          <?
            $sql="select idedificio from edificio";
            $edif=mysql_query($sql);
            while ($rowEdif=mysql_fetch_array($edif)){ 
              echo "<option value='".$rowEdif['idedificio']."'>".$rowEdif['idedificio']."</option>";
            }
          ?>
        </select>
      </form>
    </div><!-- /.col-lg-4 -->
    <div class="row featurette">
      <div class="col-md-12">
        <?
          $query="select *,laboratorio.descripcion as desc_lab,horario.descripcion as desc_horario from laboratorio inner join horario on laboratorio.idhorario=horario.idhorario where idedificio='$idedificio'";
          $labsTable=mysql_query($query);
          
          if ($idedificio=="") {
            echo "<h2 class='featurette-heading'><span class='text-muted'>Selecciona un edificio para mostrar sus laboratorios</span></h2>";
          }else{
            echo "<h2 class='featurette-heading'><span class='text-muted'>Laboratorios en ".$idedificio."</span></h2>";
            echo "<table class='table table-bordered table-striped'>
                <thead>
                  <tr>
                    <th>Laboratorio</th>
                    <th>Descripción</th>
                    <th>Especialidad</th>
                    <th>Equipo</th>
                    <th>Periodo</th>
                    <th colspan='2'>Horario</th>
                    <th colspan='2'>Acción</th>
                  </tr>
                </thead>
                <tbody>";
                  while($datosLab=mysql_fetch_array($labsTable)){
                    echo "<tr>
                      <td>".$datosLab['nombre']."</td>
                      <td>".$datosLab['desc_lab']."</td>
                      <td>".$datosLab['especialidad']."</td>
                      <td>".$datosLab['equipo']."</td>
                      <td>".$datosLab['periodo']."</td>
                      <td>".$datosLab['desc_horario']."</td>
                      <td><a href='../".$datosLab['imagen']."' rel='lightbox[roadtrip]'><img src='../".$datosLab['imagen']."' style='height:50px;width:50px;'></a></td>
                      <td><a class='links' href='actLab.php?idLab=".$datosLab['idlaboratorio']."'><span class='glyphicon glyphicon-pencil'></span></a></td>
                      <td><a class='links' href='delLab.php?idLab=".$datosLab['idlaboratorio']."'><span class='glyphicon glyphicon-remove'></span></a></td>
                    </tr>";
                  }
              echo "</tbody>
              </table>";
          }
        ?>
        <form action="formLab.php">
          <button type="submit" class="btn btn-default">Nuevo Laboratorio</button>
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