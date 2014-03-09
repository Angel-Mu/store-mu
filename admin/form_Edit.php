<script type="text/javascript" src="../dist/js/ajax.js"></script>
<?php
include ("../controller/conexion.php");

 $id=$_GET['id'];
 $consulta=mysql_query("select * from celular where id_celular = '$id'");
 $reg=mysql_fetch_array($consulta);
?>
<form method="post" enctype="multipart/form-data" method="post">
<div class="input-group">
  <h3>Marca</h3>
  <input type="text" class="form-control" id="marca" value="<?php echo $reg['marca'] ?>"><br>
  <h3>Modelo</h3>
  <input type="text" class="form-control" id="modelo" value="<?php echo $reg['modelo'] ?>"><br>
  <h3>Serie</h3>
  <input type="text" class="form-control" id="serie" value="<?php echo $reg['serie'] ?>"><br>
  <h3>Cantidad</h3>
  <input type="number" class="form-control" id="cantidad" value="<?php echo $reg['stock'] ?>"><br>
  <h3>Precio</h3>
  <input type="number" class="form-control" id="precio" value="<?php echo $reg['precio'] ?>"><br>
  <h3>Descripción</h3>
  <input type="text" class="form-control" id="descripcion" value="<?php echo $reg['descripcion'] ?>"><br>
  <span class="input-group-addon"></span>
</div>
<br><button type="button" class="btn btn-default" onclick="actualizar(<?echo $id ?>);">Actualizar</button>
</form>