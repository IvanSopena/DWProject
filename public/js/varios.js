window.onload = inicializar;

function inicializar() {
    perfil = document.getElementById("thefile");
    if(perfil)
    {
        perfil.addEventListener("change", CambioImagenPerfil, false);
    }
    

     info = document.getElementById("mensaje_perfil");
    if(info)
    {

      /*   if($("#mensaje_perfil").val() != ""){
            LlamarAviso();
        } */
    } 
     

}

function CambioImagenPerfil() {
    var imagenAsubir = perfil.files[0];
    alert("Imagen modificada.");
    document.getElementById("FotoPerfil").src = "/public/img/users/" + imagenAsubir.name;
    
    
}

function vervideo(id){
    var pelicula = id;//document.getElementById("idmovie").value;
    /* alertify.alert(pelicula, function(){
        alertify.message('OK');
      }); */
      window.location.href = "/ver" + "?id=" + pelicula;
}

function addfav(movie,id){
    
    /* alertify.alert(pelicula, function(){
        alertify.message('OK');
      }); */
      window.location.href = "/add_fav" + "?mov=" + movie + "&id=" + id ;
}

function alerta()
{
    
        alertify.confirm("Streaming Movie","¿Estas seguro de que quieres eliminar la suscripción?",
        function(){
            window.location.href = "/close_acount";
        },
        function(){
            
        });
	
}


function LlamarAviso(mensaje,tipo,colocacion,tiempo) {

    //alertify.set('notifier','delay', tiempo);
    //alertify.set('notifier','position', colocacion);

    /* switch (tipo) { 
        case 'error': 
            alertify.error(mensaje); 
            break;
        case 'warning': 
        alertify.warning(mensaje); 
            break;
        case 'success': 
        alertify.success(mensaje); 
            break;		
        case 'info': 
        alertify.notify(mensaje); 
            break;
        
    } */
     toastr.options = { 
        //primeras opciones
        "closeButton": boton,//false, //boton cerrar
        "debug": false,
        "newestOnTop": false, //notificaciones mas nuevas van en la parte superior
        "progressBar": progress, //barra de progreso hasta que se oculta la notificacion
        "preventDuplicates": false, //para prevenir mensajes duplicados
        
        "onclick": null,
        
        //Posición de la notificación
        //toast-bottom-left, toast-bottom-right, toast-bottom-left, toast-top-full-width, toast-top-center
        "positionClass": colocacion,//"toast-top-right",
                
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": tiempo,//"5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
        "tapToDismiss": false
    };
    toastr[tipo](mensaje, titulo); 


}; 

/* $( "#yes" ).click(function() {
    alert( "Handler for .click() called." );
  }); */

$('#password').keyup(function (e) {
    var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
    var mediumRegex = new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
    var enoughRegex = new RegExp("(?=.{6,}).*", "g");
    if (false == enoughRegex.test($(this).val())) {
        $('#passstrength').html('Very weak!');
        $('#password').removeClass();
        $('#password').addClass('border-left-0 Password1 border-md veryweak');
    } else if (strongRegex.test($(this).val())) {
        $('#passstrength').html('Strong!');
        $('#password').removeClass();
        $('#password').addClass('border-left-0 Password1 border-md strong');
    } else if (mediumRegex.test($(this).val())) {
        $('#passstrength').html('Medium!');
        $('#password').removeClass();
        $('#password').addClass('border-left-0 Password1 border-md medium');
    } else {
        $('#passstrength').html('Weak!');
        $('#password').removeClass();
        $('#password').addClass('border-left-0 Password1 border-md weak');
    }
    return true;
});

window.addEventListener("load", function () {
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


   /*  var closesIcon = document.querySelectorAll('.btn clear');

    closesIcon.forEach(function(closeIcon) {
        closeIcon.addEventListener('click', function() {
            this.parentNode.parentNode.classList.add('d-none');
        });
    }); */
});

