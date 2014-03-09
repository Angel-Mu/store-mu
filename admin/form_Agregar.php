<script type="text/javascript" src="../dist/ajax.js"></script>
<form method="post" enctype="multipart/form-data" method="post">
Marca:<input type="text" id="marca"><br>
Modelo: <input type="text" id="modelo"><br>
Serie: <input type="text" id="serie"><br>
Cantidad: <input type="number" id="cantidad"><br>
Precio: <input type="number" id="precio"><br>

  <input id="archivos" type="file" name="archivos[]" multiple="multiple" onchange="seleccionado();" accept=".jpeg,.jpg,.png" />

<div id="cargados">
  <!-- Aqui van los archivos cargados -->
</div>
<input type="button" onclick="seleccionado();" value="Subir" align="center"><br> 
Descripción: <input type="text" id="descripcion"><br>
<input type="button" onclick="insertar();" value="Registrar"> 
</form>