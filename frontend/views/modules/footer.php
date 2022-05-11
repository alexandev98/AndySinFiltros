<?php

	//$ip = $_SERVER['REMOTE_ADDR'];


	$ip="201.183.99.38";

	$infoCountry = file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip);

	$dataCountry = json_decode($infoCountry);

	$country = $dataCountry->geoplugin_countryName;
	$code = $dataCountry->geoplugin_countryCode;

	$sendIp = ControllerVisits::sendIp($ip, $country, $code);

	$template = ControllerTemplate::styleTemplate();

	
?>

<!--===========================================
FOOTER
============================================-->

<footer class="container-fluid final" style="background:<?php echo $social["topBar"] ?>">
	
	<div class="container">
	
		<div class="row">
			
			<div class="col-sm-6 col-xs-12 text-left" style="color:<?php echo $social["topText"] ?>">

				<h5>&copy; 2022 Todos los derechos reservados. Sitio elaborado por 

					<a href="https://www.linkedin.com/in/marcelo-carvajal-60819520a/" target="_blank">

						Marcelo Carvajal

					</a>

                </h5>

			</div>

			<div class="col-sm-6 col-xs-12 text-right social">
				
				<ul>

				<?php
					
					$social = ControllerTemplate::styleTemplate();

					$jsonSocialMedia = json_decode($social["socialMedia"],true);		

					foreach ($jsonSocialMedia as $key => $value) {

						echo '

						<li>

							<a href="'.$value["url"].'" target="_blank">

								<i class="fa '.$value["network"].' socialNet '.$value["style"].'" aria-hidden="true"></i>

							</a>

						</li>';
						
					}

				?>

				</ul>

			</div>

		</div>

	</div>

</footer>

	