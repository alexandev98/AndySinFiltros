<?php

$products = ControllerProducts::showTotalProducts("date");

?>

<div class="box box-primary">

    <div class="box-header with-border">

        <h3 class="box-title">Productos agregados recientemente</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
               
            </div>

    </div>
    <!-- /.box-header -->

    <div class="box-body">

        <ul class="products-list product-list-in-box">

            <?php
            
                foreach ($products as $key => $value) {

                    if($value["price"] != 0){

                        echo '

                        <li class="item">

                            <div class="product-img">

                                <img src="'.$value["front"].'" alt="Product Image">

                            </div>

                            <div class="product-info">

                                <a href="" class="product-title">'.$value["title"].'
                                    <span class="label label-warning pull-right">$'.$value["price"].'</span></a>
                                
                            </div>

                        </li>';

                    }

                    

                }

            ?>

        </ul>

    </div>
    <!-- /.box-body -->
    
        <div class="box-footer text-center">
            <a href="productos" class="uppercase">Ver todos los productos</a>
        </div>
        <!-- /.box-footer -->
</div>