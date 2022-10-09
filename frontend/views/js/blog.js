$(".btnEliminarComPost").click(function(){

    var com = $(this);
    var idCom = $(this).attr("idCom");

    var datos = new FormData();
    datos.append("idCom", idCom);

    swal({
        title: "¿Está usted seguro(a) de eliminar su comentario?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Si, borrar comentario",
        closeOnConfirm: false
      },
      function(isConfirm){

        if (isConfirm) {	
            
            com.parent().parent().parent().parent().remove();

            return;
            
            $.ajax({

                url:routeHidden+"ajax/users.ajax.php",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                success:function(response){
                    
                    if(response == "ok"){
                        
                    }
        
                }
             })
            
        } 


      })
    



})

$(".btnEditarComPost").click(function(){

    
    var idCom = $(this).parent();
    var texto = $(this).parent().parent().parent().find(".panel-body small").html();
    $(this).parent().parent().parent().find(".panel-body small").hide();
    $(this).parent().parent().parent().find(".panel-body").append(

        '<div class="textarea-container">'+
            '<textarea class="form-control" rows="3" id="comment" name="comment" maxlength="300" style="font-size: 12px;">'+
                texto+
            '</textarea>'+
            '<button class="btn btn-xs btnCancelarEdit"><i class="fa fa-times-circle"></i></button>'+
        '</div>'

    );

    $(this).hide();
    $(this).parent().find(".btnGuardarCambioCom").show()
   
})

$(document).on("click", ".btnCancelarEdit", function(){

	$(this).parent().parent().find("small").show();
    $(this).parent().parent().parent().find(".panel-footer .btnEditarComPost").show();
    $(this).parent().parent().parent().find(".panel-footer .btnGuardarCambioCom").hide();
    $(this).parent().remove();

})



$(".btnAgregarComPost").click(function(){

    console.log("agregar");


})


$(".btnGuardarCambioCom").click(function(){

    var idUser = $(this).attr("idUser");
    var idCom = $(this).attr("idCom");

    var texto = $(this).parent().parent().parent().find(".panel-body textarea").val();

    if(texto != ""){

        var datos = new FormData();
        datos.append("idCom", idCom);
        datos.append("texto",texto);

           
        $.ajax({

            url:routeHidden+"ajax/users.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success:function(response){
                
                if(response == "ok"){
                    
                }
    
            }
         })



    }else{

        swal({
            title: "El comentario no puede estar vacío",
            type: "warning",
            showCancelButton: false,
            confirmButtonColor: "#F8BB86",
            confirmButtonText: "Volver a intentarlo",
            closeOnConfirm: false
          })

    }


})