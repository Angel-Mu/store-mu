<?php
 	include ("controller/conexion.php");
    $consulta = mysql_query("delete from carrito where id_carrito='".$_COOKIE['carroCompra']."';");
    
    if($consulta){
        echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Se ha eliminado todo el contenido del carrito</div>";
    }else{
        echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>'>Ocurrió un <strong>ERROR</strong></div>";;
    }
?>
 
