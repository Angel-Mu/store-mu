<?php
 include ("../controller/conexion.php");
 //$consulta = mysql_query("insert into celular (marca,modelo,serie,stock,precio,descripcion) values ('$ma','$mo','$s','$ca','$p','$d')");
 //Como no sabemos cuantos archivos van a llegar, iteramos la variable $_FILES
  $ruta="../images/";
  $rutaDB="images/";
  foreach ($_FILES["archivos"] as $key) {
    echo "entra 1";
    if($key['error'] == UPLOAD_ERR_OK ){//Verificamos si se subio correctamente
      echo "entra 2";
      $nombre = $key['name'];//Obtenemos el nombre del archivo
      $temporal = $key['tmp_name']; //Obtenemos el nombre del archivo temporal
      $tamano= ($key['size'] / 1000)."Kb"; //Obtenemos el tamaño en KB
      $ubicacion=($ruta.$nombre);
      $ubicacionDB=($rutaDB.$nombre);
      move_uploaded_file($temporal, $ubicacion); //Movemos el archivo temporal a la ruta especificada
      //El echo es para que lo reciba jquery y lo ponga en el div "cargados"
      echo "
        <div id='subido'>
        <h12><strong>Nombre del archivo: $nombre</strong></h2><br />
        <h12><strong>Tamaño del archivo: $tamano</strong></h2><br />
        <hr>
        </div>
      ";
      

      //$rs = mysql_query("SELECT MAX(id_celular) AS id FROM celular");
      //if ($row = mysql_fetch_row($rs)) {
        //$id = trim($row[0]);
      //}
      $res= mysql_query("insert into celular (marca,modelo,serie,stock,precio,descripcion,imagen) values ('$ma','$mo','$s','$ca','$p','$d','".$ubicacionDB."')");
//      $res= mysql_query("insert into celular (marca,modelo,serie,stock,precio,descripcion,imagen) values ('$ma','$mo','$s','$ca','$p','$d','".$ubicacion."')");
      if($res){
        ?>
        <div class="alert alert-success">El celular se registró correctamente</div>
        <?
      }else{
        ?>
        <div class="alert alert-danger">El celular no se agregó correctamente</div>
        <?
      }
    }else{
      echo $key['error']; //Si no se cargo mostramos el error
    }
  }

?>
 
