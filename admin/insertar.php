<?php
 include ("../controller/conexion.php");

$ma=$_REQUEST['marca'];
$mo=$_REQUEST['modelo'];
$s=$_REQUEST['serie'];
$ca=$_REQUEST['cantidad'];
$p=$_REQUEST['precio'];
$d=$_REQUEST['descripcion'];

$rutaservidor="../images/";
$rutaDB ="images/";

$rutatemporal1=$_FILES['ima1']['tmp_name'];
$nombrearchivo1=$_FILES['ima1']['name'];
$rutadestino1=$rutaservidor.$nombrearchivo1;
$rutadestBD1=$rutaDB.$nombrearchivo1;
move_uploaded_file($rutatemporal1, $rutadestino1);

$rutatemporal2=$_FILES['ima2']['tmp_name'];
$nombrearchivo2=$_FILES['ima2']['name'];
$rutadestino2=$rutaservidor.$nombrearchivo2;
$rutadestBD2=$rutaDB.$nombrearchivo2;
move_uploaded_file($rutatemporal2, $rutadestino2);

$rutatemporal3=$_FILES['ima3']['tmp_name'];
$nombrearchivo3=$_FILES['ima3']['name'];
$rutadestino3=$rutaservidor.$nombrearchivo3;
$rutadestBD3=$rutaDB.$nombrearchivo3;
move_uploaded_file($rutatemporal3, $rutadestino3);

if ($ma==""||$mo==""||$s==""||$ca==""||$p==""||$d==""||$rutadestino1==""||$rutadestino2==""||$rutadestino3==""){
	echo "<script>alert(\"Por favor, ingrese todos los campos.\"); window.history.back();</script>location.href=\"form_Agregar.php\";window.history.back();</script>";
}

$consulta = mysql_query("insert into celular (marca,modelo,serie,stock,precio,descripcion,imagen,imagen2,imagen3) values ('$ma','$mo','$s','$ca','$p','$d','".$rutadestBD1."','".$rutadestBD2."','".$rutadestBD3."')");

if($consulta){
    echo "<script>alert(\"Se ha registrado $ma $mo con exito.\"); location.href=\"admin_CRUD.php\";</script>";
}else{
    echo "<script>alert(\"No se ha registrado $ma $mo con exito.\"); location.href=\"admin_CRUD.php\";</script>";
}
?>
 
