<?php
	include ("../controller/conexion.php");
 echo $marca = $_POST['ma'];
 echo $modelo = $_POST['mo'];
 echo $serie = $_POST['s'];
 echo $cantidad = $_POST['ca'];
 echo $precio = $_POST['p'];
 echo $imagen = $_POST['i'];
 echo $descripcion = $_POST['d'];
 echo " ";
 $consulta = mysql_query("insert into celular (marca,modelo,serie,stock,precio,imagen,descripcion) values ('$ma','$mo','$s','$ca','$p','$i','$d')");
 if($consulta){
 	echo "Se ingreso correctamente";
 }else{
 	echo "no se ingresó correctamente";
 }
?>