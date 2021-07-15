var huerta = document.getElementById('huerta');

function cargarSecciones(){
    var xhr = new XMLHttpRequest();

    xhr.open("GET", "servidor.php", true);
    xhr.onreadystatechange = function() {
        console.log(xhr.readyState);
        if(xhr.readyState == 4 && xhr.status == 200){
            var json = JSON.parse(xhr.responseText);
            var contenido = document.getElementById('contenido');
            contenido.innerHTML = json.fullstack;
        }
    }

    xhr.send();
}

huerta.addEventListener('click', cargarSecciones);