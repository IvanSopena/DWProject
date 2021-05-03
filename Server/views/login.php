<?php require_once("global/header.php") ?>

<section class="sign-in-page">
    <div class="container">
        <div class="row justify-content-center align-items-center height-self-center">
            <div class="col-lg-5 col-md-12 align-self-center">
                <div class="sign-user_card ">  

                    <div class="sign-in-page-data">

                        <div class="sign-in-from w-100 m-auto">
                            <h3 class="mb-3 text-center">Entrar</h3> 

                            <form class="mt-4" action="/DWProject/login" method="POST">
                                <div class="form-group">                                 
                                    <input type="email" class="form-control mb-0" name="email" id="email" placeholder="Email" autocomplete="off" required>
                                </div>
                                <div class="form-group">                                 
                                    <input type="password" class="form-control mb-0 Password1" name="pass" id="pass" placeholder="Contraseña" required>
                                    <span class="fa fa-fw fa-eye password-icon-login show-password"></span>
                                </div>

                                <div class="sign-info">
                                    <button type="submit" class="btn btn-hover">Acceder</button>

                                </div>                                    
                            </form>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="d-flex justify-content-center links">
                            ¿Todabia no tienes cuenta? <a href="/DWProject/registro" class="text-primary ml-2">Registrate</a>
                        </div>
                        <div class="d-flex justify-content-center links">
                            <a href="/DWProject/reset_password" class="f-link">¿Has olvidado tu contraseña?</a>
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