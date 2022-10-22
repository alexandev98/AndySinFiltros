<!-- TOP -->
<?php

    $server=Route::routeServer();
    $client=Route::routeClient();

    //CREATE OBJECT API GOOGLE

    $cliente = new Google_Client();
    $cliente->setAuthConfig('models/client_secret.json');
    $cliente->setAccessType("offline");
    $cliente->setScopes(['profile','email']);

    //LOGIN GOOGLE
    $routeGoogle = $cliente->createAuthUrl();

    if(isset($_GET["code"])){

        $token = $cliente->authenticate($_GET["code"]);

        $_SESSION['id_token_google'] = $token;

        $cliente->setAccessToken($token);

    }

    if($cliente->getAccessToken()){
        
        $item = $cliente->verifyIdToken();

        $datos = array("name"=>$item["name"],
                        "email"=>$item["email"],
                        "photo"=>$item["picture"],
                        "password"=>"null",
                        "mode"=>"google",
                        "verification"=>0,
                        "emailCrypt"=>"null");

        $respuesta = ControllerUsers::registerSocialMedia($datos);

        echo '<script>
            
                setTimeout(function(){

                    window.location = localStorage.getItem("routeCurrent");

                },1000);

             </script>';
    }

    $social = ControllerTemplate::styleTemplate();
     

?>

<div class="container-fluid topBar" id="top" style="background:<?php echo $social["topBar"]?>;">

    <div class="container">

        <div class="row">

            <!--=====================================
			SOCIAL
			======================================-->

            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 social">

                <ul>

                    <?php

                        $jsonSocialMedia = json_decode($social["socialMedia"],true);	

                        foreach ($jsonSocialMedia as $key => $value) {

                            if($value["active"] != 0){

                                echo '

                                <li>

                                    <a href="'.$value["url"].'" target="_blank">

                                        <i class="fa '.$value["network"].' socialNet '.$value["style"].'" aria-hidden="true"></i>

                                    </a>

                                </li>';

                            }
                        }


                    ?>

                </ul>

            </div>

            <!--=====================================
			REGISTER
			======================================-->
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

                                echo '<li>|</li>
                                
                                    <li><a href="'.$client.'perfil">Ver Perfil</a></li>
                                    
                                    <li>|</li>
                                    
                                    <li><a href="'.$client.'salir">Salir</a></li>';

                            
                                
                            }

                            if($_SESSION["mode"] == "facebook"){

                                echo '<li> 
                                        
                                      <img class="img-circle" src="'.$_SESSION["photo"].'" width="10%">

                                      </li>
                                      <li>|</li>
                                        
                                      <li><a href="'.$client.'perfil" style="color:'.$social["topText"].';">Ver Perfil</a></li>
                                        
                                      <li>|</li>
                                        
                                      <li><a href="'.$client.'salir" class="salir" style="color:'.$social["topText"].';">Salir</a></li>';
                            
                            }

                            if($_SESSION["mode"] == "google"){

                                echo '<li> 
                                        
                                      <img class="img-circle" src="'.$_SESSION["photo"].'" width="10%">

                                      </li>
                                      <li>|</li>
                                    
                                      <li><a href="'.$client.'perfil" style="color:'.$social["topText"].';">Ver Perfil</a></li>
                                    
                                      <li>|</li>
                                    
                                      <li><a href="'.$client.'salir" style="color:'.$social["topText"].';">Salir</a></li>';
                            
                            }
                        
                        }
                    }
                    else{

                        echo '<li><a href="#modalIngreso" data-toggle="modal" style="color:'.$social["topText"].';">Ingresar</a></li>

					          <li>|</li>

					          <li><a href="#modalRegistro" data-toggle="modal" style="color:'.$social["topText"].';">Crear una cuenta</a></li>';
                    }

                ?>
				</ul>

			</div>

        </div>

    </div>

</div>

<!--=====================================
HEADER
======================================-->

<header class="container-fluid">

    <div class="container">

        <div class="row" id="header">

            <!--=====================================
			LOGOTIPO
			======================================-->

            <div class="col-lg-3 col-md-3 col-sm-2 col-xs-12" id="logo">

                <a href="<?php echo $client; ?>">
                
                    <img src="<?php echo $server.$social["logo"];?>" class="img-responsive">

                </a>
                
            </div>

            <div class="col-lg-9 col-md-9 col-sm-10 col-xs-12" id="navbar">
                
                <nav class="navbar navbar-default">

                    <div class="container-fluid">

                        <ul class="nav navbar-nav navbar-right">

                            <li><a href="<?php echo $client;?>">Home</a></li>
                            <li><a href="asesorias" >Asesorías</a></li>
                            <li><a href="blog">Blog</a></li>
                            <li><a href="inicio#aboutme"">Sobre mí</a></li>

                        </ul>

                    </div>

                </nav>
                
            </div>

        </div>

    </div>

</header>


<!-- VENTANA MODAL PARA EL REGISTRO -->
<div class="modal fade modalForm" id="modalRegistro" role="dialog">

    <div class="modal-content modal-dialog">

        <div class="modal-body modalTitle">

            <h3 class="backColor" style="background:<?php echo $social["colorBackground"] ?>; color:<?php echo $social["colorText"] ?>;">REGISTRARSE</h3>

            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <!-- FACEBOOK -->
            <div class="col-sm-6 col-xs-12 facebook">

                <p>

                    <i class="fa-brands fa-facebook"></i>

                    Ingreso con Facebook

                </p>

            </div>

            <!-- GOOGLE -->
            <a href="<?php echo $routeGoogle; ?>">

                <div class="col-sm-6 col-xs-12 google">

                    <p>

                        <i class="fa-brands fa-google"></i>

                        Ingreso con Google

                    </p>

                </div>

            </a>

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

                    <input type="submit" class="btn btn-default backColor btn-block" style="background:<?php echo $social["colorBackground"] ?>; color:<?php echo $social["colorText"] ?>;" value="ENVIAR">
        
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

            <h3 class="backColor" style="background:<?php echo $social["colorBackground"] ?>; color:<?php echo $social["colorText"] ?>;">INGRESAR</h3>

            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <!-- FACEBOOK -->
            <div class="col-sm-6 col-xs-12 facebook">

                <p>

                    <i class="fa-brands fa-facebook"></i>

                    Ingreso con Facebook

                </p>

            </div>

            <!-- GOOGLE -->
            <a href="<?php echo $routeGoogle; ?>">

                <div class="col-sm-6 col-xs-12 google">

                    <p>

                        <i class="fa-brands fa-google"></i>

                        Ingreso con Google

                    </p>

                </div>

            </a>

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

                    <input type="submit" class="btn btn-default backColor btn-block btnIngress" style="background:<?php echo $social["colorBackground"] ?>; color:<?php echo $social["colorText"] ?>;" value="ENVIAR">

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

