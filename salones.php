<?

    //veremos con este archivo
    session_start();
    include("controller/funciones.php");
    $_SESSION['salonId']=$_GET['salonId'];
?><html lang="en">
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
    <script type="text/javascript">
	function refresh(id){
		location.href="salones.php?salonId="+id;
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
                <li><?echo "<a href='index.php?id_edificio=".$id_edificio."'>".$id_edificio."</a></li>";?>
                <li class="active"><a href="salones.php">Salones</a></li>
                <li><a href="labs.php">Laboratorios</a></li>
                <li><a href="aulasextra.php">Aulas Extra</a></li>
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
    <div class="col">
		<form name="input">
			<select class="form-control" name="salonId" onchange="refresh(this.value);">
				<option value="0"></option>
				<?
					while ($rowSalon=mysql_fetch_array($salon)){ 
						echo "<option value='".$rowSalon['idsalon']."'>".$rowSalon['idsalon']."</option>";
					}
				?>
    		</select>
    	</form>
    </div><!-- /.col-lg-4 -->
	<div class="row featurette">
		<div class="col-md-7">
			<?
				$query="select * from salon inner join horario on salon.idhorario=horario.idhorario where idsalon='$salonId'";
				$salonTable=mysql_query($query);
				$datosSalon=mysql_fetch_array($salonTable);
				if ($salonId=="") {
					echo "<h2 class='featurette-heading'><span class='text-muted'>Selecciona un salón para mostrar su información</span></h2>";
				}else{
					echo "<table class='table table-bordered table-striped'>
							<thead>
								<tr>
									<th>Salon</th>
									<th>Capacidad</th>
									<th>Periodo</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>".$datosSalon['idsalon']."</td>
									<td>".$datosSalon['capacidad']."</td>
									<td>".$datosSalon['periodo']."</td>
								</tr>
							</tbody>
						</table>";
				}
			?>
		</div>
		<div class="col-md-5">
			<?echo "<img class='featurette-image img-responsive' src='".$datosSalon['imagen']."'>";?>
			<p><?echo $datosSalon['descripcion'];?></p>
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