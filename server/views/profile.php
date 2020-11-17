<?php 
require_once("Template/header.php"); 
require_once('server/models/ActionUsers.php'); ?>
<body >

<?php 
require_once("Template/navigation.php"); 
 ?>

<section class="m-profile setting-wrapper">        
        <div class="container">
            <h4 class="main-title mb-4">Información de la cuenta</h4>
            <div class="row">
                <div class="col-lg-4 mb-3">
                    <div class="sign-user_card text-center">
                        <img src=<?php echo "/public/img/users/". $GLOBALS['sq']->getfoto(); ?> class="rounded-circle img-fluid d-block mx-auto mb-3" alt="user">
                        <h4 class="mb-3"><?php echo $GLOBALS['sq']->getMRealUserName(); ?></h4>
                       
                        <a href="#" class="edit-icon text-primary">Editar</a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="sign-user_card">
                        <h5 class="mb-3 pb-3 a-border">Datos Personales</h5>
                        <div class="row align-items-center justify-content-between mb-3">
                            <div class="col-md-8">
                                <span class="text-light font-size-13">Nombre</span>
                                <p class="mb-0"><?php echo $GLOBALS['sq']->getMRealUserName(); ?></p>
                            </div>   
                            <div class="col-md-4 text-md-right text-left">                      
                                <a href="#" class="text-primary">Cambiar</a>
                            </div>
                        </div>
                        <div class="row align-items-center justify-content-between mb-3">
                            <div class="col-md-8">
                                <span class="text-light font-size-13">Apellidos</span>
                                <p class="mb-0"><?php echo $GLOBALS['sq']->getMRealUserName(); ?></p>
                            </div>   
                            <div class="col-md-4 text-md-right text-left">                      
                                <a href="#" class="text-primary">Cambiar</a>
                            </div>
                        </div>
                        <div class="row align-items-center justify-content-between mb-3">
                            <div class="col-md-8">
                                <span class="text-light font-size-13">Email</span>
                                <p class="mb-0"><?php echo $GLOBALS['sq']->getMAppUserName(); ?></p>
                            </div>   
                            <div class="col-md-4 text-md-right text-left">                      
                                <a href="#" class="text-primary">Cambiar</a>
                            </div>
                        </div>
                        <div class="row align-items-center justify-content-between mb-3">
                            <div class="col-md-8">
                                <span class="text-light font-size-13">Password</span>
                                <p class="mb-0"><?php echo $GLOBALS['sq']->getMAppUserPwd(); ?></p>
                            </div>
                            <div class="col-md-4 text-md-right text-left">
                                <a href="#" class="text-primary">Cambiar</a>
                                <br>
                                <a href="#" class="text-primary">Ver Password</a>
                            </div>
                           
                        </div>
                        <div class="row align-items-center justify-content-between mb-3">
                            <div class="col-md-8">
                                <span class="text-light font-size-13">Fecha de Nacimiento</span>
                                <p class="mb-0">08-03-1995</p>
                            </div>
                            <div class="col-md-4 text-md-right text-left">
                                <a href="#" class="text-primary">Cambiar</a>
                            </div>
                        </div>
                        <div class="row align-items-center justify-content-between">
                            <div class="col-md-8">
                                <span class="text-light font-size-13">Pais</span>
                                <p class="mb-0">España</p>
                            </div>
                            <div class="col-md-4 text-md-right text-left">
                                <a href="#" class="text-primary">Cambiar</a>
                            </div>
                        </div>
                        <h5 class="mb-3 mt-4 pb-3 a-border">Detalles de Pago</h5>
                        <div class="row justify-content-between mb-3">
                            <div class="col-md-8 r-mb-15">
                                <p>Tu proximo pago es:  19 September 2020.</p>
                                <a href="#" class="btn btn-hover">Cancelar Suscripción</a>
                            </div>
                           
                        </div>
                        <h5 class="mb-3 mt-4 pb-3 a-border">Detalles del Plan</h5>
                        <div class="row justify-content-between mb-3">
                            <div class="col-md-8">
                                <p>Premium</p>                                
                            </div>
                            <div class="col-md-4 text-md-right text-left">
                                <a href="pricing-plan.html" class="text-primary">Cambiar de Plan</a>
                            </div>
                        </div>
                        <h5 class="mb-3 pb-3 mt-4 a-border">Opciones</h5>
                        <div class="row">
                            <div class="col-12 setting">
                                <a href="#" class="text-body d-block mb-1">Ver la actividad reciente</a>
                                <a href="#" class="text-body d-block mb-1">Cerrar sesión en todos los dispositivos </a>
                                
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




<?php require_once("Template/footernavigation.php"); ?>
      <?php require_once("Template/footer.php"); ?>
   </body>


</html>