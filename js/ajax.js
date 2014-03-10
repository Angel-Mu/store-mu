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

function buscar_admin(){
	d = document.getElementById('buscador').value;
	c = document.getElementById('resultado');
	e = document.getElementById('filtro').value;
	ajax = crearAjax();
	ajax.open("GET","../admin/buscar.php?d="+d+"&e="+e);
	ajax.onreadystatechange=function(){
		if(ajax.readyState==4){
			c.innerHTML=ajax.responseText;
		}
	}
	ajax.send(null);
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


function insertar(){
	
	c = document.getElementById('resultado');
	ma=document.getElementById('marca').value;
	mo=document.getElementById('modelo').value;
	s=document.getElementById('serie').value;
	ca=document.getElementById('cantidad').value;
	p=document.getElementById('precio').value;
	d=document.getElementById('descripcion').value;
	img=document.getElementById("archivos");
	ajax = crearAjax();
	ajax.open("POST","insertar.php");
	ajax.onreadystatechange=function(){
		if(ajax.readyState==4){
			c.innerHTML=ajax.responseText;
		}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("ma="+ma+"&mo="+mo+"&s="+s+"&ca="+ca+"&p="+p+"&d="+d+"&img="+img);

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

(function(){
    var input = document.getElementById('images'),
        formdata = false;
    
    function mostrarImagenSubida(source){
        var list = document.getElementById('lista-imagenes'),
            li   = document.createElement('li'),
            img  = document.createElement('img');
        
        img.src = source;
        li.appendChild(img);
        list.appendChild(li);
    }
    
    //Revisamos si el navegador soporta el objeto FormData
    if(window.FormData){
        formdata = new FormData();
        document.getElementById('btnSubmit').style.display = 'none';
    }
    
    //Aplicamos la subida de imágenes al evento change del input file
    if(input.addEventListener){
        input.addEventListener('change', function(evt){
            var i = 0, len = this.files.length, img, reader, file;
            
            document.getElementById('response').innerHTML = 'Subiendo...';
            
            //Si hay varias imágenes, las obtenemos una a una
            for( ; i < len; i++){
                file = this.files[i];
                
                //Una pequeña validación para subir imágenes
                if(!!file.type.match(/image.*/)){
                    //Si el navegador soporta el objeto FileReader
                    if(window.FileReader){
                        reader = new FileReader();
                        //Llamamos a este evento cuando la lectura del archivo es completa
                        //Después agregamos la imagen en una lista
                        reader.onloadend = function(e){
                            mostrarImagenSubida(e.target.result);
                        };
                        //Comienza a leer el archivo
                        //Cuando termina el evento onloadend es llamado
                        reader.readAsDataURL(file);
                    }
                    
                    //Si existe una instancia de FormData
                    if(formdata)
                        //Usamos el método append, cuyos parámetros son:
                            //name : El nombre del campo
                            //value: El valor del campo (puede ser de tipo Blob, File e incluso string)
                        formdata.append('images[]', file);
                }
            }
            
            //Por último hacemos uso del método proporcionado por jQuery para hacer la petición ajax
            //Como datos a enviar, el objeto FormData que contiene la información de las imágenes
            if(formdata){
                $.ajax({
                   url : 'insertar.php',
                   type : 'POST',
                   data : formdata,
                   processData : false, 
                   contentType : false, 
                   success : function(res){
                       document.getElementById('response').innerHTML = res;
                   }                
                });
            }
        }, false);
    }
}());