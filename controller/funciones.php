<?php
	session_start();
	include("conexion.php");
	mysql_query("SET NAMES 'utf8'");
	$consulta1 = "select * from departamentos where idedificio='$id_edificio'";//extraer los datos de departamentos del edificio 
	$deptos = mysql_query($consulta1);
	$consulta2 = "select * from edificio where idedificio='$id_edificio'";
	$edif = mysql_query($consulta2);
	$consulta3= "select * from salon where idedificio='$id_edificio' order by idsalon";
	$salon=mysql_query($consulta3);
	$consulta4="select * from laboratorio where idedificio='$id_edificio' order by idlaboratorio";
	$labs=mysql_query($consulta4);

	function conexiones($user, $passwd) {
		//sentencia sql para consultar el nombre del user
		$sql = "SELECT * FROM `upemorar`.`usuario` WHERE `idusuario`='$user' AND `passwd`='$passwd'";
		//ejecucion de la sentencia anterior
		$ejecutar_sql=mysql_query($sql);
		//si existe inicia una sesion y guarda el nombre del user
		if (mysql_num_rows($ejecutar_sql)!=0){
			//inicio de sesion
			session_start();
			//configurar un elemento usuario dentro del arreglo global $_SESSION
			$_SESSION['user']=$user;
			//retornar verdadero
			return true;
		} else {
			//retornar falso
			return false;
		}
	}
//funcion para verificar que dentro del arreglo global $_SESSION existe el nombre del user
	function verificar_user(){
		//continuar una sesion iniciada
		session_start();
		//comprobar la existencia del user
		if ($_SESSION[user]){
			return true;
		}
	}
?>