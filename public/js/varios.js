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
    //document.getElementById("NavFoto").src = "/public/img/users/" + imagenAsubir.name;
    
}

function LlamarPregunta(){
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-full-width",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": 0,
        "extendedTimeOut": 0,
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
        "tapToDismiss": false
      }
      toastr["warning"]("<br /><br/> <button type='button' onclick='myFunction()' class='btn clear'>No</button> <button type='button' class='btn clear'>No</button>", "¿Esta seguro de que quiere eliminar la suscripción?");
};

function myFunction() {
    window.toastr.clear();
}; 


function LlamarAviso(titulo,mensaje,boton,tipo,colocacion,tiempo,progress) {
    
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

