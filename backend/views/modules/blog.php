<div class="content-wrapper">
    
  <section class="content-header">
      
    <h1>
      Gestor publicaciones
    </h1>
 
    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Gestor publicaciones</li>
      
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
         
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarPublicacion">
          
          Agregar Publicación

        </button>

      </div>

      <div class="box-body">
         
        <table class="table table-bordered table-striped dt-responsive tablaPublicaciones" width="100%">

          <thead>
            
            <tr>
              
              <th style="width:10px">#</th>
              <th>Título</th>
              <th>Ruta</th>
              <th>Estado</th>
              <th>Portada</th>
              <th>Imagen Principal</th>
              <th>Acciones</th>

            </tr>

          </thead>

        </table> 

      </div>
        
    </div>

  </section>

</div>


<!--=====================================
MODAL AGREGAR PUBLICACION
======================================-->

<div id="modalAgregarPublicacion" class="modal fade" role="dialog">

  <div class="modal-dialog modal-lg">

    <div class="modal-content ">

       <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar publicación</h4>

        </div>

         <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

           <div class="box-body">

                <!--=====================================
                ENTRADA PARA EL TÍTULO
                ======================================-->

                <div class="form-group">
                
                    <div class="input-group">
                
                    <span class="input-group-addon"><i class="fa fa-person-chalkboard"></i></span> 

                    <input type="text" class="form-control input-lg validarPublicacion tituloPublicacion"  placeholder="Ingresar título publicación">

                    </div>

                </div>

                <!--=====================================
                ENTRADA PARA LA RUTA DE LA PUBLICACION
                ======================================-->

                <div class="form-group">
                
                    <div class="input-group">
                    
                        <span class="input-group-addon"><i class="fa fa-link"></i></span> 

                        <input type="text" class="form-control input-lg rutaPublicacion" placeholder="Ruta url de la publicación" readonly>

                    </div>

                </div>

                <!--=====================================
                AGREGAR FOTO DE MULTIMEDIA
                ======================================-->

                <div class="form-group col-md-6">
                    
                    <div class="panel">SUBIR FOTO PRINCIPAL DE LA PUBLICACION</div>
    
                    <input type="file" class="fotoPrincipal">
    
                    <p class="help-block">Tamaño recomendado 400px * 450px <br> Peso máximo de la foto 2MB</p>
    
                    <img src="views/img/products/default/default.jpg" class="img-thumbnail previsualizarPrincipal" width="200px">
    
                </div>

                <div class="form-group col-md-6">
                    
                    <div class="panel">SUBIR FOTOS ADICIONALES</div>

                    <p class="help-block">Tamaño recomendado 400px * 450px <br> Peso máximo de la foto 2MB</p>
    
                    <!--=====================================
                    SUBIR MULTIMEDIA DE PRODUCTO FÍSICO
                    ======================================-->

                    <div class="row previsualizarImgFisico"></div>
                    
                    <div class="multimediaBlog needsclick dz-clickable">

                        <div class="dz-message needsclick">
                        
                        Arrastrar o dar click para subir imagenes.

                        </div>

                    </div>
   
                </div>

                <div class="clearfix"></div>


                <div class="box-body pad">

                    <form>
                     
                        </ul><textarea class="textarea" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid rgb(221, 221, 221); padding: 10px; display: none;" placeholder="Place some text here"></textarea><input type="hidden" name="_wysihtml5_mode" value="1"><iframe class="wysihtml5-sandbox" security="restricted" allowtransparency="true" frameborder="0" width="0" height="0" marginwidth="0" marginheight="0" style="display: inline-block; background-color: rgb(255, 255, 255); border-collapse: separate; border-color: rgb(221, 221, 221); border-style: solid; border-width: 1px; clear: none; float: none; margin: 0px; outline: rgb(51, 51, 51) none 0px; outline-offset: 0px; padding: 10px; position: static; inset: auto; z-index: auto; vertical-align: baseline; text-align: start; box-sizing: border-box; box-shadow: none; border-radius: 0px; width: 100%; height: 200px;"></iframe>
                    </form>

                </div>

            </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

            <button type="button" class="btn btn-primary guardarCambiosPublicacion">Guardar cambios</button>

        </div>

    </div>

  </div>
 
</div>

<script>
  $(function () {
   
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>


