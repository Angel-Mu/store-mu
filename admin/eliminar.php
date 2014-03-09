<?php
	include ("../controller/conexion.php");
 mysql_select_db("celulares",$conec);
 $id=$_GET['id'];
 $consulta = mysql_query("delete from celular where id_celular = '$id'");
 if($consulta){
 	echo "Se eliminó correctamente";
 }else{
 	echo "no se eliminó correctamente";
 }
?>