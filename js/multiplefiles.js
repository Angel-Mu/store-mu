var numero = 0; //Esta es una variable de control para mantener nombres
            //diferentes de cada campo creado dinamicamente.
evento = function (evt) {
   return (!evt) ? event : evt;
}
addCampo = function () { 
   nDiv = document.createElement('div');
   nDiv.className = 'archivo';
   nDiv.id = 'file' + (++numero);
   nCampo = document.createElement('input');
   nCampo.name = 'archivos[]';
   nCampo.type = 'file';
   a = document.createElement('a');
   a.name = nDiv.id;
   a.href = '#';
   a.onclick = elimCamp;
   a.innerHTML = 'Eliminar';
   nDiv.appendChild(nCampo);
   nDiv.appendChild(a);
   container = document.getElementById('adjuntos');
   container.appendChild(nDiv);
}
//con esta función eliminamos el campo cuyo link de eliminación sea presionado
elimCamp = function (evt){
   evt = evento(evt);
   nCampo = rObj(evt);
   div = document.getElementById(nCampo.name);
   div.parentNode.removeChild(div);
}
//con esta función recuperamos una instancia del objeto que disparo el evento
rObj = function (evt) { 
   return evt.srcElement ?  evt.srcElement : evt.target;
}