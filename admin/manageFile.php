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

	function cadenaJson(){
		$fp=fopen("bitacora.txt","r");
		$fechas=array();
		$horas=array();
		$operaciones=array();
		$tablas=array();
		$usuarios=array();
	    if(!$fp){
	      echo "No se abrir el archivo";
	    }else{
			$i=0;
			$cad="[{";
			while(!feof($fp)) {
	        	$linea = fgets($fp);
	       		$i++;
	        	if($i==1){
	        		continue;
	        	}
	        	if(strlen($linea)!=0){
	        		$splitLine=explode("\t",$linea);
		        	$fechas[$i-2]=$splitLine[0];
	        		$horas[$i-2]=$splitLine[1];
	        		$tablas[$i-2]=$splitLine[2];
	        		$operaciones[$i-2]=$splitLine[3];
	        		$usuarios[$i-2]=substr($splitLine[4],0,-4);
	        	}
	      	}
	      	for($i=0;$i<count($horas);$i++) {
	      		# code...
	      		echo $horas[$i]."   ";
	      	}
	      	$json = array(
					    'fecha' => $fechas,
					    'hora' => $horas,
					    'operacion' => $operaciones,
					    'tablas' => $tablas,
					    'usuario' => $usuarios
					);
	      	$str_butacorajson = file_get_contents("datos_out.json");
			$objJson = json_decode($str_butacorajson,true);
			echo '
	      		<script>
	      			var tab=document.getElementById("tablaBitacora"); 
			    </script>
	      		';
				for($i=0;$i<count($horas);$i++) {
	      		echo '
	      		<script>
	      			var tr=document.createElement("tr"); 
					var td=document.createElement("td"); 
			    	td.innerHTML = "'.$objJson["fecha"][$i].'";
			    	tr.appendChild(td); 
			    	var td=document.createElement("td"); 
			    	td.innerHTML = "'.$objJson["hora"][$i].'";
			    	tr.appendChild(td); 
			    	var td=document.createElement("td"); 
			    	td.innerHTML = "'.$objJson["tablas"][$i].'";
			    	tr.appendChild(td); 
			    	var td=document.createElement("td"); 
			    	td.innerHTML = "'.$objJson["operacion"][$i].'";
			    	tr.appendChild(td); 
			    	var td=document.createElement("td"); 
			    	td.innerHTML = "'.$objJson["usuario"][$i].'";
			    	tr.appendChild(td); 
					tab.appendChild(tr);
			    </script>
	      		';
	      	}
	      	
			$coded=json_encode($json);
			fclose($fp);
			$fh = fopen("datos_out.json", 'w') or die("Error al abrir fichero de salida");
			fwrite($fh, $coded);
			fclose($fh);
	  	}
	}
?>