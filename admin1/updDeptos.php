<?
	session_start();
    include("../controller/funciones.php");
	if (verificar_user()){
		//si el usuario es verificado, se elimina los valores,se destruye la sesion y volvemos al formulario de ingreso
		$sql="update departamentos set nombre='$nombre', info_general='$info', horario_atencion='$horario', idedificio='$edificio' where iddepartamentos=$iddepto";
		if(!mysql_query($sql)){
			echo "<script>alert('Error al actualizar registro'); window.history.back();</script>";
		}else{
			echo "<script> location.href='deptos.php'; </script>";
		}
	} else {
		//si el usuario no es verificado vuelve al formulario de ingreso
        ?><meta charset="utf-8"><?
        echo "<script>alert('Lo sentimos, debe iniciar sesión para ver este contenido'); location.href='login.html';</script>";
	}
?>