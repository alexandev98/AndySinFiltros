 /*$.ajax({

 	url:"ajax/tableProducts.ajax.php",
 	success:function(respuesta){
		
 		console.log("respuesta", respuesta);

 	}

 })*/

 
$(".tablaAsesorias").DataTable({
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
ACTIVAR ASESORIA
=============================================*/
$('.tablaAsesorias tbody').on("click", ".btnActivar", function(){

	var asesoria = $(this);
	var idAsesoria = $(this).attr("idAsesoria");
	var estadoAsesoria = $(this).attr("estadoAsesoria");

	var datos = new FormData();
 	datos.append("activarId", idAsesoria);
  	datos.append("activarAsesoria", estadoAsesoria);

  	$.ajax({

	  url:"ajax/asesorias.ajax.php",
	  method: "POST",
	  data: datos,
	  cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){
		
			if(respuesta == "ok"){

				if(estadoAsesoria == 0){

					asesoria.removeClass('btn-success');
					asesoria.addClass('btn-danger');
					asesoria.html('Desactivado');
					asesoria.attr('estadoAsesoria',1);
			
				}else{
			
					asesoria.addClass('btn-success');
					asesoria.removeClass('btn-danger');
					asesoria.html('Activado');
					asesoria.attr('estadoAsesoria',0);
			
				}

			}
          
      }

  	})

})

/*=============================================
RUTA ASESORIA
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
  
  $(".tituloAsesoria").keyup(function(){
  
	  $(".rutaAsesoria").val(limpiarUrl($(".tituloAsesoria").val()));
  
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
AGREGAR CAJA DE TEXTO
=============================================*/

$(".btnAgregarTema").click(function(){

	if($(this).attr("id") == "agregarAsesoria"){

		$("#modalAgregarAsesoria .temasAsesoria .panel").after(

			'<div class="form-group row">'+

				'<div class="col-xs-10">'+
				
					'<input type="text" class="form-control tema" placeholder="Descripción">'+
				
				'</div>'+

				'<div class="col-xs-2">'+

					'<button class="btn btn-danger btnEliminarTema btn-xs fa fa-x"></button>'+
				
				'</div>'+

			'</div>'

		);
		
	}else{

		$("#modalEditarAsesoria .temasAsesoria .panel").after(

			'<div class="form-group row">'+

				'<div class="col-xs-10">'+
				
					'<input type="text" class="form-control tema" placeholder="Descripción">'+
				
				'</div>'+

				'<div class="col-xs-2">'+

					'<button class="btn btn-danger btnEliminarTema btn-xs fa fa-x"></button>'+
				
				'</div>'+

			'</div>'

		);
	}

})

$("#modalAgregarAsesoria .temasAsesoria").on("click", ".btnEliminarTema", function(){

	$(this).parent().parent().remove();

})

$("#modalEditarAsesoria .temasAsesoria").on("click", ".btnEliminarTema", function(){

	$(this).parent().parent().remove();

})

/*=============================================
VALOR OFERTA
=============================================*/

$("#modalAgregarAsesoria .valorOferta").change(function(){

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
	      text: "¡Primero agregue un precio a la asesoria!",
	      type: "error",
	      confirmButtonText: "¡Cerrar!"
	    });

	 $(".precioOferta").val(0);
	 $(".descuentoOferta").val(0);

	 return;

	}

})

/*=============================================
CAMBIAR EL PRECIO
=============================================*/

$(".precio").change(function(){

	$(".precioOferta").val(0);
	$(".descuentoOferta").val(0);

})

/*=============================================
GUARDAR EL PRODUCTO
=============================================*/

$(".guardarAsesoria").click(function(){

	/*=============================================
	PREGUNTAMOS SI LOS CAMPOS OBLIGATORIOS ESTÁN LLENOS
	=============================================*/

	if($(".tituloAsesoria").val() != "" && 
	   $(".descripcionAsesoria").val() != "" &&
	   $(".pClavesAsesoria").val() != "" &&
	   $(".precio").val() != ""){

		agregarMiAsesoria();		

	}else{

		 swal({
	      title: "Llenar todos los campos obligatorios",
	      type: "error",
	      confirmButtonText: "Cerrar"
	    });

		return;
	}

})

