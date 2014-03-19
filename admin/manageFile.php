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
	$fp=fopen("bitacora.txt","r");
    if(!$fp){
      echo "No se abrir el archivo";
    }else{
      $i=0;
      $cad="{registro[{";
      while(!feof($fp)) {
        $linea = fgets($fp);
        $i++;
        if($i==1){
        	continue;
        }
        if(strlen($linea)!=0){
        	if($i>2){
        		$cad=$cad.",{";
        	}
        	$splitLine=explode("\t",$linea);
	        $cad=$cad."\"fecha\":\"".$splitLine[0]."\",";
	        $cad=$cad."\"hora\":\"".$splitLine[1]."\",";
	        $cad=$cad."\"tablas\":\"".$splitLine[2]."\",";
	        $cad=$cad."\"operacion\":\"".$splitLine[3]."\",";
	        $cad=$cad."\"usuario\":\"".$splitLine[4]."\"";
	        $cad=$cad."}";
        }else{
        	continue;
        }
        
        
        /*for($j=0;$j<count($splitLine);$j++){
        	if(strlen($splitLine[$j])==0){
        		continue;
        	}
        	echo $splitLine[$j];

        }*/
      }
      $cad=$cad."]}";
      echo $cad;
      if($i==1){
        echo "script alert('No hay registros en Bitácora'); </script>";
      }
      fclose($fp);
  }
?>