<?php
header("Content-Type: text/html;charset=utf-8");
include('funciones.php');
include('manageFile.php');
//uso de la funcion verificar_usuario()
if (verificar_usuario()){
	include ("../controller/conexion.php");
 	$id=$_GET['id'];
 	$consulta = mysql_query("delete from celular where id_celular = '$id'");
 	if($consulta){
 		registrarBitacora("celular","Eliminar",$usuario);
 		?><div class="alert alert-success">El celular se eliminó correctamente</div><?
 	}else{
 		?><div class="alert alert-danger">El celular no se eliminó correctamente</div><?
 	}
 } else {
  //si el usuario no es verificado volvera al formulario de ingreso
  ?><head><meta charset="utf-8"><?
  echo "<script>alert(\"Por favor inicie su sesión.\"); location.href=\"../index.php\";</script>";
}
?>