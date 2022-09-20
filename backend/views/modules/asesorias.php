<div class="content-wrapper">
    
  <section class="content-header">
      
    <h1>
      Gestor asesorias
    </h1>
 
    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Gestor asesorias</li>
      
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
         
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarAsesoria">
          
          Agregar Asesoria

        </button>

      </div>

      <div class="box-body">
         
        <table class="table table-bordered table-striped dt-responsive tablaAsesorias" width="100%">

          <thead>
            
            <tr>
              
              <th style="width:10px">#</th>
              <th>Título</th>
              <th>Categoría</th>
              <th>Ruta</th>
              <th>Estado</th>
              <th>Portada</th>
              <th>Imagen Principal</th>
              <th>Precio</th>
              <th>Tipo Oferta</th>
              <th>Valor Oferta</th>
              <th>Acciones</th>

            </tr>

          </thead>

        </table> 

      </div>
        
    </div>

  </section>

</div>


<!--=====================================
MODAL AGREGAR ASESORIA
======================================-->

<div id="modalAgregarAsesoria" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

       <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar asesoria</h4>

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

                  <input type="text" class="form-control  validarAsesoria tituloAsesoria"  placeholder="Ingresar título asesoria">

                </div>

            </div>

            <!--=====================================
            ENTRADA PARA LA RUTA DE LA ASESORIA
            ======================================-->

            <div class="form-group">
              
                <div class="input-group">
              
                  <span class="input-group-addon"><i class="fa fa-link"></i></span> 

                  <input type="text" class="form-control  rutaAsesoria" placeholder="Ruta url de la asesoria" readonly>

                </div>

            </div>

       

            

            <!--=====================================
            AGREGAR FOTO DE MULTIMEDIA
            ======================================-->

            <div class="form-group">
                
              <div class="panel">SUBIR FOTO PRINCIPAL DE LA ASESORIA</div>

              <input type="file" class="fotoPrincipal">

              <p class="help-block">Tamaño recomendado 450px * 450px <br> Peso máximo de la foto 2MB</p>

              <img src="views/img/categories/default/default.jpg" class="img-thumbnail previsualizarPrincipal" width="200px">

            </div>

             <!--=====================================
            AGREGAR TEMAS DE LA ASESORIA
            ======================================-->

            <div class="temasAsesoria">
              
              <div class="panel">
                TOPICS

                <button type="button" class="btn btn-warning fa fa-add btn-xs btnAgregarTema" id="agregarAsesoria"></button>
              </div>

              <div class="form-group row">

                <div class="col-xs-10">

                  <input type="text" class="form-control  tema" placeholder="Descripción">
                  
                </div>

                <div class="col-xs-2">

                  <button class="btn btn-danger btnEliminarTema btn-xs fa fa-x" id="agregarAsesoria"></button>
                      
                </div>

              </div>

            </div>

            <!--=====================================
            AGREGAR HORARIOS DISPONIBLES
            ======================================-->  

            <div class="detallesHorario">
              
                <div class="panel">HORARIOS <strong>América/Chicago</strong></div>

                <!-- LUNES -->

                <div class="form-group row">

                  <div class="col-xs-3">
                    <input class="form-control " type="text" value="Lunes" readonly>
                  </div>

                  <div class="col-xs-9 editarLunes">
                    <input class="form-control  tagsInput horarioLunes" value="" data-role="tagsinput" type="text">
                  </div>

                </div>

                <!-- MARTES -->

                <div class="form-group row">

                  <div class="col-xs-3">
                    <input class="form-control " type="text" value="Martes" readonly>
                  </div>

                  <div class="col-xs-9 editarMartes">
                    <input class="form-control  tagsInput horarioMartes" value="" data-role="tagsinput" type="text">
                  </div>

                </div>

                <!-- MIERCOLES -->

                <div class="form-group row">

                  <div class="col-xs-3">
                    <input class="form-control " type="text" value="Miercoles" readonly>
                  </div>

                  <div class="col-xs-9 editarMiercoles">
                    <input class="form-control  tagsInput horarioMiercoles" value="" data-role="tagsinput" type="text" style="padding:20px">
                  </div>

                </div>

                <!-- JUEVES -->

                <div class="form-group row">

                  <div class="col-xs-3">
                    <input class="form-control " type="text" value="Jueves" readonly>
                  </div>

                  <div class="col-xs-9 editarJueves">
                    <input class="form-control  tagsInput horarioJueves" value="" data-role="tagsinput" type="text" style="padding:20px">
                  </div>

                </div>

                <!-- VIERNES -->

                <div class="form-group row">

                  <div class="col-xs-3">
                    <input class="form-control " type="text" value="Viernes" readonly>
                  </div>

                  <div class="col-xs-9 editarViernes">
                    <input class="form-control  tagsInput horarioViernes" value="" data-role="tagsinput" type="text" style="padding:20px">
                  </div>

                </div>

                <!-- SABADO -->

                <div class="form-group row">

                  <div class="col-xs-3">
                    <input class="form-control " type="text" value="Sabado" readonly>
                  </div>

                  <div class="col-xs-9 editarSabado">
                    <input class="form-control  tagsInput horarioSabado" value="" data-role="tagsinput" type="text" style="padding:20px">
                  </div>

                </div>

                <!-- DOMINGO -->

                <div class="form-group row">

                  <div class="col-xs-3">
                    <input class="form-control " type="text" value="Domingo" readonly>
                  </div>

                  <div class="col-xs-9 editarDomingo">
                    <input class="form-control  tagsInput horarioDomingo" value="" data-role="tagsinput" type="text" style="padding:20px">

                  </div>

                </div>

            </div>

            <!--=====================================
            AGREGAR DESCRIPCIÓN
            ======================================-->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-pencil"></i></span> 

                <textarea type="text" maxlength="320" rows="3" class="form-control descripcionAsesoria"></textarea>

              </div>

            </div>

            <!--=====================================
            AGREGAR PALABRAS CLAVES
            ======================================-->

            <div class="form-group editarPalabrasClaves">

              <div class="input-group">
									
                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <input type="text" class="form-control tagsInput pClavesAsesoria" value="" data-role="tagsinput">

              </div>

            </div>

            <!--=====================================
            AGREGAR FOTO DE PORTADA
            ======================================-->

            <div class="form-group fotoOpenG">
              
              <div class="panel">SUBIR FOTO PORTADA</div>

              <input type="file" class="fotoPortada">
              <input type="hidden" class="antiguaFotoPortada">

              <p class="help-block">Tamaño recomendado 1280px * 720px <br> Peso máximo de la foto 2MB</p>

              <img src="views/img/open_graph/default/default.jpg" class="img-thumbnail previsualizarPortada" width="100%">

            </div> 

            <!--=====================================
            AGREGAR PRECIO
            ======================================-->

            <div class="form-group row">
               
              <!-- PRECIO -->

              <div class="col-md-4 col-xs-12">
  
                <div class="panel">PRECIO</div>
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="ion ion-social-usd"></i></span> 

                  <input type="number" class="form-control precio" min="0" step="any">

                </div>

              </div>

            </div>

            <!--=====================================
            AGREGAR OFERTAS
            ======================================-->

            <div class="form-group agregarOferta">
              
              <select class="form-control  selActivarOferta">
                
                <option value="">No tiene oferta</option>
                <option value="oferta">Activar oferta</option>
               
              </select>

            </div>

            <div class="datosOferta" style="display:none">
            
              <!--=====================================
              VALOR OFERTAS
              ======================================-->

              <div class="form-group row">
                  
                <div class="col-xs-6">

                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="ion ion-social-usd"></i></span> 
                    
                    <input class="form-control valorOferta precioOferta" tipo="oferta" type="number" value="0" min="0" placeholder="Precio">

                  </div>

                </div>

                <div class="col-xs-6">
                     
                  <div class="input-group">
                       
                    <input class="form-control  valorOferta descuentoOferta" tipo="descuento" type="number" value="0"  min="0" placeholder="Descuento">
                    <span class="input-group-addon"><i class="fa fa-percent"></i></span>

                  </div>

                </div>

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">
    
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="button" class="btn btn-primary guardarAsesoria">Guardar cambios</button>

        </div>

    </div>

  </div>
 
