<?php
 include ("controller/conexion.php");
    $consulta = mysql_query("insert into carrito (id_carrito,id_celular,cantidad,total) values ('".$_COOKIE['carroCompra']."','$id_celular','$cant','$tot')");
    setcookie("carroCompra", $_COOKIE['carroCompra'], time()+3600);
    if($consulta){
        echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Agregado al carrito con exito</div>";
    }else{
        echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>'>Ocurrió un <strong>ERROR</strong></div>";;
    }  
?>
 
