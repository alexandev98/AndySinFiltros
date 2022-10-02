<div class="content-wrapper">
    
  <section class="content-header">
    
    <h1>
      Gestor banner
    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Gestor banner</li>
      
    </ol>

  </section>

  <section class="content">
    
    <div class="box">
       
      <div class="box-header with-border">
         
        <button class="btn btn-primary btnAgregar" data-toggle="modal" data-target="#modalAgregarBanner">

            Agregar banner

        </button>

      </div>

      <div class="box-body">
          
        <table class="table table-bordered table-striped dt-responsive tablaBanner" width="100%">

          <thead>
            
            <tr>
              
              <th style="width:10px">#</th>
              <th>Imagen</th>
              <th>Estado</th>
              <th>Ruta</th>
              <th>Acciones</th>

            </tr>

          </thead>

        </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR BANNER
======================================-->

<div id="modalAgregarBanner" class="modal fade" role="dialog">
  
  <div class="modal-dialog modal-lg">
    
    <div class="modal-content">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <h4 class="modal-title">Agregar banner</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <div class="row">

            <!--=====================================
            PRIMER BLOQUE
            ======================================--> 

              <div class="col-md-6 col-xs-12">

                <!--=====================================
                MODIFICAR EL TIPO DE SLIDE
                ======================================--> 

                <div class="form-group">

                  <input type="hidden" class="typeSlide" value="">

                  <div class="panel">UBICACION DEL TEXTO</div>

                  <label class="checkbox-inline"><input type="radio" value="izq" name="ubicacionTextoBanner" estilo="textLeft"> Izquierda</label>
                  <label class="checkbox-inline"><input type="radio" value="cen" name="ubicacionTextoBanner" estilo="textCenter"> Centro</label>
                  <label class="checkbox-inline"><input type="radio" value="der" name="ubicacionTextoBanner" estilo="textRight" checked> Derecha</label>

                </div> 
                
                <!--=====================================
                ENTRADA PARA SUBIR IMAGEN DEL BANNER
                ======================================-->

                <div class="form-group">
                  
                  <div class="panel">SUBIR IMAGEN BANNER</div>

                    <input type="file" class="fotoBanner">
      
                    <p class="help-block">Tamaño recomendado 550px * 1600px <br> Peso máximo de la foto 2MB</p>

                    <img src="views/img/banner/default/default.jpg" class="img-thumbnail previsualizarBanner" width="200px">

                </div>

                <!--=====================================
                SELECCIONAR TIPO BANNER
                ======================================-->

                <div class="form-group">
                  
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                    <select class="form-control seleccionarTipoBanner" name="tipoBanner">
                      
                      <option value="">Selecionar tipo</option>
                      <option value="sin-categoria">Sin Categoría</option>
                      <option value="categories">Categorías</option>
      
                    </select>

                  </div>

                </div>

                <!--=====================================
                AGREGAR RUTA DEL BANNER
                ======================================-->

                <div class="form-group  entradaRutaBanner" style="display:none">
                  
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                    <select class="form-control seleccionarRutaBanner" name="rutaBanner">

                    </select>

                  </div>

                </div>


              </div>

              <div class="col-md-6 col-xs-12">

                <!--=====================================
                CAMBIO TÍTULO 1
                ======================================--> 

                <div class="form-group">

                  <div class="panel">TÍTULO 1</div>

                  <input type="text" class="form-control cambioTituloText1" value="">

                  <div class="input-group my-colorpicker">
                  
                      <input type="text" class="form-control cambioColorText1" value="#000">

                      <div class="input-group-addon">

                          <i></i>

                      </div>

                  </div>

                </div>

                <!--=====================================
                CAMBIO TÍTULO 2
                ======================================--> 

                <div class="form-group">

                  <div class="panel">TÍTULO 2</div>

                  <input type="text" class="form-control cambioTituloText2" value="">

                  <div class="input-group my-colorpicker">
                  
                      <input type="text" class="form-control cambioColorText2" value="#000">

                      <div class="input-group-addon">

                          <i></i>

                      </div>

                  </div>

                </div>

                <!--=====================================
                CAMBIO TÍTULO 3
                ======================================--> 

                <div class="form-group">

                  <div class="panel">TÍTULO 3</div>

                  <input type="text" class="form-control cambioTituloText3" value="">

                  <div class="input-group my-colorpicker">
                  
                      <input type="text" class="form-control cambioColorText3" value="#000">

                      <div class="input-group-addon">

                          <i></i>

                      </div>

                  </div>

                </div>

              </div>

            </div>

            <div class="banner">

              <img class="cambiarFondo" src="views/img/banner/default/default.jpg">

              <div class="textBanner textRight">

                  <h1 style="color:'+titulo1.color+'"></h1>

                  <h2 style="color:'+titulo2.color+'"></h2>

                  <h3 style="color:'+titulo3.color+'"></h3>

              </div>

            </div>
          

          </div>

        </div>

        

        <div class="modal-footer">
          
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="button" class="btn btn-primary btnGuardarBanner">Guardar banner</button>

        </div>
  

    </div>

  </div>

