<!-- SLIDESHOW -->

<div class="container-fluid" id="slide">

    <div class="row">
       
        <ul>

            <!-- SLIDE -->

            <?php

                $slide = ControllerSlide::showSlide();
                $server=Route::routeServer();

                foreach ($slide as $key => $value) {
                    $styleImgProduct=json_decode($value["styleImgProduct"], true);
                    $styleTextSlide=json_decode($value["styleTextSlide"], true);
                    $title1=json_decode($value["title1"], true);
                    $title2=json_decode($value["title2"], true);
                    $title3=json_decode($value["title3"], true);

                    echo '
                    
                    <li>

                        <img src="'.$server.$value["imgBackground"].'">

                        <div class="slideOptions '.$value["typeSlide"].'">';

                            if($value["imgProduct"] != null){
                                echo '

                                <img class="imgProduct" src="'.$server.$value["imgProduct"].'" style="top:'.$styleImgProduct["top"].'; right:'.$styleImgProduct["right"].'; left:'.$styleImgProduct["left"].'; width:'.$styleImgProduct["width"].'">';
                            }

                                echo '

                                <div class="textsSlide" style="top:'.$styleTextSlide["top"].'; right:'.$styleTextSlide["right"].'; left:'.$styleTextSlide["left"].'; width:'.$styleTextSlide["width"].'">

                                        <h1 style="color:'.$title1["color"].'">'.$title1["text"].'</h1>

                                        <h2 style="color:'.$title2["color"].'">'.$title2["text"].'</h2>
                                        
                                        <h3 style="color:'.$title3["color"].'">'.$title3["text"].'</h3>

                                        <a href="'.$value["url"].'">
                                            '.$value["button"].'
                                        </a>

                                </div>

                        </div>

                    </li>';
                }
            ?>
        </ul>

          <!-- PAGINATION -->
        <ol id="pagination">

                <?php

                for ($i=1; $i <= count($slide); $i++) { 
                    echo '
                    
                    <li item="'.$i.'"><span class="fa fa-circle"></span></li>';
                }

                ?>
        </ol>

        <!-- ARROWS -->
        <div class="arrows" id="back"><span class="fa fa-chevron-left"></span></div>
        <div class="arrows" id="advance"><span class="fa fa-chevron-right"></span></div>

    </div>

</div>

