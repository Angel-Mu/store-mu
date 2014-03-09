<?php
 include ("../controller/conexion.php");
 $consulta = mysql_query("insert into celular (marca,modelo,serie,stock,precio,descripcion) values ('$ma','$mo','$s','$ca','$p','$d')");
 for ($i=0; $i < 3; $i++) { ?>
 	<form method="post" enctype="multipart/form-data">
		<div>		
			<input id="archivos" type="file" name="archivos[]" accept=".jpg,.png,.jpeg, .gif" />
			<input type="button" value="Agregar" onclick="seleccionado();">
				<div id="cargados">
	  				
 					<div class="alert alert-success">Se ha subido:</div>
 					
	  				<!-- Aqui van los archivos cargados -->
				</div>
			<!-- <input type="button" onclick="seleccionado();" value="Subir" align="center"><br> -->
		</div>
	</form>
<?
}
?>
 
