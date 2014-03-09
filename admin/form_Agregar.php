<script type="text/javascript" src="../js/ajax.js"></script>
<form method="post">
<div class="input-group">
  <h3>Marca</h3>
  <input type="text" class="form-control" id="marca"><br>
  <h3>Modelo</h3>
  <input type="text" class="form-control" id="modelo"><br>
  <h3>Serie</h3>
  <input type="text" class="form-control" id="serie"><br>
  <h3>Cantidad</h3>
  <input type="number" class="form-control" id="cantidad"><br>
  <h3>Precio</h3>
  <input type="number" class="form-control" id="precio"><br>
  <h3>Descripción</h3>
  <input type="text" class="form-control" id="descripcion"><br>
  <input id="archivos" type="file" name="archivos[]" accept=".jpg,.png,.jpeg, .gif" />
  <span class="input-group-addon"></span>

</div>
<br><button id="btnSubmit" type="button" class="btn btn-default" onclick="insertar();">Registrar</button>
</form>
