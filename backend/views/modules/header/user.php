
<!-- user-menu -->
<li class="dropdown user user-menu">

	<!-- dropdown-toggle -->
	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
	
	<?php

		if($_SESSION["photoBackend"] == ""){

			echo '<img src="views/img/profiles/default/anonymous.png" class="user-image" alt="User Image">';

		}else{

			echo '<img src="'.$_SESSION["photoBackend"].'" class="user-image" alt="User Image">';

		}

	?>	

	<span class="hidden-xs"><?php echo $_SESSION["nameBackend"]; ?></span>

	</a>
	<!-- dropdown-toggle -->

	<!-- dropdown-menu -->
	<ul class="dropdown-menu">

		<li class="user-header">
		
		<?php

			if($_SESSION["photoBackend"] == ""){

				echo '<img src="views/img/profiles/default/anonymous.png" class="user-image" alt="User Image">';

			}else{

				echo '<img src="'.$_SESSION["photoBackend"].'" class="user-image" alt="User Image">';

			}


		?>

			<p>
				<?php echo $_SESSION["nameBackend"]; ?>
				<h4 style="color:white"><?php echo $_SESSION["profileBackend"]; ?></h4>
			</p>	
		
		</li>

		<li class="user-footer">
		
			<div class="pull-left">
				
				<a href="perfil" class="btn btn-default btn-flat">Perfil</a>
			
			</div>
			
			<div class="pull-right">
			
				<a href="salir" class="btn btn-default btn-flat">Salir</a>
			
			</div>
		</li>

	</ul>
	<!-- dropdown-menu -->

</li>
<!-- user-menu -->