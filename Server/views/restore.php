<?php require_once("Template/header.php") ?>

<section class="sign-in-page">
   <div class="container">
      <div class="row justify-content-center align-items-center height-self-center">
         <div class="col-lg-5 col-md-12 align-self-center">
            <div class="sign-user_card ">                    
               <div class="sign-in-page-data">
                  <div class="sign-in-from w-100 m-auto">
                     <h3 class="mb-3 text-center">Renovar Contraseña</h3>
                     <p class="text-body">Introduce tu dirección de correo electronico y te enviaremos instrucciones para reestablecer tu contraseña.</p>
                     <form class="mt-4" action="">
                        <div class="form-group">                                 
                           <input type="email" class="form-control mb-0" id="exampleInputEmail2" placeholder="Email" autocomplete="off" required>
                        </div>                           
                        <div class="sign-info">
                           <button type="submit" class="btn btn-hover">Enviar</button>                                                            
                        </div>                                       
                     </form>
                  </div>
               </div>                    
            </div>
         </div>
      </div>

   </div>
</section>

<?php require_once("Template/footer.php") ?>

</body>

</html>