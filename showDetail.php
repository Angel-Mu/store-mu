<?
	include ("controller/conexion.php");
	$id=$_GET['id'];
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
        <div class="form-group">
          <input type="number" id="cant" placeholder="Cantidad..." class="form-control" onkeyup="calcular(this.value,<? echo $datosCel['precio'];?>);" onchange="calcular(this.value,<? echo $datosCel['precio'];?>);">
        </div>
        <div class="form-group">
          <input type="number" id="total" disabled='disabled' class="form-control">
        </div>
      	<? 
      		echo "<a class='btn btn-md btn-primary' href='#' onclick='agregarCarrito(".$datosCel['id_celular'].",0,0);'><span class='glyphicon glyphicon-shopping-cart'>&nbsp;Agregar</span></a>
      		<a class='btn btn-md btn-primary' href='#' onclick='comprar(".$datosCel['id_celular'].");'><span class='glyphicon glyphicon-usd'>&nbsp;Comprar</span></a>";
		?>
	</div>
</div>