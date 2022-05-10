//UPLOAD LOGOTIPO

$("#subirLogo").change(function(){

    var imageLogo = this.files[0];

    //FORMATO DE LA IMAGEN SEA JPG O PNG

    if(imageLogo["type"] != "image/jpeg" && imageLogo["type"] != "image/png"){

        $("#subirLogo").val("");

        swal({

            title: "Error al subir la imagen",
            text: "¡La imagen debe estar en formato JPG o PNG",
            type: "error",
            confirmButtonText: "Cerrar"
        });

    }else if(imageLogo["size"] > 2000000){

        $("#subirLogo").val("");

        swal({

            title: "Error al subir la imagen",
            text: "¡La imagen no debe pesar mas de 2MB!",
            type: "error",
            confirmButtonText: "Cerrar"
        });

    }else{

        var datosImagen = new FileReader;
        datosImagen.readAsDataURL(imageLogo);

        $(datosImagen).on("load", function(event){

            var routeImage = event.target.result;

            $(".previsualizarLogo").attr("src", routeImage);
        })
    }

    $("#guardarLogo").click(function(){

        var data = new FormData();
        data.append("imageLogo", imageLogo);

        $.ajax({
            url: "ajax/commerce.ajax.php",
            method: "POST",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            sucess: function(response){
                console.log(response);
            }
        })
    })
})