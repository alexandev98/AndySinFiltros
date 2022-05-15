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

    $routeModules= array("recetas", "asesorias");
    $titlesModules= array("RECETAS PUBLICADAS", "ASESORIAS");
    

    if($titlesModules[0] == "RECETAS PUBLICADAS"){
        $order="id";
        $item="price";
        $value=0;
        $free=ProductController::showProducts($order, $item, $value);
    }

    if($titlesModules[1] == "ASESORIAS"){
        $order="sales";
        $item=null;
        $value=null;
        $sales=ProductController::showProducts($order, $item, $value);
    }
  
    $modules=array($free, $sales);

    $template = ControllerTemplate::styleTemplate();
     
    

    for ($i=0; $i < count($titlesModules) ; $i++ ) { 
        
        echo '
       
            <div class="container-fluid well well-sm productBar">

                <div class="container">

                    <div class="row">

                        <div class="col-xs-12 organizeProducts">

                            <div class="btn-group pull-right">

                                <button type="button" class="btn btn-default btnGrid" id="btnGrid'.$i.'">
                                    <i class="fa fa-th" aria-hidden="true"></i>
                                    <span class="col-xs-0 pull-right"> GRID</span>
                                </button>

                                <button type="button" class="btn btn-default btnList" id="btnList'.$i.'">
                                    <i class="fa fa-list" aria-hidden="true"></i>
                                    <span class="col-xs-0 pull-right"> LIST</span>
                                </button>

                            </div>

                        </div>

                    </div>

                </div>
                
            </div>
              
              <div class="container-fluid products">

                    <div class="container">
                    
                        <div class="row">

                            <div class="col-xs-12 featureTitle">

                                <div class="col-sm-6 col-xs-12">

                                    <h1><small>'.$titlesModules[$i].'</small></h1>

                                </div>

                                <div class="col-sm-6 col-xs-12">

                                    <a href="'.$routeModules[$i].'">

                                        <button class="btn btn-default backColor pull-right" style="background:'.$template["colorBackground"].'; color:'.$template["colorText"].';">
                                             VER MAS <span class="fa fa-chevron-right"></span>

                                        </button>

                                    </a>

                                </div>

                            </div>

                            <div class="clearfix"></div>

                            <hr>

                        </div>';
            
    
                echo ' 
               
                 <ul class="grid'.$i.'" >';

                        foreach ($modules[$i] as $key => $value) {
                            
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

                            </li>';
                    }
                echo '

                </ul>';

                 echo'

                 <ul class="list'.$i.'" style="display:none">';

                        foreach ($modules[$i] as $key => $value) {

                            echo '
                            
                                <li class="col-xs-12">

                                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">

                                    <figure>

                                        <a href="'.$value["route"].'" class="pixelProduct">
                                            <img src="'.$server.$value["front"].'" class="img-responsive">
                                        </a>

                                    </figure>

                                </div>

                                <div class="col-lg-10 col-md-7 col-sm-8 col-xs-12">

                                    <h1>

                                        <small>

                                            <a href="'.$value["route"].'" class="pixelProduct">
                                                '.$value["title"].' ';

                                                if($value["offer"] != 0){

                                                    echo '
                                                    
                                                    <span class="label label-warning">'.$value["discountOffer"].'% off</span>';
        
                                                }	
                                                                             
                                           echo '

                                           </a>

                                        </small>

                                    </h1>

                                    <p class="text-muted">
                                        '.$value["description"].'
                                    </p>';

                                    if($value["price"] != 0){

                                        if($value["offer"] != 0){

                                            echo '
                                            
                                                <h2>
        
                                                    <small>
                                
                                                        <strong class="offer">USD $'.$value["price"].'</strong>
        
                                                    </small>
        
                                                    <small>$'.$value["offerPrice"].'</small>
                                                
                                                </h2>';
        
                                        }else{
        
                                            echo '
                                            
                                            <h2><small>USD $'.$value["price"].'</small></h2>';
        
                                        }

                                    }

                                 echo '

                                 </div>
                                 
                                <div class="col-xs-12">

                                    <hr>

                                </div>

                            </li>';
                        }

                      echo '
                      
                      </ul>

            </div>
            
        </div>';
    }

?>

