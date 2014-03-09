<?php
	include("funciones.php");
	//usuario y clave pasados por el formulario
	$usuario = $_POST['user'];
	$clave = $_POST['passwd'];
	//usa la funcion conexiones() que se ubica dentro de funciones.php
	if (conexiones($user, $passwd)){
		//si es valido accede al contenido de index
		echo "<script> location.href='../admin/edificios.php';</script>";
	} 
	else {
		//si no es valido volvemos al formulario inicial
		echo "<script>alert('Sus datos son incorrectos, vuelva a intentarlo por favor.'); location.href='../admin/login.html';</script>";
	}
?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	
</body>
</html>