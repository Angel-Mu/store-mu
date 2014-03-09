<?
    session_start();
    include("../controller/funciones.php");
    $_SESSION['idLab']=$_GET['idLab'];
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
                <li  class="active"><a href="labs.php">Laboratorios</a></li>
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
    <div class="row featurette">
      <div class="col-lg-6">
          <?
            $sql="select *,laboratorio.descripcion as desc_lab,horario.descripcion as desc_horario from laboratorio inner join horario on laboratorio.idhorario=horario.idhorario where idlaboratorio=$idLab";
            $res=mysql_query($sql);
            $lab=mysql_fetch_array($res);
          ?>
          <h2 class='featurette-heading'><span class='text-muted'>Ingrese los datos</span></h2>
          <form action="updLab.php"  method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="nombre">Nombre</label>
              <?
                echo"<input type='text' class='form-control' name='nombre' style='text-transform:uppercase;' maxlength='15' value='".$lab['nombre']."' placeholder='Ej. LS2'>";
              ?>
            </div>
            <div class="form-group">
              <label for="desc">Descripción</label>
              <?
                echo "<input type='text' class='form-control' name='desc' maxlength='45' value='".$lab['desc_lab']."' placeholder='Nombre Completo del Laboratorio'>";
              ?>
            </div>
            <div class="form-group">
              <label for="especialidad">Especialidad</label>
              <?
                echo "<input type='text' class='form-control' name='especialidad' maxlength='45' value='".$lab['especialidad']."' placeholder='Especialidad a la que pertenece'>";
              ?>
            </div>
            <div class="form-group">
              <label for="equipo">Equipo</label>
              <?
                echo "<input type='text' class='form-control' name='equipo' maxlength='100' value='".$lab['equipo']."' placeholder='Equipo con el que se cuenta'>";
              ?>
            </div>
            <div class="form-group">
              <label for="edificio">Edificio</label>
              <select class="form-control" name="edificio">
                <?
                  echo"<option selected value='".$lab['idedificio']."'>".$lab['idedificio']."</option>";
                  $sql="select idedificio from edificio";
                  $edif=mysql_query($sql);
                  while ($rowEdif=mysql_fetch_array($edif)){ 
                    echo "<option value='".$rowEdif['idedificio']."'>".$rowEdif['idedificio']."</option>";
                  }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="horario">Horario</label>
              <?
                echo "<input type='text' class='form-control' name='horario' maxlength='45' value='".$lab['desc_horario']."' placeholder='Descripción del horario'>";
              ?>
            </div>
            <div class="form-group">
              <label for="periodo">Periodo</label>
              <?
                echo "<input type='text' class='form-control' name='periodo' maxlength='45' value='".$lab['periodo']."' placeholder='Ciclo al que pertenece el horario'>";
                echo "<input type='text' class='form-control' name='id_horario' maxlength='2' value='".$lab['idhorario']."' style='display:none;'>";
                echo "<input type='text' class='form-control' name='id_lab' maxlength='2' value='".$lab['idlaboratorio']."' style='display:none;'>";
              ?>
            </div>
            <div class="form-group">
              <label for="imgHorario">Imagen de Horario</label>
              <input type="file" name="imgHorario" accept=".jpg,.jpeg,.png">
            </div>
            <button type="submit" class="btn btn-default">Enviar</button>
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