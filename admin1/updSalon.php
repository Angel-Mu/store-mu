<?
	session_start();
    include("../controller/funciones.php");
	if (verificar_user()){
		if($_FILES['imgHorario']['name']==""){
			$res=mysql_query("update horario set descripcion='$horario', periodo='$periodo' where idhorario=$id_horario;");
			$res2=mysql_query("update salon set idedificio='$edificio', capacidad=$capacidad where idsalon='$idsalon'");
		}else{
			$rutaservidor="horarios/";
			$rutatemporal=$_FILES['imgHorario']['tmp_name'];
			$nombrearchivo=$_FILES['imgHorario']['name'];
			$rutaImg=$rutaservidor.$nombrearchivo;
			move_uploaded_file($rutatemporal,"../".$rutaImg);
			$res=mysql_query("update horario set descripcion='$horario', periodo='$periodo', imagen='$rutaImg' where idhorario=$id_horario;");
			$res2=mysql_query("update salon set idedificio='$edificio', capacidad=$capacidad where idsalon='$idsalon'");
		}
		if($res && $res2){
			echo "<script> location.href='salones.php?idedificio=$edificio'; </script>";
		}else{
			echo "<script>alert('Error al actualizar registro'); window.history.back();</script>";
		}
	} else {
		//si el usuario no es verificado vuelve al formulario de ingreso
        ?><meta charset="utf-8"><?
        echo "<script>alert('Lo sentimos, debe iniciar sesión para ver este contenido'); location.href='login.html';</script>";
	}
?>