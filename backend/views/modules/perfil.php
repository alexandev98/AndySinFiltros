<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar perfil
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar perfil</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-body">
        
        <table class="table table-bordered table-striped dt-responsive tablaPerfiles" width="100%">
         
          <thead>
           
           <tr>
             
             <th style="width:10px">#</th>
             <th>Nombre</th>
             <th>Email</th>
             <th>Foto</th>
             <th>Perfil</th>
             <th>Acciones</th>

           </tr> 

          </thead>

          <tbody>

            <?php

            $item = null;
            $valor = null;

            $perfiles = ControllerAdmin::showAdmins($item, $valor);

             foreach ($perfiles as $key => $value){

                 echo ' <tr>
                          <td>'.($key+1).'</td>
                          <td>'.$value["name"].'</td>
                          <td>'.$value["email"].'</td>';

                         if($value["photo"] != ""){

                          echo '<td><img src="'.$value["photo"].'" class="img-thumbnail" width="40px"></td>';

                         }else{

                            echo '<td><img src="views/img/profiles/default/anonymous.png" class="img-thumbnail" width="40px"></td>';

                        }

                        echo '<td>'.$value["profile"].'</td>';

                         echo '<td>

                          <div class="btn-group">
                              
                            <button class="btn btn-warning btnEditarPerfil" idPerfil="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarPerfil"><i class="fa fa-pencil"></i></button>

                          </div>  

                        </td>

                      </tr>';            
             }


            ?>

          </tbody>

        </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL EDITAR PERFIL
======================================-->

<div id="modalEditarPerfil" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Perfil</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">


          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control" id="editarNombre" name="editarNombre" value="" required>

                <input type="hidden" id="idPerfil" name="idPerfil">

              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->

            <div class="form-group">
            
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="email" class="form-control" id="editarEmail" name="editarEmail" value="" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA CONTRASEÑA -->

            <div class="form-group">
            
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="password" class="form-control" name="editarPassword" placeholder="Escriba la nueva contraseña">

                <input type="hidden" id="passwordActual" name="passwordActual">

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

            <div class="form-group ">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control" name="editarPerfil">
                  
                  <option value="" id="editarPerfil"></option>

                  <option value="administrador/a">Administrador/a</option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA SUBIR FOTO -->

            <div class="form-group">
              
              <div class="panel">FOTO PERFIL</div>

              <input type="file" class="nuevaFoto" name="editarFoto">

              <p class="help-block">Peso máximo de la foto 2MB</p>

              <img src="views/img/profiles/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

              <input type="hidden" name="fotoActual" id="fotoActual">

            </div>

            <div class="form-group">

              <div class="panel">TÍTULO DE LA DESCRIPCIÓN</div>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control" id="editarTitulo" name="editarTitulo" value="" required>

              </div>

            </div>

            <div class="form-group">
              
              <div class="panel">SOBRE MI</div>

              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-pencil"></i></span> 

                <textarea type="text" rows="8" class="form-control descripcionSobreMi" name="editarDescripcion"></textarea>

              </div>

            </div> 

            <div class="form-group">
              
              <div class="panel">FOTO DESCRIPCIÓN</div>

              <input type="file" class="nuevaFotoPagina" name="editarFotoPagina">

              <p class="help-block">Tamaño recomendado 600px * 600px <br> Peso máximo de la foto 2MB</p>

              <img src="views/img/profiles/default/anonymous.png" class="img-thumbnail previsualizarPagina" width="100px">

              <input type="hidden" name="fotoActualPagina" id="fotoActualPagina">
              
            </div> 

          </div> 

        </div>
        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar Perfil</button>

        </div>

        <?php

           $editarPerfil = new ControllerAdmin();
           $editarPerfil -> editarPerfil();

        ?> 

      </form>

    </div>

  </div>

</div>
