 /*$.ajax({

 	url:"ajax/tableProducts.ajax.php",
 	success:function(respuesta){
		
 		console.log("respuesta", respuesta);

 	}

 })*/

 
$(".tablaProductos").DataTable({
    "ajax": "ajax/tableProducts.ajax.php",
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
ACTIVAR PRODUCTO
=============================================*/
$('.tablaProductos tbody').on("click", ".btnActivar", function(){

	var idProducto = $(this).attr("idProducto");
	var estadoProducto = $(this).attr("estadoProducto");

	var datos = new FormData();
 	datos.append("activarId", idProducto);
  	datos.append("activarProducto", estadoProducto);

  	$.ajax({

	  url:"ajax/products.ajax.php",
	  method: "POST",
	  data: datos,
	  cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){    
          
      }

  	})

	if(estadoProducto == 0){

  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-danger');
  		$(this).html('Desactivado');
  		$(this).attr('estadoProducto',1);

  	}else{

  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-danger');
  		$(this).html('Activado');
  		$(this).attr('estadoProducto',0);

  	}

})


/*=============================================
ACTIVAR OFERTA
=============================================*/

function activarOferta(event){

	if(event == "oferta"){

		$(".datosOferta").show();
		$(".valorOferta").prop("required",true);
		$(".valorOferta").val("");


	}else{

		$(".datosOferta").hide();
		$(".valorOferta").prop("required",false);
		$(".valorOferta").val("");

	}
}


$(".selActivarOferta").change(function(){

	activarOferta($(this).val())

})


/*=============================================
VALOR OFERTA
=============================================*/

$("#modalCrearProducto .valorOferta").change(function(){

	if($(".precio").val()!= 0){

		if($(this).attr("tipo") == "oferta"){

			var descuento = 100 - (Number($(this).val())*100/Number($(".precio").val()));

			$(".precioOferta").prop("readonly",true);
			$(".descuentoOferta").prop("readonly",false);
			$(".descuentoOferta").val(Math.ceil(descuento));	

		}

		if($(this).attr("tipo") == "descuento"){

			var oferta = Number($(".precio").val())-(Number($(this).val())*Number($(".precio").val())/100);
			
			$(".descuentoOferta").prop("readonly",true);
			$(".precioOferta").prop("readonly",false);
			$(".precioOferta").val(oferta);

		}

	}else{

	 swal({
	      title: "Error al agregar la oferta",
	      text: "¡Primero agregue un precio al producto!",
	      type: "error",
	      confirmButtonText: "¡Cerrar!"
	    });

	 $(".precioOferta").val(0);
	 $(".descuentoOferta").val(0);

	 return;

	}

})


/*=============================================
EDITAR PRODUCTO
=============================================*/

$('.tablaProductos tbody').on("click", ".btnEditarProducto", function(){
	
	$(".previsualizarImgFisico").html("");

	var idProducto = $(this).attr("idProducto");
	
	var datos = new FormData();
	datos.append("idProducto", idProducto);

	$.ajax({

		url:"ajax/products.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(producto){
			
			$("#modalEditarProducto .idProducto").val(producto[0]["id"]);
			$("#modalEditarProducto .tituloProducto").val(producto[0]["title"]);
			$("#modalEditarProducto .rutaProducto").val(producto[0]["route"]);

			if(producto[0]["id_category"] != 0){
			
				var datosCategoria = new FormData();
				datosCategoria.append("idCategoria", producto[0]["id_category"]);
				
				$.ajax({

						url:"ajax/categories.ajax.php",
						method: "POST",
						data: datosCategoria,
						cache: false,
						contentType: false,
						processData: false,
						dataType: "json",
						success: function(categoria){

							/*=============================================
							TRAER EL TIPO DE PRODUCTO
							=============================================*/

							$("#modalEditarProducto .seleccionarCategoria").val(categoria["category"]);


							if(categoria["category"] == "ASESORIAS"){

								$(".multimediaVirtual").show();
								$(".precio").show();
								$(".multimediaBlog").hide();
								

								$("#modalEditarProducto .previsualizarPrincipal").attr("src", producto[0]["front"]);
								$("#modalEditarProducto .antiguaFotoPrincipal").val(producto[0]["front"]);

								$("#modalEditarProducto .rutaProducto").prop("readonly",true);

								$("#modalEditarProducto .rutaProducto").parent().children("span").children("i").removeClass("fa-instagram");
								$("#modalEditarProducto .rutaProducto").parent().children("span").children("i").addClass("fa-link");

								$(".temasAsesoria").show();
								$(".detallesHorario").show();
								$(".agregarOferta").show();
								$(".fotoOpenG").show();

								var detalles = JSON.parse(producto[0]["details"]);
								
								for(var i = 0; i < detalles.topics.length; i++){

									$(".temasAsesoria").append(
			
										  '<div class="form-group row">'+

										  		'<div class="col-xs-11">'+
												
										  			'<input type="text" class="form-control input-lg tema" placeholder="Descripción" value="'+detalles.topics[i]+'">'+
											 
										   		'</div>'+

												'<div class="col-xs-1" style="padding-top: 10px;">'+

													'<button class="btn btn-danger btnEliminarTema btn-xs"><i class="fa fa-times"></i></button>'+
												
												'</div>'+
			
										  '</div>'
			
									);
			
									
			
								}	

								$("#modalEditarProducto .precio").val(producto[0]["price"]);

								$(".btnEliminarTema").click(function(){

									$(this).parent().parent().remove();

								})

								var detalles = JSON.parse(producto[0]["hour"]);

								for(var j = 0; j < detalles.Mo.length; j++){

									var horaActual = moment.utc(moment().format('YYYY-MM-DD')+" "+detalles.Mo[j]).tz("America/Chicago").format('HH:mm:ss');

									detalles.Mo.splice(j, 1, horaActual);

								}

								for(var j = 0; j < detalles.Tu.length; j++){

									var horaActual = moment.utc(moment().format('YYYY-MM-DD')+" "+detalles.Tu[j]).tz("America/Chicago").format('HH:mm:ss');

									detalles.Tu.splice(j, 1, horaActual);

								}

								for(var j = 0; j < detalles.We.length; j++){

									var horaActual = moment.utc(moment().format('YYYY-MM-DD')+" "+detalles.We[j]).tz("America/Chicago").format('HH:mm:ss');

									detalles.We.splice(j, 1, horaActual);

								}

								for(var j = 0; j < detalles.Th.length; j++){

									var horaActual = moment.utc(moment().format('YYYY-MM-DD')+" "+detalles.Th[j]).tz("America/Chicago").format('HH:mm:ss');

									detalles.Th.splice(j, 1, horaActual);

								}

								for(var j = 0; j < detalles.Fr.length; j++){

									var horaActual = moment.utc(moment().format('YYYY-MM-DD')+" "+detalles.Fr[j]).tz("America/Chicago").format('HH:mm:ss');

									detalles.Fr.splice(j, 1, horaActual);

								}

								for(var j = 0; j < detalles.Sa.length; j++){

									var horaActual = moment.utc(moment().format('YYYY-MM-DD')+" "+detalles.Sa[j]).tz("America/Chicago").format('HH:mm:ss');

									detalles.Sa.splice(j, 1, horaActual);

								}

								for(var j = 0; j < detalles.Su.length; j++){

									var horaActual = moment.utc(moment().format('YYYY-MM-DD')+" "+detalles.Su[j]).tz("America/Chicago").format('HH:mm:ss');

									detalles.Su.splice(j, 1, horaActual);

								}

								$(".editarLunes").html(

									'<input class="form-control input-lg tagsInput detalleLunes" value="'+detalles.Mo+'" data-role="tagsinput" type="text" style="padding:20px">'

								)

								$("#modalEditarProducto .detalleLunes").tagsinput('items');

								$(".editarMartes").html(

									'<input class="form-control input-lg tagsInput detalleLunes" value="'+detalles.Tu+'" data-role="tagsinput" type="text" style="padding:20px">'

								)

								$("#modalEditarProducto .detalleMartes").tagsinput('items');

								$(".editarMiercoles").html(

									'<input class="form-control input-lg tagsInput detalleMiercoles" value="'+detalles.We+'" data-role="tagsinput" type="text" style="padding:20px">'

								)

								$("#modalEditarProducto .detalleMiercoles").tagsinput('items');

								$(".editarJueves").html(

									'<input class="form-control input-lg tagsInput detalleJueves" value="'+detalles.Th+'" data-role="tagsinput" type="text" style="padding:20px">'

								)

								$("#modalEditarProducto .detalleJueves").tagsinput('items');

								$(".editarViernes").html(

									'<input class="form-control input-lg tagsInput detalleViernes" value="'+detalles.Fr+'" data-role="tagsinput" type="text" style="padding:20px">'

								)

								$("#modalEditarProducto .detalleViernes").tagsinput('items');

								$(".editarSabado").html(

									'<input class="form-control input-lg tagsInput detalleSabado" value="'+detalles.Sa+'" data-role="tagsinput" type="text" style="padding:20px">'

								)

								$("#modalEditarProducto .detalleSabado").tagsinput('items');

								$(".editarDomingo").html(

									'<input class="form-control input-lg tagsInput detalleDomingo" value="'+detalles.Su+'" data-role="tagsinput" type="text" style="padding:20px">'

								)

								$("#modalEditarProducto .detalleDomingo").tagsinput('items');

						
								
								$(".bootstrap-tagsinput").css({"padding":"12px",
															"width":"110%"})

							

								$hours = $(".bootstrap-tagsinput .tag");

													/*=============================================
								PREGUNTAMOS SI EXITE OFERTA
								=============================================*/

								if(producto[0]["offer"] != 0){

									$("#modalEditarProducto .selActivarOferta").val("offer");

									$("#modalEditarProducto .datosOferta").show();
									$("#modalEditarProducto .valorOferta").prop("required",true);

									$("#modalEditarProducto .precioOferta").val(producto[0]["priceOffer"]);
									$("#modalEditarProducto .descuentoOferta").val(producto[0]["discountOffer"]);

									if(producto[0]["priceOffer"] != 0){

										$("#modalEditarProducto .precioOferta").prop("readonly",true);
										$("#modalEditarProducto .descuentoOferta").prop("readonly",false);

									}

									if(producto[0]["discountOffer"] != 0){

										$("#modalEditarProducto .descuentoOferta").prop("readonly",true);
										$("#modalEditarProducto .precioOferta").prop("readonly",false);

									}
										
								

								}else{

									$("#modalEditarProducto .selActivarOferta").val("");
									$("#modalEditarProducto .datosOferta").hide();
									$("#modalEditarProducto .valorOferta").prop("required",false);
									
								}

								/*=============================================
								TRAEMOS DATOS DE CABECERA
								=============================================*/

								var datosCabecera = new FormData();
								datosCabecera.append("route", producto[0]["route"]);

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

											$("#modalEditarProducto .idCabecera").val(respuesta["id"]);

											/*=============================================
											CARGAMOS LA DESCRIPCION
											=============================================*/

											$("#modalEditarProducto .descripcionProducto").val(respuesta["description"]);

											/*=============================================
											CARGAMOS LAS PALABRAS CLAVES
											=============================================*/	
											
											if(respuesta["keywords"] != null){

												$("#modalEditarProducto .editarPalabrasClaves").html('<div class="input-group">'+
									
												'<span class="input-group-addon"><i class="fa fa-key"></i></span>'+ 

												'<input type="text" class="form-control input-lg tagsInput pClavesProducto" value="'+respuesta["keywords"]+'" data-role="tagsinput">'+
												

												'</div>');

												$("#modalEditarProducto .pClavesProducto").tagsinput('items');

											}else{

												$("#modalEditarProducto .editarPalabrasClaves").html('<div class="input-group">'+
									
												'<span class="input-group-addon"><i class="fa fa-key"></i></span>'+ 

												'<input type="text" class="form-control input-lg tagsInput pClavesProducto" value="" data-role="tagsinput">'+

												'</div>');

												$("#modalEditarProducto .pClavesProducto").tagsinput('items');

											}

											/*=============================================
											CARGAMOS LA IMAGEN DE PORTADA
											=============================================*/

											$("#modalEditarProducto .previsualizarPortada").attr("src", respuesta["front"]);
											$("#modalEditarProducto .antiguaFotoPortada").val(respuesta["front"]);
										
										}
										
								});

								/*=============================================
								CREAR NUEVA OFERTA AL EDITAR
								=============================================*/

								$("#modalEditarProducto .selActivarOferta").change(function(){

									activarOferta($(this).val())

								})

								$("#modalEditarProducto .valorOferta").change(function(){

									if($(this).attr("tipo") == "oferta"){

										var descuento = 100-(Number($(this).val())*100/Number($("#modalEditarProducto .precio").val()));

										$("#modalEditarProducto .precioOferta").prop("readonly",true);
										$("#modalEditarProducto .descuentoOferta").prop("readonly",false);
										$("#modalEditarProducto .descuentoOferta").val(Math.ceil(descuento));

									}

									if($(this).attr("tipo") == "descuento"){

										var oferta = Number($("#modalEditarProducto .precio").val())-(Number($(this).val())*Number($("#modalEditarProducto .precio").val())/100);	

										$("#modalEditarProducto .descuentoOferta").prop("readonly",true);
										$("#modalEditarProducto .precioOferta").prop("readonly",false);
										$("#modalEditarProducto .precioOferta").val(oferta);

									}

								})

							}else if(categoria["category"] == "RECETAS PUBLICADAS"){

								
								$(".multimediaVirtual").show();
								$(".multimediaBlog").hide();

								$(".temasAsesoria").hide();
								$(".precio").hide();
								$(".agregarOferta").hide();
								$(".detallesHorario").hide();
								$(".fotoOpenG").hide();

								$("#modalEditarProducto .previsualizarPrincipal").attr("src", producto[0]["front"]);
								$("#modalEditarProducto .antiguaFotoPrincipal").val(producto[0]["front"]);

								$("#modalEditarProducto .rutaProducto").prop("readonly",false);

								$("#modalEditarProducto .rutaProducto").parent().children("span").children("i").removeClass("fa-link");
								$("#modalEditarProducto .rutaProducto").parent().children("span").children("i").addClass("fa-instagram");

								$("#modalEditarProducto .descripcionProducto").val(producto[0]["description"]);



							}else{

								
								$(".multimediaVirtual").hide();
								$(".multimediaBlog").show();
								$(".temasAsesoria").hide();
								$(".precio").hide();
								$(".agregarOferta").hide();

								$(".detallesHorario").hide();
								$(".fotoOpenG").show();

								$("#modalEditarProducto .rutaProducto").prop("readonly",true);

								$("#modalEditarProducto .rutaProducto").parent().children("span").children("i").removeClass("fa-instagram");
								$("#modalEditarProducto .rutaProducto").parent().children("span").children("i").addClass("fa-link");

							}

							
						}

					})

			}

			/*=============================================
			GUARDAR CAMBIOS DEL PRODUCTO
			=============================================*/	

			var multimediaFisica = null;
			var multimediaVirtual = null;	

			$(".guardarCambiosProducto").click(function(){

					/*=============================================
					PREGUNTAMOS SI LOS CAMPOS OBLIGATORIOS ESTÁN LLENOS
					=============================================*/

					if($("#modalEditarProducto .tituloProducto").val() != "" && 
					   $("#modalEditarProducto .seleccionarCategoria").val() != "" &&
					   $("#modalEditarProducto .descripcionProducto").val() != "" &&
					   $("#modalEditarProducto .pClavesProducto").val() != ""){

						/*=============================================
					   	PREGUNTAMOS SI VIENEN IMÁGENES PARA MULTIMEDIA O LINK DE YOUTUBE
					   	=============================================*/

					   	if($("#modalEditarProducto .seleccionarTipo").val() != "virtual"){	

						   	if(arrayFiles.length > 0 && $("#modalEditarProducto .rutaProducto").val() != ""){

						   		var listaMultimedia = [];
						   		var finalFor = 0;

								for(var i = 0; i < arrayFiles.length; i++){
									
									var datosMultimedia = new FormData();
									datosMultimedia.append("file", arrayFiles[i]);
									datosMultimedia.append("ruta", $("#modalEditarProducto .rutaProducto").val());

									$.ajax({
										url:"ajax/productos.ajax.php",
										method: "POST",
										data: datosMultimedia,
										cache: false,
										contentType: false,
										processData: false,
										beforeSend: function(){

											$(".modal-footer .preload").html(`


												<center>

													<img src="vistas/img/plantilla/status.gif" id="status" />
													<br>

												</center>

											`);

										},
										success: function(respuesta){

											$("#status").remove();

											listaMultimedia.push({"foto" : respuesta.substr(3)});
											multimediaFisica = JSON.stringify(listaMultimedia);
											
											if(localStorage.getItem("multimediaFisica") != null){

												var jsonLocalStorage = JSON.parse(localStorage.getItem("multimediaFisica"));

												var jsonMultimediaFisica = listaMultimedia.concat(jsonLocalStorage);

												multimediaFisica = JSON.stringify(jsonMultimediaFisica);												
											}
																			
											multimediaVirtual = null;

											if(multimediaFisica == null){

												 swal({
												      title: "El campo de multimedia no debe estar vacío",
												      type: "error",
												      confirmButtonText: "¡Cerrar!"
												    });

												 return;
											}


											if((finalFor + 1) == arrayFiles.length){

												editarMiProducto(multimediaFisica);
												finalFor = 0;

											}

											finalFor++;							
								
										}

									})

								}

							}else{
					
								var jsonLocalStorage = JSON.parse(localStorage.getItem("multimediaFisica"));

								multimediaFisica = JSON.stringify(jsonLocalStorage);

								editarMiProducto(multimediaFisica);												
								
							}

						}else{

							multimediaVirtual = $("#modalEditarProducto .multimedia").val();
							multimediaFisica = null;

							if(multimediaVirtual == null){

					 			 swal({
								      title: "El campo de multimedia no debe estar vacío",
								      type: "error",
								      confirmButtonText: "¡Cerrar!"
								    });

					 			  return;
							}	

							editarMiProducto(multimediaVirtual);	
							
						}

					}else{

						 swal({
					      title: "Llenar todos los campos obligatorios",
					      type: "error",
					      confirmButtonText: "¡Cerrar!"
					    });

						return;

					}					

			})
					
		}

	})

})