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

    <div class="modal-content">

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
 
</div>



