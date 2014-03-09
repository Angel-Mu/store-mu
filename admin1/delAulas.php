<?
	session_start();
    include("../controller/funciones.php");
	if (verificar_user()){
		//si el usuario es verificado, se elimina los valores,se destruye la sesion y volvemos al formulario de ingreso
		$sql="delete from aulas_extra where idaulas_extra='$idaulas'";
		if(!mysql_query($sql)){
			echo "<script>alert('Error al elimniar'); window.history.back();</script>";
		}else{
			echo "<script> location.href='aulasextra.php'; </script>";
		}
	} else {
		//si el usuario no es verificado vuelve al formulario de ingreso
        ?><meta charset="utf-8"><?
        echo "<script>alert('Lo sentimos, debe iniciar sesión para ver este contenido'); location.href='login.html';</script>";
	}
?>