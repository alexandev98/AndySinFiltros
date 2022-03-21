<?php
    $server=Route::routeServer();
    $client = Route::routeClient();
  

?>

<!-- BREADCRUMB SHOPPING CART -->
<div class="container-fluid well well-sm">

    <div class="container">

        <div class="row">

            <ul class="breadcrumb text-uppercase fondoBreadcrumb">
                
                <li><a href="<?php echo$client;?>">CARRITO DE COMPRAS</a></li>
                <li class="active pagActive"><?php echo $routes[0]?></li>

            </ul>

        </div>
    </div>

</div>

<!-- TABLE SHOPPING CART -->
<div class="container-fluid">

    <div class="container">

        <div class="panel panel-default">

            <div class="panel-heading headerShoppingCart">

                <div class="col-md-6 col-sm-7 col-xs-12 text-center">

                    <h3>
                        <small>PRODUCTO</small>
                    </h3>

                </div>

                <div class="col-md-2 col-sm-1 col-xs-0 text-center">

                    <h3>
                        <small>PRECIO</small>
                    </h3>

                </div>

                <div class="col-md-2  col-xs-0 text-center">

                    <h3>
                        <small>CANTIDAD</small>
                    </h3>

                </div>

                <div class="col-sm-2  col-xs-0 text-center">

                    <h3>
                        <small>SUBTOTAL</small>
                    </h3>

                </div>
            
            </div>

            <!-- BODY SHOPPING CART -->
            <div class="panel-body bodyCart">

                <div class="row itemCarrito">

                    <div class="col-sm-1 col-xs-12">

                        <br>

                        <center>

                            <button class="btn btn-default backColor">

                                <i class="fa fa-times"></i>

                            </button>

                        </center>

                    </div>

                    <div class="col-sm-1 col-xs-12">

                        <figure>
                            <img src="http://localhost:82/andysinfiltros/backend/views/img/products/cursos/curso08.jpeg" class="img-thumbnail">
                        </figure>

                        

                    </div>

                    <div class="col-sm-4 col-xs-12">

                        <br>

                        <p class="titleShoppingCart text-left">Asesoria Personalizada</p>

                    </div>

                    <div class="col-md-2 col-sm-1 col-xs-12">

                        <br>

                        <p class="priceShoppingCart text-center">USD $ <span>10</span></p>

                    </div>

                    <div class="col-md-2 col-sm-3 col-xs-8">

                        <br>

                            <div class="col-xs-8">

                                <center>

                                    <input type="number" class="form-control"  min="1" value="1" readonly>

                                </center>

                            </div>
                        
                    </div>

                    <div class="col-md-2 col-sm-1 col-xs-4 text-center">

                        <br>

                        <p>
                            <strong>USD $<span>10</span></strong>
                        </p>

                    </div>



                </div>

                <div class="clear-fix"></div>

                <hr>

                <div class="row itemCarrito">

                    <div class="col-sm-1 col-xs-12">

                        <br>

                        <center>

                            <button class="btn btn-default backColor">

                                <i class="fa fa-times"></i>

                            </button>

                        </center>

                    </div>

                    <div class="col-sm-1 col-xs-12">

                        <figure>
                            <img src="http://localhost:82/andysinfiltros/backend/views/img/products/cursos/curso08.jpeg" class="img-thumbnail">
                        </figure>

                        

                    </div>

                    <div class="col-sm-4 col-xs-12">

                        <br>

                        <p class="titleShoppingCart text-left">Asesoria Personalizada</p>

                    </div>

                    <div class="col-md-2 col-sm-1 col-xs-12">

                        <br>

                        <p class="priceShoppingCart text-center">USD $ <span>10</span></p>

                    </div>

                    <div class="col-md-2 col-sm-3 col-xs-8">

                        <br>

                            <div class="col-xs-8">

                                <center>

                                    <input type="number" class="form-control"  min="1" value="1" readonly>

                                </center>

                            </div>
                        
                    </div>

                    <div class="col-md-2 col-sm-1 col-xs-4 text-center">

                        <br>

                        <p>
                            <strong>USD $<span>10</span></strong>
                        </p>

                    </div>



                </div>

                <div class="clear-fix"></div>

                <hr>

            </div>

            <!-- SUM PRODUCTS -->

            <div class="panel-body sumaCarrito">

                <div class="col-md-4 col-sm-6 col-xs-12 pull-right well">
                    
                    <div class="col-xs-6">
                        
                        <h4>TOTAL:</h4>

                    </div>

                    <div class="col-xs-6">

                        <h4 class="sumaSubTotal">
                            
                            <strong>USD $<span>21</span></strong>

                        </h4>

                    </div> 

                </div>

            </div>

            <!--=====================================
            BOTÓN CHECKOUT
            ======================================-->

            <div class="panel-heading headerCheckout">
                
                <button class="btn btn-default backColor btn-lg pull-right">REALIZAR PAGO</button>

            </div>


        </div>

    </div>

</div>
