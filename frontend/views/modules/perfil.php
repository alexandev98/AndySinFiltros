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

<!--=====================================
SECCIÓN PERFIL
======================================-->

<div class="container-fluid">

	<div class="container">

		<ul class="nav nav-tabs">
		  
	  		<li class="active">	  			
			  	<a data-toggle="tab" href="#purchases">
			  	<i class="fa fa-list-ul"></i> MIS COMPRAS</a>
	  		</li>

	  		<li >				
	  			<a data-toggle="tab" href="#profile">
	  			<i class="fa fa-user"></i> EDITAR PERFIL</a>
	  		</li>
		
		</ul>

		<div class="tab-content">

            <!--=====================================
			PESTAÑA COMPRAS
			======================================-->

            <div id="purchases" class="tab-pane fade in active">

                <div class="panel-group">

                    <?php

                        $item = "id_user";
                        $value = $_SESSION["id"];

                        $compras = ControllerUsers::showPurchases($item, $value);

                        if(!$compras){

                            echo '

                            <div class="col-xs-12 text-center error404">
				               
                                <h1><small>¡Oops!</small></h1>
                        
                                <h2>Aún no tienes compras realizadas</h2>

				  		    </div>';

                        }else{

                            foreach ($compras as $key => $value1) {

                                $item = "id";
                                $valor = $value1["id_product"];

                                $product = ProductController::showInfoProduct($item, $valor); 
                                
 
                                    echo '
                                
                                    <div class="panel panel-default">
    
                                        <div class="panel-body">
                                        
                                            <div class="col-md-2 col-sm-6 col-xs-12">
    
                                                <figure>
                                                
                                                    <img class="img-thumbnail" src="'.$server.$product["front"].'">
    
                                                </figure>
    
                                            </div>

                                            <div class="col-sm-6 col-xs-12">

												<h1><small>'.$product["title"].'</small></h1>

												<p>'.$product["description"].'</p>';

												if($product["type"] == "virtual"){

													echo '<a href="'.$value1["meeting_url"].'">
														<button class="btn btn-default pull-left">Ir al curso</button>
														</a>';

												}

												echo '<h4 class="pull-right"><small>Comprado el '.substr($value1["date"],0,-8).'</small></h4>
																
											</div>

                                            <div class="col-md-4 col-xs-12">';

											$data = array("idUser"=>$_SESSION["id"],
														  "idProduct"=>$product["id"] );

											$comments = ControllerUsers::showCommentsProfile($data);

												echo '
                                                
                                                <div class="pull-right">

													<a class="qualifyProduct" href="#modalComment" data-toggle="modal" idComment="'.$comments["id"].'">
													
														<button class="btn btn-default backColor">Calificar Producto</button>

													</a>

												</div>

												<br><br>

												<div class="pull-right">

													<h3 class="text-right">';

													if($comments["calification"] == 0 && $comments["comment"] == ""){

														echo '
                                                        <i class="fa fa-star-o text-success" aria-hidden="true"></i>

                                                        <i class="fa fa-star-o text-success" aria-hidden="true"></i>

                                                        <i class="fa fa-star-o text-success" aria-hidden="true"></i>

                                                        <i class="fa fa-star-o text-success" aria-hidden="true"></i>

                                                        <i class="fa fa-star-o text-success" aria-hidden="true"></i>';

													}else{

														switch($comments["calification"]){

															case 0.5:
															echo '
                                                            <i class="fa fa-star-half-o text-success" aria-hidden="true"></i>

                                                            <i class="fa fa-star-o text-success" aria-hidden="true"></i>

                                                            <i class="fa fa-star-o text-success" aria-hidden="true"></i>

                                                            <i class="fa fa-star-o text-success" aria-hidden="true"></i>

                                                            <i class="fa fa-star-o text-success" aria-hidden="true"></i>';
															break;

															case 1.0:

															echo '
                                                            <i class="fa fa-star text-success" aria-hidden="true"></i>

                                                            <i class="fa fa-star-o text-success" aria-hidden="true"></i>

                                                            <i class="fa fa-star-o text-success" aria-hidden="true"></i>

                                                            <i class="fa fa-star-o text-success" aria-hidden="true"></i>

                                                            <i class="fa fa-star-o text-success" aria-hidden="true"></i>';
															break;

															case 1.5:
															echo '
                                                            <i class="fa fa-star text-success" aria-hidden="true"></i>

                                                            <i class="fa fa-star-half-o text-success" aria-hidden="true"></i>

                                                            <i class="fa fa-star-o text-success" aria-hidden="true"></i>

                                                            <i class="fa fa-star-o text-success" aria-hidden="true"></i>

                                                            <i class="fa fa-star-o text-success" aria-hidden="true"></i>';
															break;

															case 2.0:
															echo '
                                                            <i class="fa fa-star text-success" aria-hidden="true"></i>

                                                            <i class="fa fa-star text-success" aria-hidden="true"></i>

                                                            <i class="fa fa-star-o text-success" aria-hidden="true"></i>

                                                            <i class="fa fa-star-o text-success" aria-hidden="true"></i>

                                                            <i class="fa fa-star-o text-success" aria-hidden="true"></i>';
															break;

															case 2.5:
															echo '
                                                            <i class="fa fa-star text-success" aria-hidden="true"></i>

                                                            <i class="fa fa-star text-success" aria-hidden="true"></i>

                                                            <i class="fa fa-star-half-o text-success" aria-hidden="true"></i>

                                                            <i class="fa fa-star-o text-success" aria-hidden="true"></i>

                                                            <i class="fa fa-star-o text-success" aria-hidden="true"></i>';
															break;

															case 3.0:
															echo '
                                                            <i class="fa fa-star text-success" aria-hidden="true"></i>

                                                            <i class="fa fa-star text-success" aria-hidden="true"></i>

                                                            <i class="fa fa-star text-success" aria-hidden="true"></i>

                                                            <i class="fa fa-star-o text-success" aria-hidden="true"></i>

                                                            <i class="fa fa-star-o text-success" aria-hidden="true"></i>';
															break;

															case 3.5:
															echo '
                                                            <i class="fa fa-star text-success" aria-hidden="true"></i>

                                                            <i class="fa fa-star text-success" aria-hidden="true"></i>

                                                            <i class="fa fa-star text-success" aria-hidden="true"></i>

                                                            <i class="fa fa-star-half-o text-success" aria-hidden="true"></i>

                                                            <i class="fa fa-star-o text-success" aria-hidden="true"></i>';
															break;

															case 4.0:
															echo '
                                                            <i class="fa fa-star text-success" aria-hidden="true"></i>

                                                            <i class="fa fa-star text-success" aria-hidden="true"></i>

                                                            <i class="fa fa-star text-success" aria-hidden="true"></i>

                                                            <i class="fa fa-star text-success" aria-hidden="true"></i>

                                                            <i class="fa fa-star-o text-success" aria-hidden="true"></i>';
															break;

															case 4.5:
															echo '
                                                            <i class="fa fa-star text-success" aria-hidden="true"></i>

                                                            <i class="fa fa-star text-success" aria-hidden="true"></i>

                                                            <i class="fa fa-star text-success" aria-hidden="true"></i>

                                                            <i class="fa fa-star text-success" aria-hidden="true"></i>

                                                            <i class="fa fa-star-half-o text-success" aria-hidden="true"></i>';
															break;

															case 5.0:
															echo '
                                                            <i class="fa fa-star text-success" aria-hidden="true"></i>

                                                            <i class="fa fa-star text-success" aria-hidden="true"></i>

                                                            <i class="fa fa-star text-success" aria-hidden="true"></i>

                                                            <i class="fa fa-star text-success" aria-hidden="true"></i>

                                                            <i class="fa fa-star text-success" aria-hidden="true"></i>';
															break;

														}

													}
																
													echo '

                                                    </h3>

													<p class="panel panel-default text-right" style="padding:5px">

														<small>

														'.$comments["comment"].'

														</small>
													
													</p>

												</div>

											</div>
                                            
                                        </div>
            
                                    </div>';
                                
                            }

                        }

                    ?>

                </div>

            </div>

             <!-- TAB PROFILE -->
             <div id="profile" class="tab-pane fade">
                
                <div class="row">

                    <form method="post" enctype="multipart/form-data">

                        <div class="col-md-3 col-sm-4 col-xs-12 text-center">

                            <br>

                            <figure id="imgProfile">
                                <?php
                                    echo '
                                    <input type="hidden" value="'.$_SESSION["id"].'" name="idUser" id="idUser">';
                                    echo '
                                    <input type="hidden" value="'.$_SESSION["password"].'" name="passUser">';
                                    echo '
                                    <input type="hidden" value="'.$_SESSION["photo"].'" name="photoUser" id="photoUser">';
                                    echo '
                                    <input type="hidden" value="'.$_SESSION["email"].'" name="emailUser">';
                                    echo '
                                    <input type="hidden" value="'.$_SESSION["mode"].'" name="modeUser" id="modeUser">';


                                    if($_SESSION["mode"] == "directo"){

                                        if(isset($_SESSION["photo"])){

                                            if($_SESSION["photo"] != ""){
                                            
                                                echo '

                                                <img src="'.$client.$_SESSION["photo"].'" class="img-thumbnail">';
                                        
                                            }else{

                                                echo '

                                                <img src="'.$server.'views/img/users/default/anonymous.png" class="img-thumbnail">';

                                            }
                                            
                                        }

                                    }else{

                                        echo '

                                        <img src="'.$_SESSION["photo"].'" class="img-thumbnail">';
                                        
                                    }

                                ?>

                            </figure>

                            <br>

                            <?php

                                if($_SESSION["mode"] == "directo"){

                                    echo '

                                        <button type="button" class="btn btn-default" id="btnChangePhoto">
									
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

                    <button class="btn btn-danger btn-md pull-right" id="deleteUser">Eliminar cuenta</button>

                    <?php

                        $deleteUser = ControllerUsers::deleteUser();

                    ?>

                </div>

            </div>
            

        </div>

    </div>

</div>



<div  class="modal fade modalForm" id="modalComment" role="dialog">
	
	<div class="modal-content modal-dialog">
		
		<div class="modal-body modalTitle">
			
			<h3 class="backColor">CALIFICA ESTE PRODUCTO</h3>

			<button type="button" class="close" data-dismiss="modal">&times;</button>

			<form method="post" onsubmit="return validateComment()">

				<input type="hidden" value="" id="idComment" name="idComment">
				
				<h1 class="text-center" id="stars">

		       		<i class="fa fa-star text-success" aria-hidden="true"></i>
					<i class="fa fa-star text-success" aria-hidden="true"></i>
					<i class="fa fa-star text-success" aria-hidden="true"></i>
					<i class="fa fa-star text-success" aria-hidden="true"></i>
					<i class="fa fa-star text-success" aria-hidden="true"></i>

				</h1>

				<div class="form-group text-center">

		       		<label class="radio-inline"><input type="radio" name="score" value="0.5">0.5</label>
					<label class="radio-inline"><input type="radio" name="score" value="1.0">1.0</label>
					<label class="radio-inline"><input type="radio" name="score" value="1.5">1.5</label>
					<label class="radio-inline"><input type="radio" name="score" value="2.0">2.0</label>
					<label class="radio-inline"><input type="radio" name="score" value="2.5">2.5</label>
					<label class="radio-inline"><input type="radio" name="score" value="3.0">3.0</label>
					<label class="radio-inline"><input type="radio" name="score" value="3.5">3.5</label>
					<label class="radio-inline"><input type="radio" name="score" value="4.0">4.0</label>
					<label class="radio-inline"><input type="radio" name="score" value="4.5">4.5</label>
					<label class="radio-inline"><input type="radio" name="score" value="5.0" checked>5.0</label>

				</div>

				<div class="form-group">
			  		
			  		<label for="comment" class="text-muted">Tu opinión acerca de este curso: <span><small>(máximo 300 caracteres)</small></span></label>
			  		
			  		<textarea class="form-control" rows="5" id="comment" name="comment" maxlength="300"></textarea>

			  		<br>
					
					<input type="submit" class="btn btn-default backColor btn-block" value="ENVIAR">

				</div>

				<?php

                    $updateComment = ControllerUsers::updateComment();

					

				?>

			</form>

		</div>

		<div class="modal-footer">
      	
      	</div>

	</div>

</div>

