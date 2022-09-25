 
$(".tablaPublicaciones").DataTable({
    "ajax": "ajax/tablePosts.ajax.php",
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
RUTA POST
=============================================*/

function limpiarUrl(texto){
	var texto = texto.toLowerCase(); 
	texto = texto.replace(/[á]/, 'a');
	texto = texto.replace(/[é]/, 'e');
	texto = texto.replace(/[í]/, 'i');
	texto = texto.replace(/[ó]/, 'o');
	texto = texto.replace(/[ú]/, 'u');
	texto = texto.replace(/[ñ]/, 'n');
	texto = texto.replace(/ /g, "-")
	return texto;
  }
  
  $(".tituloPublicacion").keyup(function(){
  
	  $(".rutaPublicacion").val(limpiarUrl($(".tituloPublicacion").val()));
  
})

/*=============================================
SUBIENDO LA FOTO DE PORTADA
=============================================*/

var imagenPortada = null;

$(".fotoPortada").change(function(){

	imagenPortada = this.files[0];
	
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  	if(imagenPortada["type"] != "image/jpeg" && imagenPortada["type"] != "image/png"){

  		$(".fotoPortada").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato JPG o PNG!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else if(imagenPortada["size"] > 2000000){

  		$(".fotoPortada").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen no debe pesar más de 2MB!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else{

  		var datosImagen = new FileReader;
  		datosImagen.readAsDataURL(imagenPortada);

  		$(datosImagen).on("load", function(event){

  			var rutaImagen = event.target.result;

  			$(".previsualizarPortada").attr("src", rutaImagen);

  		})

  	}

})


/*=============================================
SUBIENDO LA FOTO PRINCIPAL
=============================================*/

var imagenFotoPrincipal = null;

$(".fotoPrincipal").change(function(){

	imagenFotoPrincipal = this.files[0];
	
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  	if(imagenFotoPrincipal["type"] != "image/jpeg" && imagenFotoPrincipal["type"] != "image/png"){

  		$(".fotoPrincipal").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "La imagen debe estar en formato JPG o PNG",
		      type: "error",
		      confirmButtonText: "Cerrar"
		    });

  	}else if(imagenFotoPrincipal["size"] > 2000000){

  		$(".fotoPrincipal").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "La imagen no debe pesar más de 2MB",
		      type: "error",
		      confirmButtonText: "Cerrar"
		    });

  	}else{

  		var datosImagen = new FileReader;
  		datosImagen.readAsDataURL(imagenFotoPrincipal);

  		$(datosImagen).on("load", function(event){

  			var rutaImagen = event.target.result;

  			$(".previsualizarPrincipal").attr("src", rutaImagen);

  		})

  	}

})


/*=============================================
AGREGAR MULTIMEDIA CON DROPZONE
=============================================*/

var arrayFiles = [];

$(".multimediaBlog").dropzone({

	url: "/",
	addRemoveLinks: true,
	acceptedFiles: "image/jpeg, image/png",
	maxFilesize: 2,
	maxFiles: 10,
	init: function(){

		this.on("addedfile", function(file){

			arrayFiles.push(file);

		})

		this.on("removedfile", function(file){

			var index = arrayFiles.indexOf(file);

			arrayFiles.splice(index, 1);

		})

	}

})

/*=============================================
GUARDAR PUBLICACION
=============================================*/

