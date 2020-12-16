<?php require_once("global/header.php") ?>

<body>

    <section class="sign-in-page">
        <div class="container">
            <div class="row justify-content-center align-items-center height-self-center">
                <div class="col-lg-5 col-md-12 align-self-center">
                    <div class="sign-user_card ">
                        <div class="sign-in-page-data">
                            <div class="sign-in-from w-100 m-auto">
                                <h3 class="mb-3 text-center">Registro</h3>
                                <form id="register_form" class="mt-4" action="/DWProject/registrar" method="POST">
                                    <div class="form-group">
                                        <input type="text" class="form-control mb-0" name="Nombre" id="Nombre"
                                            placeholder="Nombre" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control mb-0" name="Apellidos" id="Apellidos"
                                            placeholder="Apellidos" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control mb-0" name="Email" id="Email"
                                            placeholder="Email" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control mb-0" name="password" id="password"
                                            placeholder="Contraseña">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control mb-0" name="verifica" id="verifica"
                                            placeholder="Verificar Contraseña">
                                    </div>
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" name="chcek" id="chcek"
                                            value="">
                                        <label class="custom-control-label" for="chcek">Acepto <a href="#"
                                                class="text-primary"> Terminos y Condiciones</a></label>
                                    </div>

                                    <div class="g-recaptcha" data-sitekey="<?php echo $GLOBALS["siteKey"] ?>"></div>

                                    <button type="submit" class="btn btn-hover">Registrarse</button>

                                </form>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="d-flex justify-content-center links">
                                ¿Ya tienes cuenta? <a href="/DWProject/" class="text-primary ml-2">Entrar</a>
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