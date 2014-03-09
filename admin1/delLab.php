<?
	session_start();
    include("../controller/funciones.php");
    $_SESSION['idLab']=$_GET['idLab'];
	if (verificar_user()){
		//si el usuario es verificado, se elimina los valores,se destruye la sesion y volvemos al formulario de ingreso
		$sql="delete laboratorio,horario from laboratorio inner join horario on laboratorio.idhorario=horario.idhorario where idlaboratorio=$idLab";
		if(!mysql_query($sql)){
			echo "<script>alert('Error al elimniar'); window.history.back();</script>";
		}else{
			echo "<script> location.href='labs.php'; </script>";
		}
	} else {
		//si el usuario no es verificado vuelve al formulario de ingreso
        ?><meta charset="utf-8"><?
        echo "<script>alert('Lo sentimos, debe iniciar sesión para ver este contenido'); location.href='login.html';</script>";
	}
?>