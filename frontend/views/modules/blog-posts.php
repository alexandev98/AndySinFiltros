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

                                    <a href="'.$value["route"].'" class="pixelProduct">
                                        <img src="'.$server.$value["front"].'" class="img-responsive">
                                    </a>
                                    
                                </figure>

                                <div class="down-content">

                                    <a href="'.$value["route"].'" class="pixelProduct">
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

                <!--=====================================
                PAGINACIÓN
                ======================================-->

                <ul class="pagination">
                    
                    <li class="active" id="item1"><a href="https://ecommerce.tutorialesatualcance.com/cursos/1">1</a></li>
                    <li class="id=" item2"=""><a href="https://ecommerce.tutorialesatualcance.com/cursos/2">2</a></li>
                    <li class="id=" item3"=""><a href="https://ecommerce.tutorialesatualcance.com/cursos/3">3</a></li>
                    <li class="id=" item4"=""><a href="https://ecommerce.tutorialesatualcance.com/cursos/4">4</a></li> 
                    <li class="disabled"><a>...</a></li>
                    <li id="item27"><a href="https://ecommerce.tutorialesatualcance.com/cursos/27">27</a></li>
                    <li><a href="https://ecommerce.tutorialesatualcance.com/cursos/2"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                
                </ul>

            </center>

        </div>

    </div>

</div>

