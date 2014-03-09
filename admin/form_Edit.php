<script type="text/javascript" src="../dist/jax.js"></script>
<?php
	include ("../controller/conexion.php");	
 $id=$_GET['id'];
 $consulta=mysql_query("select * from celular where id_celular = '$id'");
 $reg=mysql_fetch_array($consulta);
?>
<form method="post" enctype="multipart/form-data" method="post">
Marca:<input type="text" id="marca" value="<?php echo $reg['marca'] ?>"><br>
Modelo: <input type="text" id="modelo" value="<?php echo $reg['modelo'] ?>"><br>
Serie: <input type="text" id="serie" value="<?php echo $reg['serie'] ?>"><br>
Cantidad: <input type="number" id="cantidad" value="<?php echo $reg['stock'] ?>"><br>
Precio: <input type="number" id="precio" value="<?php echo $reg['precio'] ?>"><br>
Imagen: <input type="file" name="imagen" accept=".jpeg,.jpg,.png"><br>
<?
$rutaservidor="images/";
$rutatemporal=$_FILES['imagen']['tmp_name'];
$nombrearchivo=$_FILES['imagen']['name'];
$rutaImagen=$rutaservidor.$nombrearchivo;
move_uploaded_file($rutatemporal,$rutaImagen);
?>
<input type="text" value= "<?php echo $rutaservidor ?>" id="imagen" value="<?php echo $reg['imagen'] ?>">
Descripción: <input type="text" id="descripcion" value="<?php echo $reg['descripcion'] ?>"><br>
<input type="button" onclick="actualizar(<?echo $id ?>);" value="Terminar"> 
</form>