function agregarMiAsesoria(){

	/*=============================================
	ALMACENAMOS TODOS LOS CAMPOS DE ASESORIA
	=============================================*/

	var tituloAsesoria = $(".tituloAsesoria").val();
	var rutaAsesoria = $(".rutaAsesoria").val();
	var descripcionAsesoria = $(".descripcionAsesoria").val();
	var pClavesAsesoria = $(".pClavesAsesoria").val();
	var precio = $(".precio").val();
	var selActivarOferta = $(".selActivarOferta").val();
	var precioOferta = $(".precioOferta").val();
	var descuentoOferta = $(".descuentoOferta").val();


	var horarioLunes = "";
	var horarioMartes = "";
	var horarioMiercoles = "";
	var horarioJueves = "";
	var horarioViernes = "";
	var horarioSabado = "";
	var horarioDomingo = "";

	if($("#modalAgregarAsesoria .horarioLunes").val() != ""){

		horarioLunes = convertChicagoTimeToUTC($("#modalAgregarAsesoria .horarioLunes").val().split(","));

	}

	if($("#modalAgregarAsesoria .horarioMartes").val() != ""){

		horarioMartes = convertChicagoTimeToUTC($("#modalAgregarAsesoria .horarioMartes").val().split(","));

	}

	if($("#modalAgregarAsesoria .horarioMiercoles").val() != ""){

		horarioMiercoles = convertChicagoTimeToUTC($("#modalAgregarAsesoria .horarioMiercoles").val().split(","));

	}

	if($("#modalAgregarAsesoria .horarioJueves").val() != ""){

		horarioJueves = convertChicagoTimeToUTC($("#modalAgregarAsesoria .horarioJueves").val().split(","));
	}

	if($("#modalAgregarAsesoria .horarioViernes").val() != ""){

		horarioViernes = convertChicagoTimeToUTC($("#modalAgregarAsesoria .horarioViernes").val().split(","));
	}

	if($("#modalAgregarAsesoria .horarioSabado").val() != ""){

		horarioSabado = convertChicagoTimeToUTC($("#modalAgregarAsesoria .horarioSabado").val().split(","));

	}

	if($("#modalAgregarAsesoria .horarioDomingo").val() != ""){

		horarioDomingo = convertChicagoTimeToUTC($("#modalAgregarAsesoria .horarioDomingo").val().split(","));

	}
						
	if(horarioLunes != "error" &&
		horarioMartes != "error" &&
		horarioMiercoles != "error" &&
		horarioJueves != "error" && 
		horarioViernes != "error" &&
		horarioSabado != "error" &&
		horarioDomingo != "error"){

		var horarios = {"Mo": horarioLunes,
						"Tu": horarioMartes,
						"We": horarioMiercoles,
						"Th": horarioJueves,
						"Fr": horarioViernes,
						"Sa": horarioSabado,
						"Su": horarioDomingo};

		var horariosString = JSON.stringify(horarios);

	}else{

		swal({
			title: "Los horarios no se encuentran en el formato correcto ",
			type: "error",
			confirmButtonText: "Cerrar"
			});

		return;
	}

	/*=============================================
	OBTENGO LOS TEMAS DE LAS CAJAS Y LOS ALMACENO EN UN STRING CON FORMATO JSON
	=============================================*/

	var topics = [];

	var temas = $("#modalAgregarAsesoria .temasAsesoria .tema");

	for(var i = 0; i < temas.length; i++){

		if(temas[i].value != " "){
			topics.push(temas[i].value);
		}
		
	}

	var detalles = {"topics": topics};

	var detallesString = JSON.stringify(detalles);

	var datosAsesoria = new FormData();
	datosAsesoria.append("tituloAsesoria", tituloAsesoria);
	datosAsesoria.append("rutaAsesoria", rutaAsesoria);
	datosAsesoria.append("horario", horariosString);	
	datosAsesoria.append("detalles", detallesString);	
	datosAsesoria.append("descripcionAsesoria", descripcionAsesoria);
	datosAsesoria.append("pClavesAsesoria", pClavesAsesoria);
	datosAsesoria.append("precio", precio);
	
	datosAsesoria.append("fotoPortada", imagenPortada);
	datosAsesoria.append("fotoPrincipal", imagenFotoPrincipal);
	datosAsesoria.append("selActivarOferta", selActivarOferta);
	datosAsesoria.append("precioOferta", precioOferta);
	datosAsesoria.append("descuentoOferta", descuentoOferta);

	$.ajax({
			url:"ajax/asesorias.ajax.php",
			method: "POST",
			data: datosAsesoria,
			cache: false,
			contentType: false,
			processData: false,
			success: function(respuesta){
				
				console.log("respuesta", respuesta);

				if(respuesta == "ok"){

					swal({
					  type: "success",
					  title: "La asesoria ha sido guardada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
						if (result.value) {

						window.location = "asesorias";

						}
					})
				}

			}

	})

}

