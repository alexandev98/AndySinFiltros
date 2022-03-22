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
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 registro">
				
				<ul>
					
					<li><a href="#modalIngreso" data-toggle="modal">Ingresar</a></li>
					<li>|</li>
					<li><a href="#modalRegistro" data-toggle="modal">Crear una cuenta</a></li>

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
            <div class="col-sm-6 col-xs-12 facebook" id="btnFacebookRegister">
                <p>
                    <i class="fa fa-facebook"></i>
                    Registro con Facebook
                </p>
            </div>

            <!-- GOOGLE -->
            <div class="col-sm-6 col-xs-12 google" id="btnGoogleRegister">
                <p>
                    <i class="fa fa-google"></i>
                    Registro con Google
                </p>
            </div>

            <!-- FORM -->

            <form method="post" onsubmit="return registroUsuario()">

                <hr>

                    <div class="form-group">

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-user"></i>
                            </span>

                            <input type="text" class="form-control text-uppercase" id="regUsuario" name="regUsuario" placeHolder="Nombre Completo" required>
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
        
            </form>
           
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"></button>
        </div>

    </div>

</div>