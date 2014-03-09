<?php
include ("controller/conexion.php");
$d=$_GET['d'];
$filtro=$_GET['e'];
if($filtro=="marca"){
	$consulta = mysql_query("SELECT * FROM celular where marca like '$d%'");
	$consulta2= mysql_query("SELECT * FROM celular where marca like '$d%'");
}else{
	$consulta = mysql_query("SELECT * FROM celular where modelo like '$d%'");
	$consulta2= mysql_query("SELECT * FROM celular where modelo like '$d%'");
}
if (mysql_fetch_row($consulta2)==0) {
	echo "<div class='alert alert-danger'>Sin resultados de busqueda</div>";
}else{

	echo '
	<table class="table table-bordered">
	<tr>
	<td>Marca</td>
	<td>Modelo</td>
	<td>Serie</td>
	<td>Stock</td>
	<td>Precio</td>
	<td>Descripción</td>
	<td align="center">Acción</td>
	</tr>';
	while ($reg=mysql_fetch_array($consulta)) {
		echo '
		<tr>
		<td>'.$reg['marca'].'</td>
		<td>'.$reg['modelo'].'</td>
		<td>'.$reg['serie'].'</td>
		<td>'.$reg['stock'].'</td>
		<td>'.$reg['precio'].'</td>
		<td>'.$reg['descripcion'].'</td>
		<td> <a href="#" onclick="abrirFormularioEditar('.$reg['id_celular'].');"><span class="glyphicon glyphicon-pencil"></a></span>
		<a href="#" onclick="eliminar('.$reg['id_celular'].');" align="right"><span class="glyphicon glyphicon-remove"> </a></span></td>
		</tr>';
	}
	echo '</table>';
}
?>