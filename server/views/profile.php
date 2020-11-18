<?php 
    require_once("Template/header.php"); 
    require_once('server/models/ActionUsers.php'); ?>
<body >

<?php 
    require_once("Template/navigation.php"); 
?>

<section class="m-profile setting-wrapper">    
    <form class="mt-4" action="/update_profile" method="POST">    
        <div class="container">
            <h4 class="main-title mb-4">Información de la cuenta</h4>
            <div class="row">
                <div class="col-lg-4 mb-3">
                    <div class="sign-user_card text-center">
                        <img id = "FotoPerfil" src=<?php echo "/public/img/users/". $datos["foto"]; ?> class="rounded-circle img-fluid d-block mx-auto mb-3" alt="user">

                        <h4 class="mb-3"><?php echo $datos["Usuario"]; ?></h4>
                    
                        <input id="thefile" type="file" hidden value="" />
                        <a class="edit-icon text-primary" href="#"><label for="thefile">Editar</label></a>
                       
                    </div>
                    <div class=" sign-user_button text-center" >
                        <a href="#" class="btn btn-hover">Modifica tu Perfil</a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="sign-user_card">
                        <h5 class="mb-3 pb-3 a-border">Datos Personales</h5>
                        <div class="row align-items-center justify-content-between mb-3">
                            <div class="col-md-8">
                                <span class="text-light font-size-18">Nombre</span>
                                <input type="text" class="profile_input" name="name" id="name" value="<?php echo $datos["Nombre"]; ?>" required>
                            </div>     
                        </div>
                        <div class="row align-items-center justify-content-between mb-3">
                            <div class="col-md-8">
                                <span class="text-light font-size-18">Apellidos</span>
                                <input type="text" class="profile_input" name="name" id="name" value="<?php echo $datos["Apellidos"]; ?>" required>
                            </div>    
                        </div>
                        <div class="row align-items-center justify-content-between mb-3">
                            <div class="col-md-8">
                                <span class="text-light font-size-18">Email</span>
                                <input type="text" class="profile_input" name="name" id="name" value="<?php echo $datos["Email"]; ?>" required>
                            </div>    
                        </div>
                        <div class="row align-items-center justify-content-between mb-3">
                            <div class="col-md-8">
                                <span class="text-light font-size-18">Password</span>
                                <input type="password" class="profile_input" name="name" id="name" value=<?php echo $GLOBALS['security']->decrypt($datos["password"], strtoupper($datos["Email"])); ?> required>
                            </div>
                        </div>
                        <div class="row align-items-center justify-content-between mb-3">

                                <div class="col-md-8">
                                    <span class="text-light font-size-18">Fecha de Nacimiento</span>
                                    <input type="text" class="profile_input" name="name" id="name" value="<?php echo $datos["Nacimiento"]; ?>" required>
                                </div>
                              

                        </div>
                        <div class="row align-items-center justify-content-between">                 
                                <div class="col-md-8">
                                    <span class="text-light font-size-18">Pais</span>
                                    <input type="text" class="profile_input" name="name" id="name" value="<?php echo $datos["Pais"]; ?>" required>
                                </div>
                        </div>
                        <h5 class="mb-3 mt-4 pb-3 a-border">Detalles de Pago</h5>
                        <div class="row justify-content-between mb-3">

                        <?php if($datos["ProximoPago"]=== ""){ ?>
                            <div class="col-md-8 r-mb-15">
                                <p> No hay pagos pendientes, una vez seleccione un paln se agregara una fecha de cobro.</p>
                            </div>
                           <?php } else { ?>
                                <div class="col-md-8">
                                    <span class="text-light font-size-13">Fecha de Nacimiento</span>
                                    <p class="mb-0">El siguiente paso se realizara: <?php echo $datos["ProximoPago"]; ?></p>
                                </div>
                            
                           <?php } ?>

                        </div>
                        <h5 class="mb-3 mt-4 pb-3 a-border">Detalles del Plan</h5>
                        <div class="row justify-content-between mb-3">

                        <div style="margin-left:20px;"class="iq-custom-select d-inline-block sea-epi">
                        <select name="cars" class="form-control season-select">
                                    <option value="op1">Basico</option>
                                    <option selected="selected" value="op2">Estandar</option>
                                    <option value="op3">Platino</option>
                                    <option value="op4">Premium</option>
                                </select>
                        </div>
                            
                        </div>
    </form>
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

    <?php
                    if (isset($GLOBALS['error'])) { 
                    
                        switch ($GLOBALS['tipo']) {
                            case 'info':
                                require_once  'Server/views/messages/info.php';
                                break;
                                case 'error':
                                    require_once  'Server/views/messages/error.php';
                                break;
                                case 'warning':
                                    require_once  'Server/views/messages/warning.php';
                                break;
                                case 'ok':
                                    require_once  'Server/views/messages/success.php';
                                break;
                        }
                        
                    }
    ?>                  


<?php require_once("Template/footernavigation.php"); ?>
      <?php require_once("Template/footer.php"); ?>
   </body>


</html>