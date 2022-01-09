<?php
    $server=Route::routeServer();

?>

<!-- BANNER -->
<h1></h1>

<figure class="banner">

    <img src="http://localhost:82/andysinfiltros/backend/views/img/banner/maternidad.jpeg" class="img-responsive" width="100%">

    <div class="textBanner textRight">
        <h1 style="color:#a18262">MATERNIDAD REAL</h1>
        <h3 style="color:#000"><strong>Maternidad sin filtros</strong></h3>
    </div>

</figure>

<?php

    $routeModules= array("recipes", "courses");
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

    for ($i=0; $i < count($titlesModules) ; $i++ ) { 
        
        echo '
        <!-- PRODUCT BAR -->
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
                                        <button class="btn btn-default backColor pull-right">
                                             VER MAS <span class="fa fa-chevron-right"></span>

                                        </button>
                                    </a>
                                </div>

                            </div>

                            <div class="clearfix"></div>

                            <hr>
                        </div>';
            
    
                echo ' 
                 <!-- PRODUCTS IN A GRID -->
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
                                                    '.$value["title"].' <br>';                                  
                                               
                                                    if($value["oferta"] != 0){

                                                        echo '<span class="label label-warning fontSize">'.$value["descuentoOferta"].'% off</span>';
            
                                                    }
                                          echo' </a>
                                            </small>
                                        </h4>

                                        <div class="col-xs-6 price">';

                                            

                                echo '
                                

                                    </li>';
                    }
                echo '
                </ul>';
            

                 echo
                 '<!-- PRODUCTS IN A LIST -->
                 <ul class="list'.$i.'" style="display:none">';

                        foreach ($modules[$i] as $key => $value) {

                            echo '<li class="col-xs-12">

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
                                                '.$value["title"].'<br>' ;
                                                                             
                                            echo '</a>
                                        </small>
                                    </h1>

                                    <p class="text-muted">
                                        '.$value["description"].'
                                    </p>';

                                    

                                 echo '
                                 <div class="btn-group pull-left links">

                                        <a href="'.$value["route"].'" class="pixelProduct">';

                                            
                                            echo'
                                           
                                        </a>

                                    </div>

                                </div>

                                <div class="col-xs-12">

                                    <hr>

                                </div>

                            </li>';
                        }

                      echo '</ul>

                    
            </div>
        </div>';
    }

?>

