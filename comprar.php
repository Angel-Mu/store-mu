<?php
	header("Content-Type: text/html;charset=utf-8");
 	include ("controller/conexion.php");
	$insertUser = mysql_query("insert into comprador(nombre,ap_pat,ap_mat,telefono,correo,direccion) values('$nombre','$ap1','$ap2',$tel,'$email','$dir');");
    if(!$insertUser){
    	echo "ERROR al insertar comprador";
    }
    $consUser = mysql_query("select * from comprador order by id_comprador DESC;");
    $user=mysql_fetch_array($consUser);
    $idComprador=$user['id_comprador'];
    $insertCompra = mysql_query("insert into ticket(id_comprador,id_carrito,total_pago) values($idComprador,$cart,$cant_pagar);");
    if(!$insertCompra){
    	echo "ERROR al insertar ticket";
    }
    $consCarro = mysql_query("select * from carrito where id_carrito='".$cart."';");
    while($lstCar=mysql_fetch_array($consCarro)){
    	echo $lstCar['cantidad']." ".$lstCar['id_carrito'];
    	$actStock=mysql_query("update celular set stock=stock-".$lstCar['cantidad']." where id_celular=".$lstCar['id_celular']);
    	if(!$actStock){
	    	echo "ERROR al actualizar";
	    }
    }
?>
 