$(".guardarPublicacion").click(function(){

	var multimediaBlog = null;

	/*=============================================
	PREGUNTAMOS SI LOS CAMPOS OBLIGATORIOS ESTÁN LLENOS
	=============================================*/

	if($(".tituloPublicacion").val() != "" && 
       $('#summernote').summernote('code') != "" &&
	   $(".pClavesPublicacion").val() != ""){

	    if(arrayFiles.length > 0 && $(".rutaPublicacion").val() != ""){

			var listaMultimedia = [];
			var finalFor = 0;

			for(var i = 0; i < arrayFiles.length; i++){

				var datosMultimedia = new FormData();
				datosMultimedia.append("file", arrayFiles[i]);
			 	datosMultimedia.append("ruta", $(".rutaPublicacion").val());
				console.log(i);

				$.ajax({
					url:"ajax/blog.ajax.php",
					method: "POST",
					data: datosMultimedia,
					cache: false,
					contentType: false,
					processData: false,
					beforeSend: function(){

						$(".modal-footer .preload").html(`

							<center>

								<img src="views/img/template/status.gif" id="status" />
								<br>

							</center>

						`);

					},
					success: function(respuesta){

						$("#status").remove();
						
						listaMultimedia.push(respuesta.substr(3));
						multimediaBlog = JSON.stringify(listaMultimedia);
						
						if(finalFor == arrayFiles.length - 1){
						
							agregarMiPublicacion(multimediaBlog);	
						}

						finalFor++;

					}

				})

			}

		}else{
			multimediaBlog = " ";
			agregarMiPublicacion(multimediaBlog);	
		}
				
			


	}else{

		 swal({
	      title: "Llenar todos los campos obligatorios",
	      type: "error",
	      confirmButtonText: "Cerrar"
	    });

		return;
	}

})

function agregarMiPublicacion(multimedia){

	/*=============================================
	ALMACENAMOS TODOS LOS CAMPOS DE LA PUBLICACION
	=============================================*/

	var tituloPublicacion = $(".tituloPublicacion").val();
	var rutaPublicacion = $(".rutaPublicacion").val();
	var textoPublicacion = $('#summernote').summernote('code');
	var pClavesPublicacion = $(".pClavesPublicacion").val();

	var datosPost = new FormData();
	datosPost.append("tituloPost", tituloPublicacion);
	datosPost.append("rutaPost", rutaPublicacion);
	datosPost.append("textoPost", textoPublicacion);
	datosPost.append("pClavesPost", pClavesPublicacion);
	datosPost.append("multimedia", multimedia);
	
	datosPost.append("fotoPortada", imagenPortada);
	datosPost.append("fotoPrincipal", imagenFotoPrincipal);

	$.ajax({
			url:"ajax/blog.ajax.php",
			method: "POST",
			data: datosPost,
			cache: false,
			contentType: false,
			processData: false,
			success: function(respuesta){

				console.log(respuesta);

				if(respuesta == "ok"){

					swal({
					  type: "success",
					  title: "La publicación ha sido guardada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
						if (result.value) {

						window.location = "blog";

						}
					})
				}

			}

	})

}


/*=============================================
EDITAR PUBLICACION
=============================================*/

