<?php
	include ("../controller/conexipn.php");
  $id = $_POST['id'];
  $marca = $_POST['ma'];
  $modelo = $_POST['mo'];
  $serie = $_POST['s'];
  $cantidad = $_POST['ca'];
  $precio = $_POST['p'];
  $imagen = $_POST['i'];
  $descripcion = $_POST['d'];
 $consulta = mysql_query("update celular set marca='$ma', modelo='$mo',serie='$s',stock='$ca',precio='$p',imagen='$i',
 descripcion='$d' where id_celular='$id'");
 if($consulta){
	echo "Se actualizó correctamente";
 }else{
	echo "no se actualizó correctamente";
 }
?>