<header class="main-header">

    <!-- logo -->
    <a href="#" class="logo">
      
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="views/img/template/icono.png" class="img-responsive" style="padding:10px; filter:contrast(200%);"></span>
      <!-- logo for regular state and mobile devices -->    
      <span class="logo-lg"><img src="views/img/template/logo.png" class="img-responsive" style="padding:10px 30px; filter:contrast(200%);"></span>
    
    </a>
    <!-- logo -->

    <!-- navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
		
		 <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

		<!-- navbar-custom-menu -->
    	<div class="navbar-custom-menu"> 

    		<ul class="nav navbar-nav">
			
				<?php

					include "header/notifications.php";

					include "header/user.php";

				?>

    		</ul>

    	</div>
		<!-- navbar-custom-menu -->

    </nav>
    <!-- navbar -->


</header>
