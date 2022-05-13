<?php

 $slide = ControllerSlide::showSlide();

?>

<div class="content-wrapper">
  
    <section class="content-header">

        <h1>
            Gestor Slide
        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Gestor Slide</li>
            
        </ol>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-header with-border">

                <button class="btn btn-primary agregarSlide">
                    
                    Agregar slide

                </button>

            </div>

            <div class="box-body">

                <ul class="todo-list">

                    <?php

                    foreach ($slide as $key => $value) {  

                    $styleImgProduct = json_decode($value["styleImgProduct"], true);
                    $styleTextSlide = json_decode($value["styleTextSlide"], true);
                    $title1 = json_decode($value["title1"], true);
                    $title2 = json_decode($value["title2"], true);
                    $title3 = json_decode($value["title3"], true);

                    echo '
                    
                    <li class="itemSlide" id="'.$value["id"].'">

                        <div class="box-group" id="accordion">

                            <!--=====================================
                            CAJA GESTOR SLIDE
                            ======================================-->                  

                            <div class="panel box box-info">

                                <!--=====================================
                                CABEZA DE LA CAJA GESTOR SLIDE
                                ======================================-->      

                                <div class="box-header with-border">

                                    <span class="handle">
                                        <i class="fa fa-ellipsis-v"></i>
                                        <i class="fa fa-ellipsis-v"></i>
                                    </span>

                                    <h4 class="box-title">

                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$value["id"].'">';
                                    
                                            if($value["name"] != ""){

                                                echo '<p class="text-uppercase">'.$value["name"].'</p>';
                                            
                                            }else{

                                                echo 'Slide '.$value["id"];

                                            }

                                            echo '
                                        
                                        </a>

                                    </h4>

                                    <div class="btn-group pull-right">

                                        <button class="btn btn-primary guardarSlide"
                                            id="'.$value["id"].'"
                                            indice="'.$key.'"
                                            nameSlide="'.$value["name"].'"
                                            typeSlide="'.$value["typeSlide"].'"
                                            styleImgProductTop="'.$styleImgProduct["top"].'"
                                            styleImgProductRight="'.$styleImgProduct["right"].'"
                                            styleImgProductLeft="'.$styleImgProduct["left"].'"
                                            styleImgProductWidth="'.$styleImgProduct["width"].'"
                                            styleTextSlideTop="'.$styleTextSlide["top"].'" 
                                            styleTextSlideRight="'.$styleTextSlide["right"].'" 
                                            styleTextSlideLeft="'.$styleTextSlide["left"].'" 
                                            styleTextSlideWidth="'.$styleTextSlide["width"].'"
                                            imgBackground="'.$value["imgBackground"].'"
                                            rutaimgBackground="'.$value["imgBackground"].'"
                                            imgProduct="'.$value["imgProduct"].'" 
                                            rutaimgProduct="'.$value["imgProduct"].'" 
                                            title1text="'.$title1["text"].'"
                                            title1Color="'.$title1["color"].'"
                                            title2text="'.$title2["text"].'"
                                            title2Color="'.$title2["color"].'"
                                            title3text="'.$title3["text"].'"
                                            title3Color="'.$title3["color"].'"
                                            button="'.$value["button"].'"
                                            url="'.$value["url"].'">

                                            <i class="fa fa-floppy-o"></i>

                                        </button>

                                        <button class="btn btn-danger eliminarSlide" id="'.$value["id"].'" imgBackground="'.$value["imgBackground"].'" imgProduct="'.$value["imgProduct"].'">

                                            <i class="fa fa-times"></i>
                                        
                                        </button>

                                    </div>

                                </div>

                                <!--=====================================
                                MÓDULOS COLAPSABLES
                                ======================================-->      

                                <div id="collapse'.$value["id"].'" class="panel-collapse collapse collapseSlide">

                                    <!--=====================================
                                    EDITOR SLIDE
                                    ======================================-->    
                                    
                                    <div class="row">

                                        <!--=====================================
                                        PRIMER BLOQUE
                                        ======================================--> 
                                
                                        <div class="col-md-4 col-xs-12">
                                    
                                            <div class="box-body">

                                                <!--=====================================
                                                MODIFICAR NOMBRE SLIDE
                                                ======================================-->      
                                                
                                                <div class="form-group">
                                                
                                                    <label>Nombre del Slide:</label>

                                                    <input type="text" class="form-control nameSlide" indice="'.$key.'" value="'.$value["name"].'">

                                                </div>  

                                                <!--=====================================
                                                MODIFICAR EL TIPO DE SLIDE
                                                ======================================--> 

                                                <div class="form-group">

                                                    <input type="hidden" class="typeSlide" value="'.$value["typeSlide"].'">

                                                    <label>Tipo de Slide:</label>

                                                    <label class="checkbox-inline selTypeSlide">
                                                    
                                                        <input class="typeSlideIzq" type="radio" value="slideOption1" name="typeSlide'.$key.'" indice="'.$key.'">

                                                        Izquierda

                                                    </label>

                                                    <label class="checkbox-inline selTypeSlide">
                                                        
                                                        <input class="typeSlideDer" type="radio" value="slideOption2" name="typeSlide'.$key.'" indice="'.$key.'">

                                                        Derecha

                                                    </label>

                                                </div> 

                                                <!--=====================================
                                                MODIFICAR EL FONDO DEL SLIDE
                                                ======================================--> 

                                                <div class="form-group">
                                                
                                                    <label>Cambiar Imagen Fondo:</label>

                                                    <br>

                                                    <p class="help-block">

                                                        <img src="'.$value["imgBackground"].'" class="img-thumbnail previsualizarFondo" width="200px">

                                                    </p>

                                                    <input type="file" class="subirFondo" indice="'.$key.'">

                                                    <p class="help-block">Tamaño recomendado 1600px * 520px</p>

                                                </div>

                                                <!--=====================================
                                                MODIFICAR EL BOTÓN DEL SLIDE
                                                ======================================--> 

                                                <div class="form-group">
                            
                                                    <label>Texto del botón:</label>

                                                    <input type="text" class="form-control buttonSlide" indice="'.$key.'" value="'.$value["button"].'" placeholder="EJEMPLO: IR AL PRODUCTO">

                                                </div>

                                                <div class="form-group">
                                            
                                                    <label>Url del botón:</label>

                                                    <input type="text" class="form-control urlSlide" indice="'.$key.'" value="'.$value["url"].'" placeholder="EJEMPLO: http://www.google.com">

                                                </div>

                                            </div>

                                        </div>

                                        <!--=====================================
                                        SEGUNDO BLOQUE
                                        ======================================--> 

                                        <div class="col-md-4 col-xs-12">

                                            <div class="box-body">

                                                <!--=====================================
                                                MODIFICAR LA IMAGEN DEL PRODUCTO
                                                ======================================--> 
                                        
                                                <div class="form-group">
                                                
                                                    <label>Cambiar Imagen Producto:</label>

                                                    <br>

                                                    <p class="help-block">
                                                    <img src="'.$value["imgProduct"].'" class="img-thumbnail previsualizarProducto" width="200px">
                                                    </p>

                                                    <input type="file" class="uploadImgProduct" indice="'.$key.'">

                                                    <p class="help-block">Tamaño recomendado 600px * 600px</p>

                                                </div>

                                                <!--=====================================
                                                MODIFICAR LA POSICIÓN DE LA IMAGEN PRODUCTO
                                                ======================================--> 

                                                <div class="form-group">

                                                    <label>Posición VERTICAL de la imagen del producto: </label>

                                                    <input type="text" indice="'.$key.'" value="" class="slider form-control posVertical posVertical'.$key.'" data-slider-min="0" 
                                                        data-slider-max="50"
                                                        data-slider-step="5"
                                                        data-slider-value="'.$styleImgProduct["top"].'" 
                                                        data-slider-orientation="horizontal"
                                                        data-slider-selection="before" 
                                                        data-slider-tooltip="show" 
                                                        data-slider-id="red">
                                                    
                                                    <label>Posición HORIZONTAL de la imagen del producto: </label>';

                                                    if($value["typeSlide"] == "slideOption1"){

                                                        echo '
                                                        <input type="text" indice="'.$key.'" value="" class="slider form-control posHorizontal posHorizontal'.$key.'" 
                                                        typeSlide = "'.$value["typeSlide"] .'"
                                                        data-slider-min="0" 
                                                        data-slider-max="50"
                                                        data-slider-step="5"
                                                        data-slider-value="'.$styleImgProduct["right"].'" 
                                                        data-slider-orientation="horizontal"
                                                        data-slider-selection="before" 
                                                        data-slider-tooltip="show" 
                                                        data-slider-id="blue">';

                                                    }else{

                                                        echo '
                                                        <input type="text" indice="'.$key.'" value="" class="slider form-control posHorizontal posHorizontal'.$key.'" 
                                                        typeSlide = "'.$value["typeSlide"] .'"
                                                        data-slider-min="0" 
                                                        data-slider-max="50"
                                                        data-slider-step="5"
                                                        data-slider-value="'.$styleImgProduct["left"].'" 
                                                        data-slider-orientation="horizontal"
                                                        data-slider-selection="before" 
                                                        data-slider-tooltip="show" 
                                                        data-slider-id="blue">';

                                                    }


                                                    echo '
                                                    <label>ANCHO de la imagen del producto: </label>
                                                    <input type="text" indice="'.$key.'" value="" class="slider form-control anchoImagen anchoImagen'.$key.'" data-slider-min="0" 
                                                    data-slider-max="50"
                                                    data-slider-step="5"
                                                    data-slider-value="'.$styleImgProduct["width"].'" 
                                                    data-slider-orientation="horizontal"
                                                    data-slider-selection="before" 
                                                    data-slider-tooltip="show" 
                                                    data-slider-id="green">

                                                </div>

                                            </div>

                                        </div>

                                        <!--=====================================
                                        TERCER BLOQUE
                                        ======================================--> 

                                        <div class="col-md-4 col-xs-12">
                                        
                                            <div class="box-body">

                                                <!--=====================================
                                                CAMBIO TÍTULO 1
                                                ======================================--> 

                                                <div class="form-group">

                                                    <label>Título 1:</label>

                                                    <input type="text" class="form-control cambioTitulotext1" indice="'.$key.'"  value="'.$title1["text"].'">

                                                    <div class="input-group my-colorpicker">
                                                    
                                                        <input type="text" class="form-control cambioColortext1" indice="'.$key.'" value="'.$title1["color"].'">

                                                        <div class="input-group-addon">

                                                            <i></i>

                                                        </div>

                                                    </div>

                                                </div>

                                                <!--=====================================
                                                CAMBIO TÍTULO 2
                                                ======================================--> 

                                                <div class="form-group">

                                                    <label>Título 2:</label>

                                                    <input type="text" class="form-control cambioTitulotext2" indice="'.$key.'" value="'.$title2["text"].'">

                                                    <div class="input-group my-colorpicker">
                                                    
                                                        <input type="text" class="form-control cambioColortext2" indice="'.$key.'" value="'.$title2["color"].'">

                                                        <div class="input-group-addon">

                                                            <i></i>

                                                        </div>

                                                    </div>

                                                </div>

                                                <!--=====================================
                                                CAMBIO TÍTULO 3
                                                ======================================--> 

                                                <div class="form-group">

                                                    <label>Título 3:</label>

                                                    <input type="text" class="form-control cambioTitulotext3" indice="'.$key.'" value="'.$title3["text"].'">

                                                    <div class="input-group my-colorpicker">
                                                    
                                                        <input type="text" class="form-control cambioColortext3" indice="'.$key.'" value="'.$title3["color"].'">

                                                        <div class="input-group-addon">

                                                            <i></i>

                                                        </div>

                                                    </div>

                                                </div>

                                                <!--=====================================
                                                MODIFICAR LA POSICIÓN DEL TEXTO
                                                ======================================--> 

                                                <div class="form-group">

                                                    <label>Posición VERTICAL del texto: </label>

                                                    <input type="text" indice="'.$key.'" value="" class="slider form-control posVerticaltext posVerticaltext'.$key.'" data-slider-min="0" 
                                                        data-slider-max="50"
                                                        data-slider-step="5"
                                                        data-slider-value="'.$styleTextSlide["top"].'" 
                                                        data-slider-orientation="horizontal"
                                                        data-slider-selection="before" 
                                                        data-slider-tooltip="show" 
                                                        data-slider-id="red">
                                                    
                                                    <label>Posición HORIZONTAL del texto: </label>';

                                                    if($value["typeSlide"] == "slideOption1"){

                                                        echo '
                                                        <input type="text" indice="'.$key.'" value="" class="slider form-control posHorizontaltext posHorizontaltext'.$key.'" 
                                                        typeSlide = "'.$value["typeSlide"] .'"
                                                        data-slider-min="0" 
                                                        data-slider-max="50"
                                                        data-slider-step="5"
                                                        data-slider-value="'.$styleTextSlide["left"].'" 
                                                        data-slider-orientation="horizontal"
                                                        data-slider-selection="before" 
                                                        data-slider-tooltip="show" 
                                                        data-slider-id="blue">';

                                                    }else{

                                                        echo '
                                                        <input type="text" indice="'.$key.'" value="" class="slider form-control posHorizontaltext posHorizontaltext'.$key.'" 
                                                        typeSlide = "'.$value["typeSlide"] .'"
                                                        data-slider-min="0" 
                                                        data-slider-max="50"
                                                        data-slider-step="5"
                                                        data-slider-value="'.$styleTextSlide["right"].'" 
                                                        data-slider-orientation="horizontal"
                                                        data-slider-selection="before" 
                                                        data-slider-tooltip="show" 
                                                        data-slider-id="blue">';

                                                    }

                                                    echo '
                                                        <label>ANCHO del texto: </label>
                                                        <input type="text" indice="'.$key.'" value="" class="slider form-control anchotext anchotext'.$key.'" data-slider-min="0" 
                                                        data-slider-max="50"
                                                        data-slider-step="5"
                                                        data-slider-value="'.$styleTextSlide["width"].'" 
                                                        data-slider-orientation="horizontal"
                                                        data-slider-selection="before" 
                                                        data-slider-tooltip="show" 
                                                        data-slider-id="green">

                                                </div>

                                            </div>
                                            
                                        </div>
                                
                                    </div>

                                    <!--=====================================
                                    VISOR SLIDE
                                    ======================================-->      

                                    <div class="slide">

                                        <img class="cambiarFondo" src="'.$value["imgBackground"].'">

                                        <div class="slideOptions '.$value["typeSlide"].'">

                                            <img class="imgProduct" src="'.$value["imgProduct"].'" style="top:'.$styleImgProduct["top"].'; right:'.$styleImgProduct["right"].'; width:'.$styleImgProduct["width"].'; left:'.$styleImgProduct["left"].'">        

                                            <div class="textsSlide" style="top:'.$styleTextSlide["top"].'; left:'.$styleTextSlide["left"].'; width:'.$styleTextSlide["width"].'; right:'.$styleTextSlide["right"].'">
                                            
                                                <h1 style="color:'.$title1["color"].'">'.$title1["text"].'</h1>

                                                <h2 style="color:'.$title2["color"].'">'.$title2["text"].'</h2>

                                                <h3 style="color:'.$title3["color"].'">'.$title3["text"].'</h3>';

                                                if($value["button"] != ""){

                                                    echo '
                                                    
                                                    <a href="'.$value["url"].'">
                                                        
                                                        <button class="btn btn-default backColor text-uppercase">

                                                        '.$value["button"].' <span class="fa fa-chevron-right"></span>

                                                        </button>

                                                    </a>';

                                                }

                                            echo '
                                            
                                            </div>  

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </li>';

                    }


                    ?>   

                </ul>

            </div>

        </div>
    
    </section>

</div>

<?php

  //$eliminarSlide = new ControladorSlide();
  //$eliminarSlide -> ctrEliminarSlide();

?>