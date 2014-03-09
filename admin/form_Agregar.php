<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="ajax.js"></script>  
</head>
<body>
<form action="insertar.php" method="post" enctype="multipart/form-data">
<div class="input-group">
  <h3>Marca</h3>
  <input type="text" class="form-control" name="marca"><br>
  <h3>Modelo</h3>
  <input type="text" class="form-control" name="modelo"><br>
  <h3>Serie</h3>
  <input type="text" class="form-control" name="serie"><br>
  <h3>Cantidad</h3>
  <input type="number" class="form-control" name="cantidad"><br>
  <h3>Precio</h3>
  <input type="number" class="form-control" name="precio"><br>
  <h3>Descripción</h3>
  <input type="text" class="form-control" name="descripcion"><br>
  <h3>Imagen</h3>
  <input name="ima1" type="file" accept=".jpg,.png,.jpeg, .gif" />
  <h3>Imagen</h3>
  <input name="ima2" type="file" accept=".jpg,.png,.jpeg, .gif" />
  <h3>Imagen</h3>
  <input name="ima3" type="file" accept=".jpg,.png,.jpeg, .gif" />
<br><input type="submit" class="btn btn-default" value="Registrar">
</form>
</body>
</html>
