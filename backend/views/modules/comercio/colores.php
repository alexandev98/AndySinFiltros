<?php

$template = ControllerCommerce::selectTemplate();

var_dump($template);


?>

<div class="box box-warning">

    <div class="box-header with-border">

        <h3 class="box-title">PALETA DE COLOR</h3>

        <div class="box-tools pull-right">

            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i>
            </button>

        </div>

    </div>

    <div class="box-body">

        <div class="form-group">

            <label>Color Barra Superior</label>

            <div class="input-group my-colorpicker">

                <input type="text" class="form-control my-colorpicker cambioColor" id="barraSuperior" value="<?php echo $template["topBar"];   ?>">

                <div class="input-group-addon">
                    <i></i>
                </div>

            </div>

            <label>Color Texto Superior</label>

            <div class="input-group my-colorpicker">

                <input type="text" class="form-control my-colorpicker cambioColor" id="barraSuperior" value="<?php echo $template["topText"];   ?>">

                <div class="input-group-addon">
                    <i></i>
                </div>

            </div>

            <label>Color Fondo</label>

            <div class="input-group my-colorpicker">

                <input type="text" class="form-control my-colorpicker cambioColor" id="barraSuperior" value="<?php echo $template["colorBackground"];   ?>">

                <div class="input-group-addon">
                    <i></i>
                </div>

            </div>

            <label>Color Texto</label>

            <div class="input-group my-colorpicker">

                <input type="text" class="form-control my-colorpicker cambioColor" id="barraSuperior" value="<?php echo $template["colorText"];   ?>">

                <div class="input-group-addon">
                    <i></i>
                </div>

            </div>

        </div>



    </div>

    <div class="box-footer">

        <button type="button" id="guardarColores" class="btn btn-primary pull-right">Guardar Colores</button>

    </div>

</div>