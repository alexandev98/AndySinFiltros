<!-- TOP -->

<?php

    $server=Route::routeServer();
    $client=Route::routeClient();

?>

<div class="container-fluid topBar" id="top">
    <div class="container">
        <div class="row">
            <!-- SOCIAL -->
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 social">

                <ul>

                    <li>
                        <a href="http://<!-- .com/and -->ysinfiltros/" target="_blank">
                            <i class="fa fa-facebook socialNet facebookWhite" aria-hidden="true"></i>
                        </a>
                    </li>

                    <li>
                        <a href="http://youtube.com/channel/UCfTNO3OrZLRmFEknyfgWbYA" target="_blank">
                            <i class="fa fa-youtube socialNet youtubeWhite" aria-hidden="true"></i>
                        </a>
                    </li>

                    <li>
                        <a href="http://instagram.com/andysinfiltros/" target="_blank">
                            <i class="fa fa-instagram socialNet instagramWhite" aria-hidden="true"></i>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- REGISTRO -->
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 register">
				
				<ul>

                <?php

                    if(isset($_SESSION["validateSesion"])){

                        if($_SESSION["validateSesion"] == "ok"){

                            if($_SESSION["mode"] == "directo"){

                                if($_SESSION["photo"] != ""){

                                    echo '<li> 
                                    
                                            <img class="img-circle" src="'.$client.$_SESSION["photo"].'" width="10%">

                                         </li>';

                                }else{

                                    echo '<li>
                                    
                                            <img class="img-circle" src="'.$server.'views/img/users/default/anonymous.png" width="10%">
                                    
                                        </li>';
                                }

                                
                            }

                            if($_SESSION["mode"] == "facebook"){

                                echo '<li> 
                                        
                                        <img class="img-circle" src="'.$_SESSION["photo"].'" width="10%">
    
                                      </li>';
                            }
                        }
                        
                        

                        echo '<li>|</li>
                                
                                      <li><a href="'.$client.'perfil">Ver Perfil</a></li>
                                      
                                      <li>|</li>
                                      
                                      <li><a href="'.$client.'salir" class="salir">Salir</a></li>';
                    }
                    else{

                        echo '<li><a href="#modalIngreso" data-toggle="modal">Ingresar</a></li>
					          <li>|</li>
					          <li><a href="#modalRegistro" data-toggle="modal">Crear una cuenta</a></li>';

                    }

                ?>
					
					

				</ul>

			</div>

        </div>
    </div>
</div>

<!-- HEADER -->

<header class="container-fluid">
    <div class="container">
        <div class="row" id="header">

            <!-- LOGO -->

            <div class="col-xs-12" id="logo">

                <a href="<?php echo $client; ?>">
                
                    <img src="<?php echo $server;?>views/img/template/andy.jpeg" class="img-responsive">

                </a>
                
            </div>

        </div>

    </div>

</header>


<!-- VENTANA MODAL PARA EL REGISTRO -->
<div class="modal fade modalForm" id="modalRegistro" role="dialog">

    <div class="modal-content modal-dialog">

        <div class="modal-body modalTitle">
            <h3 class="backColor">REGISTRARSE</h3>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <!-- FACEBOOK -->
            <div class="col-sm-6 col-xs-12 facebook">
                <p>
                    <i class="fa fa-facebook"></i>
                    Registro con Facebook
                </p>
            </div>

            <!-- GOOGLE -->
            <div class="col-sm-6 col-xs-12 google">
                <p>
                    <i class="fa fa-google"></i>
                    Registro con Google
                </p>
            </div>

            <!-- FORM -->

            <form method="post" onsubmit="return registerUser()">

                <hr>

                    <div class="form-group">

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-user"></i>
                            </span>

                            <input type="text" class="form-control" id="regUser" name="regUser" placeHolder="Nombre Completo" required>
                        </div>

                    </div>

                    <div class="form-group">

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-envelope"></i>
                            </span>

                            <input type="email" class="form-control" id="regEmail" name="regEmail" placeHolder="Correo Electrónico" required>
                        </div>

                    </div>

                    <div class="form-group">

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-lock"></i>
                            </span>

                            <input type="password" class="form-control" id="regPassword" name="regPassword" placeHolder="Contraseña" required>
                        </div>

                    </div>

                    <div class="checkBox">
                        <label>
                            <input id="regPolicies" type="checkbox">
                                <small>
                                    Al registrarse, usted acepta nuestras condiciones de uso y politicas de privacidad
                                </small>
                        </label>
                    </div>

                    <?php

                        $register = new ControllerUsers();
                        $register -> ctrRegisterUser();


                    ?>

                    <input type="submit" class="btn btn-default backColor btn-block" value="ENVIAR">
        
            </form>
           
        </div>

        <div class="modal-footer">
            ¿Ya tienes una cuenta registrada? | <strong><a href="#modalIngreso" data-dismiss="modal" data-toggle="modal">Ingresar</a></strong>
        </div>

    </div>

