function crearAjax(){
	var xmlhttp=false;
	try{
		xmlhttp=new ActiveXObject("Msxml2.XMLHTTTP");
	}catch(el){
		try{
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTTP")
		}catch(e2){
			xmlhttp=false;
		}
	}
	if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
		xmlhttp=new XMLHttpRequest();
	}
	return xmlhttp;
}

function buscar(){
	d = document.getElementById('buscador').value;
	e = document.getElementById('filtro').value;
	c = document.getElementById('resultado');
	ajax = crearAjax();
	ajax.open("GET","buscar.php?d="+d+"&e="+e);
	ajax.onreadystatechange=function(){
		if(ajax.readyState==4){
			c.innerHTML=ajax.responseText;
		}
	}
	ajax.send(null);
}
function delItem(contador){
	c = document.getElementById('resultado');
	ajax = crearAjax();
	ajax.open("GET","removeItem.php?cont="+contador);
	ajax.onreadystatechange=function(){
		if(ajax.readyState==4){
			c.innerHTML=ajax.responseText;
		}
	}
	ajax.send(null);
}
function mostrarDetalles(id){
	c = document.getElementById('resultado');
	document.getElementById('myCarousel').style.display="none";
	document.getElementById('patrocinadores').style.display="none";
	ajax = crearAjax();
	ajax.open("GET","showDetail.php?id="+id);
	ajax.onreadystatechange=function(){
		if(ajax.readyState==4){
			c.innerHTML=ajax.responseText;
		}
	}
	ajax.send(null);
}

function detallesCat(id){
	c = document.getElementById('resultado');
	ajax = crearAjax();
	ajax.open("GET","showDetail.php?id="+id);
	ajax.onreadystatechange=function(){
		if(ajax.readyState==4){
			c.innerHTML=ajax.responseText;
		}
	}
	ajax.send(null);
}
function calcular(cant, prec){
	document.getElementById('total').value=prec*cant;
}
function abrirFormulario(){
	c = document.getElementById('resultado');
	ajax = crearAjax();
	ajax.open("GET","form_Agregar.php");
	ajax.onreadystatechange=function(){
		if(ajax.readyState==4){
			c.innerHTML=ajax.responseText;
		}
	}
	ajax.send(null);
}

function agregarCarrito(id){
	total=document.getElementById('total').value;
	cant=document.getElementById('cant').value;
	c = document.getElementById('resultado');
	ajax = crearAjax();
	ajax.open("POST","addToCart.php?id_celular="+id+"&tot="+total+"&cant="+cant);
	ajax.onreadystatechange=function(){
		if(ajax.readyState==4){
			c.innerHTML=ajax.responseText;
		}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("id_celular="+id+"&tot="+total+"&cant="+cant);
}


function abrirFormularioEditar(id){
	c = document.getElementById('resultado');
	ajax = crearAjax();
	ajax.open("GET","form_Edit.php?id="+id);
	ajax.onreadystatechange=function(){
		if(ajax.readyState==4){
			c.innerHTML=ajax.responseText;
		}
	}
	ajax.send(null);
}


function actualizar(id){
	c = document.getElementById('resultado');
	ma=document.getElementById('marca').value;
	mo=document.getElementById('modelo').value;
	s=document.getElementById('serie').value;
	ca=document.getElementById('cantidad').value;
	p=document.getElementById('precio').value;
	d=document.getElementById('descripcion').value;
	ajax = crearAjax();
	ajax.open("POST","actualizar.php");
	ajax.onreadystatechange=function(){
		if(ajax.readyState==4){
			c.innerHTML=ajax.responseText;
		}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("id="+id+"&ma="+ma+"&mo="+mo+"&s="+s+"&ca="+ca+"&p="+p+"&d="+d);
}

function eliminar(id){
	if(confirm("¿Seguro que desea eliminar este celular?")){
		c = document.getElementById('resultado');
		ajax = crearAjax();
		ajax.open("GET","eliminar.php?id="+id);
		ajax.onreadystatechange=function(){
			if(ajax.readyState==4){
				c.innerHTML=ajax.responseText;
			}
	}
	ajax.send(null);
	}
}

function seleccionado(){
  var archivos = document.getElementById("archivos");//Damos el valor del input tipo file
  var archivo = archivos.files; //Obtenemos el valor del input (los arcchivos) en modo de arreglo

  //El objeto FormData nos permite crear un formulario pasandole clave/valor para poder enviarlo, este tipo de objeto ya tiene la propiedad multipart/form-data para poder subir archivos
  var data = new FormData();

  //Como no sabemos cuantos archivos subira el usuario, iteramos la variable y al
  //objeto de FormData con el metodo "append" le pasamos calve/valor, usamos el indice "i" para
  //que no se repita, si no lo usamos solo tendra el valor de la ultima iteracion
  for(i=0; i<archivo.length; i++){
    data.append('archivo'+i,archivo[i]);
  }

  $.ajax({
    url:'subir.php', //Url a donde la enviaremos
    type:'POST', //Metodo que usaremos
    contentType:false, //Debe estar en false para que pase el objeto sin procesar
    data:data, //Le pasamos el objeto que creamos con los archivos
    processData:false, //Debe estar en false para que JQuery no procese los datos a enviar
    cache:false //Para que el formulario no guarde cache
  }).done(function(msg){
    $("#cargados").append(msg); //Mostrara los archivos cargados en el div con el id "Cargados"
  });
}

