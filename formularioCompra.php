<?php
 	include ("controller/conexion.php");
 	$consulta = mysql_query("SELECT * FROM carrito inner join celular on celular.id_celular=carrito.id_celular where id_carrito=".$_COOKIE['carroCompra']);
    $cons = mysql_query("SELECT * FROM carrito inner join celular on celular.id_celular=carrito.id_celular where id_carrito=".$_COOKIE['carroCompra']);
    $lst = mysql_affected_rows();
    if($lst!=0) {
    	$pago=0;
	    echo '
	    <table class="table table-bordered">
	    <tr>
	    <td>Foto</td>
	    <td>Marca</td>
	    <td>Modelo</td>
	    <td>Cantidad</td>
	    <td>Precio</td>
	    <td>Total</td>
	    </tr>';
	    while ($list=mysql_fetch_array($consulta)) {
	    	$pago=$pago+$list['total'];
		      echo '
		        <tr>
		        <td><img src='.$list['imagen'].' style="width:80px;height:80px;"></td>
		        <td>'.$list['marca'].'</td>
		        <td>'.$list['modelo'].'</td>
		        <td>'.$list['cantidad'].'</td>
		        <td>'.$list['precio'].'</td>
		        <td>'.$list['total'].'</td>
		        </tr>';
	    }
  		echo '</table>';
  		echo '<form action="comprar.php" method="post" enctype="multipart/form-data">
				<div class="input-group">
					<h3>Nombre</h3>
					<input type="text" class="form-control" name="nombre"><br>
					<h3>Apellido Paterno</h3>
					<input type="text" class="form-control" name="ap1"><br>
					<h3>Apellido Materno</h3>
					<input type="text" class="form-control" name="ap2"><br>
					<h3>Telefono</h3>
					<input type="number" class="form-control" name="tel"><br>
					<h3>Correo</h3>
					<input type="email" class="form-control" name="email"><br>
					<h3>Dirección</h3>
					<input type="text" class="form-control" name="dir"><br>
					<h3>Total a Pagar</h3>
					<input type="text" class="form-control" name="pagar" value="'.$pago.'" disabled="disabled"><br>
					<input type="text" class="form-control" name="cart" value="'.$_COOKIE['carroCompra'].'" style="display:none;"><br>
				</div>
				<br><input type="submit" class="btn btn-default" value="Registrar">
			</form>';
    }else{
      	echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>No hay elementos en el carrito</strong> Puede ser que haya expirado su carrito o que no haya cargado ningún artículo</div>";
    }
?>
 
