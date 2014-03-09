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
  <div id="adjuntos">
        <!-- Hay que prestar atención a esto, el nombre de este campo debe siempre terminar en []
        como un vector, y ademas debe coincidir con el nombre que se da a los campos nuevos 
        en el script -->
   <input type="file" name="archivos[]" /><br />
   </div>
   <a href="#" onClick="addCampo()">Subir otro archivo</a>
  <span class="input-group-addon"></span>
</div>
<br><button type="button" class="btn btn-default" onclick="insertar();">Registrar</button>
</form>