$('.tablaPublicaciones tbody').on("click", ".btnEditarPublicacion", function(){

	$(".previsualizarImgBlog").html("");
	
	var idPublicacion = $(this).attr("idPublicacion");

	var datos = new FormData();
	datos.append("idPublicacion", idPublicacion);

	$.ajax({

		url:"ajax/blog.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(post){

			$("#modalEditarPublicacion .idPublicacion").val(post[0]["id"]);
			$("#modalEditarPublicacion .tituloPublicacion").val(post[0]["title"]);
			$("#modalEditarPublicacion .rutaPublicacion").val(post[0]["route"]);

			$("#modalEditarPublicacion .previsualizarPrincipal").attr("src", post[0]["front"]);
			$("#modalEditarPublicacion .antiguaFotoPrincipal").val(post[0]["front"]);

			$('#modalEditarPublicacion #summernote').summernote('code', post[0]["text"]);

			if(post[0]["multimedia"] != " "){

				var imagenesMultimedia = JSON.parse(post[0]["multimedia"]);
				
				for(var i = 0; i < imagenesMultimedia.length; i++){

					$("#modalEditarPublicacion .previsualizarImgBlog").append(

						'<div class="col-md-3">'+

							'<div class="thumbnail text-center">'+

								'<img class="imagenesRestantes" src="'+imagenesMultimedia[i]+'" style="width:100%">'+

								'<div class="removerImagen" style="cursor:pointer">Remove file</div>'+
								
							'</div>'+

						'</div>'

					);

					localStorage.setItem("multimediaBlog", JSON.stringify(imagenesMultimedia));

				}		

				/*=============================================
				CUANDO ELIMINAMOS UNA IMAGEN DE LA LISTA
				=============================================*/

				 $(".removerImagen").click(function(){

					$(this).parent().parent().remove();

					var imagenesRestantes = $("#modalEditarPublicacion .imagenesRestantes");
					var arrayImgRestantes = [];

					for(var i = 0; i < imagenesRestantes.length; i++){

						arrayImgRestantes.push($(imagenesRestantes[i]).attr("src"));
						console.log($(imagenesRestantes[i]).attr("src"));
						
					}

					localStorage.setItem("multimediaBlog", JSON.stringify(arrayImgRestantes));
					
				})

			}

			/*=============================================
			TRAEMOS DATOS DE CABECERA
			=============================================*/

			var datosCabecera = new FormData();
			datosCabecera.append("route", post[0]["route"]);

			$.ajax({

					url:"ajax/open_graph.ajax.php",
					method: "POST",
					data: datosCabecera,
					cache: false,
					contentType: false,
					processData: false,
					dataType: "json",
					success: function(respuesta){

						/*=============================================
						CARGAMOS EL ID DE LA CABECERA
						=============================================*/

						$("#modalEditarPublicacion .idCabecera").val(respuesta["id"]);

						/*=============================================
						CARGAMOS LAS PALABRAS CLAVES
						=============================================*/	
						
						if(respuesta["keywords"] != null){

							$("#modalEditarPublicacion .editarPalabrasClaves").html('<div class="input-group">'+
				
							'<span class="input-group-addon"><i class="fa fa-key"></i></span>'+ 

							'<input type="text" class="form-control  tagsInput pClavesPublicacion" value="'+respuesta["keywords"]+'" data-role="tagsinput">'+

							'</div>');

							$("#modalEditarPublicacion .pClavesPublicacion").tagsinput('items');

						}else{

							$("#modalEditarPublicacion .editarPalabrasClaves").html('<div class="input-group">'+
				
							'<span class="input-group-addon"><i class="fa fa-key"></i></span>'+ 

							'<input type="text" class="form-control  tagsInput pClavesPublicacion" value="" data-role="tagsinput">'+

							'</div>');

							$("#modalEditarPublicacion .pClavesPublicacion").tagsinput('items');

						}

						/*=============================================
						CARGAMOS LA IMAGEN DE PORTADA
						=============================================*/

						$("#modalEditarPublicacion .previsualizarPortada").attr("src", respuesta["front"]);
						$("#modalEditarPublicacion .antiguaFotoPortada").val(respuesta["front"]);
					
					}
					
			});
		}
		
	})

})

/*=============================================
GUARDAR CAMBIOS DEL ASESORIA
=============================================*/	

