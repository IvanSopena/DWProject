<?php require_once("Template/header.php") ?>

<body>


<section class="sign-in-page">
   <div class="container">
      <div class="row justify-content-center align-items-center height-self-center">
         <div class="col-lg-5 col-md-12 align-self-center">
            <div class="sign-user_card ">                    
               <div class="sign-in-page-data">
                  <div class="sign-in-from w-100 m-auto">
                     <h3 class="mb-3 text-center">Registro</h3>
                     <form class="mt-4" action="/registrar" method="POST">
                        <div class="form-group">                                 
                           <input type="text" class="form-control mb-0" name="Nombre" id="Nombre" placeholder="Nombre" autocomplete="off" required>
                        </div>
                        <div class="form-group">                                 
                           <input type="text" class="form-control mb-0" name="Apellidos" id="Apellidos" placeholder="Apellidos" autocomplete="off" required>
                        </div>
                        <div class="form-group">                                 
                           <input type="email" class="form-control mb-0" name="Email" id="Email" placeholder="Email" autocomplete="off" required>
                        </div>
                        <div class="form-group">                                 
                           <input type="password" class="form-control mb-0" name="password" id="password" placeholder="Contraseña" required>
                        </div>
                        <div class="form-group">                                 
                           <input type="password" class="form-control mb-0" name="verifica" id="verifica" placeholder="Verificar Contraseña" required>
                        </div>    
                        <div class="custom-control custom-checkbox mb-3">
                           <input type="checkbox" class="custom-control-input" name="chcek" id="chcek" value="">
                           <label class="custom-control-label" for="chcek">Acepto <a href="#" class="text-primary"> Terminos y Condiciones</a></label>
                        </div>                      
                           
                        <button type="submit" class="btn btn-hover">Registrarse</button>
                                                            
                     </form>
                  </div>
               </div>    
               <div class="mt-3">
                  <div class="d-flex justify-content-center links">
                     ¿Ya tienes cuenta? <a href="/" class="text-primary ml-2">Entrar</a>
                  </div>                        
               </div>
            </div>
            <?php
                    if (isset($GLOBALS['error'])) { //isset nos idica si el valor de la varible que se pasa por paramentro es null o no
                    
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
         </div>
      </div>
   </div>
</section>

<?php require_once("Template/footer.php") ?>

</body>

</html>