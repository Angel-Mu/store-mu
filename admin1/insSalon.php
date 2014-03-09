<?
    include("../controller/funciones.php");
	if (verificar_user()){
		//si el usuario es verificado, se elimina los valores,se destruye la sesion y volvemos al formulario de ingreso
		if($_FILES['imgHorario']['name']==""){
			echo "<script>alert ('Ocurrio un Error! Es obligatorio cargar una imgHorario del horario'); window.history.back(); </script>";
		}else{
			$rutaservidor="horarios/";
			$rutatemporal=$_FILES['imgHorario']['tmp_name'];
			$nombrearchivo=$_FILES['imgHorario']['name'];
			$rutaImg=$rutaservidor.$nombrearchivo;
			move_uploaded_file($rutatemporal,"../".$rutaImg);
			$res=mysql_query("insert into horario(periodo,descripcion,imagen) values ('$periodo','$horario','$rutaImg')");
			if($res){
				$res2=mysql_query("select MAX(idhorario) as max from horario");
				$horarioDatos=mysql_fetch_array($res2);
				$res3=mysql_query("insert into salon(idsalon,capacidad,idedificio,idhorario) values('$id_salon','$capacidad','$edificio',".$horarioDatos['max'].");");
				if($res3){
					echo "<script> location.href='salones.php';</script>";
				}else{
					echo "<script> alert('Ocurrio un Error! al insertar salón); window.history.back();</script>";
				}
			}else{
				echo "<script> alert('Ocurrio un Error! al insertar horario'); window.history.back(); </script>";
			}
		}
	} else {
		//si el usuario no es verificado vuelve al formulario de ingreso
        ?><meta charset="utf-8"><?
        echo "<script>alert('Lo sentimos, debe iniciar sesión para ver este contenido'); location.href='login.html';</script>";
	}
?>