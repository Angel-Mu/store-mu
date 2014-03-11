<?php
 include ("controller/conexion.php");
 $cont=$_GET['cont'];
    $consulta = mysql_query("delete from carrito where contador=$cont");
    if($consulta){
        echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Se ha removido el artículo</div>";
    }else{
        echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Ocurrió un <strong>ERROR</strong></div>";;
    }  

?>
 
