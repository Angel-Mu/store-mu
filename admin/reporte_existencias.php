<?
header("Content-Type: text/html;charset=utf-8");
	include("../class.ezpdf.php");
	include ("../controller/conexion.php");
	$pdf =& new Cezpdf('a4');
	$pdf->selectFont('../fonts/courier.afm');
	$pdf->ezSetCmMargins(1,1,1.5,1.5);


	#$queEmp = "SELECT id_entrada, Nombre, entradas.cantidad, entradas.fecha_alta from catalogo inner join items on (catalogo.id_prod=items.id_prod) inner join entradas on (items.id_item=entradas.id_item);";
	$queEmp = "select id_celular,marca, modelo, serie, stock, precio, descripcion from celular where stock < 15";
	mysql_query("SET NAMES 'utf8'");
	$resEmp = mysql_query($queEmp) or die(mysql_error());
	$totEmp = mysql_num_rows($resEmp);

	$ixx = 0;
	while($datatmp = mysql_fetch_assoc($resEmp)) {
	    $ixx = $ixx+1;
	    $data[] = array_merge($datatmp, array('id'=>$ixx));
	}
	$titles = array(
					'id_celular'=>'<b>id</b>',
					'marca'=>'<b>Marca</b>',
	                'modelo'=>'<b>Modelo</b>',
	                'serie'=>'<b>Serie</b>',
	                'stock'=>'<b>Existencia</b>',
	                'precio'=>'<b>Precio</b>',
	                'descripcion'=>'<b>Descripcion</b>',
	            );
	$options = array(
	                'shadeCol'=>array(0.9,0.9,0.9),
	                'xOrientation'=>'center',
	                'width'=>500
	     );

$txttit = "<b>SmartphoNeate</b>\n";
$txttit.= "Reporte de artículos con baja existencia.\n";
$pdf->ezText($txttit, 12);
$pdf->ezTable($data, $titles, '', $options);
$pdf->ezText("\n\n\n", 10);
$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 10);
$pdf->ezText("<b>Hora:</b> ".date("H:i:s")."\n\n", 10);
ob_end_clean();
$pdf->ezStream();
?>