<?
include('funciones.php');
include('datos.php');
//uso de la funcion verificar_usuario()
if (verificar_usuario()){?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>TusTutos.com - Juego</title>
	<style type="text/css">
		@import url("style.css");
	</style>
	<script language="JavaScript" src="js/jquery-1.5.1.min.js"></script>
    <script language="JavaScript" src="js/jquery-ui-1.8.13.custom.min.js"></script>
    <link type="text/css" href="ui-lightness/jquery-ui-1.8.13.custom.css" rel="stylesheet" />
</head>
<body>
<!--META-->
<div class="top_line">
	<script>
		$(function(){<?
		    while($row= mysql_fetch_array($query)) {//se reciben los valores y se almacenan en un arreglo
		        $elementos[]= '"'.$row['titulo'].'"';
		    }
		    $arreglo= implode(", ", $elementos);//junta los valores del array en una sola cadena de texto
		    ?>  
		    var availableTags=new Array(<?php echo $arreglo; ?>);//imprime el arreglo dentro de un array de javascript          
		    $( "#tags" ).autocomplete({     
		        source: availableTags
		    });
		});
    </script>
    <form action="showpost_search.php" method="post" style="float:left; margin:10px;">
	    <input id="tags" name="id" >
	    <link rel="stylesheet" href="css/button.css"/>
	    <input name="Enviar" type="submit" class="button" value="Buscar"><br> 
	<!--<input name="Enviar" type="submit" value="Enviar" /> -->
	</form>
	<img style="width:30px; float:right; padding-top:8px; margin-right:10px;" src="images/fb.png">
	<img style="width:30px; float:right; padding-top:8px; margin-right:10px;" src="images/tw.jpg">
	<div style="width:auto; float:right; color:white; margin-right:10px; padding-top:13px;">Buscanos en Facebook y Twitter</div>
</div>
<div class="page width_doc">
	<div class="banner width_doc">
		<div id="logo">
			<a href="index.php"><img class="logo" src="images/logo.png"></a>
		</div>
		<div id="login">
			<div class="login">
			<div style="float:right;"><img style="width:80px; height:80px;" src=<? if($res['foto']==""){
												echo "images/usr.jpg";
											}else{
												echo $res['foto'];
											}?>>
			</div>
			<div style="float:right; margin-right:10px; margin-top:5px;">
				<span style="float:right; color:white;"><strong><? echo $res['nick']; ?></strong></span><br/>
				<a style="float:right;" href="perfil.php">Mi perfil</a><br/>
				<a style="float:right;" href="salir.php">Cerrar sesion</a>
			</div>
			</div>
		</div>
	</div>
	<div class="menu">
		<ul>
			<li><a href="index.php">Inicio</a></li>
			<li><a href="tutoriales.php">Tutoriales</a></li>
			<li><a href="subirtuto.php">Subir TuTuto</a></li>
			<li><a href="contacto.php">Contacto</a></li>
		</ul>
	</div>
	<div class="contenedor width_doc">
		<div class="contenido">
			<span class="title1">Te invitamos a divertirte</span><br/><br/>
			<span class="parrafo">
				Juego en construcción de niveles haha
			</span><br/><br/>
			<div class="centrar">
				<object type="application/x-shockwave-flash" 
					width="350" height="350" data="images/game.swf">
					<param name="movie" value="images/game.swf" />
					<param name="menu" value="false" />
					<param name="quality" value="high" />
				</object>
			</div>
		</div>
		<div class="post">
			<div class="subtitle">Ultimos tutoriales</div><br/>
			<?
				$i=0;
				$consultaTutos=mysql_query("select * from archivos inner join usuario on usuario.nick=archivos.nick order by id_archivo desc");
				while ($rowPost=mysql_fetch_array($consultaTutos)){ 
					if($i<4){
				        echo "<div class='post_related'>
								<div class='related_img'><img class='related_img' src='".$rowPost['fotodesc']."'></div>
								<div class='related_topic'><a href='showpost.php?idarchivo=".$rowPost['id_archivo']."'>".$rowPost['titulo']."</a></div>
							</div>";
						$i++;
					}else{
						break;
					}
				}
			?>
		</div>
	</div>
	<div class="footer width_doc">
		<span>Todos los derechos reservados &copy </span><br/>
		<span>Marcello Co. 2013</span><br/>
		<span>www.tustutos.com</span><br/>
		<span>Version 2.5 1 link taringa full mega con crack</span><br/>
	</div>
</div>
</body>
</html>
	<?		
	} else {
		//si el usuario no es verificado volvera al formulario de ingreso
		echo "ACCESO DENEGADO";
		?><meta charset="utf-8"><?
		echo "<script> alert('Debes iniciar sesión para jugar'); location.href=\"login.php\";</script>";
	}
?>