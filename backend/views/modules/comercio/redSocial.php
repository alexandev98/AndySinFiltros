<?php

$template = ControllerCommerce::selectTemplate();

$socialMedia = json_decode($template["socialMedia"], true);

?>

<div class="box box-success">

    <div class="box-header with-border">

        <h3 class="box-title">REDES SOCIALES</h3>

        <div class="box-tools pull-right">

            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i>
            </button>

        </div>

    </div>

    <div class="box-body">

        <div class="form-group">

            <label class="checkbox-inline"><input type="radio" value="color" name="colorRedSocial"> Color</label>
            <label class="checkbox-inline"><input type="radio" value="blanco" name="colorRedSocial"> Blanco</label>
            <label class="checkbox-inline"><input type="radio" value="negro" name="colorRedSocial"> Negro</label>

        </div>

        <?php

            foreach ($socialMedia as $key => $value) {

                echo '
                
                <div class="form-group row">

                    <div class="col-xs-8">

                        <div class="input-group">

                            <span class="input-group-addon"><i class="fa '.$value["network"].' '.$value["style"].' socialNet"></i></span>

                            <input type="text" class="form-control input-lg changeUrlNet" value="'.$value["url"].'">
                        </div>

                    </div>

                    <div class="col-xs-2">';

                    if($value["active"] != 0){
                        
                        echo '<input type="checkbox" class="selectSocialMedia" route="'.$value["url"].'" network="'.$value["network"].'" estilo="'.$value["style"].'" validateNet="'.$value["active"].'" checked >';

                    }else{

                        echo '<input type="checkbox" class="selectSocialMedia" route="'.$value["url"].'" network="'.$value["network"].'" estilo="'.$value["style"].'" validateNet="'.$value["active"].'">';

                    }

                    echo '</div>
                
                </div>';
            }

        ?>

    </div>

    <input type="hidden" id="valueSocialMedia" value="<?php echo $template["socialMedia"]; ?>">

    <div class="box-footer">

        <button type="button" id="saveSocialMedia" class="btn btn-primary pull-right">Guardar

        </button>

    </div>

</div>