$(".guardarCambiosPublicacion").click(function(){

	/*=============================================
	PREGUNTAMOS SI LOS CAMPOS OBLIGATORIOS ESTÁN LLENOS
	=============================================*/

	if($("#modalEditarPublicacion .tituloPublicacion").val() != "" && 
	   $('#modalEditarPublicacion #summernote').summernote('code') != "" &&
	   $("#modalEditarPublicacion .pClavesPublicacion").val() != ""){

		if(arrayFiles.length > 0 && $("#modalEditarProducto .rutaPublicacion").val() != ""){

			var listaMultimedia = [];
			var finalFor = 0;

			for(var i = 0; i < arrayFiles.length; i++){

				var datosMultimedia = new FormData();
				datosMultimedia.append("file", arrayFiles[i]);
				datosMultimedia.append("ruta", $("#modalEditarProducto .rutaPublicacion").val());
				console.log(i);

				$.ajax({
					url:"ajax/blog.ajax.php",
					method: "POST",
					data: datosMultimedia,
					cache: false,
					contentType: false,
					processData: false,
					beforeSend: function(){

						$(".modal-footer .preload").html(`

							<center>

								<img src="views/img/template/status.gif" id="status" />
								<br>

							</center>

						`);

					},
					success: function(respuesta){

						$("#status").remove();
						
						listaMultimedia.push(respuesta.substr(3));
						multimediaBlog = JSON.stringify(listaMultimedia);

						if(localStorage.getItem("multimediaBlog") != null){

							var jsonLocalStorage = JSON.parse(localStorage.getItem("multimediaBlog"));

							var jsonMultimediaBlog = listaMultimedia.concat(jsonLocalStorage);

							multimediaBlog = JSON.stringify(jsonMultimediaBlog);												
						}

						if(finalFor == arrayFiles.length - 1){
						
							editarMiPublicacion(multimediaBlog);	
						}

						finalFor++;

					}

				})

			}

		}else{

			var jsonLocalStorage = JSON.parse(localStorage.getItem("multimediaBlog"));

			multimediaBlog = JSON.stringify(jsonLocalStorage);

			editarMiPublicacion(multimediaBlog);
			
		}

		

	}else{

			swal({
			title: "Llenar todos los campos obligatorios",
			type: "error",
			confirmButtonText: "Cerrar"
		});

		return;

	}					

})


function editarMiPublicacion(imagen){

	var idPublicacion = $("#modalEditarPublicacion .idPublicacion").val();
	var tituloPublicacion = $("#modalEditarPublicacion .tituloPublicacion").val();
	var rutaPublicacion = $("#modalEditarPublicacion .rutaPublicacion").val();
	var textoPublicacion = $("#modalEditarPublicacion .textoPublicacion").val();
	var pClavesPublicacion = $("#modalEditarPublicacion .pClavesPublicacion").val();
	
	var antiguaFotoPortada = $("#modalEditarPublicacion .antiguaFotoPortada").val();
	var antiguaFotoPrincipal = $("#modalEditarPublicacion .antiguaFotoPrincipal").val();
	var idCabecera = $("#modalEditarPublicacion .idCabecera").val();


	var datosPublicacion = new FormData();
	datosPublicacion.append("id", idPublicacion);
	datosPublicacion.append("editarPublicacion", tituloPublicacion);
	datosPublicacion.append("rutaPublicacion", rutaPublicacion);
	datosPublicacion.append("textoPublicacion", textoPublicacion);
	datosPublicacion.append("pClavesPublicacion", pClavesPublicacion);

	if(imagen == null){

		multimediaFisica = localStorage.getItem("multimediaBlog");
		datosPublicacion.append("multimedia", multimediaFisica);

	}else{

		datosPublicacion.append("multimedia", imagen);
	}	

	datosPublicacion.append("fotoPortada", imagenPortada);
	datosPublicacion.append("fotoPrincipal", imagenFotoPrincipal);
	datosPublicacion.append("antiguaFotoPortada", antiguaFotoPortada);
	datosPublicacion.append("antiguaFotoPrincipal", antiguaFotoPrincipal);
	datosPublicacion.append("antiguaFotoOferta", antiguaFotoOferta);
	datosPublicacion.append("idCabecera", idCabecera);

	$.ajax({
			url:"ajax/blog.ajax.php",
			method: "POST",
			data: datosPublicacion,
			cache: false,
			contentType: false,
			processData: false,
			success: function(respuesta){
				
				if(respuesta == "ok"){

					swal({
					  type: "success",
					  title: "La publicación ha sido cambiado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
						if (result.value) {

						localStorage.removeItem("multimediaBlog");
						localStorage.clear();
						window.location = "blog";

						}
					})
				}

			}

	})
	
}
