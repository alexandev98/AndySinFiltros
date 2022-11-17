<!-- BANNER -->
<?php
    $server=Route::routeServer();

    $client = Route::routeClient();

    $ruta = "sin-categoria";

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

<?php

    $item = null;
    $value = null;

    $categories = CategoryController::showCategories($item, $value);

    $template = ControllerTemplate::styleTemplate();

    foreach ($categories as $key => $value) { 

        if($value["state"] != 0){

            $order="id";
            $item="id_category";
            $value2 = $value["id"];
            
            echo '
        
                <div class="container-fluid ultimas-asesorias">

                        <div class="container">
                        
                            <div class="row">

                                <div class="col-xs-12 featureTitle">

                                    <div class="heading-section">
                                        <h2>'.$value["category"].'</h2>
                                        <a href="'.$value["route"].'">ver más <i class="fa fa-angle-right"></i></a>
                                        <br>
                                        <img src="'.$client.'views/img/template/under-heading.png" alt="">
                                    </div>

                                </div>

                                <div class="clearfix"></div>

                            </div>';
                
                    echo ' 
                
                    <ul>';

                        if($value["route"] == "asesorias"){

                            $products=ProductController::showProducts($order, $item, $value2);

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
                                                    
                                                        if($value["offer"] != 0){

                                                            echo '
                                                            
                                                            <span class="label label-warning fontSize">'.$value["discountOffer"].'% off</span>';
                
                                                        }
                                                echo' 
                                                
                                                    </a>

                                                </small>

                                            </h4>

                                            <div class="col-xs-6 price">';

                                            if($value["price"] != 0){

                                                echo '

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

                                                </h2>';
                                            }

                                            echo '
                                            
                                            </div>';
                                                    
                                        echo '

                                        </li>
                                        
                                </ul>';

                                    }
                                }

                        }else if ($value["route"] == "blog-posts"){

                            $posts = ControllerBlog::showPosts($order, $item, $value2);

                            echo '<ul>';

                            foreach ($posts as $key => $value) {

                                echo '
                                
                                    <li class="col-xs-12">

                                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">

                                        <figure>

                                            <a href="'.$value["route"].'" class="pixelProduct">
                                                <img src="'.$server.$value["front"].'" class="img-responsive">
                                            </a>

                                        </figure>

                                    </div>

                                    <div class="col-lg-10 col-md-7 col-sm-8 col-xs-12 ultimo-post">

                                        <h4>

                                            <small>

                                                <a href="'.$value["route"].'" class="pixelProduct">
                                                    '.$value["title"].' ';
                                                                                
                                            echo '

                                                </a>

                                            </small>

                                        </h4>

                                        <p class="text-muted">
                                            '.$value["titular"].'
                                        </p>';

                                       
                        
                                    echo '

                                    </div>
                                    
                                    <div class="col-xs-12">

                                        <hr>

                                    </div>

                                </li>';
                            }
                   
                        echo '

                        </ul>';

                    }
                   
                        echo '

                </div>
                
            </div>';

        }
        
    }

?>