</div>


<!--=====================================
MODAL EDITAR BANNER
======================================-->

<div id="modalEditarBanner" class="modal fade" role="dialog">
  
  <div class="modal-dialog modal-lg">
    
    <div class="modal-content">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        
        <div class="modal-header" style="background:#3c8dbc; color:white">
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <h4 class="modal-title">Editar banner</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">
          
          <div class="box-body">

          <div class="row">

          <!--=====================================
          PRIMER BLOQUE
          ======================================--> 

            <div class="col-md-6 col-xs-12">

              <!--=====================================
              MODIFICAR EL TIPO DE SLIDE
              ======================================--> 

              <div class="form-group">

                <input type="hidden" class="idBanner">

                <div class="panel">UBICACIÓN DEL TEXTO</div>

                <label class="checkbox-inline"><input type="radio" value="izq" name="ubicacionTextoBanner" estilo="textLeft"> Izquierda</label>
                <label class="checkbox-inline"><input type="radio" value="cen" name="ubicacionTextoBanner" estilo="textCenter"> Centro</label>
                <label class="checkbox-inline"><input type="radio" value="der" name="ubicacionTextoBanner" estilo="textRight"> Derecha</label>

              </div> 
              
              <!--=====================================
              ENTRADA PARA SUBIR IMAGEN DEL BANNER
              ======================================-->

              <div class="form-group">
                
                <div class="panel">SUBIR IMAGEN BANNER</div>

                  <input type="file" class="fotoBanner">
                  <input type="hidden" class="antiguaFotoBanner">

                  <p class="help-block">Tamaño recomendado 550px * 1600px <br> Peso máximo de la foto 2MB</p>

                  <img src="views/img/banner/default/default.jpg" class="img-thumbnail previsualizarBanner" width="200px">

              </div>

              <!--=====================================
              SELECCIONAR TIPO BANNER
              ======================================-->

              <div class="form-group">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                  <select class="form-control seleccionarTipoBanner" name="tipoBanner">
                    
                    <option value="">Selecionar tipo</option>
                    <option value="sin-categoria">Sin Categoría</option>
                    <option value="categories">Categorías</option>

                  </select>

                </div>

              </div>

              <!--=====================================
              AGREGAR RUTA DEL BANNER
              ======================================-->

              <div class="form-group  entradaRutaBanner" style="display:none">

                <div class="input-group">

                  <input type="hidden" class="rutaActualBanner">

                  <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                  <select class="form-control seleccionarRutaBanner" name="rutaBanner">

                  </select>

                </div>

              </div>

            </div>

            <div class="col-md-6 col-xs-12">

              <!--=====================================
              CAMBIO TÍTULO 1
              ======================================--> 

              <div class="form-group">

                <div class="panel">TÍTULO 1</div>

                <input type="text" class="form-control cambioTituloText1">

                <div class="input-group my-colorpicker">
                
                    <input type="text" class="form-control cambioColorText1" value="">

                    <div class="input-group-addon">

                        <i></i>

                    </div>

                </div>

              </div>

              <!--=====================================
              CAMBIO TÍTULO 2
              ======================================--> 

              <div class="form-group">

                <div class="panel">TÍTULO 2</div>

                <input type="text" class="form-control cambioTituloText2">

                <div class="input-group my-colorpicker">
                
                    <input type="text" class="form-control cambioColorText2">

                    <div class="input-group-addon">

                        <i></i>

                    </div>

                </div>

              </div>

              <!--=====================================
              CAMBIO TÍTULO 3
              ======================================--> 

              <div class="form-group">

                <div class="panel">TÍTULO 3</div>

                <input type="text" class="form-control cambioTituloText3">

                <div class="input-group my-colorpicker">
                
                    <input type="text" class="form-control cambioColorText3">

                    <div class="input-group-addon">

                        <i></i>

                    </div>

                </div>

              </div>

            </div>

          </div>

          <div class="banner">



          </div>

           
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">
          
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="button" class="btn btn-primary guardarCambiosBanner">Guardar cambios banner</button>

        </div>


    </div>

  </div>

</div>

 <?php
        
    $eliminarBanner = new ControllerBanner();
    $eliminarBanner -> eliminarBanner();

  ?>

