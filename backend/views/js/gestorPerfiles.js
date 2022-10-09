/*=============================================
SUBIENDO LA FOTO DEL PERFIL
=============================================*/
$(".nuevaFoto").change(function(){

    var imagen = this.files[0];
    
    /*=============================================
      VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
      =============================================*/
  
      if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){
  
        $(".nuevaFoto").val("");
  
         swal({
            title: "Error al subir la imagen",
            text: "¡La imagen debe estar en formato JPG o PNG!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
          });
  
      }else if(imagen["size"] > 2000000){
  
        $(".nuevaFoto").val("");
  
         swal({
            title: "Error al subir la imagen",
            text: "¡La imagen no debe pesar más de 2MB!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
          });
  
      }else{
  
        var datosImagen = new FileReader;
        datosImagen.readAsDataURL(imagen);
  
        $(datosImagen).on("load", function(event){
  
          var rutaImagen = event.target.result;
  
          $(".previsualizar").attr("src", rutaImagen);
  
        })
  
      }
  })

/*=============================================
EDITAR PERFIL
=============================================*/
$(".tablaPerfiles").on("click", ".btnEditarPerfil", function(){

    console.log("sdf");
    var idPerfil = $(this).attr("idPerfil");
    
    var datos = new FormData();
    datos.append("idPerfil", idPerfil);
  
    $.ajax({
  
      url:"ajax/admin.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(respuesta){ 

        console.log(respuesta);
  
        $("#editarNombre").val(respuesta["name"]);
        $("#idPerfil").val(respuesta["id"]);
        $("#editarEmail").val(respuesta["email"]);
        $("#editarPerfil").html(respuesta["profile"]);
        $("#editarPerfil").val(respuesta["profile"]);
        $("#fotoActual").val(respuesta["photo"]);
        $("#passwordActual").val(respuesta["password"]);
  
        if(respuesta["photo"] != ""){
  
          $(".previsualizar").attr("src", respuesta["photo"]);
  
        }
  
      }
  
  
    })
  
  
  })