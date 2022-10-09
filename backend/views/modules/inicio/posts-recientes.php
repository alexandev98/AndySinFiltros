<?php

$posts = ControllerBlog::showTotalPosts("date");

?>

<div class="box box-primary">

    <div class="box-header with-border">

        <h3 class="box-title">Publicaciones agregadas recientemente</h3>

            <div class="box-tools pull-right">

                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
               
            </div>

    </div>
    <!-- /.box-header -->

    <div class="box-body">

        <ul class="products-list product-list-in-box">

            <?php
            
                for($i = 0; $i < count($posts); $i++) {

                    if($i < 5){

                        echo '

                            <li class="item">

                                <div class="product-img">

                                    <img src="'.$posts[$i]["front"].'" alt="Product Image">

                                </div>

                                <div class="product-info">

                                    <a href="" class="product-title">'.$posts[$i]["title"].'
                                    
                                </div>

                            </li>';
                    }else{
                        break;
                    }

                }

            ?>

        </ul>

    </div>
    <!-- /.box-body -->
    
        <div class="box-footer text-center">
            <a href="blog" class="uppercase">Ver todas las publicaciones</a>
        </div>
        <!-- /.box-footer -->
</div>