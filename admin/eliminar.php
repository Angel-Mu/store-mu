<?php
 include ("controller/conexion.php");
 $id=$_GET['id'];
 $consulta = mysql_query("delete from celular where id_celular = '$id'");
 $consulta2= mysql_query("delete from imagen where id_celular = '$id'");
 if($consulta && $consulta2){
 	?>
 	<div class="alert alert-success">El celular se eliminó correctamente</div>
 	<?
 }else{
 	?>
 	<div class="alert alert-danger">El celular no se eliminó correctamente</div>
 	<?
 }
?>