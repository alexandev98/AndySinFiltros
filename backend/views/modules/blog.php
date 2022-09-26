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
              <th>Categoría</th>
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
                
                    <span class="input-group-addon"><i class="fa fa-blog"></i></span> 

                    <input type="text" class="form-control validarPublicacion tituloPublicacion"  placeholder="Ingresar título publicación">

                    </div>

                </div>

                <!--=====================================
                ENTRADA PARA LA RUTA DE LA PUBLICACION
                ======================================-->

                <div class="form-group">
                
                    <div class="input-group">
                    
                        <span class="input-group-addon"><i class="fa fa-link"></i></span> 

                        <input type="text" class="form-control rutaPublicacion" placeholder="Ruta url de la publicación" readonly>

                    </div>

                </div>

                <!--=====================================
                AGREGAR FOTO DE MULTIMEDIA
                ======================================-->

                <div class="form-group row">

                  <div class="col-md-4">

                    <div class="panel">SUBIR FOTO PRINCIPAL DE LA PUBLICACIÓN</div>
    
                    <input type="file" class="fotoPrincipal">
    
                    <p class="help-block">Tamaño recomendado 450px * 450px <br> Peso máximo de la foto 2MB</p>
    
                    <img src="views/img/categories/default/default.jpg" class="img-thumbnail previsualizarPrincipal" width="200px">
    
                  </div>

                  <div class="col-md-8">

                    <div class="panel">SUBIR FOTOS ADICIONALES</div>

                      <p class="help-block">Tamaño recomendado 450px * 450px <br> Peso máximo de la foto 2MB</p>
      
                      <!--=====================================
                      SUBIR MULTIMEDIA DE BLOG
                      ======================================-->

                      <div class="row previsualizarImgBlog"></div>
                      
                      <div class="multimediaBlog needsclick dz-clickable">

                          <div class="dz-message needsclick">
                          
                          Arrastrar o dar click para subir imagenes.

                          </div>

                      </div>

                  </div>
                    
                </div>

                <div class="form-group">

                  <div class="panel">TEXTO DE LA PUBLICACIÓN</div>

                  <div class="textoPublicacion" id="summernote"></div>

                </div>

                <!--=====================================
                AGREGAR PALABRAS CLAVES
                ======================================-->

                <div class="form-group editarPalabrasClaves">

                  <div class="input-group">
                      
                    <span class="input-group-addon"><i class="fa fa-key"></i></span>

                    <input type="text" class="form-control tagsInput pClavesPublicacion" value="" data-role="tagsinput">

                  </div>

                </div>

                <!--=====================================
                AGREGAR FOTO DE PORTADA
                ======================================-->
                <br>

                <div class="form-group fotoOpenG">
                  
                  <div class="panel">SUBIR FOTO PORTADA</div>

                  <input type="file" class="fotoPortada">
                  <input type="hidden" class="antiguaFotoPortada">

                  <p class="help-block">Tamaño recomendado 1280px * 720px <br> Peso máximo de la foto 2MB</p>

                  <img src="views/img/open_graph/default/default.jpg" class="img-thumbnail previsualizarPortada" width="100%">

                </div> 

              
            </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

            <button type="button" class="btn btn-primary guardarPublicacion">Guardar cambios</button>

        </div>

    </div>

  </div>
 
</div>


<!--=====================================
MODAL EDITAR PUBLICACION
======================================-->

<div id="modalEditarPublicacion" class="modal fade" role="dialog">

  <div class="modal-dialog modal-lg">

    <div class="modal-content ">

       <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar publicación</h4>

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
                
                      <span class="input-group-addon"><i class="fa fa-blog"></i></span> 

                      <input type="text" class="form-control validarPublicacion tituloPublicacion" readonly>

                      <input type="hidden" class="idPublicacion">
                      <input type="hidden" class="idCabecera">

                    </div>

                </div>

                <!--=====================================
                ENTRADA PARA LA RUTA DE LA PUBLICACION
                ======================================-->

                <div class="form-group">
                
                    <div class="input-group">
                    
                        <span class="input-group-addon"><i class="fa fa-link"></i></span> 

                        <input type="text" class="form-control rutaPublicacion" readonly>

                    </div>

                </div>

                <!--=====================================
                AGREGAR FOTO DE MULTIMEDIA
                ======================================-->

                <div class="form-group row">

                  <div class="col-md-4">

                    <div class="panel">SUBIR FOTO PRINCIPAL DE LA PUBLICACIÓN</div>
    
                    <input type="file" class="fotoPrincipal">
                    <input type="hidden" class="antiguaFotoPrincipal">
    
                    <p class="help-block">Tamaño recomendado 450px * 450px <br> Peso máximo de la foto 2MB</p>
    
                    <img src="views/img/categories/default/default.jpg" class="img-thumbnail previsualizarPrincipal" width="200px">
    
                  </div>

                  <div class="col-md-8">

                    <div class="panel">SUBIR FOTOS ADICIONALES</div>

                      <p class="help-block">Tamaño recomendado 450px * 450px <br> Peso máximo de la foto 2MB</p>
      
                      <!--=====================================
                      SUBIR MULTIMEDIA DE BLOG
                      ======================================-->

                      <div class="row previsualizarImgBlog"></div>
                      
                      <div class="multimediaBlog needsclick dz-clickable">

                          <div class="dz-message needsclick">
                          
                          Arrastrar o dar click para subir imagenes.

                          </div>

                      </div>

                  </div>
                    
                </div>

                <div class="form-group">

                  <div class="panel">TEXTO DE LA PUBLICACIÓN</div>

                  <div class="textoPublicacion" id="summernote"></div>

                </div>

                <!--=====================================
                AGREGAR PALABRAS CLAVES
                ======================================-->

                <div class="form-group editarPalabrasClaves">

                </div>

                <!--=====================================
                AGREGAR FOTO DE PORTADA
                ======================================-->
                <br>

                <div class="form-group fotoOpenG">
                  
                  <div class="panel">SUBIR FOTO PORTADA</div>

                  <input type="file" class="fotoPortada">
                  <input type="hidden" class="antiguaFotoPortada">

                  <p class="help-block">Tamaño recomendado 1280px * 720px <br> Peso máximo de la foto 2MB</p>

                  <img src="views/img/open_graph/default/default.jpg" class="img-thumbnail previsualizarPortada" width="100%">

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

<?php

  $eliminarPublicacion = new ControllerBlog();
  $eliminarPublicacion -> eliminarPublicacion();

?>





