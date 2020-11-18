window.onload = inicializar;

function inicializar() {
    perfil = document.getElementById("thefile");
    perfil.addEventListener("change", CambioImagenPerfil, false);
}

function CambioImagenPerfil() {
    var imagenAsubir = perfil.files[0];
    alert("Imagen modificada.");
    document.getElementById("FotoPerfil").src = "/public/img/users/" + imagenAsubir.name;
    document.getElementById("NavFoto").src = "/public/img/users/" + imagenAsubir.name;
    
}