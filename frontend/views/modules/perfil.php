<?php

$client = Route::routeClient();
$server = Route::routeServer();

if(!isset($_SESSION["validateSesion"])){

    echo '<script>

                window.location = "'.$client.'";

         </script>';

    exit();
}

?>

<!-- BREADCRUMB PROFILE -->
<div class="container-fluid well well-sm">

    <div class="container">

        <div class="row">

            <ul class="breadcrumb text-uppercase fondoBreadcrumb">
                
                <li><a href="<?php echo$client;?>">INICIO</a></li>
                <li class="active pagActive"><?php echo $routes[0]?></li>

            </ul>

        </div>

    </div>

</div>

<!-- SECTION PROFILE -->

<div class="container-fluid">

	<div class="container">

		<ul class="nav nav-tabs">
		  
	  		<li>	  			
			  	<a data-toggle="tab" href="#compras">
			  	<i class="fa fa-list-ul"></i> MIS COMPRAS</a>
	  		</li>

	  		<li class="active">				
	  			<a data-toggle="tab" href="#perfil">
	  			<i class="fa fa-user"></i> EDITAR PERFIL</a>
	  		</li>
		
		</ul>

		<div class="tab-content">

            <!-- TAB COMPRAS -->
            <div id="compras" class="tab-pane fade">
                <h3>HOME</h3>
                <p>Some content.</p>

            </div>

             <!-- TAB PROFILE -->
             <div id="profile" class="tab-pane fade in active">
                
                <div class="row">

                    <form method="post" enctype="multipart/form-data">

                        <div class="col-md-3 col-sm-4 col-xs-12 text-center">

                            <br>

                            <figure id="imgProfile">

                                <?php

                                    echo '<input type="hidden" value="'.$_SESSION["id"].'" name="idUser">';
                                    echo '<input type="hidden" value="'.$_SESSION["password"].'" name="passUser">';
                                    echo '<input type="hidden" value="'.$_SESSION["photo"].'" name="photoUser">';
                                    echo '<input type="hidden" value="'.$_SESSION["email"].'" name="emailUser">';
                                    echo '<input type="hidden" value="'.$_SESSION["mode"].'" name="modeUser">';

                                    if($_SESSION["mode"] == "directo"){

                                        if(isset($_SESSION["photo"])){

                                            if($_SESSION["photo"] != ""){
                                            
                                                echo '<img src="'.$client.$_SESSION["photo"].'" class="img-thumbnail">';
                                        
                                            }else{

                                                echo '<img src="'.$server.'views/img/users/default/anonymous.png" class="img-thumbnail">';

                                            }
                                            
                                        }

                                    }else{

                                        echo '<img src="'.$_SESSION["photo"].'" class="img-thumbnail">';
                                        
                                    }

                                ?>

                            </figure>

                            <br>

                            <?php

                                if($_SESSION["mode"] == "directo"){

                                    echo '<button type="button" class="btn btn-default" id="btnChangePhoto">
									
                                        Cambiar foto de perfil
                                        
                                        </button>';

                                }
                                
                            ?>

                            <div id="uploadImage">
								
								<input type="file" class="form-control" id="dataImage" name="dataImage">

								<img class="prev">

							</div>

                        </div>

                        <?php

                            $updateProfile = ControllerUsers::updateProfile();

                        ?>

                        <div class="col-md-9 col-sm-8 col-xs-12">

                        <br>

                            <?php
                            
                                if($_SESSION["mode"] != "directo"){

                                    echo '
                                    
                                    <label class="control-label text-muted text-uppercase">Nombre:</label>
									
									<div class="input-group">
								
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input type="text" class="form-control"  value="'.$_SESSION["name"].'" readonly>

									</div>

									<br>

									<label class="control-label text-muted text-uppercase">Correo electrónico:</label>
									
									<div class="input-group">
								
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input type="text" class="form-control"  value="'.$_SESSION["email"].'" readonly>

									</div>

									<br>

									<label class="control-label text-muted text-uppercase">Modo de registro en el sistema:</label>
									
									<div class="input-group">
								
										<span class="input-group-addon"><i class="fa fa-'.$_SESSION["mode"].'"></i></span>
										<input type="text" class="form-control text-uppercase"  value="'.$_SESSION["mode"].'" readonly>

									</div>

									<br>';
		

                                }else{

                                    echo '
                                    
                                    <label class="control-label text-muted text-uppercase" for="editName">Cambiar Nombre:</label>
									
                                    <div class="input-group">
                                
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input type="text" class="form-control" id="editName" name="editName" value="'.$_SESSION["name"].'">

                                    </div>

                                    <br>

                                    <label class="control-label text-muted text-uppercase" for="editEmail">Correo Electrónico:</label>

                                    <div class="input-group">
                                    
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                            <input type="text" class="form-control"  value="'.$_SESSION["email"].'" readonly>

                                        </div>

                                    <br>

                                    <label class="control-label text-muted text-uppercase" for="editPassword">Cambiar Contraseña:</label>

                                    <div class="input-group">
                                    
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                            <input type="text" class="form-control" id="editPassword" name="editPassword" placeholder="Escribe la nueva contraseña">

                                        </div>

                                    <br>

                                    <button type="submit" class="btn btn-default backColor btn-md pull-left">Actualizar Datos</button>';

                                }

                            ?>

                        </div>
                    </form>

                    <button class="btn btn-danger btn-md pull-right" id="eliminarUsuario">Eliminar cuenta</button>

                </div>

            </div>
            

        </div>

    </div>

</div>

