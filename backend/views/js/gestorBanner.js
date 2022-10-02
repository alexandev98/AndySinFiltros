/*=============================================
CARGAR LA TABLA DINÁMICA DE BANNER
=============================================*/
/*
 $.ajax({

 	url:"ajax/tableBanner.ajax.php",
 	success:function(respuesta){
		
 		console.log("respuesta", respuesta);

 	}

})*/

$(".tablaBanner").DataTable({
    "ajax": "ajax/tableBanner.ajax.php",
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "language": {

        "sProcessing":     "Procesando...",
       "sLengthMenu":     "Mostrar _MENU_ registros",
       "sZeroRecords":    "No se encontraron resultados",
       "sEmptyTable":     "Ningún dato disponible en esta tabla",
       "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
       "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
       "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
       "sInfoPostFix":    "",
       "sSearch":         "Buscar:",
       "sUrl":            "",
       "sInfoThousands":  ",",
       "sLoadingRecords": "Cargando...",
       "oPaginate": {
           "sFirst":    "Primero",
           "sLast":     "Último",
           "sNext":     "Siguiente",
           "sPrevious": "Anterior"
       },
       "oAria": {
               "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
               "sSortDescending": ": Activar para ordenar la columna de manera descendente"
       }

    }

});

/*=============================================
UBICACION DEL TEXTO BANNER
=============================================*/
$("input[name='ubicacionTextoBanner']").on("ifChecked",function(){

    var ubicacionActual = $(this).val();
    var estilo = $(this).attr("estilo");

    if(ubicacionActual == "izq"){
        
        $(".banner .textBanner").attr("class","textBanner "+estilo);
       

    }else if(ubicacionActual == "cen"){

        $(".banner .textBanner").attr("class","textBanner "+estilo);

    }else{

        $(".banner .textBanner").attr("class","textBanner "+estilo);

    }

})


$(".btnAgregar").click(function(){

    $("#modalAgregarBanner .banner").children('.textBanner').children("h1").html(" ");
    $("#modalAgregarBanner .banner").children('.textBanner').children("h2").html(" ");
    $("#modalAgregarBanner .banner").children('.textBanner').children("h3").html(" ");


})



/*=============================================
ACTIVAR BANNER
=============================================*/

$(".tablaBanner tbody").on("click", ".btnActivar", function(){

   var banner = $(this); 

   var idBanner = $(this).attr("idBanner");
   var estadoBanner = $(this).attr("estadoBanner");

   var datos = new FormData();
    datos.append("activarId", idBanner);
    datos.append("activarBanner", estadoBanner);

   $.ajax({

        url:"ajax/banner.ajax.php",
        method: "POST",
         data: datos,
         cache: false,
         contentType: false,
         processData: false,
         success: function(respuesta){ 

            if(respuesta == "ok"){

                if(estadoBanner == 0){

                    banner.removeClass('btn-success');
                    banner.addClass('btn-danger');
                    banner.html('Desactivado');
                    banner.attr('estadoBanner',1);
            
                }else{
        
                    banner.addClass('btn-success');
                    banner.removeClass('btn-danger');
                    banner.html('Activado');
                    banner.attr('estadoBanner',0);
        
                }

            }

         } 	 

     });

})



/*=============================================
SUBIENDO LA FOTO DE BANNER
=============================================*/

var imagen = null;

$(".fotoBanner").change(function(){

   imagen = this.files[0];

   /*=============================================
     VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
     =============================================*/
     if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

       $(".fotoBanner").val("");

       swal({
         title: "Error al subir la imagen",
         text: "¡La imagen debe estar en formato JPG o PNG!",
         type: "error",
         confirmButtonText: "¡Cerrar!"
       });

       return;

     }else if(imagen["size"] > 2000000){

         $(".fotoBanner").val("");

       swal({
         title: "Error al subir la imagen",
         text: "¡La imagen no debe pesar más de 2MB!",
         type: "error",
         confirmButtonText: "¡Cerrar!"
       });

       return;

     }else{

         var datosImagen = new FileReader;
         datosImagen.readAsDataURL(imagen);

         $(datosImagen).on("load", function(event){
       
             var rutaImagen = event.target.result;

             $(".previsualizarBanner").attr("src", rutaImagen);
             $(".cambiarFondo").attr("src", rutaImagen);

       })
     }

})

/*=============================================
SELECCIONAR RUTA DE BANNER
=============================================*/

