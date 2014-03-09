<?php
include ("controller/conexion.php");
$d=$_GET['d'];
if($d!=''){
	$consulta = mysql_query("SELECT * FROM celular where marca like '$d%'");
}else{
	$consulta = mysql_query("SELECT * FROM celular");
}


$d=$_GET['d'];
if($d!=''){
	$consulta2 = mysql_query("SELECT * FROM celular where marca like '$d%'");
}else{
	$consulta2 = mysql_query("SELECT * FROM celular");
}
if (mysql_fetch_row($consulta2)==0) {
	echo 'no hay celulares ingresados';
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
		<td><span class="glyphicon glyphicon-pencil" a href="#" onclick="abrirFormularioEditar('.$reg['id_celular'].');"></a></span>
		<span class="glyphicon glyphicon-remove"a href="#" onclick="eliminar('.$reg['id_celular'].');" align="right"></a></span></td>
		</tr>';
	}
	echo '</table>';
}
?>