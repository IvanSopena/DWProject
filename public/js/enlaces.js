
//Reconocer las notificaciones
function myFunction(id) {
    var dato = document.getElementById('id_message_'+id).value;
    window.location.href = "/DWproject/read_notifications" + "?id=" + dato;
}

//Busqueda
function viewall(tipo){
    window.location.href = "/DWProject/view_all" + "?id=" + tipo;
}

//Visualizar Video
function vervideo(id){
    var pelicula = id;
      window.location.href = "/DWProject/ver" + "?id=" + pelicula;
}


//Añadir pelicula a favoritos
function addfav(movie,id){
    
      window.location.href = "/DWProject/add_fav" + "?mov=" + movie + "&id=" + id ;
}

//Quitar pelicula a favoritos
function delfav(movie,id){
    
      window.location.href = "/DWProject/del_fav" + "?mov=" + movie + "&id=" + id ;
}

function alerta()
{
        alertify.defaults.theme.ok = "btn btn-primary";
        alertify.defaults.theme.cancel = "btn btn-danger";
        alertify.confirm("Streaming Movie","¿Estas seguro de que quieres eliminar la suscripción?",
        function(){
            window.location.href = "/DWProject/close_acount";
        },
        function(){
            
        });
	
}

$(document).ready( function () {
    // icono para mostrar contraseña
    showPassword = document.querySelector('.show-password');
    showPassword.addEventListener('click', () => {
        // elementos input de tipo clave
        password1 = document.querySelector('.Password1');
       
        if (password1.type === "text") {
            password1.type = "password"
            showPassword.classList.remove('fa-eye-slash');
        } else {
            password1.type = "text"
            showPassword.classList.toggle("fa-eye-slash");
        }
    })
});