$(".seleccionarTipoBanner").change(function(){

   var tipoBanner = $(this).val();

   if(tipoBanner != "sin-categoria"){

       $(".seleccionarRutaBanner").attr("name","rutaBanner");

       var datos = new FormData();
       datos.append("tabla", tipoBanner);

       $.ajax({
           url:"ajax/banner.ajax.php",
           method:"POST",
           data: datos,
           cache: false,
           contentType: false,
           processData: false,
           dataType: "json",
           success:function(respuesta){
               
               $(".entradaRutaBanner").show();

               $(".seleccionarRutaBanner").html(

                   '<option value="">Seleccione la ruta</option>'
               )

               respuesta.forEach(funcionForEach);

               function funcionForEach(item, index){

                   $(".seleccionarRutaBanner").append(

                       '<option value="'+item["route"]+'">'+item["route"]+'</option>'

                   )

               }

           }

       })    


   }else{

       $(".entradaRutaBanner").hide();	

   }

})

/*=============================================
REVISAR SI LA RUTA DEL BANNER YA EXISTE
=============================================*/

$(document).on("change", ".seleccionarRutaBanner, .seleccionarTipoBanner", function(){

   $(".alert").remove();

   var ruta = $(this).val();
   var rutaActualBanner = $(".rutaActualBanner").val();

   var datos = new FormData();
   datos.append("validarRuta", ruta);

    $.ajax({
       url:"ajax/banner.ajax.php",
       method:"POST",
       data: datos,
       cache: false,
       contentType: false,
       processData: false,
       dataType: "json",
       success:function(respuesta){

        
           
           if(respuesta){

               if(ruta == "sin-categoria"){

                   $(".seleccionarTipoBanner").parent().after('<div class="alert alert-warning">Esta ruta ya esta registrada</div>');

                   $(".seleccionarTipoBanner").val("");

               }else if(rutaActualBanner == respuesta.route){

               }else{

                   $(".seleccionarRutaBanner").parent().after('<div class="alert alert-warning">Esta ruta ya esta registrada</div>');

                   $(".seleccionarRutaBanner").val("");

               }

           }else{


           }

       }

   })

})

/*=============================================
EDITAR BANNER
=============================================*/


