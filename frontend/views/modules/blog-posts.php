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


<!-- LISTAR Posts -->

<div class="container-fluid blog-posts">

    <div class="container">

        <div class="row">

            <?php
               
				$item1 = "route";
				$value1 = $routes[0];

				$category = CategoryController::showCategories($item1, $value1);

                $order = "id";
                $item2 = "id_category";
                $value = $category["id"];

                $posts=ControllerBlog::showPosts($order, $item2, $value);
                
                if(!$posts){
                    echo '

                    <div class="col-xs-12 error404 text-center"> 

                        <h1><small>¡Oops!</small></h1>
                        <h2>Aún no hay productos en esta sección</h2>
                    
                    </div>';
                }
                else{

                    foreach ($posts as $key => $value) {

                        if($value["state"] != 0){

                            $data = array("idUser" => "",
                                            "idPost" => $value["id"]);

                            $comments = ControllerUsers::showCommentsPost($data);

                            $date = explode("-",substr($value["date"],0,-8));
                            $year = $date[0];
                            $month = $date[1];
                            $day = $date[2];
                            
                            echo '

                            <li class="col-md-4 col-sm-6 col-xs-12">

                                <figure>

                                    <a href="'.$client.$value["route"].'" class="pixelProduct">
                                        <img src="'.$server.$value["front"].'" class="img-responsive">
                                    </a>
                                    
                                </figure>

                                <div class="down-content">

                                    <a href="'.$client.$value["route"].'" class="pixelProduct">
                                        <h4>'.$value["title"].'</h4>                                 
                                    </a>

                                    <ul class="post-info">

                                        <li><span>'.date("F j, Y", mktime(0,0,0,$month,$day,$year)).'</span></li>';

                                        if(count($comments) >= 2){

                                            echo '
                                            <li><span>'.count($comments).' Comentarios</span></li>';

                                        }
                                        
                                    echo '</ul>

                                    <p>'.substr($value["titular"], 0, 100).'...</p>

                                </div>';
                                        
                            echo '

                            </li>';

                        }
                    }
                   

                }
            
            ?>

            <div class="clearfix"></div>

            <center>

            <?php

                if(count($posts) != 0){

                    $pagPosts = ceil(count($posts)/6);

                    if($pagPosts > 4){

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
                                <li id="item'.$pagPosts.'"><a href="'.$client.$routes[0].'/'.$pagPosts.'">'.$pagPosts.'</a></li>
                                <li><a href="'.$client.$routes[0].'/2"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>

                            </ul>';

                        }

                        /*=============================================
                        LOS BOTONES DE LA MITAD DE PÁGINAS HACIA ABAJO
                        =============================================*/

                        else if($routes[1] != $pagPosts && 
                                $routes[1] != 1 &&
                                $routes[1] <  ($pagPosts/2) &&
                                $routes[1] < ($pagPosts-3)
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
                                    <li id="item'.$pagPosts.'"><a href="'.$client.$routes[0].'/'.$pagPosts.'">'.$pagPosts.'</a></li>
                                    <li><a href="'.$client.$routes[0].'/'.($numPagActual+1).'"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>

                                </ul>';

                        }

                        /*=============================================
                        LOS BOTONES DE LA MITAD DE PÁGINAS HACIA ARRIBA
                        =============================================*/

                        else if($routes[1] != $pagPosts && 
                                $routes[1] != 1 &&
                                $routes[1] >=  ($pagPosts/2) &&
                                $routes[1] < ($pagPosts-3)
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
                            
                            for($i = ($pagPosts-3); $i <= $pagPosts; $i ++){

                                echo '<li id="item'.$i.'"><a href="'.$client.$routes[0].'/'.$i.'">'.$i.'</a></li>';

                            }

                            echo ' </ul>';

                        }

                    }else{

                        echo '<ul class="pagination">';
                        
                        for($i = 1; $i <= $pagPosts; $i ++){

                            echo '<li id="item'.$i.'"><a href="'.$client.$routes[0].'/'.$i.'">'.$i.'</a></li>';

                        }

                        echo '</ul>';

                    }

                }

                ?>

            </center>

        </div>

    </div>

</div>