/*=============================================
EDITAR ASESORIA
=============================================*/

$('.tablaAsesorias tbody').on("click", ".btnEditarAsesoria", function(){
	
	$('#modalEditarAsesoria .temasAsesoria .form-group').remove();

	var idAsesoria = $(this).attr("idAsesoria");
	
	var datos = new FormData();
	datos.append("idAsesoria", idAsesoria);

	$.ajax({

		url:"ajax/asesorias.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(asesoria){

			$("#modalEditarAsesoria .idAsesoria").val(asesoria[0]["id"]);
			$("#modalEditarAsesoria .tituloAsesoria").val(asesoria[0]["title"]);
			$("#modalEditarAsesoria .rutaAsesoria").val(asesoria[0]["route"]);
			
			$("#modalEditarAsesoria .previsualizarPrincipal").attr("src", asesoria[0]["front"]);
			$("#modalEditarAsesoria .antiguaFotoPrincipal").val(asesoria[0]["front"]);

			var detalles = JSON.parse(asesoria[0]["details"]);

			for(var i = 0; i < detalles.topics.length; i++){

				$("#modalEditarAsesoria .temasAsesoria").append(

						'<div class="form-group row">'+

							'<div class="col-xs-10">'+
							
								'<input type="text" class="form-control tema" placeholder="Descripción" value="'+detalles.topics[i]+'">'+
							
							'</div>'+

							'<div class="col-xs-2">'+

								'<button class="btn btn-danger btnEliminarTema btn-xs fa fa-x"></button>'+
							
							'</div>'+

						'</div>'

				);

			}	

			$("#modalEditarAsesoria .precio").val(asesoria[0]["price"]);

			var detalles = JSON.parse(asesoria[0]["hour"]);

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

			$("#modalEditarAsesoria .editarLunes").html(

				'<input class="form-control  tagsInput horarioLunes" value="'+detalles.Mo+'" data-role="tagsinput" type="text" style="padding:20px">'

			)

			$("#modalEditarAsesoria .horarioLunes").tagsinput('items');

			$("#modalEditarAsesoria .editarMartes").html(

				'<input class="form-control  tagsInput horarioMartes" value="'+detalles.Tu+'" data-role="tagsinput" type="text" style="padding:20px">'

			)

			$("#modalEditarAsesoria .horarioMartes").tagsinput('items');

			$("#modalEditarAsesoria .editarMiercoles").html(

				'<input class="form-control  tagsInput horarioMiercoles" value="'+detalles.We+'" data-role="tagsinput" type="text" style="padding:20px">'

			)

			$("#modalEditarAsesoria .horarioMiercoles").tagsinput('items');

			$("#modalEditarAsesoria .editarJueves").html(

				'<input class="form-control  tagsInput horarioJueves" value="'+detalles.Th+'" data-role="tagsinput" type="text" style="padding:20px">'

			)

			$("#modalEditarAsesoria .horarioJueves").tagsinput('items');

			$("#modalEditarAsesoria .editarViernes").html(

				'<input class="form-control  tagsInput horarioViernes" value="'+detalles.Fr+'" data-role="tagsinput" type="text" style="padding:20px">'

			)

			$("#modalEditarAsesoria .horarioViernes").tagsinput('items');

			$("#modalEditarAsesoria .editarSabado").html(

				'<input class="form-control  tagsInput horarioSabado" value="'+detalles.Sa+'" data-role="tagsinput" type="text" style="padding:20px">'

			)

			$("#modalEditarAsesoria .horarioSabado").tagsinput('items');

			$("#modalEditarAsesoria .editarDomingo").html(

				'<input class="form-control  tagsInput horarioDomingo" value="'+detalles.Su+'" data-role="tagsinput" type="text" style="padding:20px">'

			)

			$("#modalEditarAsesoria .horarioDomingo").tagsinput('items');

	
			
			$(".bootstrap-tagsinput").css({"width":"100%"})
		

			$hours = $(".bootstrap-tagsinput .tag");

			/*=============================================
			PREGUNTAMOS SI EXITE OFERTA
			=============================================*/

			if(asesoria[0]["offer"] != 0){

				$("#modalEditarAsesoria .selActivarOferta").val("oferta");

				$("#modalEditarAsesoria .datosOferta").show();
				$("#modalEditarAsesoria .valorOferta").prop("required",true);

				$("#modalEditarAsesoria .precioOferta").val(asesoria[0]["offerPrice"]);
				$("#modalEditarAsesoria .descuentoOferta").val(asesoria[0]["discountOffer"]);

				if(asesoria[0]["offerPrice"] != 0){

					$("#modalEditarAsesoria .precioOferta").prop("readonly",true);
					$("#modalEditarAsesoria .descuentoOferta").prop("readonly",false);

				}

				if(asesoria[0]["discountOffer"] != 0){

					$("#modalEditarAsesoria .descuentoOferta").prop("readonly",true);
					$("#modalEditarAsesoria .precioOferta").prop("readonly",false);

				}

			}else{

				$("#modalEditarAsesoria .selActivarOferta").val("");
				$("#modalEditarAsesoria .datosOferta").hide();
				$("#modalEditarAsesoria .valorOferta").prop("required",false);
				
			}

			/*=============================================
			TRAEMOS DATOS DE CABECERA
			=============================================*/

			var datosCabecera = new FormData();
			datosCabecera.append("route", asesoria[0]["route"]);

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

						$("#modalEditarAsesoria .idCabecera").val(respuesta["id"]);

						/*=============================================
						CARGAMOS LA DESCRIPCION
						=============================================*/

						$("#modalEditarAsesoria .descripcionAsesoria").val(respuesta["description"].replace(/<br\s*[\/]?>/gi, "\n"));

						/*=============================================
						CARGAMOS LAS PALABRAS CLAVES
						=============================================*/	
						
						if(respuesta["keywords"] != null){

							$("#modalEditarAsesoria .editarPalabrasClaves").html('<div class="input-group">'+
				
							'<span class="input-group-addon"><i class="fa fa-key"></i></span>'+ 

							'<input type="text" class="form-control  tagsInput pClavesAsesoria" value="'+respuesta["keywords"]+'" data-role="tagsinput">'+
							

							'</div>');

							$("#modalEditarAsesoria .pClavesAsesoria").tagsinput('items');

						}else{

							$("#modalEditarAsesoria .editarPalabrasClaves").html('<div class="input-group">'+
				
							'<span class="input-group-addon"><i class="fa fa-key"></i></span>'+ 

							'<input type="text" class="form-control  tagsInput pClavesAsesoria" value="" data-role="tagsinput">'+

							'</div>');

							$("#modalEditarAsesoria .pClavesAsesoria").tagsinput('items');

						}

						/*=============================================
						CARGAMOS LA IMAGEN DE PORTADA
						=============================================*/

						$("#modalEditarAsesoria .previsualizarPortada").attr("src", respuesta["front"]);
						$("#modalEditarAsesoria .antiguaFotoPortada").val(respuesta["front"]);
					
					}
					
			});

			/*=============================================
			CREAR NUEVA OFERTA AL EDITAR
			=============================================*/

			$("#modalEditarAsesoria .selActivarOferta").change(function(){

				activarOferta($(this).val())

			})

			$("#modalEditarAsesoria .valorOferta").change(function(){

				if($(this).attr("tipo") == "oferta"){

					var descuento = 100-(Number($(this).val())*100/Number($("#modalEditarAsesoria .precio").val()));

					$("#modalEditarAsesoria .precioOferta").prop("readonly",true);
					$("#modalEditarAsesoria .descuentoOferta").prop("readonly",false);
					$("#modalEditarAsesoria .descuentoOferta").val(Math.ceil(descuento));

				}

				if($(this).attr("tipo") == "descuento"){

					var oferta = Number($("#modalEditarAsesoria .precio").val())-(Number($(this).val())*Number($("#modalEditarAsesoria .precio").val())/100);	

					$("#modalEditarAsesoria .descuentoOferta").prop("readonly",true);
					$("#modalEditarAsesoria .precioOferta").prop("readonly",false);
					$("#modalEditarAsesoria .precioOferta").val(oferta);

				}

			})
			
		}

	})

})