$(".tablaBanner tbody").on("click", ".btnEditarBanner", function(){

   $("#modalEditarBanner input[name=ubicacionTextoBanner]").parent().removeClass("checked");
   
   var idBanner = $(this).attr("idBanner");

   var datos = new FormData();
   datos.append("idBanner", idBanner);

   $.ajax({

       url:"ajax/banner.ajax.php",
       method: "POST",
       data: datos,
       cache: false,
       contentType: false,
       processData: false,
       dataType: "json",
       success: function(respuesta){
           
           $("#modalEditarBanner .idBanner").val(respuesta["id"]);

           /*=============================================
           CARGAMOS LA IMAGEN DE BANNER
           =============================================*/

           $("#modalEditarBanner .previsualizarBanner").attr("src", respuesta["img"]);
           $("#modalEditarBanner .antiguaFotoBanner").val(respuesta["img"]);

           /*=============================================
           CARGAMOS EL TIPO DE BANNER
           =============================================*/

           $("#modalEditarBanner .seleccionarTipoBanner").val(respuesta["type"]);
           $("#modalEditarBanner .optionEditarTipoBanner").html(respuesta["type"]);

           /*=============================================
           CARGAMOS LOS TEXTOS Y SUS COLORES
           =============================================*/

           var titulo1 = JSON.parse(respuesta["title1"]);
           
           $("#modalEditarBanner .cambioTituloText1").val(titulo1.text);
           $("#modalEditarBanner .cambioColorText1").colorpicker('setValue', titulo1.color);
           
           var titulo2 = JSON.parse(respuesta["title2"]);

           $("#modalEditarBanner .cambioTituloText2").val(titulo2.text);
           $("#modalEditarBanner .cambioColorText2").colorpicker('setValue', titulo2.color);
           
           var titulo3 = JSON.parse(respuesta["title3"]);

           $("#modalEditarBanner .cambioTituloText3").val(titulo3.text);
           $("#modalEditarBanner .cambioColorText3").colorpicker('setValue', titulo3.color);
           
          
           $("#modalEditarBanner .banner").html(" ");

           $("#modalEditarBanner input[estilo="+respuesta["style"]+"]").parent().addClass("checked");
           $("#modalEditarBanner input[estilo="+respuesta["style"]+"]").attr("checked", true);

         
           $("#modalEditarBanner .banner").append(

            '<img class="cambiarFondo" src="'+respuesta["img"]+'">'+

                '<div class="textBanner '+respuesta["style"]+'">'+

                    '<h1 style="color:'+titulo1.color+'">'+titulo1.text+'</h1>'+

                    '<h2 style="color:'+titulo2.color+'">'+titulo2.text+'</h2>'+

                    '<h3 style="color:'+titulo3.color+'">'+titulo3.text+'</h3>'+

                '</div>'
            )

            $("#modalEditarBanner .rutaActualBanner").val(" ");

           /*=============================================
           CARGAMOS LA RUTA DEL BANNER
           =============================================*/

           if(respuesta["type"] != "sin-categoria"){

               $("#modalEditarBanner .entradaRutaBanner").show();

               $("#modalEditarBanner .rutaActualBanner").val(respuesta["route"]);

               $("#modalEditarBanner .seleccionarRutaBanner").html(

                   ' <option class="optionEditarRutaBanner"></option>'
               );

               $("#modalEditarBanner .optionEditarRutaBanner").val(respuesta["route"]);

               $("#modalEditarBanner .optionEditarRutaBanner").html(respuesta["route"]);

               $("#modalEditarBanner .seleccionarRutaBanner").attr("name","rutaBanner");

               var datos = new FormData();
               datos.append("tabla", respuesta["type"]);

                $.ajax({
                   url:"ajax/banner.ajax.php",
                   method:"POST",
                   data: datos,
                   cache: false,
                   contentType: false,
                   processData: false,
                   dataType: "json",
                   success:function(respuesta){

                       respuesta.forEach(funcionForEach);

                       function funcionForEach(item, index){

                           $("#modalEditarBanner .seleccionarRutaBanner").append(

                               '<option value="'+item["route"]+'">'+item["route"]+'</option>'
                              
                           )

                       }
                   }
               })

           }else{

                $("#modalEditarBanner .entradaRutaBanner").hide();

                $("#modalEditarBanner .seleccionarRutaBanner").html(" ");


           }
           

       }

   })

})

/*=============================================
CAMBIAR TEXTO Y COLOR BANNER
=============================================*/

// TEXTO Y COLOR 1

$(".cambioTituloText1").change(function(){

	var texto1 = $(this).val();

	$(".banner").children('.textBanner').children("h1").html(texto1);

})

$(".cambioColorText1").change(function(){

	var color1 = $(this).val();

	$(".banner").children('.textBanner').children("h1").css({"color":color1});
	

})

// TEXTO Y COLOR 2

$(".cambioTituloText2").change(function(){

	var texto2 = $(this).val();

	$(".banner").children('.textBanner').children("h2").html(texto2);

})

$(".cambioColorText2").change(function(){

	var color2 = $(this).val();

	$(".banner").children('.textBanner').children("h2").css({"color":color2});
	

})

// TEXTO Y COLOR 3

$(".cambioTituloText3").change(function(){

	var texto3 = $(this).val();

	$(".banner").children('.textBanner').children("h3").html(texto3);

})

$(".cambioColorText3").change(function(){

	var color3 = $(this).val();

	$(".banner").children('.textBanner').children("h3").css({"color":color3});
	

})

/*=============================================
GUARDAR BANNER
=============================================*/	

