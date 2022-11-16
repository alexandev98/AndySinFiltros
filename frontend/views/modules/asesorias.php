<!-- BANNER -->
<?php

$server=Route::routeServer();
$client = Route::routeClient();

$ruta = $routes[0];

$banner = ProductController::showBanner($ruta);
     
if($banner != null){

    if($banner["state"] != 0){

        $title1 = json_decode($banner["title1"],true);
        $title2 = json_decode($banner["title2"],true);
        $title3 = json_decode($banner["title3"],true);

        echo '

        <figure class="banner">

            <img src="'.$server.$banner["img"].'" class="img-responsive" width="100%">	

            <div class="textBanner '.$banner["style"].'">
                
                <h1 style="color:'.$title1["color"].'">'.$title1["text"].'</h1>

                <h2 style="color:'.$title2["color"].'"><strong>'.$title2["text"].'</strong></h2>

                <h3 style="color:'.$title3["color"].'">'.$title3["text"].'</h3>

            </div>

        </figure>';

    }

}


?>


<!-- LISTAR PRODUCTOS -->

<div class="container-fluid asesorias">

    <div class="container">

        <div class="row">

            <?php
               
				$item1 = "route";
				$value1 = $routes[0];

				$category = CategoryController::showCategories($item1, $value1);

                $order = "id";
                $item2 = "id_category";
                $value = $category["id"];

                $asesorias=ProductController::showProducts($order, $item2, $value);

                if(!$asesorias){
                    echo '

                    <div class="col-xs-12 error404 text-center"> 

                        <h1><small>¡Oops!</small></h1>
                        <h2>Aún no hay productos en esta sección</h2>
                    
                    </div>';
                }
                else{

                    foreach ($asesorias as $key => $value) {

                        if($value["state"] != 0){
                            
                            echo '

                            <li class="col-md-3 col-sm-6 col-xs-12">

                                <figure>

                                    <a href="'.$value["route"].'" class="pixelProduct">
                                        <img src="'.$server.$value["front"].'" class="img-responsive">
                                    </a>
                                    
                                </figure>

                                <h4>

                                    <small>

                                        <a href="'.$value["route"].'" class="pixelProduct">
                                            '.$value["title"].' ';                                  

                                            if($value["offer"] != 0){

                                                echo '
                                                
                                                <span class="label label-warning fontSize">'.$value["discountOffer"].'% off</span>';

                                            }
                                            
                                    echo' 
                                    
                                        </a>

                                    </small>

                                </h4>';

                                if($value["price"] != 0){

                                    echo '

                                    <div class="col-xs-6 price">

                                        <h2>';

                                            if($value["offer"] != 0){
                                                echo '

                                                <small>
                        
                                                    <strong class="offer">USD $'.$value["price"].'</strong>

                                                </small>

                                                <small>$'.$value["offerPrice"].'</small>';
                                            }
                                            else{
                                                echo '
                                                
                                                <h2><small>USD $'.$value["price"].'</small></h2>';
                                            }

                                        echo '

                                        </h2>
                                    
                                    </div>';
                                }

                            echo '

                            </li>';

                        }
                    }

                }
            
            ?>

        </div>

        <center>

            <?php

                if(count($asesorias) != 0){

                    $pagAsesorias = ceil(count($asesorias)/6);

                    if($pagAsesorias > 4){

                        /*=============================================
                        LOS BOTONES DE LAS PRIMERAS 4 PÁGINAS Y LA ÚLTIMA PÁG
                        =============================================*/

                        if($routes[1] == 1){

                            echo '

                            <ul class="pagination">';

                            for($i = 1; $i <= 4; $i ++){

                                echo '<li id="item'.$i.'"><a href="'.$client.$routes[0].'/'.$i.'">'.$i.'</a></li>';

                            }

                            echo ' <li class="disabled"><a>...</a></li>
                                <li id="item'.$pagAsesorias.'"><a href="'.$client.$routes[0].'/'.$pagAsesorias.'">'.$pagAsesorias.'</a></li>
                                <li><a href="'.$client.$routes[0].'/2"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>

                            </ul>';

                        }

                        /*=============================================
                        LOS BOTONES DE LA MITAD DE PÁGINAS HACIA ABAJO
                        =============================================*/

                        else if($routes[1] != $pagAsesorias && 
                                $routes[1] != 1 &&
                                $routes[1] <  ($pagAsesorias/2) &&
                                $routes[1] < ($pagAsesorias-3)
                                ){

                                $numPagActual = $routes[1];

                                echo '
                                <ul class="pagination">

                                    <li><a href="'.$client.$routes[0].'/'.($numPagActual-1).'"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li> ';
                            
                                for($i = $numPagActual; $i <= ($numPagActual+3); $i ++){

                                    echo '<li id="item'.$i.'"><a href="'.$client.$routes[0].'/'.$i.'">'.$i.'</a></li>';

                                }

                                echo '

                                    <li class="disabled"><a>...</a></li>
                                    <li id="item'.$pagAsesorias.'"><a href="'.$client.$routes[0].'/'.$pagAsesorias.'">'.$pagAsesorias.'</a></li>
                                    <li><a href="'.$client.$routes[0].'/'.($numPagActual+1).'"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>

                                </ul>';

                        }

                        /*=============================================
                        LOS BOTONES DE LA MITAD DE PÁGINAS HACIA ARRIBA
                        =============================================*/

                        else if($routes[1] != $pagAsesorias && 
                                $routes[1] != 1 &&
                                $routes[1] >=  ($pagAsesorias/2) &&
                                $routes[1] < ($pagAsesorias-3)
                                ){

                                $numPagActual = $routes[1];
                            
                                echo '<ul class="pagination">
                                <li><a href="'.$client.$routes[0].'/'.($numPagActual-1).'"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li> 
                                <li id="item1"><a href="'.$client.$routes[0].'/1">1</a></li>
                                <li class="disabled"><a>...</a></li>
                                ';
                            
                                for($i = $numPagActual; $i <= ($numPagActual+3); $i ++){

                                    echo '<li id="item'.$i.'"><a href="'.$client.$routes[0].'/'.$i.'">'.$i.'</a></li>';

                                }


                                echo '  <li><a href="'.$client.$routes[0].'/'.($numPagActual+1).'"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                                    </ul>';
                        }

                        /*=============================================
                        LOS BOTONES DE LAS ÚLTIMAS 4 PÁGINAS Y LA PRIMERA PÁG
                        =============================================*/

                        else{

                            $numPagActual = $routes[1];

                            echo '<ul class="pagination">
                                <li><a href="'.$client.$routes[0].'/'.($numPagActual-1).'"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li> 
                                <li id="item1"><a href="'.$client.$routes[0].'/1">1</a></li>
                                <li class="disabled"><a>...</a></li>
                                ';
                            
                            for($i = ($pagAsesorias-3); $i <= $pagAsesorias; $i ++){

                                echo '<li id="item'.$i.'"><a href="'.$client.$routes[0].'/'.$i.'">'.$i.'</a></li>';

                            }

                            echo ' </ul>';

                        }

                    }else{

                        echo '<ul class="pagination">';
                        
                        for($i = 1; $i <= $pagAsesorias; $i ++){

                            echo '<li id="item'.$i.'"><a href="'.$client.$routes[0].'/'.$i.'">'.$i.'</a></li>';

                        }

                        echo '</ul>';

                    }

                }

                ?>

            </center>

    </div>

</div>

