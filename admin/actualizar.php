<?php
include ("controller/conexion.php");
  $id = $_POST['id'];
  $marca = $_POST['ma'];
  $modelo = $_POST['mo'];
  $serie = $_POST['s'];
  $cantidad = $_POST['ca'];
  $precio = $_POST['p'];
  $descripcion = $_POST['d'];
 $consulta = mysql_query("update celular set marca='$ma', modelo='$mo',serie='$s',stock='$ca',precio='$p',descripcion='$d' where id_celular='$id'");
 if($consulta){
 	echo "Se actualizó correctamente";
 }else{
 	echo "no se actualizó correctamente";
 }
?>