<?
    session_start();
    include("../controller/funciones.php");
    $_SESSION['id_depto']=$_GET['id_depto'];
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
    <script type="text/javascript">
      function refresh(id){
        location.href="oficinas.php?id_depto="+id;
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
    <div class="col">
      <form name="input">
        <select class="form-control" name="deptoId" onchange="refresh(this.value);">
          <option value="0"></option>
          <?
            $sql="select iddepartamentos,nombre from departamentos";
            $deptos=mysql_query($sql);
            while ($rowDeptos=mysql_fetch_array($deptos)){ 
              echo "<option value='".$rowDeptos['iddepartamentos']."'>".$rowDeptos['nombre']."</option>";
            }
          ?>
        </select>
      </form>
    </div><!-- /.col-lg-4 -->
    <div class="row featurette">
      <div class="col-md-12">
        <?
          $query="select *,oficina.nombre as nombre_office,oficina.info_general as informacion from oficina inner join departamentos on oficina.iddepartamentos=departamentos.iddepartamentos where oficina.iddepartamentos=$id_depto";
          $oficinasTable=mysql_query($query);
          if ($id_depto=="") {
            echo "<h2 class='featurette-heading'><span class='text-muted'>Selecciona un Departamento para mostrar sus Oficinas</span></h2>";
          }else{
            $query2="select nombre from departamentos where iddepartamentos=$id_depto";
            $res=mysql_query($query2);
            $depto=mysql_fetch_array($res);
            echo "<h2 class='featurette-heading'><span class='text-muted'>Oficinas en ".$depto['nombre']."</span></h2>";
            echo "<table class='table table-bordered table-striped'>
                <thead>
                  <tr>
                    <th>Oficina</th>
                    <th>Responsable</th>
                    <th>Puesto</th>
                    <th>Información</th>
                    <th>Ubicación</th>
                    <th colspan='2'>Acción</th>
                  </tr>
                </thead>
                <tbody>";
                  while($oficinas=mysql_fetch_array($oficinasTable)){
                    echo "<tr>
                      <td>".$oficinas['nombre_office']."</td>
                      <td>".$oficinas['responsable']."</td>
                      <td>".$oficinas['puesto']."</td>
                      <td>".$oficinas['informacion']."</td>
                      <td>".$oficinas['idedificio']."</td>
                      <td><a class='links' href='actOficinas.php?id_oficina=".$oficinas['idoficina']."'><span class='glyphicon glyphicon-pencil'></span></a></td>
                      <td><a class='links' href='delOficinas.php?id_oficina=".$oficinas['idoficina']."'><span class='glyphicon glyphicon-remove'></span></a></td>
                    </tr>";
                  }
              echo "</tbody>
              </table>";
          }
        ?>
        <form action="formOficinas.php">
          <button type="submit" class="btn btn-default">Nueva Oficina</button>
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