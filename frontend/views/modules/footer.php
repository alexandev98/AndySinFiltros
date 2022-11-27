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

<footer style="background:<?php echo $social["topBar"] ?>">
	
	<div class="container">

		<div class="col-lg-12">

			<div class="under-footer">

				<p>Copyright © 2022 AndySinFiltros. Todos los derechos reservados. 
				
				<br>Desarrollado por: <a href="https://www.linkedin.com/in/marcelo-alexander-carvajal-tamayo" target="_blank">Marcelo Carvajal Tamayo</a></p>

				<ul>

					<?php
					
						$social = ControllerTemplate::styleTemplate();

						$jsonSocialMedia = json_decode($social["socialMedia"],true);		

						foreach ($jsonSocialMedia as $key => $value) {

							if($value["active"] != 0){

								echo '

								<li>

									<a href="'.$value["url"].'" target="_blank">

										<i class="fa '.$value["network"].' socialNet '.$value["style"].'" aria-hidden="true"></i>

									</a>

								</li>';

							}
						}

					?>

				</ul>

			</div>

		</div>
	
	</div>

</footer>

	