<?
header("Content-Type: text/html;charset=utf-8");
include('funciones.php');
//uso de la funcion verificar_usuario()
if (verificar_usuario()){
	include ("../controller/conexion.php");
  	$id = $_POST['id'];
  	$marca = $_POST['ma'];
	$modelo = $_POST['mo'];
  	$serie = $_POST['s'];
  	$cantidad = $_POST['ca'];
  	$precio = $_POST['p'];
  	$descripcion = $_POST['d'];
 	$consulta = mysql_query("update celular set marca='$ma', modelo='$mo',serie='$s',stock='$ca',precio='$p',descripcion='$d' where id_celular='$id'");
 	if($consulta){
 		?>
 		<div class="alert alert-success">Los datos se actualizaron correctamente</div>
 		<?
 	}else{
 		?>
 		<div class="alert alert-danger">Los datos no se actualizaron correctamente</div>
 		<?
 	}
 } else {
  //si el usuario no es verificado volvera al formulario de ingreso
  ?><head><meta charset="utf-8"><?
  echo "<script>alert(\"Por favor inicie su sesión.\"); location.href=\"../index.php\";</script>";
}
?>