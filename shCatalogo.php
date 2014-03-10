<?php
	include ("controller/conexion.php");
	$d=$_GET['d'];
	$consulta = mysql_query("SELECT * FROM celular where marca like '$d%'");
	echo '
	<table class="table table-bordered">
	<tr>
	<td>Marca</td>
	<td>Modelo</td>
	<td>Precio</td>
	<td align="center" colspan=2>Acción</td>
	</tr>';
	while ($reg=mysql_fetch_array($consulta)) {
		echo '
		<tr>
		<td>'.$reg['marca'].'</td>
		<td>'.$reg['modelo'].'</td>
		<td>'.$reg['precio'].'</td>
		<td><a class="btn btn-md btn-primary" href="#" onclick="mostrarDetalles('.$reg['id_celular'].');"><span class="glyphicon glyphicon-info-sign">&nbspDetalles</a></span></td>
		<td><a class="btn btn-md btn-primary" href="#" onclick="agregarCarrito('.$reg['id_celular'].');"><span class="glyphicon glyphicon-shopping-cart">&nbspAgregar</a></span></td>
		</tr>';
	}
	echo '</table>';
}
?>