</div>


<!-- VENTANA MODAL PARA EL INGRESO -->
<div class="modal fade modalForm" id="modalIngreso" role="dialog">

    <div class="modal-content modal-dialog">

        <div class="modal-body modalTitle">

            <h3 class="backColor">INGRESAR</h3>

            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <!-- FACEBOOK -->
            <div class="col-sm-6 col-xs-12 facebook">
                <p>
                    <i class="fa fa-facebook"></i>
                    Ingreso con Facebook
                </p>
            </div>

            <!-- GOOGLE -->
            <div class="col-sm-6 col-xs-12 google">
                <p>
                    <i class="fa fa-google"></i>
                    Ingreso con Google
                </p>
            </div>

            <!-- FORM -->

            <form method="post">

                <hr>

                    <div class="form-group">

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-envelope"></i>
                            </span>

                            <input type="email" class="form-control" id="ingEmail" name="ingEmail" placeHolder="Correo Electrónico" required>
                        </div>

                    </div>

                    <div class="form-group">

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-lock"></i>
                            </span>

                            <input type="password" class="form-control" id="ingPassword" name="ingPassword" placeHolder="Contraseña" required>
                        </div>

                    </div>

                    <?php

                        $ingreso = new ControllerUsers();
                        $ingreso -> ingressUser();


                    ?>

                    <input type="submit" class="btn btn-default backColor btn-block btnIngress" value="ENVIAR">

                    <br>

                    <center>
                        
                        <a href="#modalPassword" data-dismiss="modal" data-toggle="modal">¿Olvidaste tu contraseña?</a>

                    </center>
        
            </form>
           
        </div>

        <div class="modal-footer">
            ¿No tienes una cuenta registrada? | <strong><a href="#modalRegistro" data-dismiss="modal" data-toggle="modal">Registrarse</a></strong>
        </div>

    </div>

</div>


<!-- VENTANA MODAL PARA OLVIDO DE CONTRASEÑA -->
<div class="modal fade modalForm" id="modalPassword" role="dialog">

    <div class="modal-content modal-dialog">

        <div class="modal-body modalTitle">

            <h3 class="backColor">SOLICITUD DE NUEVA CONTRASEÑA</h3>

            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <!-- FORM -->

            <form method="post">

                <label class="text-muted">Escribe el correo electrónico con el que estás registrado y te enviaremos una nueva contraseña</label>
             

                    <div class="form-group">

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-envelope"></i>
                            </span>

                           <input type="email" class="form-control" id="passEmail" name="passEmail" placeHolder="Correo Electrónico" required>
                        </div>

                    </div>

                    <?php

                        $password = new ControllerUsers();
                        $password -> olvidoPassword();

                    ?>

                    <input type="submit" class="btn btn-default backColor btn-block btnIngress" value="ENVIAR">
        
            </form>
           
        </div>

        <div class="modal-footer">
            ¿No tienes una cuenta registrada? | <strong><a href="#modalRegistro" data-dismiss="modal" data-toggle="modal">Registrarse</a></strong>
        </div>

    </div>

</div>