/*=============================================
GUARDAR CAMBIOS DEL ASESORIA
=============================================*/	

$(".guardarCambiosAsesoria").click(function(){

		/*=============================================
		PREGUNTAMOS SI LOS CAMPOS OBLIGATORIOS ESTÁN LLENOS
		=============================================*/

		if($("#modalEditarAsesoria .tituloAsesoria").val() != "" && 
			$("#modalEditarAsesoria .descripcionAsesoria").val() != "" &&
			$("#modalEditarAsesoria .pClavesAsesoria").val() != "" &&
			$("#modalEditarAsesoria .precio").val() != ""){

			editarMiAsesoria();

		}else{

				swal({
				title: "Llenar todos los campos obligatorios",
				type: "error",
				confirmButtonText: "Cerrar"
			});

			return;

		}					

})

function editarMiAsesoria(){

	var idAsesoria = $("#modalEditarAsesoria .idAsesoria").val();
	var tituloAsesoria = $("#modalEditarAsesoria .tituloAsesoria").val();
	var rutaAsesoria = $("#modalEditarAsesoria .rutaAsesoria").val();
	var descripcionAsesoria = $("#modalEditarAsesoria .descripcionAsesoria").val().replace(/\r?\n/g, '<br/>');
	var pClavesAsesoria = $("#modalEditarAsesoria .pClavesAsesoria").val();
	var precio = $("#modalEditarAsesoria .precio").val();
	var selActivarOferta = $("#modalEditarAsesoria .selActivarOferta").val();
	var precioOferta = $("#modalEditarAsesoria .precioOferta").val();
	var descuentoOferta = $("#modalEditarAsesoria .descuentoOferta").val();

	var horarioLunes = "";
	var horarioMartes = "";
	var horarioMiercoles = "";
	var horarioJueves = "";
	var horarioViernes = "";
	var horarioSabado = "";
	var horarioDomingo = "";

	if($("#modalEditarAsesoria .horarioLunes").val() != ""){

		horarioLunes = convertChicagoTimeToUTC($("#modalEditarAsesoria .horarioLunes").val().split(","));

	}

	if($("#modalEditarAsesoria .horarioMartes").val() != ""){

		horarioMartes = convertChicagoTimeToUTC($("#modalEditarAsesoria .horarioMartes").val().split(","));

	}

	if($("#modalEditarAsesoria .horarioMiercoles").val() != ""){

		horarioMiercoles = convertChicagoTimeToUTC($("#modalEditarAsesoria .horarioMiercoles").val().split(","));

	}

	if($("#modalEditarAsesoria .horarioJueves").val() != ""){

		horarioJueves = convertChicagoTimeToUTC($("#modalEditarAsesoria .horarioJueves").val().split(","));
	}

	if($("#modalEditarAsesoria .horarioViernes").val() != ""){

		horarioViernes = convertChicagoTimeToUTC($("#modalEditarAsesoria .horarioViernes").val().split(","));
	}

	if($("#modalEditarAsesoria .horarioSabado").val() != ""){

		horarioSabado = convertChicagoTimeToUTC($("#modalEditarAsesoria .horarioSabado").val().split(","));

	}

	if($("#modalEditarAsesoria .horarioDomingo").val() != ""){

		horarioDomingo = convertChicagoTimeToUTC($("#modalEditarAsesoria .horarioDomingo").val().split(","));

	}
						
	if(horarioLunes != "error" &&
		horarioMartes != "error" &&
		horarioMiercoles != "error" &&
		horarioJueves != "error" && 
		horarioViernes != "error" &&
		horarioSabado != "error" &&
		horarioDomingo != "error"){

		var horarios = {"Mo": horarioLunes,
						"Tu": horarioMartes,
						"We": horarioMiercoles,
						"Th": horarioJueves,
						"Fr": horarioViernes,
						"Sa": horarioSabado,
						"Su": horarioDomingo};

		var horariosString = JSON.stringify(horarios);

		/*=============================================
		OBTENGO LOS TEMAS DE LAS CAJAS Y LOS ALMACENO EN UN STRING CON FORMATO JSON
		=============================================*/

		var topics = [];

		var temas = $("#modalEditarAsesoria .temasAsesoria .tema");

		for(var i = 0; i < temas.length; i++){

			if(temas[i].value != " "){
				topics.push(temas[i].value);
			}
			
		}

		var detalles = {"topics": topics};

		var detallesString = JSON.stringify(detalles);

	}else{

		swal({
			title: "Los horarios no se encuentran en el formato correcto ",
			type: "error",
			confirmButtonText: "¡Cerrar!"
			});

		return;
	}
		
	var antiguaFotoPortada = $("#modalEditarAsesoria .antiguaFotoPortada").val();
	var antiguaFotoPrincipal = $("#modalEditarAsesoria .antiguaFotoPrincipal").val();
	var idCabecera = $("#modalEditarAsesoria .idCabecera").val();

	var datosAsesoria = new FormData();
	datosAsesoria.append("id", idAsesoria);
	datosAsesoria.append("editarAsesoria", tituloAsesoria);
	datosAsesoria.append("rutaAsesoria", rutaAsesoria);
	datosAsesoria.append("horario", horariosString);	
	datosAsesoria.append("detalles", detallesString);		
	datosAsesoria.append("descripcionAsesoria", descripcionAsesoria);
	datosAsesoria.append("pClavesAsesoria", pClavesAsesoria);
	datosAsesoria.append("precio", precio);

	datosAsesoria.append("fotoPortada", imagenPortada);
	datosAsesoria.append("fotoPrincipal", imagenFotoPrincipal);
	datosAsesoria.append("selActivarOferta", selActivarOferta);
	datosAsesoria.append("precioOferta", precioOferta);
	datosAsesoria.append("descuentoOferta", descuentoOferta);
	datosAsesoria.append("antiguaFotoPortada", antiguaFotoPortada);
	datosAsesoria.append("antiguaFotoPrincipal", antiguaFotoPrincipal);
	datosAsesoria.append("idCabecera", idCabecera);

	$.ajax({
			url:"ajax/asesorias.ajax.php",
			method: "POST",
			data: datosAsesoria,
			cache: false,
			contentType: false,
			processData: false,
			success: function(respuesta){
				
				if(respuesta == "ok"){

					swal({
					  type: "success",
					  title: "La asesoria ha sido cambiado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
						if (result.value) {

						window.location = "asesorias";

						}
					})
				}

			}

	})
	
}

function convertChicagoTimeToUTC(horario){

	for(i = 0; i < horario.length; i++){

		var hour = moment.tz(horario[i], "HH:mm:ss", true, "America/Chicago");
		
		if(hour.isValid()){

			horario.splice(i, 1, hour.utc().format("HH:mm:ss"));

		}else{

			return "error";

		}
		
	}

	return horario;

}

/*=============================================
ELIMINAR PRODUCTO
=============================================*/

$('.tablaAsesorias tbody').on("click", ".btnEliminarAsesoria", function(){


	var idAsesoria = $(this).attr("idAsesoria");
	var rutaCabecera = $(this).attr("rutaOpengraph");
	var imgPortada = $(this).attr("imgPortada");
	var imgPrincipal = $(this).attr("imgPrincipal");
  
	swal({
	  title: '¿Está seguro de borrar la asesoría?',
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si'
	}).then(function(result){
  
	  if(result.value){
  
		window.location = "index.php?route=asesorias&idAsesoria="+idAsesoria+"&rutaOpengraph="+rutaCabecera+"&imgPortada="+imgPortada+"&imgPrincipal="+imgPrincipal;
		
	  }
  
	})
  
  })