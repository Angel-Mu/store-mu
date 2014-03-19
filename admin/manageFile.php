<?
	function registrarBitacora($tabla,$operacion,$usuario){
		$fp=fopen("bitacora.txt","a+");
		if(!$fp){
			echo "No se pudo crear el archivo";
		}else{
			date_default_timezone_set('CST');
			$fecha=date("d/M/Y");
			$hora=date("g:i:s A");
			$txt = $fecha."\t".$hora."\t".$tabla."\t".$operacion."\t".$usuario.PHP_EOL;
			$i=0;
			while(!feof($fp)) {
				fgets($fp);
				$i++;
			}
			if($i==1){
				$head="Fecha\t\tHora\t\tTablas\tOperación\tUsuario".PHP_EOL;
				if(!fwrite($fp,$head)){
					echo "No se inserto cabecera";
				}
			}
			if(!fwrite($fp,$txt)){
				echo "no se pudo escribir el contenido";
			}
			fclose($fp);
		}
	}
?>