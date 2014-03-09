<?
	session_start();
    include("../controller/funciones.php");
	if (verificar_user()){
		//si el usuario es verificado, se elimina los valores,se destruye la sesion y volvemos al formulario de ingreso
		$sql="insert into oficina(nombre,responsable,puesto,info_general,iddepartamentos) values('$nombre','$responsable','$puesto','$info',$depto)";
		if(!mysql_query($sql)){
			echo "<script>alert('Error al insertar oficina'); window.history.back();</script>";
		}else{
			echo "<script> location.href='oficinas.php?id_depto=$depto'; </script>";
		}
	} else {
		//si el usuario no es verificado vuelve al formulario de ingreso
        ?><meta charset="utf-8"><?
        echo "<script>alert('Lo sentimos, debe iniciar sesión para ver este contenido'); location.href='login.html';</script>";
	}
?>