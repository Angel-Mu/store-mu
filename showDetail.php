<?
include ("controller/conexion.php");
	$d=$_GET['d'];
	$query="select * from celular  where id_celular='$id'";
	$celTable=mysql_query($query);
	$datosCel=mysql_fetch_array($celTable);
?>
<div class="row ">
	<div class="col-xs-2"></div>
	<div class="col-xs-8">
		<?
			echo"<div class='col-xs-4'><img class='featurette-image img-responsive' src='".$datosCel['imagen']."'></div>
				<div class='col-xs-4'><img class='featurette-image img-responsive' src='".$datosCel['imagen2']."'></div>
				<div class='col-xs-4'><img class='featurette-image img-responsive' src='".$datosCel['imagen3']."'></div>";
		?>
	</div>
</div>
<div class="row ">
	<div class="col-xs-2"></div>
	<div class="col-xs-8">
		<?
			echo "<table class='table table-bordered table-striped'>
					<thead>
						<tr>
							<th>Marca</th>
							<th>Modelo</th>
							<th>Precio</th>
							<th>Stock</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>".$datosCel['marca']."</td>
							<td>".$datosCel['modelo']."</td>
							<td>".$datosCel['precio']."</td>
							<td>".$datosCel['stock']."</td>
						</tr>
					</tbody>
					<thead>
						<tr>
							<th  colspan=4>Descripcion</th>
						</tr>
					</thead>
					<tbody>
						<tr >
							<td  colspan=4>".$datosCel['descripcion']."</td>
						</tr>
					</tbody>
				</table>";
		?>
	</div>
</div>
<div class="row">
	<div class="col-xs-2">		
	</div>
	<div class="col-xs-8">
		<a class="btn btn-md btn-primary" href="#" onclick="mostrarDetalles('.$datosCel['id_celular'].');"><span class="glyphicon glyphicon-info-sign">&nbspDetalles</span></a>
		<a class="btn btn-md btn-primary" href="#" onclick="agregarCarrito('.$datosCel['id_celular'].');"><span class="glyphicon glyphicon-shopping-cart">&nbspAgregar</span></a>
	</div>
</div>