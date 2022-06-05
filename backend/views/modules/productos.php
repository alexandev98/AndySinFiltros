<div class="content-wrapper">
    
  <section class="content-header">
      
    <h1>
      Gestor productos
    </h1>
 
    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Gestor productos</li>
      
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-body">
         
        <table class="table table-bordered table-striped dt-responsive tablaProductos" width="100%">

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
MODAL EDITAR PRODUCTO
======================================-->

<div id="modalEditarProducto" class="modal fade" role="dialog">
  
   <div class="modal-dialog">
     
     <div class="modal-content">
          
        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar producto</h4>

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
              
                  <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 

                  <input type="text" class="form-control input-lg validarProducto tituloProducto" readonly>

                  <input type="hidden" class="idProducto">
                  <input type="hidden" class="idCabecera">

                </div>

            </div>

            <!--=====================================
            ENTRADA PARA LA RUTA DEL PRODUCTO
            ======================================-->

            <div class="form-group">
              
                <div class="input-group">
              
                  <span class="input-group-addon"><i class="fa fa-link"></i></span> 

                  <input type="text" class="form-control input-lg rutaProducto" readonly>

                </div>

            </div>

            <!--=====================================
            ENTRADA PARA SELECCIONAR EL TIPO DEL PRODUCTO
            ======================================-->

            <div class="form-group">
              
                <div class="input-group">
              
                  <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                   <input type="text" class="form-control input-lg seleccionarCategoria" readonly>

                </div>

            </div>


            <!--=====================================
            ENTRADA PARA AGREGAR MULTIMEDIA
            ======================================-->

            <div class="form-group agregarMultimedia"> 

              <!--=====================================
              AGREGAR FOTO DE MULTIMEDIA
              ======================================-->

              <div class="multimediaVirtual" style="display:none">
                  
                <div class="panel">SUBIR FOTO PRINCIPAL DEL PRODUCTO</div>
  
                <input type="file" class="fotoPrincipal">
                <input type="hidden" class="antiguaFotoPrincipal">
  
                <p class="help-block">Tamaño recomendado 400px * 450px <br> Peso máximo de la foto 2MB</p>
  
                <img src="views/img/productos/default/default.jpg" class="img-thumbnail previsualizarPrincipal" width="200px">
  
              </div>
              
              <!--=====================================
              SUBIR MULTIMEDIA DE PRODUCTO FÍSICO
              ======================================-->

              <div class="row previsualizarImgFisico"></div>
              
              <div class="multimediaBlog needsclick dz-clickable" style="display:none">

                <div class="dz-message needsclick">
                  
                  Arrastrar o dar click para subir imagenes.

                </div>

              </div>
   
            </div>

            <!--=====================================
            AGREGAR TEMAS DE LA ASESORIA
            ======================================-->

            <div class="temasAsesoria" style="display:none">
              
              <div class="panel">TEMAS A TRATAR</div>

             

            </div>

            <!--=====================================
            AGREGAR HORARIOS DISPONIBLES
            ======================================-->  

            <div class="detallesHorario">
              
              <div class="panel">HORARIOS <strong>America/Chicago</strong></div>

                <!-- LUNES -->

                <div class="form-group row">

                  <div class="col-xs-3">
                    <input class="form-control input-lg" type="text" value="Lunes" readonly>
                  </div>

                  <div class="col-xs-9 editarLunes">
                   <!--  <input class="form-control input-lg tagsInput detalleTalla" data-role="tagsinput" type="text" placeholder="Separe valores con coma"> -->
                  </div>

                </div>

                <!-- MARTES -->

                <div class="form-group row">

                  <div class="col-xs-3">
                    <input class="form-control input-lg" type="text" value="Martes" readonly>
                  </div>

                  <div class="col-xs-9 editarMartes">
                   <!--  <input class="form-control input-lg tagsInput detalleTalla" data-role="tagsinput" type="text" placeholder="Separe valores con coma"> -->
                  </div>

                </div>

                <!-- MIERCOLES -->

                <div class="form-group row">

                  <div class="col-xs-3">
                    <input class="form-control input-lg" type="text" value="Miercoles" readonly>
                  </div>

                  <div class="col-xs-9 editarMiercoles">
                   <!--  <input class="form-control input-lg tagsInput detalleTalla" data-role="tagsinput" type="text" placeholder="Separe valores con coma"> -->
                  </div>

                </div>

                <!-- JUEVES -->

                <div class="form-group row">

                  <div class="col-xs-3">
                    <input class="form-control input-lg" type="text" value="Jueves" readonly>
                  </div>

                  <div class="col-xs-9 editarJueves">
                   <!--  <input class="form-control input-lg tagsInput detalleTalla" data-role="tagsinput" type="text" placeholder="Separe valores con coma"> -->
                  </div>

                </div>

                <!-- VIERNES -->

                <div class="form-group row">

                  <div class="col-xs-3">
                    <input class="form-control input-lg" type="text" value="Viernes" readonly>
                  </div>

                  <div class="col-xs-9 editarViernes">
                   <!--  <input class="form-control input-lg tagsInput detalleTalla" data-role="tagsinput" type="text" placeholder="Separe valores con coma"> -->
                  </div>

                </div>

                <!-- SABADO -->

                <div class="form-group row">

                  <div class="col-xs-3">
                    <input class="form-control input-lg" type="text" value="Sabado" readonly>
                  </div>

                  <div class="col-xs-9 editarSabado">
                   <!--  <input class="form-control input-lg tagsInput detalleTalla" data-role="tagsinput" type="text" placeholder="Separe valores con coma"> -->
                  </div>

                </div>

                <!-- DOMINGO -->

                <div class="form-group row">

                  <div class="col-xs-3">
                    <input class="form-control input-lg" type="text" value="Domingo" readonly>
                  </div>

                  <div class="col-xs-9 editarDomingo">
                   <!--  <input class="form-control input-lg tagsInput detalleTalla" data-role="tagsinput" type="text" placeholder="Separe valores con coma"> -->
                  </div>

                </div>

               

            </div> 

           

            
           <!--=====================================
            AGREGAR DESCRIPCIÓN
            ======================================-->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-pencil"></i></span> 

                <textarea type="text" maxlength="320" rows="3" class="form-control input-lg descripcionProducto"></textarea>

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

            <div class="form-group fotoOpenG" style="display:none">
              
              <div class="panel">SUBIR FOTO PORTADA</div>

              <input type="file" class="fotoPortada">
              <input type="hidden" class="antiguaFotoPortada">

              <p class="help-block">Tamaño recomendado 1280px * 720px <br> Peso máximo de la foto 2MB</p>

              <img src="views/img/open_graph/default/default.jpg" class="img-thumbnail previsualizarPortada" width="100%">

            </div>

            

            <!--=====================================
            AGREGAR PRECIO, PESO Y ENTREGA
            ======================================-->

            <div class="form-group row precio" style="display:none">
               
              <!-- PRECIO -->

              <div class="col-md-4 col-xs-12">
  
                <div class="panel">PRECIO</div>
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="ion ion-social-usd"></i></span> 

                  <input type="number" class="form-control input-lg precio" min="0" step="any">

                </div>

              </div>

            </div>

            <!--=====================================
            AGREGAR OFERTAS
            ======================================-->

            <div class="form-group agregarOferta" style="display:none">
              
              <select class="form-control input-lg selActivarOferta">
                
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
                    
                    <input class="form-control input-lg valorOferta precioOferta" tipo="oferta" type="number" value="0" min="0" placeholder="Precio">

                  </div>

                </div>

                <div class="col-xs-6">
                     
                  <div class="input-group">
                       
                    <input class="form-control input-lg valorOferta descuentoOferta" tipo="descuento" type="number" value="0"  min="0" placeholder="Descuento">
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

          <button type="button" class="btn btn-primary guardarCambiosProducto">Guardar cambios</button>

        </div>

     </div>

   </div>

</div>




<!--=====================================
BLOQUEO DE LA TECLA ENTER
======================================-->

<script>
  
  $(document).keydown(function(e){

    if(e.keyCode == 13){

      e.preventDefault();

    }

  })

</script>


