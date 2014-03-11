<?php
	header("Content-Type: text/html;charset=utf-8");
 	include ("controller/conexion.php");

	$consultaUser = mysql_query("insert into comprador(nombre,ap_pat,ap_mat,telefono,correo,direccion) values('$nombre','ap1','$ap2',$tel,'$email','$dir');");
    if($consulta){
        echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Se ha removido el artículo</div>";
    }else{
        echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Ocurrió un <strong>ERROR</strong></div>";;
    }  
}
?>
 
