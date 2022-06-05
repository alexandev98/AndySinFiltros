<div class="content-wrapper">
    
  <section class="content-header">
      
    <h1>
      Gestor categorías
    </h1>
 
    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Gestor categorías</li>
      
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-body">
         
        <table class="table table-bordered table-striped dt-responsive tablaCategorias" width="100%">

          <thead>
            
            <tr>
              
              <th style="width:10px">#</th>
              <th>Categoría</th>
              <th>Ruta</th>
              <th>Estado</th>
              <th>Descripción</th>
              <th>Palabras Claves</th>
              <th>Portada</th>
              <th>Acciones</th>

            </tr>

          </thead>

        </table> 

      </div>
        
    </div>

  </section>

</div>

<!--=====================================
MODAL EDITAR CATEGORÍA
======================================-->

<div id="modalEditarCategoria" class="modal fade" role="dialog">
  
  <div class="modal-dialog">
    
    <div class="modal-content">

      <form method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        
        <div class="modal-header" style="background:#3c8dbc; color:white">
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <h4 class="modal-title">Editar categoría</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">
          
          <div class="box-body">

            <!--=====================================
            ENTRADA DEL TITULO DE LA CATEGORÍA
            ======================================-->

            <div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg validarCategoria tituloCategoria" placeholder="Ingresar Categoria" name="editarTituloCategoria" required> 

                <input type="hidden" class="editarIdCategoria" name="editarIdCategoria">
                <input type="hidden" class="editarIdCabecera" name="editarIdCabecera">

              </div> 

            </div>

            <!--=====================================
            ENTRADA PARA LA RUTA DE LA CATEGORÍA
            ======================================-->

            <div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-link"></i></span>

                <input type="text" class="form-control input-lg rutaCategoria" placeholder="Ruta url para la categoría" name="rutaCategoria" readonly required> 

              </div> 

            </div>

            <!--=====================================
            ENTRADA PARA LA DESCRIPCIÓN DE LA CATEGORÍA
            ======================================-->

            <div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>

                <textarea maxlength="120" class="form-control input-lg descripcionCategoria" name="descripcionCategoria"  rows="3" placeholder="Ingresar descripción categoría" required></textarea>

              </div> 

            </div>

            <!--=====================================
            ENTRADA PARA LAS PALABRAS CLAVES DE LA CATEGORÍA
            ======================================-->

            <div class="form-group editarPalabrasClaves">
               


            </div>

            <!--=====================================
            ENTRADA PARA SUBIR FOTO DE PORTADA
            ======================================-->

            <div class="form-group">
              
              <div class="panel">SUBIR FOTO PORTADA</div>

               <input type="file" class="fotoPortada" name="fotoPortada">
               <input type="hidden" class="antiguaFotoPortada" name="antiguaFotoPortada">

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

          <button type="submit" class="btn btn-primary">Guardar cambios categoría</button>

        </div>

      </form>

      <?php

        
          $editarCategoria = new ControllerCategories();
          $editarCategoria -> updateCategory();

      ?>

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


