<?php
    $server=Route::routeServer();
    $client = Route::routeClient();
  
?>

<!-- BREADCRUMB INFOPRODUCT -->
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
INFOPRODUCTO
======================================-->
<div class="container-fluid infoproduct">

    <div class="container">

        <div class="row">

            <?php

                $item =  "route";
                $value = $routes[0];
                $infoproduct = ProductController::showInfoProduct($item, $value);

                echo '

                <div class="col-md-5 col-sm-6 col-xs-12">
                    
                    <figure class="view">

                        <img class="img-thumbnail" src="'.$server.$infoproduct["front"].'">
                    
                    </figure>

                </div>';

                
                                    
            ?>

<!--=====================================
PRODUCT
======================================-->

           
            <div class="col-md-7 col-sm-6 col-xs-12">

            
<!--=====================================
COMPARTIR EN REDES SOCIALES
======================================-->

                <div class="col-xs-12">
                    
                    <h6>
                        
                        <a class="dropdown-toggle pull-right text-muted" data-toggle="dropdown" href="">
                            
                            <i class="fa fa-plus"></i> Compartir

                        </a>

                        <ul class="dropdown-menu pull-right shareNet">

                            <li>
                                <p class="btnFacebook">
                                    <i class="fa fa-facebook"></i>
                                    Facebook
                                </p>
                            </li>
                            
                        </ul>

                    </h6>

                </div>

                <div class="clearfix"></div>

