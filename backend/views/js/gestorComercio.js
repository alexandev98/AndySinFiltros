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
            success: function(response){

                console.log(response);

                if(response == "ok"){

					swal({
				      title: "Cambios guardados",
				      text: "¡La plantilla ha sido actualizada correctamente!",
				      type: "success",
				      confirmButtonText: "Cerrar"
				    });
			
				}
            }
        })
    })
})


//UPLOAD ICON

$("#subirIcono").change(function(){

    var imageIcon = this.files[0];

    //FORMATO DE LA IMAGEN SEA JPG O PNG

    if(imageIcon["type"] != "image/jpeg" && imageIcon["type"] != "image/png"){

        $("#subirIcono").val("");

        swal({

            title: "Error al subir la imagen",
            text: "¡La imagen debe estar en formato JPG o PNG",
            type: "error",
            confirmButtonText: "Cerrar"
        });

    }else if(imageIcon["size"] > 2000000){

        $("#subirIcono").val("");

        swal({

            title: "Error al subir la imagen",
            text: "¡La imagen no debe pesar mas de 2MB!",
            type: "error",
            confirmButtonText: "Cerrar"
        });

    }else{

        var datosImagen = new FileReader;
        datosImagen.readAsDataURL(imageIcon);

        $(datosImagen).on("load", function(event){

            var routeImage = event.target.result;

            $(".previsualizarIcono").attr("src", routeImage);
        })
    }

    $("#guardarIcono").click(function(){

        var data = new FormData();
        data.append("imageIcon", imageIcon);

        $.ajax({
            url: "ajax/commerce.ajax.php",
            method: "POST",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response){

                console.log(response);

                if(response == "ok"){

					swal({
				      title: "Cambios guardados",
				      text: "¡La plantilla ha sido actualizada correctamente!",
				      type: "success",
				      confirmButtonText: "Cerrar"
				    });
			
				}
            }
        })
    })
})

//CHANGE COLOR
$("#guardarColores").click(function(){

    var topBar = $("#topBar").val();
    var topText = $("#topText").val();
    var colorBackground = $("#colorBackground").val();
    var colorText = $("#colorText").val();

    var data = new FormData();
    data.append("topBar", topBar);
    data.append("topText", topText);
    data.append("colorBackground", colorBackground);
    data.append("colorText", colorText);

    console.log(data);
    
    $.ajax({
        url: "ajax/commerce.ajax.php",
        method: "POST",
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        success: function(response){

            console.log(response);

        }
    })
})

//CHANGE COLOR

var checkBox = $(".selectSocialMedia");
$("input[name='colorRedSocial']").on("ifChecked", function(){

    var color = $(this).val();
    var colorRed = null;
    
    var iconos = $(".socialNet");
    var redes = ["facebook", "youtube", "instagram"];

    if(color == "color"){

        colorRed = "Color";

    }else if(color == "blanco"){

        colorRed = "White";
    }else{

        colorRed = "Black";
    }

    for(var i = 0; i < iconos.length; i++){

        $(iconos[i]).attr("class","fa fa-"+redes[i]+" "+redes[i]+colorRed+" socialNet");

        $(checkBox[i]).attr("estilo", redes[i]+colorRed);
    }

    createDataJsonSocialMedia();
})

//CHANGE URL SOCIAL MEDIA
$(".changeUrlNet").change(function(){

    var changeUrlNet = $(".changeUrlNet");

    for(var i = 0; i < changeUrlNet.length; i++){

        $(checkBox[i]).attr("route", $(changeUrlNet[i]).val());
    }

    createDataJsonSocialMedia();

})

//DELETE SOCIAL MEDIA
$(".selectSocialMedia").on("ifUnchecked", function(){

    $(this).attr("validateNet","");

    createDataJsonSocialMedia();

})

//ADD SOCIAL MEDIA
$(".selectSocialMedia").on("ifChecked", function(){

    $(this).attr("validateNet", $(this).attr("network"));

    createDataJsonSocialMedia();

})

function createDataJsonSocialMedia(){

    var socialMedia = [];

    for(var i= 0; i < checkBox.length; i++){

        if($(checkBox[i]).attr("validateNet") != ""){

            socialMedia.push({"network": $(checkBox[i]).attr("validateNet"),
                              "style":$(checkBox[i]).attr("estilo"),
                              "url": $(checkBox[i]).attr("route")})
                              
            $("#valueSocialMedia").val(JSON.stringify(socialMedia));
        }
    }
}

//SAVE SOCIAL MEDIA

$("#saveSocialMedia").click(function(){

    var valueSocialMedia = $("#valueSocialMedia").val();

    var data = new FormData();
    data.append("socialMedia", valueSocialMedia);

    $.ajax({
        url: "ajax/commerce.ajax.php",
        method: "POST",
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        success: function(response){

            console.log(response);

        }
    })

})