$(".btnGuardarBanner").click(function(){

    var type = $("#modalAgregarBanner .seleccionarTipoBanner").val();

    var route = $("#modalAgregarBanner .seleccionarRutaBanner").val();
    

    if(type != "" && route != ""){

        var style = $("#modalAgregarBanner input[name='ubicacionTextoBanner']:checked").attr("estilo");
        var title1Text = $("#modalAgregarBanner .cambioTituloText1").val();
        var title1Color = $("#modalAgregarBanner .cambioColorText1").val();

        var title1 = {"text": title1Text,
                    "color": title1Color};

        var title2Text = $("#modalAgregarBanner .cambioTituloText2 ").val();
        var title2Color = $("#modalAgregarBanner .cambioColorText2").val();

        var title2 = {"text": title2Text,
                    "color": title2Color};

        var title3Text = $("#modalAgregarBanner .cambioTituloText3 ").val();
        var title3Color = $("#modalAgregarBanner .cambioColorText3").val();

        var title3 = {"text": title3Text,
                    "color": title3Color};

        var datosBanner = new FormData();
        datosBanner.append("state", 1);
        datosBanner.append("type", type);
        datosBanner.append("route", (route == null) ? type : route);
        datosBanner.append("style", style);
        datosBanner.append("titulo1",JSON.stringify(title1));
        datosBanner.append("titulo2", JSON.stringify(title2));
        datosBanner.append("titulo3",JSON.stringify(title3));
        datosBanner.append("fotoBanner", imagen);

        $.ajax({
			url:"ajax/banner.ajax.php",
			method: "POST",
			data: datosBanner,
			cache: false,
			contentType: false,
			processData: false,
			success: function(respuesta){
				
				if(respuesta == "ok"){

					swal({
					  type: "success",
					  title: "El banner ha sido cambiado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
						if (result.value) {

						    window.location = "banner";

						}
					})
				}

			}

	    })


      

    }else{

        swal({
			title: "El tipo y la ruta del banner debe seleccionarse",
			type: "warning",
			confirmButtonText: "Cerrar"
		});

    }
    
    

})


/*=============================================
GUARDAR CAMBIOS DEL BANNER
=============================================*/	

$("#modalEditarBanner .guardarCambiosBanner").click(function(){

    var type = $("#modalEditarBanner .seleccionarTipoBanner").val();

    var route = $("#modalEditarBanner .seleccionarRutaBanner").val();
    

    if(type != "" && route != ""){

        var idBanner = $("#modalEditarBanner .idBanner").val();
        var style = $("#modalEditarBanner input[name='ubicacionTextoBanner']:checked").attr("estilo");
        var title1Text = $("#modalEditarBanner .cambioTituloText1").val();
        var title1Color = $("#modalEditarBanner .cambioColorText1").val();

        var title1 = {"text": title1Text,
                    "color": title1Color};

        var title2Text = $("#modalEditarBanner .cambioTituloText2 ").val();
        var title2Color = $("#modalEditarBanner .cambioColorText2").val();

        var title2 = {"text": title2Text,
                    "color": title2Color};

        var title3Text = $("#modalEditarBanner .cambioTituloText3 ").val();
        var title3Color = $("#modalEditarBanner .cambioColorText3").val();

        var title3 = {"text": title3Text,
                    "color": title3Color};

        var antiguaFotoBanner = $("#modalEditarBanner .antiguaFotoBanner").val();

        var datosBanner = new FormData();
        datosBanner.append("id", idBanner);
        datosBanner.append("type", type);
        datosBanner.append("route", (route == null) ? type : route);
        datosBanner.append("style", style);
        datosBanner.append("titulo1",JSON.stringify(title1));
        datosBanner.append("titulo2", JSON.stringify(title2));
        datosBanner.append("titulo3",JSON.stringify(title3));
        datosBanner.append("antiguaFotoBanner",antiguaFotoBanner);
        datosBanner.append("fotoBanner", imagen);

        $.ajax({
			url:"ajax/banner.ajax.php",
			method: "POST",
			data: datosBanner,
			cache: false,
			contentType: false,
			processData: false,
			success: function(respuesta){
				
				if(respuesta == "ok"){

					swal({
					  type: "success",
					  title: "El banner ha sido cambiado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
						if (result.value) {

						    window.location = "banner";

						}
					})
				}

			}

	    })


      

    }else{

        swal({
			title: "El tipo y la ruta del banner debe seleccionarse",
			type: "warning",
			confirmButtonText: "Cerrar"
		});

    }
    
    

})




/*=============================================
ELIMINAR BANNER
=============================================*/
$(".tablaBanner tbody").on("click", ".btnEliminarBanner", function(){

   var idBanner = $(this).attr("idBanner");
   var imgBanner = $(this).attr("imgBanner");

   swal({
       title: '¿Está seguro de borrar el banner?',
       type: 'warning',
       showCancelButton: true,
       confirmButtonColor: '#3085d6',
       cancelButtonColor: '#d33',
       cancelButtonText: 'Cancelar',
         confirmButtonText: 'Si, borrar banner'
        }).then(function(result){

       if(result.value){

         window.location = "index.php?route=banner&idBanner="+idBanner+"&imgBanner="+imgBanner;

       }

     })



})
