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

<!-- INFOPRODUCT -->
<div class="container-fluid infoproduct">

    <div class="container">

        <div class="row">

            <?php

                $item =  "route";
                $value = $routes[0];
                $infoproduct = ProductController::showInfoProduct($item, $value);
               

                if($infoproduct["type"] == "virtual"){

                    echo '

                    <div class="col-sm-4 col-xs-12">
                        
                        <figure class="view">

                            <img class="img-thumbnail" src="'.$server.$infoproduct["front"].'">
                        
                        </figure>

                    </div>';

                } 
                                    
            ?>

            <!--=====================================
			PRODUCT
			======================================-->

    <?php

        if($infoproduct["type"] == "virtual"){

            echo '
            
            <div class="col-sm-8 col-xs-12">';

        }

    ?>

            <!-- SOCIALNETWORKS -->

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

                        <li>
                            <p class="btnGoogle">
                                <i class="fa fa-google"></i>
                                Google
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

                        <h2 class="text-muted">USD $'.$infoproduct["price"].'</h2>';

                    }else{

                        echo '

                        <h2 class="text-muted">

                            <span>
                            
                                <strong class="offer">USD $'.$infoproduct["price"].'</strong>

                            </span>

                            <span>
                                
                                $'.$infoproduct["offerPrice"].'

                            </span>

                        </h2>';

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

                                <div class="col-xs-12">

                                    <h4>Temas a cubrir</h4>';

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

                <div class="row" >

                    <?php

                        if($infoproduct["price"]!=0){

                            if($infoproduct["type"]=="virtual"){

                                // CALENDARIO 

                                echo '

                                <div class="col-md-8 col-xs-12">
                                
                                    <h5 class="text-center well text-muted text-uppercase">Seleccione una fecha</h5>

                                    <div id="calendar">
                                    
                                </div>';

                                echo '
                                
                                </div>';

                                echo '

                                <div class="col-md-4 col-xs-12 buttonPurchase">

                                    <div id="schedule" style="display:none">
                                        
                                        <h5 class="text-center well text-muted text-uppercase">Horario Disponible</h5>

                                        <h3 id="hour"><strong></strong></h3>

                                        <h4 id="date"></h4>

                                        <h5 id="time-zone"></h5>';

                                        if(isset($_SESSION["validateSesion"])){

                                            if($_SESSION["validateSesion"] == "ok"){

                                                echo '
                                                
                                                <a id="btnCheckout" href="#modalBuyNow" data-toggle="modal" idUser="'.$_SESSION["id"].' idProduct="'.$infoproduct["id"].'" 
                                                    title="'.$infoproduct["title"].'" price="'.$infoproduct["price"].'" type="'.$infoproduct["type"].'" date="" hour="">

                                                        <button class="btn btn-default btn-block btn-lg backColor">

                                                            <small>COMPRAR AHORA</small> 

                                                        </button>
                                                    
                                                </a>';

                                            }
                                    
                                        }else{

                                            echo '
                                            <a href="#modalIngreso" data-toggle="modal"><button class="btn btn-default btn-block btn-lg">
                                                    <small>COMPRAR AHORA</small></button></a>';

                                        }
                                        
                                    echo '
                                    
                                    </div>

                                    
                                </div>';

                            }

                        }

                    ?>

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

                            echo '<li class="pull-right"><a class="text-muted">PROMEDIO DE CALIFICACIÓN: '.$average.' | ';

                            if($average >= 0 && $average < 0.5){

                                echo '<i class="fa fa-star-half-o text-success"></i>
                                    <i class="fa fa-star-o text-success"></i>
                                    <i class="fa fa-star-o text-success"></i>
                                    <i class="fa fa-star-o text-success"></i>
                                    <i class="fa fa-star-o text-success"></i>';

                            }

                            else if($average >= 0.5 && $average < 1){

                                echo '<i class="fa fa-star text-success"></i>
                                    <i class="fa fa-star-o text-success"></i>
                                    <i class="fa fa-star-o text-success"></i>
                                    <i class="fa fa-star-o text-success"></i>
                                    <i class="fa fa-star-o text-success"></i>';

                            }

                            else if($average >= 1 && $average < 1.5){

                                echo '<i class="fa fa-star text-success"></i>
                                    <i class="fa fa-star-half-o text-success"></i>
                                    <i class="fa fa-star-o text-success"></i>
                                    <i class="fa fa-star-o text-success"></i>
                                    <i class="fa fa-star-o text-success"></i>';

                            }

                            else if($average >= 1.5 && $average < 2){

                                echo '<i class="fa fa-star text-success"></i>
                                    <i class="fa fa-star text-success"></i>
                                    <i class="fa fa-star-o text-success"></i>
                                    <i class="fa fa-star-o text-success"></i>
                                    <i class="fa fa-star-o text-success"></i>';

                            }

                            else if($average >= 2 && $average < 2.5){

                                echo '<i class="fa fa-star text-success"></i>
                                    <i class="fa fa-star text-success"></i>
                                    <i class="fa fa-star-half-o text-success"></i>
                                    <i class="fa fa-star-o text-success"></i>
                                    <i class="fa fa-star-o text-success"></i>';

                            }

                            else if($average >= 2.5 && $average < 3){

                                echo '<i class="fa fa-star text-success"></i>
                                    <i class="fa fa-star text-success"></i>
                                    <i class="fa fa-star text-success"></i>
                                    <i class="fa fa-star-o text-success"></i>
                                    <i class="fa fa-star-o text-success"></i>';

                            }

                            else if($average >= 3 && $average < 3.5){

                                echo '<i class="fa fa-star text-success"></i>
                                    <i class="fa fa-star text-success"></i>
                                    <i class="fa fa-star text-success"></i>
                                    <i class="fa fa-star-half-o text-success"></i>
                                    <i class="fa fa-star-o text-success"></i>';

                            }

                            else if($average >= 3.5 && $average < 4){

                                echo '<i class="fa fa-star text-success"></i>
                                    <i class="fa fa-star text-success"></i>
                                    <i class="fa fa-star text-success"></i>
                                    <i class="fa fa-star text-success"></i>
                                    <i class="fa fa-star-o text-success"></i>';

                            }

                            else if($average >= 4 && $average < 4.5){

                                echo '<i class="fa fa-star text-success"></i>
                                    <i class="fa fa-star text-success"></i>
                                    <i class="fa fa-star text-success"></i>
                                    <i class="fa fa-star text-success"></i>
                                    <i class="fa fa-star-half-o text-success"></i>';

                            }else{

                                echo '<i class="fa fa-star text-success"></i>
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

                                                echo '<img class="img-circle pull-right" src="'.$server.'views/img/users/default/anonymous.png" width="20%">';	

                                            }else{

                                                echo '<img class="img-circle pull-right" src="'.$client.$user["photo"].'" width="20%">';	

                                            }
                                        
                                        }else{

                                            echo '<img class="img-circle pull-right" src="'.$user["photo"].'" width="20%">';	

                                        }

                                        echo '</span>

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

                                <th>Descripción</th>

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

                                    <td>USD <span class="valueSubtotal">0</span></td>

                                </tr>
                               
                                <tr>

                                    <td><strong>Total</strong></td>

                                    <td>USD <strong class="valueTotal">0</strong></td>

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