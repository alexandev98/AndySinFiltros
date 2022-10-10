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


// BARRA DE PRODUCTOS

echo '

    <div class="container-fluid well well-sm barraAsesorias"></div>';

?>

<!-- LISTAR PRODUCTOS -->

<div class="container-fluid products">

    <div class="container">

        <div class="row">

            <!-- BREADCRUMB -->

            <ul class="breadcrumb text-uppercase fondoBreadcrumb">
            
                <li><a href="<?php echo$client;?>">INICIO</a></li>
                <li class="active pagActive"><?php echo $routes[0]?></li>

            </ul>

            <?php
               
				$item1 = "route";
				$value1 = $routes[0];

				$category = CategoryController::showCategories($item1, $value1);

                $order = "id";
                $item2 = "id_category";
                $value = $category["id"];

                if($ruta == "asesorias"){

                    $products=ProductController::showProducts($order, $item2, $value);

                }else{

                    $products=ControllerBlog::showPosts($order, $item2, $value);

                }
               
                
                if(!$products){
                    echo '

                    <div class="col-xs-12 error404 text-center"> 

                        <h1><small>¡Oops!</small></h1>
                        <h2>Aún no hay productos en esta sección</h2>
                    
                    </div>';
                }
                else{

                    echo ' 

                    <ul class="grid0">';

                    foreach ($products as $key => $value) {

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
                                        
                                            if($ruta == "asesorias"){

                                                if($value["offer"] != 0){

                                                    echo '
                                                    
                                                    <span class="label label-warning fontSize">'.$value["discountOffer"].'% off</span>';

                                                }
                                            }
                                            
                                    echo' 
                                    
                                        </a>

                                    </small>

                                </h4>';

                               if($ruta == "asesorias"){

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

                                }
                                        
                            echo '

                            </li>';

                        }
                    }
                    echo '

                    </ul>';

                }
            
            ?>

        </div>

    </div>

</div>

