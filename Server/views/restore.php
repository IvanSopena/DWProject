<?php require_once("global/header.php") ?>

<section class="sign-in-page">
    <div class="container">
        <div class="row justify-content-center align-items-center height-self-center">
            <div class="col-lg-5 col-md-12 align-self-center">
                <div class="sign-user_card ">                    
                    <div class="sign-in-page-data">
                        <div class="sign-in-from w-100 m-auto">
                            <h3 class="mb-3 text-center">Renovar Contraseña</h3>
                            <p class="text-body">Introduce tu dirección de correo electronico y te enviaremos instrucciones para reestablecer tu contraseña.</p>
                            <form class="mt-4" action="/DWProject/change_pass" method="POST">
                                <div class="form-group">                                 
                                    <input type="email" class="form-control mb-0" name="email" id="Email" placeholder="Email" autocomplete="off" required>
                                </div>                           
                                <div class="sign-info">
                                    <button type="submit" class="btn btn-hover">Enviar</button>                                                            
                                </div>                                       
                            </form>
                        </div>
                    </div>                    
                </div>
                <?php
                    if (isset($GLOBALS['error'])) 
                    { 
                    
                        echo " <script>
                                       toastr.".$GLOBALS['type']."('".$GLOBALS['error']."','STREAMING MOVIES',{
                                          'closeButton': true,
                                          'preventDuplicates': false,
                                          'progressBar': false,
                                          'positionClass': 'toast-bottom-full-width'
                                    });
                                 </script>";
                                 
                        $GLOBALS['error'] = "";
                    }

                ?>              
            </div>
        </div>

    </div>
</section>

<?php require_once("global/footer.php") ?>

</body>

</html>