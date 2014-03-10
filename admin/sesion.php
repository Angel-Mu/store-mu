<?php
header("Content-Type: text/html;charset=utf-8");
include ('funciones.php');
//usuario y clave pasados por el formulario
$usuario = $_POST['usuario'];
$clave = $_POST['clave'];
//usa la funcion conexiones() que se ubica dentro de funciones.php
if (conexiones($usuario, $clave)){
	//si es valido accedemos a ingreso.php
	echo "<script>alert(\"Bienvenido Administrador\"); location.href=\"admin_CRUD.php\";</script>";
} else {
	//si no es valido volvemos al formulario inicial
	echo "<script>alert(\"Oops! Hubo un problema con su autentificación, pruebe de nuevo por favor.\"); window.history.back();</script>location.href=\"sesion.html\";window.history.back();</script>";
	//echo "<script>alert(\"Sus datos son incorrectos, vuelva a intentarlo por favor.\"); location.href=\"sesion.html\";</script>";
}
?>