<!--=====================================
ESPACIO PARA EL PRODUCTO
======================================-->

            <?php

                echo '
                
                <div class="buyNow" style="display:none">

                    <button class="btn btn-default backColor" idProduct="'.$infoproduct["id"].'"></button>

                    <p class="titleShopCart text-left">'.$infoproduct["title"].'</p>';

                if($infoproduct["offer"] == 0){

                    echo'
                    
                    <input class="itemQuantity" value="1" type="'.$infoproduct["type"].'" price="'.$infoproduct["price"].'" idProduct="'.$infoproduct["id"].'">

                        <p class="subTotal'.$infoproduct["id"].' subtotals">

                            <strong>USD $<span>'.$infoproduct["price"].'</span></strong>

                        </p>

                        <div class="sumSubTotal"><span>'.$infoproduct["price"].'</span></div>';


                }else{

                    echo'
                    
                    <input class="itemQuantity" value="1" type="'.$infoproduct["type"].'" price="'.$infoproduct["offerPrice"].'" idProduct="'.$infoproduct["id"].'">

                        <p class="subTotal'.$infoproduct["id"].' subtotals">

                            <strong>USD $<span>'.$infoproduct["offerPrice"].'</span></strong>

                        </p>

                        <div class="sumSubTotal"><span>'.$infoproduct["offerPrice"].'</span></div>';

                }

                echo '
                
                </div>';

                /*=============================================
                TITULO
                =============================================*/				

                if($infoproduct["offer"] == 0){

                    echo '

                    <h1 class="text-muted text-uppercase">

                        '.$infoproduct["title"].'

                        <br>

                    </h1>';

                }else{

                    echo '

                    <h1 class="text-muted text-uppercase">'.$infoproduct["title"].'

                        <br>

                        <small>
        
                            <span class="label label-warning">'.$infoproduct["discountOffer"].'% off</span> 

                        </small>
                    
                    </h1>';

                    
                }

                /*=============================================
                TITLE
                =============================================*/	

                if($infoproduct["price"] != 0){

                    if($infoproduct["offer"] == 0){

                        echo '

                        <h1 class="text-muted">USD $'.$infoproduct["price"].'</h1>';

                    }else{

                        echo '

                        <h1 class="text-muted">

                            <span>
                            
                                <strong class="offer">USD $'.$infoproduct["price"].'</strong>

                            </span>

                            <span>
                                
                                $'.$infoproduct["offerPrice"].'

                            </span>

                        </h1>';

                    }

                }

                // DESCRIPTION
                echo '
                
                <p>'.$infoproduct["description"].'</p>';

                echo '
                
                <p>'.$infoproduct["description2"].'</p>';

                echo '
                
                <p>'.$infoproduct["description3"].'</p>';

           ?>

				<!-- CARACTERÍSTICAS DEL PRODUCTO -->
				
				<hr>
                
                <div class="form-group row">
                    
                    <?php

                        if($infoproduct["details"] != null){

                            $details = json_decode($infoproduct["details"], true);

                            if($infoproduct["type"] == "virtual"){

                                echo '

                                <div class="col-xs-12">';

                                    foreach ($details["topics"] as $key => $value) {
                                        echo '

                                        <li>

                                            <i style="margin-right:10px" class="fa fa-check-circle"></i> '.$value.'

                                        </li>';
                                    }

                                echo '
                                
                                </div>';

                                
                            }

                        }
                        
                    ?>

                </div>

                <hr>


				<div class="form-group row">

                    <h4 class="col-md-12 col-sm-0 col-xs-0">

                        <span class="label label-default time_zone" style="font-weight:100">

                            <i class="fa fa-video-camera" style="margin-right:5px"></i>
                            Acceso via Zoom Meetings |
                            <i class="fa fa-clock-o" style="margin:0px 5px"></i>
                            2 horas aprox. |
                            <i class="fa fa-globe" style="margin:0px 5px"></i>
                            

                        </span>

                        <hr>

                    </h4>

                    <input type="hidden" name="idProduct" value="<?php echo $infoproduct["id"]; ?>">

                    <div class="col-md-4 col-xs-12">

                        <div class="input-group">
                            <input type="text" class="form-control text-center datetimepicker entrada" placeholder="Fecha de Inicio" autocomplete="off" name="fechaInicio" readonly='true' style="background:white">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        </div>

                    </div>
                    
                    <div class="col-md-3 col-xs-12 seleccionHora" style="display:none;">

                        <div class="input-group">
                            <select class="form-control horaInicio text-center" name="horaInicio">              
                            </select>
                            <span class="input-group-addon" ><i class="fa fa-clock-o"></i></span>
                        </div>

                    </div>

                    <div class="col-md-5 col-xs-12 input-group">

                        <?php

                            if(isset($_SESSION["validateSesion"])){

                                if($_SESSION["validateSesion"] == "ok"){

                                    echo '
                                    
                                    <a class="disponibilidad" id="btnCheckout" data-toggle="modal" idUser="'.$_SESSION["id"].'">

                                            <button class="btn btn-dark btn-block btn-lg backColor">

                                                <small>COMPRAR <br>AHORA</small> 

                                            </button>
                                        
                                    </a>';

                                }

                            }else{

                                echo '

                                <a class="buyNow" href="#modalIngreso" data-toggle="modal">

                                    <button class="btn btn-default btn-block btn-lg backColor">

                                        <small>COMPRAR <br> AHORA</small>
                                        
                                    </button>
                                    
                                </a>';

                            }

                        ?>
                        
                    </div>

				</div>

        </div>
    </div>

            <!-- COMENTARIOS -->
		
            <br>
            
            <div class="row" style="margin-top:20px">

                <?php

                    $data = array("idUser" => "",
                                  "idProduct" => $infoproduct["id"]);

                    $comments = ControllerUsers::showCommentsProfile($data);
                    $quantity = 0;

                    foreach ($comments as $key => $value) {
                        
                        if($value["comment"] != ""){
                            
                            $quantity += 1;

                        }

                    }

                ?>
                
                <ul class="nav nav-tabs">

                    <?php

                        if($quantity == 0){

                            echo '

                            <li class="active"><a>ESTE PRODUCTO NO TIENE COMENTARIOS</a></li>

                            <li></li>';

                        }else{

                            echo ' 
                            <li class="active"><a>COMENTARIOS '.$quantity.'</a></li>

                            <li><a id="showMore" href="">Ver más</a></li>';

                            $sumCalification = 0;
                            $quantityCalification = 0;

                            foreach ($comments as $key => $value){

                                if($value["calification"] != 0){

                                    $quantityCalification += 1;

                                    $sumCalification += $value["calification"];

                                }

                            }

                            $average = round($sumCalification/$quantityCalification,1);

                            echo '
                            
                            <li class="pull-right"><a class="text-muted">PROMEDIO DE CALIFICACIÓN: '.$average.' | ';

                            if($average >= 0 && $average < 0.5){

                                echo '
                                <i class="fa fa-star-half-o text-success"></i>

                                <i class="fa fa-star-o text-success"></i>

                                <i class="fa fa-star-o text-success"></i>

                                <i class="fa fa-star-o text-success"></i>

                                <i class="fa fa-star-o text-success"></i>';

                            }

                            else if($average >= 0.5 && $average < 1){

                                echo '
                                <i class="fa fa-star text-success"></i>

                                <i class="fa fa-star-o text-success"></i>

                                <i class="fa fa-star-o text-success"></i>

                                <i class="fa fa-star-o text-success"></i>

                                <i class="fa fa-star-o text-success"></i>';

                            }

                            else if($average >= 1 && $average < 1.5){

                                echo '
                                <i class="fa fa-star text-success"></i>

                                <i class="fa fa-star-half-o text-success"></i>

                                <i class="fa fa-star-o text-success"></i>

                                <i class="fa fa-star-o text-success"></i>

                                <i class="fa fa-star-o text-success"></i>';

                            }

                            else if($average >= 1.5 && $average < 2){

                                echo '
                                <i class="fa fa-star text-success"></i>

                                <i class="fa fa-star text-success"></i>

                                <i class="fa fa-star-o text-success"></i>

                                <i class="fa fa-star-o text-success"></i>

                                <i class="fa fa-star-o text-success"></i>';

                            }

                            else if($average >= 2 && $average < 2.5){

                                echo '
                                <i class="fa fa-star text-success"></i>

                                <i class="fa fa-star text-success"></i>

                                <i class="fa fa-star-half-o text-success"></i>

                                <i class="fa fa-star-o text-success"></i>

                                <i class="fa fa-star-o text-success"></i>';

                            }

                            else if($average >= 2.5 && $average < 3){

                                echo '
                                <i class="fa fa-star text-success"></i>

                                <i class="fa fa-star text-success"></i>

                                <i class="fa fa-star text-success"></i>

                                <i class="fa fa-star-o text-success"></i>

                                <i class="fa fa-star-o text-success"></i>';

                            }

                            else if($average >= 3 && $average < 3.5){

                                echo '
                                <i class="fa fa-star text-success"></i>

                                <i class="fa fa-star text-success"></i>

                                <i class="fa fa-star text-success"></i>

                                <i class="fa fa-star-half-o text-success"></i>

                                <i class="fa fa-star-o text-success"></i>';

                            }

                            else if($average >= 3.5 && $average < 4){

                                echo '
                                <i class="fa fa-star text-success"></i>

                                <i class="fa fa-star text-success"></i>

                                <i class="fa fa-star text-success"></i>

                                <i class="fa fa-star text-success"></i>

                                <i class="fa fa-star-o text-success"></i>';

                            }

                            else if($average >= 4 && $average < 4.5){

                                echo '
                                <i class="fa fa-star text-success"></i>

                                <i class="fa fa-star text-success"></i>

                                <i class="fa fa-star text-success"></i>

                                <i class="fa fa-star text-success"></i>

                                <i class="fa fa-star-half-o text-success"></i>';

                            }else{

                                echo '
                                <i class="fa fa-star text-success"></i>

                                <i class="fa fa-star text-success"></i>

                                <i class="fa fa-star text-success"></i>

                                <i class="fa fa-star text-success"></i>

                                <i class="fa fa-star text-success"></i>';

                            }
                        }

                    ?>

                </ul>

                <br>

            </div>


            <div class="row comments">

                <?php

                    foreach ($comments as $key => $value) {
                                
                        if($value["comment"] != ""){

                            $item = "id";
                            $valor = $value["id_user"];

                            $user = ControllerUsers::showUser($item, $valor);

                            echo '
                            
                            <div class="panel-group col-md-3 col-sm-6 col-xs-12 heightComments">
                            
                                <div class="panel panel-default">
                                
                                    <div class="panel-heading text-uppercase">

                                        '.$user["name"].'
                                        <span class="text-right">';

                                        if($user["mode"] == "directo"){

                                            if($user["photo"] == ""){

                                                echo '
                                                
                                                <img class="img-circle pull-right" src="'.$server.'views/img/users/default/anonymous.png" width="20%">';	

                                            }else{

                                                echo '
                                                
                                                <img class="img-circle pull-right" src="'.$client.$user["photo"].'" width="20%">';	

                                            }
                                        
                                        }else{

                                            echo '
                                            
                                            <img class="img-circle pull-right" src="'.$user["photo"].'" width="20%">';	

                                        }

                                        echo '
                                        
                                        </span>

                                    </div>
                                
                                    <div class="panel-body"><small>'.$value["comment"].'</small></div>

                                    <div class="panel-footer">';
                                        
                                        switch($value["calification"]){

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

                                    echo '
                                    
                                    </div>
                                
                                </div>

                            </div>';

                        }
                    }

                ?>

            </div>

        </div>

</div>


<!--=====================================
VENTANA MODAL PARA CHECKOUT
======================================-->

<div id="modalBuyNow" class="modal fade modalForm" role="dialog">
	
	<div class="modal-content modal-dialog" >

        <div class="modal-body modalTitle">

            <h3 class="backColor">REALIZAR PAGO</h3>

            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <div class="contentCheckout">

                <?php

                $response = CartController::showRates();
                
				echo '

                <input type="hidden" id="taxRate" value="'.$response["tax"].'">

                ';

                ?>

                <div class="formPay row">

                    <h4 class="text-center well text-muted text-uppercase">Forma de pago</h4>
                        
                    <figure class="col-xs-12">

                        <center>

                            <img src="<?php echo $client;?>views/img/template/paypal.jpg" class="img-thumbnail">

                        </center>

                      
                    </figure>

                </div>

                <br>

                <div class="listProduct row">

                    <h4 class="text-center well text-muted text-uppercase">Producto a comprar</h4>

                    <table class="table table-striped tableProduct">

                        <thead>

                            <tr>

                                <th>Producto</th>

                                <th>Cantidad</th>

                                <th>Precio</th>

                            </tr>

                        </thead>

                        <tbody>

                        </tbody>

                    </table>

                    <div class="col-sm-6 col-xs-12 pull-right">

                        <table class="table table-striped tableTa">

                            <tbody>

                                <tr>

                                    <td>Subtotal</td>

                                    <td><span >USD</span> $<span class="valueSubtotal" value="0">0</span></td>

                                </tr>

                                <tr>
									<td>Impuesto</td>

                                    <td><span >USD</span> $<span class="valueTotalTax" value="0">0</span></td>
                                    	
								</tr>
                               
                                <tr>

                                    <td><strong>Total</strong></td>

                                    <td><span >USD</span> $<span class="valueTotalBuy" value="0">0</span></td>

                                </tr>

                            </tbody>

                        </table>
                            
                        <br>
                        
                    </div>

                    <div class="clearfix"></div>

                    <button class="btn btn-block btn-lg btn-default backColor btnPay">PAGAR</button>

                </div>

            </div>

        </div>

        <div class="modal-footer"></div>

    </div>

</div>