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
<div class="container-fluid infoproduct">

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

        <br>
            
        <div class="row" style="margin-top:20px">
            
            <ul class="nav nav-tabs">

                <li class="active"><a>COMENTARIOS </a></li>

                <li><a id="showMore" href="">Ver más</a></li>

            </ul>

            <br>

        </div>


        <div class="row comments">
            
            <?php

                $data = array("idUser" => "",
                                "idPost" => $infopost["id"]);

                $comments = ControllerUsers::showCommentsPost($data);

                if(isset($_SESSION["validateSesion"])){

                    if($_SESSION["validateSesion"] == "ok"){

                        $post_com = false;

                        foreach ($comments as $key => $value) {
                            
                            if($_SESSION["id"] == $value["id_user"]){

                                $post_com = true;

                            }

                        }

                        if(!$post_com){

                            echo '

                                <div class="panel-group col-md-3 col-sm-6 col-xs-12 heightComments">
    
                                    <div class="panel panel-default">
                    
                                        <div class="panel-heading">
        
                                            Tú
                                            
                                            <span class="text-right">
                                                    
                                                <img class="img-circle pull-right" src="<?php echo $server;?>views/img/users/default/anonymous.png" width="20%">	
                                                    
                                            </span>
        
                                        </div>
                                                
                                        <div class="panel-body">
                                                
                                            <textarea class="form-control" rows="3" id="comment" name="comment" maxlength="300" style="font-size: 12px;">Escribe tu comentario...</textarea>
                                                
                                        </div>
        
                                        <div class="panel-footer">
                                        
                                            <a href="#modalIngreso" data-toggle="modal">
        
                                                <button class="btn btn-xs pull-right" idPost="'.$infopost["id"].'"><i class="fa fa-paper-plane"></i></button>
                                                <div class="clearfix"></div>
                    
                                            </a>
                                            
                                        </div>

                                    </div>

                                </div>';

                        }

                    }

                }else{

                    echo '

                        <div class="panel-group col-md-3 col-sm-6 col-xs-12 heightComments">
    
                            <div class="panel panel-default">
                    
                                <div class="panel-heading">

                                    Tú
                                    
                                    <span class="text-right">
                                            
                                        <img class="img-circle pull-right" src="'.$server.'views/img/users/default/anonymous.png" width="20%">	
                                            
                                    </span>

                                </div>
                                        
                                <div class="panel-body">
                                        
                                    <textarea class="form-control" rows="3" id="comment" name="comment" maxlength="300" style="font-size: 12px;">Escribe tu comentario...</textarea>
                                        
                                </div>

                                <div class="panel-footer">
                                
                                    <a href="#modalIngreso" data-toggle="modal">

                                        <button class="btn btn-xs pull-right" idPost="'.$infopost["id"].'"><i class="fa fa-paper-plane"></i></button>
                                        <div class="clearfix"></div>
            
                                    </a>
                                    
                                </div>
                                
                            </div>
                            
                        </div>';

                }

            ?>

            

            <?php

                foreach ($comments as $key => $value) {
                                
                    if($value["comment"] != ""){

                        $item = "id";
                        $valor = $value["id_user"];

                        $user = ControllerUsers::showUser($item, $valor);

                        echo '<div class="panel-group col-md-3 col-sm-6 col-xs-12 heightComments">
            
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

                                        if(isset($_SESSION["validateSesion"])){

                                            if($_SESSION["validateSesion"] == "ok"){

                                                if($_SESSION["id"] == $user["id"]){

                                                    echo '

                                                    <div class="row">

                                                        <button class="btn btn-xs btnGuardarCambioCom pull-left" idUser="'.$_SESSION["id"].'" idCom="'.$value["id"].'" style="display:none;"><i class="fa fa-paper-plane"></i></button>
                                                        
                                                        <button class="btn btn-xs btnEditarComPost pull-right" idUser="'.$_SESSION["id"].'" idCom="'.$value["id"].'"><i class="fa fa-edit"></i></button>
                                                        
                                                        <button class="btn btn-xs btnEliminarComPost pull-right" idUser="'.$_SESSION["id"].'" idCom="'.$value["id"].'"><i class="fa fa-trash"></i></button>
                                                      
                                                        <div class="clearfix"></div>
                                                    
                                                    </div>';

                                                    

                                                }

                                            }

                                        }

                                    echo'
                                    </div>
                                    
                                </div>

                            </div>';

                    }

                }

            ?>

        </div>

    </div>

</div>



