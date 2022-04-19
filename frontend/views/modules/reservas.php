<?php
    $server=Route::routeServer();

    $client = Route::routeClient();

	if(isset($_POST["idProduct"])){

		$item =  "id";
		$value = $_POST["idProduct"];
		$infoproduct = ProductController::showInfoProduct($item, $value);
		
		$fechaIngreso = new DateTime($_POST["fecha-ingreso"]);
		$fechaSalida = new DateTime($_POST["fecha-salida"]);

	
		$bookings = BookingController::showBookings($value);

		


	
		//$reservas = ControladorReservas::ctrMostrarReservas($valor);
	
		//$indice = 0;

	}else{

		echo '<script> window.location="'.$client.'"</script>';

	}
  
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
INFO RESERVAS
======================================-->

<div class="infoReservas container-fluid">
	
	<div class="container">
		
		<div class="row">

			<!--=====================================
			BLOQUE IZQ
			======================================-->
			
			<div class="col-12 col-lg-8 colIzqReservas">

				<!--=====================================
				CALENDARIO RESERVAS
				======================================	-->

				<div class="bg-white calendarioReservas">

					<h1 class="pull-left">¡Está Disponible!</h1>

					<div class="pull-right">
							
						<ul>
							<li>
								<i class="fa fa-square" style="color:#847059"></i> No disponible
							</li>

							<li>
								<i class="fa fa-square" style="color:#eee"></i> Disponible
							</li>

							<li>
								<i class="fa fa-square" style="color:#FFCC29"></i> Tu reserva
							</li>
						</ul>

					</div>

					<div class="clearfix"></div>
			
					<div id="calendar1"></div>

					<!--=====================================
					MODIFICAR FECHAS
					======================================	-->

					<h6 class="lead pt-4 pb-2">Puede modificar la fecha de acuerdo a los días disponibles:</h6>

				

				</div>

			</div>

			<!--=====================================
			BLOQUE DER
			======================================-->

			<div class="col-12 col-lg-4 colDerReservas">
				
			<?php

				echo '

				<div class="buyNow" style="display:none">

					<button class="btn btn-default backColor" idProduct="'.$infoproduct["id"].'"></button>

					<p class="titleShopCart text-left">'.$infoproduct["title"].'</p>';

				if($infoproduct["offer"] == 0){

					echo'
					
					<input class="itemQuantity" value="1" type="'.$infoproduct["type"].'" price="'.$infoproduct["price"].'" idProduct="'.$infoproduct["id"].'">

						<p class="subTotal'.$infoproduct["id"].' subtotals">

							<strong>USD $<span>'.$infoproduct["price"].'</span></strong>

						</p>

						<div class="sumSubTotal"><span>'.$infoproduct["price"].'</span></div>';


				}else{

					echo'
					
					<input class="itemQuantity" value="1" type="'.$infoproduct["type"].'" price="'.$infoproduct["offerPrice"].'" idProduct="'.$infoproduct["id"].'">

						<p class="subTotal'.$infoproduct["id"].' subtotals">

							<strong>USD $<span>'.$infoproduct["offerPrice"].'</span></strong>

						</p>

						<div class="sumSubTotal"><span>'.$infoproduct["offerPrice"].'</span></div>';

				}

				echo '

				</div>';

			?>

				<h2 class="colorTitulos"><strong><?php echo $infoproduct["title"]; ?></strong></h2>

				<img src="<?php echo $server.$infoproduct["front"]; ?>" class="img-thumbnail">

				<div class="form-group">
				  <label>Fecha y Hora de Inicio:</label>
				  <input type="text" class="form-control" value="<?php echo $_POST["fecha-ingreso"];?>" readonly>
				</div>

				<div class="form-group">
				  <label>Fecha y hora de Fin:</label>
				  <input type="text" class="form-control" value="<?php echo $_POST["fecha-salida"];?>" readonly>
				</div>

				<div class="row">

					<div class="col-12 col-lg-6 col-xl-7 text-center">

					<?php

					if($infoproduct["price"] != 0){

						if($infoproduct["offer"] == 0){

							echo '

							<h1 class="text-muted">USD $'.$infoproduct["price"].'</h1>';

						}else{

							echo '

							<h1 class="text-muted">

								<strong class="offer">USD $'.$infoproduct["price"].'</strong>

								$'.$infoproduct["offerPrice"].'

							</h1>';

						}

					}

					?>

					</div>


					
					<div class="col-12 col-lg-6 col-xl-5">

						<?php

						if(isset($_SESSION["validateSesion"])){

							if($_SESSION["validateSesion"] == "ok"){

								echo '
								
								<a id="btnCheckout" href="#modalBuyNow" data-toggle="modal" idUser="'.$_SESSION["id"].'">

										<button class="btn btn-dark btn-block btn-lg backColor">

											<small>COMPRAR <br> AHORA</small> 

										</button>
									
								</a>';

							}

						}else{

							echo '

							<a href="#modalIngreso" data-toggle="modal">

								<button class="btn btn-dark btn-block btn-lg backColor">

									<small>COMPRAR <br> AHORA</small>
									
								</button>
								
							</a>';

						}

						?>
				
					</div>
			
				</div>

			</div>

		</div>

	</div>

</div>


<!--=====================================
VENTANA MODAL PARA CHECKOUT
======================================-->

<div id="modalBuyNow" class="modal fade modalForm" role="dialog">
	
	<div class="modal-content modal-dialog" >

        <div class="modal-body modalTitle">

            <h3 class="backColor">REALIZAR PAGO</h3>

            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <div class="contentCheckout">

                <?php

                $response = CartController::showRates();
                
				echo '

                <input type="hidden" id="taxRate" value="'.$response["tax"].'">

                ';

                ?>

                <div class="formPay row">

                    <h4 class="text-center well text-muted text-uppercase">Forma de pago</h4>
                        
                    <figure class="col-xs-12">

                        <center>

                            <img src="<?php echo $client;?>views/img/template/paypal.jpg" class="img-thumbnail">

                        </center>

                      
                    </figure>

                </div>

                <br>

                <div class="listProduct row">

                    <h4 class="text-center well text-muted text-uppercase">Producto a comprar</h4>

                    <table class="table table-striped tableProduct">

                        <thead>

                            <tr>

                                <th>Producto</th>

                                <th>Cantidad</th>

                                <th>Precio</th>

                            </tr>

                        </thead>

                        <tbody>

                        </tbody>

                    </table>

                    <div class="col-sm-6 col-xs-12 pull-right">

                        <table class="table table-striped tableTa">

                            <tbody>

                                <tr>

                                    <td>Subtotal</td>

                                    <td><span >USD</span> $<span class="valueSubtotal" value="0">0</span></td>

                                </tr>

                                <tr>
									<td>Impuesto</td>

                                    <td><span >USD</span> $<span class="valueTotalTax" value="0">0</span></td>
                                    	
								</tr>
                               
                                <tr>

                                    <td><strong>Total</strong></td>

                                    <td><span >USD</span> $<span class="valueTotalBuy" value="0">0</span></td>

                                </tr>

                            </tbody>

                        </table>
                            
                        <br>
                        
                    </div>

                    <div class="clearfix"></div>

                    <button class="btn btn-block btn-lg btn-default backColor btnPay">PAGAR</button>

                </div>

            </div>

        </div>

        <div class="modal-footer"></div>

    </div>

</div>
