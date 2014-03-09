<?
    session_start();
    include("../controller/funciones.php");
    $_SESSION['id_oficina']=$_GET['id_oficina'];
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
                <li><a href="aulasextra.php">Aulas Extra</a></li>
                <li><a href="deptos.php">Departamentos</a></li>
                <li class="active"><a href="oficinas.php">Oficinas</a></li>
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
            $sql="select * from oficina where idoficina=$id_oficina";
            $res=mysql_query($sql);
            $oficinas=mysql_fetch_array($res);
          ?>
    			<h2 class='featurette-heading'><span class='text-muted'>Ingrese los datos</span></h2>
          <form action="updOficinas.php" method="post">
            <div class="form-group">
              <label for="nombre">Nombre</label>
              <?
                echo"<input type='text' class='form-control' name='nombre' maxlength='45' value='".$oficinas['nombre']."' placeholder='Nombre de Oficina'>";
              ?>
            </div>
            <div class="form-group">
              <label for="responsable">Responsable</label>
              <?
                echo "<input type='text' class='form-control' name='responsable' maxlength='45' value='".$oficinas['responsable']."' placeholder='Nombre del Responsable'>";
              ?>
            </div>
            <div class="form-group">
              <label for="puesto">Puesto</label>
              <?
                echo "<input type='text' class='form-control' name='puesto' maxlength='45' value='".$oficinas['puesto']."' placeholder='Puesto del Responsable'>"
              ?>
            </div>
            <div class="form-group">
              <label for="depto">Departamento al que pertenece</label>
              <select class="form-control" name="depto">
                <?
                  $sql="select iddepartamentos,nombre from departamentos where iddepartamentos=".$oficinas['iddepartamentos'];
                  $res=mysql_query($sql);
                  $deptoNom=mysql_fetch_array($res);
                  echo"<option selected value='".$deptoNom['iddepartamentos']."'>".$deptoNom['nombre']."</option>";
                  $sql="select nombre,iddepartamentos from departamentos";
                  $deptosTable=mysql_query($sql);
                  while ($rowDepto=mysql_fetch_array($deptosTable)){ 
                    echo "<option value='".$rowDepto['iddepartamentos']."'>".$rowDepto['nombre']."</option>";
                  }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="info">Información</label>
              <?
                echo "<input type='text' class='form-control' name='info' maxlength='300' value='".$oficinas['info_general']."' placeholder='Información general'>";
                echo "<input type='text' class='form-control' name='oficina_id' maxlength='2' value='".$oficinas['idoficina']."' style='display:none;'>";
              ?>
            </div>
            <button type="submit" class="btn btn-default">Actualizar</button>
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