<?php

$template = ControllerCommerce::selectTemplate();

?>

<div class="box box-danger">
	
	<div class="box-header with-border">

		<h3 class="box-title">CÓDIGOS</h3>

		<div class="box-tools pull-right">

      		<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">

        		<i class="fa fa-minus"></i>

        	</button>

        </div>
	
	</div>

	<div class="box-body">
	 	
 		<div class="form-group">
      
      		<label for="comment">Api de Facebook:</label>
      
      		<textarea class="form-control changeScript" rows="5" id="apiFacebook">

      		<?php echo $template["apiFacebook"]; ?>

      		</textarea>
    
	 	</div>


	 	<div class="form-group">
      
  			<label for="comment">Pixel de Facebook:</label>
      
  			<textarea class="form-control changeScript" rows="5" id="pixelFacebook">

  			<?php echo $template["pixelFacebook"]; ?>
    
  			</textarea>
    
    	</div>

    	<div class="form-group">
      
  			<label for="comment">Google Analytics:</label>
      
  			<textarea class="form-control changeScript" rows="5" id="googleAnalytics">

  			<?php echo $template["googleAnalytics"]; ?>
      
  			</textarea>
    
    	</div>

	</div>

	<div class="box-footer">
      
    	<button type="button" id="saveScript" class="btn btn-primary pull-right">Guardar</button>
    
  	</div>

</div>