</div>

<!--=====================================
MODAL EDITAR ASESORIA
======================================-->

<div id="modalEditarAsesoria" class="modal fade" role="dialog">
  
  <div class="modal-dialog">
     
    <div class="modal-content">
          
        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar asesoria</h4>

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

                  <input type="text" class="form-control validarAsesoria tituloAsesoria" readonly>

                  <input type="hidden" class="idAsesoria">
                  <input type="hidden" class="idCabecera">

                </div>

            </div>

            <!--=====================================
            ENTRADA PARA LA RUTA DE LA ASESORIA
            ======================================-->

            <div class="form-group">
              
              <div class="input-group">
            
                <span class="input-group-addon"><i class="fa fa-link"></i></span> 

                <input type="text" class="form-control rutaAsesoria" readonly>

              </div>

            </div>

            <!--=====================================
            AGREGAR FOTO DE MULTIMEDIA
            ======================================-->

            <div class="form-group">
                
              <div class="panel">SUBIR FOTO PRINCIPAL DE LA ASESORIA</div>

              <input type="file" class="fotoPrincipal">
              <input type="hidden" class="antiguaFotoPrincipal">

              <p class="help-block">Tamaño recomendado 450px * 450px <br> Peso máximo de la foto 2MB</p>

              <img src="views/img/categories/default/default.jpg" class="img-thumbnail previsualizarPrincipal" width="200px">

            </div>

            <!--=====================================
            AGREGAR TEMAS DE LA ASESORIA
            ======================================-->

            <div class="temasAsesoria">

              <div class="panel">
                TOPICS
                <button type="button" class="btn btn-warning fa fa-add btn-xs btnAgregarTema" id="editarAsesoria"></button>

              </div>
            
            </div>

            <!--=====================================
            AGREGAR HORARIOS DISPONIBLES
            ======================================-->  

            <div class="detallesHorario">
              
              <div class="panel">HORARIOS <strong>América/Chicago</strong></div>

                <!-- LUNES -->

                <div class="form-group row">

                  <div class="col-xs-3">
                    <input class="form-control " type="text" value="Lunes" readonly>
                  </div>

                  <div class="col-xs-9 editarLunes">
                   
                  </div>

                </div>

                <!-- MARTES -->

                <div class="form-group row">

                  <div class="col-xs-3">
                    <input class="form-control " type="text" value="Martes" readonly>
                  </div>

                  <div class="col-xs-9 editarMartes">

                  </div>

                </div>

                <!-- MIERCOLES -->

                <div class="form-group row">

                  <div class="col-xs-3">
                    <input class="form-control " type="text" value="Miercoles" readonly>
                  </div>

                  <div class="col-xs-9 editarMiercoles">
                   
                  </div>

                </div>

                <!-- JUEVES -->

                <div class="form-group row">

                  <div class="col-xs-3">
                    <input class="form-control " type="text" value="Jueves" readonly>
                  </div>

                  <div class="col-xs-9 editarJueves">
                   
                  </div>

                </div>

                <!-- VIERNES -->

                <div class="form-group row">

                  <div class="col-xs-3">
                    <input class="form-control " type="text" value="Viernes" readonly>
                  </div>

                  <div class="col-xs-9 editarViernes">
                   
                  </div>

                </div>

                <!-- SABADO -->

                <div class="form-group row">

                  <div class="col-xs-3">
                    <input class="form-control " type="text" value="Sabado" readonly>
                  </div>

                  <div class="col-xs-9 editarSabado">
                   
                  </div>

                </div>

                <!-- DOMINGO -->

                <div class="form-group row">

                  <div class="col-xs-3">
                    <input class="form-control " type="text" value="Domingo" readonly>
                  </div>

                  <div class="col-xs-9 editarDomingo">
                   
                  </div>

                </div>

            </div> 

           <!--=====================================
            AGREGAR DESCRIPCIÓN
            ======================================-->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-pencil"></i></span> 

                <textarea type="text" class="form-control  descripcionAsesoria"></textarea>

              </div>

            </div>

            <!--=====================================
            AGREGAR PALABRAS CLAVES
            ======================================-->

            <div class="form-group editarPalabrasClaves">

            </div>

            <!--=====================================
            AGREGAR FOTO DE PORTADA
            ======================================-->

            <div class="form-group fotoOpenG">
              
              <div class="panel">SUBIR FOTO PORTADA</div>

              <input type="file" class="fotoPortada">
              <input type="hidden" class="antiguaFotoPortada">

              <p class="help-block">Tamaño recomendado 1280px * 720px <br> Peso máximo de la foto 2MB</p>

              <img src="views/img/open_graph/default/default.jpg" class="img-thumbnail previsualizarPortada" width="100%">

            </div>

            

            <!--=====================================
            AGREGAR PRECIO
            ======================================-->

            <div class="form-group row">

              <div class="col-md-4 col-xs-12">
  
              <div class="panel">PRECIO</div>
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="ion ion-social-usd"></i></span> 

                  <input type="number" class="form-control  precio" min="0" step="any">

                </div>

              </div>

            </div>

            <!--=====================================
            AGREGAR OFERTAS
            ======================================-->

            <div class="form-group agregarOferta">
              
              <select class="form-control  selActivarOferta">
                
                <option value="">No tiene oferta</option>
                <option value="oferta">Activar oferta</option>
               
              </select>

            </div>

            <div class="datosOferta" style="display:none">
            
              <!--=====================================
              VALOR OFERTAS
              ======================================-->

              <div class="form-group row">
                  
                <div class="col-xs-6">

                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="ion ion-social-usd"></i></span> 
                    
                    <input class="form-control  valorOferta precioOferta" tipo="oferta" type="number" value="0" min="0" placeholder="Precio">

                  </div>

                </div>

                <div class="col-xs-6">
                     
                  <div class="input-group">
                       
                    <input class="form-control  valorOferta descuentoOferta" tipo="descuento" type="number" value="0"  min="0" placeholder="Descuento">
                    <span class="input-group-addon"><i class="fa fa-percent"></i></span>

                  </div>

                </div>

              </div>

              

            </div>
          
          </div>

        </div>

         <!--=====================================
            PIE DEL MODAL
            ======================================-->

        <div class="modal-footer">
    
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="button" class="btn btn-primary guardarCambiosAsesoria">Guardar cambios</button>

        </div>

    </div>

   </div>

</div>


<?php

  $eliminarAsesoria = new ControllerProducts();
  $eliminarAsesoria -> eliminarAsesoria();

?>

<!--=====================================
BLOQUEO DE LA TECLA ENTER
======================================-->

<script>
  
  $(document).keydown(function(e){
/*
    if(e.keyCode == 13){

      e.preventDefault();

    }*/

  })

</script>


