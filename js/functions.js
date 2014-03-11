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
	ajax = crearAjax();
	ajax.open("GET","removeItem.php?cont="+contador);
	window.location.href = 'carrito.php';
	c = document.getElementById('resultado');
	ajax.onreadystatechange=function(){
		if(ajax.readyState==4){
			c.innerHTML=ajax.responseText;
		}
	}
	ajax.send(null);
}
function delCart(){
	ajax = crearAjax();
	document.getElementById('resultadosCarrito').style.display='none';
	ajax.open("GET","delCart.php");
	c = document.getElementById('resultado');
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

function agregarCarrito(id,cant,total){
	if(cant==0 && total==0){
		total=document.getElementById('total').value;
		cant=document.getElementById('cant').value;
	}
	
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
function comprar(){
	ajax = crearAjax();
	document.getElementById('resultadosCarrito').style.display='none';
	ajax.open("GET","formularioCompra.php");
	formulario = document.getElementById('resultado');
	ajax.onreadystatechange=function(){
		if(ajax.readyState==4){
			formulario.innerHTML=ajax.responseText;
		}
	}
	ajax.send(null);
}