<?php

$notificaciones = ControllerNotifications::showNotifications();

$totalNotificaciones = $notificaciones["nuevosUsuarios"] + $notificaciones["nuevasVentas"];

?>


<!--=====================================
NOTIFICACIONES
======================================-->

<!-- notifications-menu -->
<li class="dropdown notifications-menu">
	
	<!-- dropdown-toggle -->
	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
		
		<i class="fa fa-bell"></i>

		<?php

			if($totalNotificaciones != 0){

				echo '<span class="label label-warning">'.$totalNotificaciones.'</span>';

			}
		?>
		
	
	
	</a>
	<!-- dropdown-toggle -->

	<!--dropdown-menu -->
	<ul class="dropdown-menu">

		<li class="header">Tienes <?php  echo $totalNotificaciones; ?> notificaciones</li>

		<li>
			<!-- menu -->
			<ul class="menu">

				<?php

					if($notificaciones["nuevosUsuarios"] != 0){

						echo '
						
						<li>
				
							<a href="usuarios" class="actualizarNotificaciones" item="nuevosUsuarios">
							
								<i class="fa fa-users text-aqua"></i>'.$notificaciones["nuevosUsuarios"].' nuevos usuarios registrados hoy
							
							</a>
	
						</li>';

					}


					if($notificaciones["nuevasVentas"] != 0){

						echo '

						<!-- ventas -->
						<li>
						
							<a href="ventas" class="actualizarNotificaciones" item="nuevasVentas">
							
								<i class="fa fa-shopping-cart text-aqua"></i>'.$notificaciones["nuevasVentas"].' nuevas ventas hoy
							
							</a>

						</li>
						
						';
					}
				?>
				
			</ul>
			<!-- menu -->

		</li>

	</ul>
	<!--dropdown-menu -->

</li>
<!-- notifications-menu -->	