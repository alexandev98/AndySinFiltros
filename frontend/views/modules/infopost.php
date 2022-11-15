<?php
    $server=Route::routeServer();
    $client = Route::routeClient();
    $template = ControllerTemplate::styleTemplate();
     
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
<div class="container-fluid ">

    <div class="container">

        <div class="row">

            <?php

                $item =  "route";
                $value = $routes[0];
                $infopost = ControllerBlog::showInfoPost($item, $value);

                echo '

                    <div class="col-md-5 col-sm-6 col-xs-12"">

                        <figure class="view">

                            <img class="img-thumbnail" src="'.$server.$infopost["front"].'" align="left">

                        </figure>
                        
                    </div>

                ';
                   
            ?>

            <!--=====================================
            PRODUCT
            ======================================-->

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

                <h1 class="text-muted text-uppercase">

                        <?php echo $infopost["title"]; ?>

                    <br>

                </h1>

                <p> <?php echo $infopost["text"]; ?></p>

        </div>

        <?php

          $data = array("idUser" => "",
                        "idPost" => $infopost["id"]);

          $comments = ControllerUsers::showCommentsPost($data);

          if(count($comments)!=0){

            echo '

            <div class="col-lg-12">

                <div class="sidebar-item comentarioPost">

                    <div class="sidebar-heading">

                        <h2>'.count($comments).' comentarios</h2>

                    </div>
                
                    <div class="content">

                        <ul>';

                        for ($i = 0; $i < count($comments); $i++) {

                            if($comments[$i]["comment"] != ""){
    
                                $item = "id";
                                $valor = $comments[$i]["id_user"];

                                $user = ControllerUsers::showUser($item, $valor);

                                $date = explode("-",substr($comments[$i]["date"],0,-8));
                                $year = $date[0];
                                $month = $date[1];
                                $day = $date[2];
                                
                                echo '
                                
                                    <li '.((($i+1) % 2) == 0 ? 'class="replied"' : '').'>

                                    <div class="author-thumb">';

                                        if($user["mode"] == "directo"){

                                            if($user["photo"] == ""){

                                                echo '<img src="'.$server.'views/img/users/default/anonymous.png"  alt="">';   

                                            }else{

                                                echo '<img src="'.$client.$user["photo"].'" alt="">';

                                            }

                                        }else{

                                            echo '<img src="'.$user["photo"].'" alt="">';

                                        }

                                echo'

                                </div>

                                    <div class="right-content">

                                        <h4>'.$user["name"].'<span>'.date("F j, Y", mktime(0,0,0,$month,$day,$year)).'</span></h4>

                                        <p>'.$comments[$i]["comment"].'</p>

                                    </div>

                                </li>';

                            }

                        }

                        echo'

                        </ul>

                    </div>

                </div>

            </div>';

            }

        ?>

        <div class="col-lg-12">

            <div class="sidebar-item submit-comment">

                <div class="sidebar-heading">

                    <h2>Tu comentario</h2>

                </div>

              <div class="content">

                <form method="post" onsubmit="return validarComentario()">
                  
                    <div class="row">

                        <div class="col-lg-6">

                            <textarea name="message" rows="6" id="comentario" placeholder="Escribe tu comentario" required></textarea>

                        </div>

                        <div class="col-lg-12">

                            <?php

                                if(isset($_SESSION["validateSesion"])){

                                    if($_SESSION["validateSesion"] == "ok"){

                                        echo '
                                            <input type="hidden" value="'.$_SESSION["id"].'" id="idUsuario" name="idUsuario">
                                            <input type="hidden" value="'.$infopost["id"].'" id="idPost" name="idPost">
                                            <button type="submit" id="form-submit" class="main-button backColor">Submit</button>';
                                    }

                                }else{

                                echo '
                                    <a href="#modalRegistro" data-toggle="modal">
                                        <button type="submit" id="form-submit" class="main-button backColor">Submit</button>
                                    </a>';
                                }

                            ?>

                        </div>

                    </div>

                </form>

                <?php

                    $comentario = new ControllerUsers();
                    $comentario -> comentarPost();

                ?>

                </div>

            </div>

        </div>

    </div>

</div>



