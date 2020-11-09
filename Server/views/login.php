<?php require_once("Template/header.php") ?>

<section class="sign-in-page">
   <div class="container">
      <div class="row justify-content-center align-items-center height-self-center">
         <div class="col-lg-5 col-md-12 align-self-center">
            <div class="sign-user_card ">  
           
               <div class="sign-in-page-data">
              
                  <div class="sign-in-from w-100 m-auto">
                  <h3 class="mb-3 text-center">Entrar</h3> 
                  
                     <form class="mt-4" action="/login" method="POST">
                        <div class="form-group">                                 
                           <input type="email" class="form-control mb-0" name="mail_user" id="email" placeholder="Email" autocomplete="off" required>
                        </div>
                        <div class="form-group">                                 
                           <input type="password" class="form-control mb-0" name="pass" id="password" placeholder="Contraseña" required>
                        </div>
                        
                           <div class="sign-info">
                              <button type="submit" class="btn btn-hover">Acceder</button>
                              <!-- <div class="custom-control custom-checkbox d-inline-block">
                                 <input type="checkbox" class="custom-control-input" id="customCheck">
                                 <label class="custom-control-label" for="customCheck">Recuerdame</label>
                              </div>     -->                            
                           </div>                                    
                     </form>
                  </div>
               </div>
               <div class="mt-3">
                  <div class="d-flex justify-content-center links">
                     ¿Todabia no tienes cuenta? <a href="/registro" class="text-primary ml-2">Registrate</a>
                  </div>
                  <div class="d-flex justify-content-center links">
                     <a href="/reset_password" class="f-link">¿Has olvidado tu contraseña?</a>
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