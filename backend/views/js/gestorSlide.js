/*=============================================
AGREGAR SLIDE
=============================================*/

$(".agregarSlide").click(function(){

	var imgBackground = "views/img/slide/default/fondo.jpeg";
	var typeSlide = "slideOption1";
	var styleTextSlide = '{"top":"20","right":"","left":"15","width":"40"}';
	var styleImgProduct = '{"top":"","right":"","left":"","width":""}';
	var title1 = '{"text":"Lorem Ipsum","color":"#333"}';
	var title2 = '{"text":"Lorem ipsum dolor sit","color":"#777"}';
	var title3 = '{"text":"Lorem ipsum dolor sit","color":"#888"}';
	var button = 'VER PRODUCT';
	var url = '#';

	var datos = new FormData();
	datos.append("createSlide", "ok");
	datos.append("imgBackground", imgBackground);
	datos.append("typeSlide", typeSlide);
	datos.append("styleTextSlide", styleTextSlide);
	datos.append("styleImgProduct", styleImgProduct);
	datos.append("title1", title1);
	datos.append("title2", title2);
	datos.append("title3", title3);
	datos.append("button", button);
	datos.append("url", url);

	$.ajax({

		url:"ajax/slide.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function(response){

			console.log(response);
			
			if(response == "ok"){

				swal({
				  type: "success",
				  title: "El slide ha sido agregado correctamente",
				  showConfirmButton: true,
				  confirmButtonText: "Cerrar"
				  }).then((result) => {
					if (result.value) {

					window.location = "slide";

					}
				})

			}

		}

	})

})

/*=============================================
CAMBIAR EL ORDEN DEL SLIDE
=============================================*/

var itemSlide = $(".itemSlide");

$('.todo-list').sortable({
    placeholder         : 'sort-highlight',
    handle              : '.handle',
    forcePlaceholderSize: true,
    zIndex              : 999999,
    stop: function(event){

    	for(var i = 0; i < itemSlide.length; i++){

    		var datos = new FormData();
			datos.append("idSlide", event.target.children[i].id);
			datos.append("orden", (i+1));

			console.log(event.target.children[i].id);

			$.ajax({

				url:"ajax/slide.ajax.php",
				method: "POST",
				data: datos,
				cache: false,
				contentType: false,
				processData: false,
				success: function(response){
				
				}

			})

    	}   

    }

});

/*=============================================
VARIABLES GLOBALES PARA CAMBIOS DEL SLIDE
=============================================*/

var guardarSlide = $(".guardarSlide");
var typeSlide = $(".typeSlide");
var typeSlideIzq = $(".typeSlideIzq");
var typeSlideDer = $(".typeSlideDer");
var slideOptions = $(".slideOptions");
var previsualizarFondo = $(".previsualizarFondo");
var previsualizarProduct = $(".previsualizarProduct");
var subirFondo = null;
var subirImgProduct = null;

/*=============================================
ACTUALIZAR NOMBRE SLIDE
=============================================*/

$(".nameSlide").change(function(){

	var nombre = $(this).val();
	var indiceSlide = $(this).attr("indice");

	$(guardarSlide[indiceSlide]).attr("nameSlide", nombre);
	
})

/*=============================================
CHECKED PARA EL TIPO DE SLIDE
=============================================*/
for(var i = 0; i < typeSlide.length; i++){

	if($(typeSlide[i]).val()=="slideOption1"){

		$(typeSlideIzq[i]).parent().addClass("checked");

	}else{

		$(typeSlideDer[i]).parent().addClass("checked");

	}

}

/*=============================================
CAMBIO DE TIPO DE SLIDE
=============================================*/

for(var i = 0; i < typeSlide.length; i++){

	$("input[name='typeSlide"+i+"']").on("ifChecked",function(){

		var typeSlide = $(this).val();
		var indiceSlide = $(this).attr("indice");
		var slide = $(".slide");
		var posHorizontal = $(".posHorizontal");
		var posHorizontalTexto = $(".posHorizontalTexto");

		$(posHorizontal[indiceSlide]).attr("typeSlide", typeSlide);
		$(posHorizontalTexto[indiceSlide]).attr("typeSlide", typeSlide);

		$(slideOptions[indiceSlide]).addClass(typeSlide);

		var anchoSlide = $(slide[indiceSlide]).css("width").replace(/px/, " ");
		
		//IZQ
		if(typeSlide == "slideOption1"){

			// ORGANIZAR IMAGEN PRODUCTO

			var posHImagen = $(slideOptions[indiceSlide]).children("img").css("left").replace(/px/, " ");
			
			var nuevaPosHImagen = posHImagen*100/anchoSlide;
			
			$(slideOptions[indiceSlide]).children("img").css({"left": "", "right": nuevaPosHImagen+"%"})

			$(guardarSlide[indiceSlide]).attr("styleImgProductLeft", "");
			$(guardarSlide[indiceSlide]).attr("styleImgProductRight", nuevaPosHImagen);

			// ORGANIZAR TEXTO SLIDE 

			var posHTexto = $(slideOptions[indiceSlide]).children('.textsSlide').css("right").replace(/px/, " ");
			
			var nuevaPosHTexto = posHTexto*100/anchoSlide;

			$(slideOptions[indiceSlide]).children(".textsSlide").css({"left": nuevaPosHTexto + "%" , "right": "", "text-align": "left"})

			$(guardarSlide[indiceSlide]).attr("styleTextSlideRight", "");
			$(guardarSlide[indiceSlide]).attr("styleTextSlideLeft", nuevaPosHTexto);	


		}else{

			// ORGANIZAR IMAGEN PRODUCTO

			var posHImagen = $(slideOptions[indiceSlide]).children("img").css("right").replace(/px/, " ");
			
			var nuevaPosHImagen = posHImagen*100/anchoSlide;

			$(slideOptions[indiceSlide]).children("img").css({"left": nuevaPosHImagen+"%", "right": ""})

			$(guardarSlide[indiceSlide]).attr("styleImgProductRight", "");
			$(guardarSlide[indiceSlide]).attr("styleImgProductLeft", nuevaPosHImagen);

			// ORGANIZAR TEXTO SLIDE 

			var posHTexto = $(slideOptions[indiceSlide]).children('.textsSlide').css("left").replace(/px/, " ");
			
			var nuevaPosHTexto = posHTexto*100/anchoSlide;

			$(slideOptions[indiceSlide]).children(".textsSlide").css({"left": "", "right": nuevaPosHTexto+"%", "text-align": "right"})

			$(guardarSlide[indiceSlide]).attr("styleTextSlideLeft", "");
			$(guardarSlide[indiceSlide]).attr("styleTextSlideRight", nuevaPosHTexto);

		}

		$(guardarSlide[indiceSlide]).attr("typeSlide", typeSlide);

	})

}

/*=============================================
CAMBIO DE FONDO
=============================================*/
$(".subirFondo").change(function(){

	var imagenFondo = this.files[0];

	var indiceSlide = $(this).attr("indice");

	/*=============================================
	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
	=============================================*/

	if(imagenFondo["type"] != "image/jpeg" && imagenFondo["type"] != "image/png"){

		$(".subirFondo").val("");

		 swal({
	      title: "Error al subir la imagen",
	      text: "La imagen debe estar en formato JPG o PNG",
	      type: "error",
	      confirmButtonText: "Cerrar"
	    });

	}else if(imagenFondo["size"] > 2000000){

		$(".subirFondo").val("");

		 swal({
	      title: "Error al subir la imagen",
	      text: "La imagen no debe pesar más de 2MB",
	      type: "error",
	      confirmButtonText: "Cerrar"
	    });

	}else{

		var datosImagen = new FileReader;
		datosImagen.readAsDataURL(imagenFondo);

		$(datosImagen).on("load", function(event){

			var rutaImagen = event.target.result;
			$(previsualizarFondo[indiceSlide]).attr("src", rutaImagen);
			$(slideOptions[indiceSlide]).parent().children('.cambiarFondo').attr("src", rutaImagen);
			$(guardarSlide[indiceSlide]).attr("imgBackground", "");

		})

	}

})

/*=============================================
CAMBIO DE IMAGEN PRODUCTO
=============================================*/

$(".uploadImgProduct").change(function(){

	var imagenProduct = this.files[0];
	var indiceSlide = $(this).attr("indice");

	/*=============================================
	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
	=============================================*/

	if(imagenProduct["type"] != "image/jpeg" && imagenProduct["type"] != "image/png"){

		$("#subirLogo").val("");

		 swal({
	      title: "Error al subir la imagen",
	      text: "¡La imagen debe estar en formato JPG o PNG!",
	      type: "error",
	      confirmButtonText: "¡Cerrar!"
	    });

	}else if(imagenProduct["size"] > 2000000){

		$("#subirLogo").val("");

		 swal({
	      title: "Error al subir la imagen",
	      text: "¡La imagen no debe pesar más de 2MB!",
	      type: "error",
	      confirmButtonText: "¡Cerrar!"
	    });

	}else{

		var datosImagen = new FileReader;
		datosImagen.readAsDataURL(imagenProduct);

		$(datosImagen).on("load", function(event){

			var rutaImagen = event.target.result;

			$(previsualizarProduct[indiceSlide]).attr("src", rutaImagen);
			
			$(slideOptions[indiceSlide]).children('.imgProduct').attr("src", rutaImagen);
			
			$(slideOptions[indiceSlide]).children('.imgProduct').css({"top":"15%","right":"10%","left":"","width":"30%"});

			$(guardarSlide[indiceSlide]).attr("styleImgProductRight", "10");
			$(guardarSlide[indiceSlide]).attr("styleImgProductLeft", "");
			$(guardarSlide[indiceSlide]).attr("styleImgProductTop", "15");
			$(guardarSlide[indiceSlide]).attr("styleImgProductWidth", "30");

			$(guardarSlide[indiceSlide]).attr("imgProduct", "");

		})

	}

});

/*=============================================
CAMBIAR TEXTO Y COLOR SLIDE
=============================================*/

// TEXTO Y COLOR 1

$(".cambioTituloText1").change(function(){

	var indiceSlide = $(this).attr("indice");
	var texto1 = $(this).val();

	$(slideOptions[indiceSlide]).children('.textsSlide').children("h1").html(texto1);

	$(guardarSlide[indiceSlide]).attr("title1Text", texto1);

})

$(".cambioColorText1").change(function(){

	var indiceSlide = $(this).attr("indice");
	var color1 = $(this).val();

	$(slideOptions[indiceSlide]).children('.textsSlide').children("h1").css({"color":color1});
	
	$(guardarSlide[indiceSlide]).attr("title1Color", color1);

})

// TEXTO Y COLOR 2

$(".cambioTituloText2").change(function(){

	var indiceSlide = $(this).attr("indice");
	var texto2 = $(this).val();

	$(slideOptions[indiceSlide]).children('.textsSlide').children("h2").html(texto2);

	$(guardarSlide[indiceSlide]).attr("title2Text", texto2);

})

$(".cambioColorText2").change(function(){

	var indiceSlide = $(this).attr("indice");
	var color2 = $(this).val();

	$(slideOptions[indiceSlide]).children('.textsSlide').children("h2").css({"color":color2});
	
	$(guardarSlide[indiceSlide]).attr("title2Color", color2);

})

// TEXTO Y COLOR 3

$(".cambioTituloText3").change(function(){

	var indiceSlide = $(this).attr("indice");
	var texto3 = $(this).val();

	$(slideOptions[indiceSlide]).children('.textsSlide').children("h3").html(texto3);

	$(guardarSlide[indiceSlide]).attr("title3Text", texto3);

})

$(".cambioColorText3").change(function(){

	var indiceSlide = $(this).attr("indice");
	var color3 = $(this).val();

	$(slideOptions[indiceSlide]).children('.textsSlide').children("h3").css({"color":color3});
	
	$(guardarSlide[indiceSlide]).attr("title3Color", color3);

})

/*=============================================
CAMBIAR POSICIÓN IMAGEN PRODUCT SLIDE
=============================================*/

for(var i = 0; i < slideOptions.length; i++){

	// VERTICAL

	var posVertical = new Slider('.posVertical'+i, {
		
		formatter: function(value) {

			$(".posVertical").change(function(){

				var indiceSlide = $(this).attr("indice");	

				$(slideOptions[indiceSlide]).children('img').css({"top":value+"%"});

				$(guardarSlide[indiceSlide]).attr("styleImgProductTop", value);

			})

			return value;	
			
					
		}

	})

	// HORIZONTAL

	var posHorizontal = new Slider('.posHorizontal'+i, {

		formatter: function(value) {

			$(".posHorizontal").change(function(){

				var typeSlide = $(this).attr("typeSlide");
				var indiceSlide = $(this).attr("indice");

				if(typeSlide == "slideOption1"){

					$(slideOptions[indiceSlide]).children('img').css({"right":value+"%"});

					$(guardarSlide[indiceSlide]).attr("styleImgProductRight", value);
					$(guardarSlide[indiceSlide]).attr("styleImgProductLeft", "");			

				}else{

					$(slideOptions[indiceSlide]).children('img').css({"left":value+"%"});

					$(guardarSlide[indiceSlide]).attr("styleImgProductLeft", value);
					$(guardarSlide[indiceSlide]).attr("styleImgProductRight", "");

				}

			})

			return value;	
			
		}

	})

	// ANCHO

	var anchoImagen = new Slider('.anchoImagen'+i, {

		formatter: function(value) {

			$(".anchoImagen").change(function(){

				var indiceSlide = $(this).attr("indice");
				
				$(slideOptions[indiceSlide]).children('img').css({"width":value+"%"});

				$(guardarSlide[indiceSlide]).attr("styleImgProductWidth", value);

			})

			return value;	
			
		}

	})

	/*=============================================
	CAMBIAR POSICIÓN TEXTO
	=============================================*/

	// VERTICAL

	var posVerticalTexto = new Slider('.posVerticalText'+i, {
		
		formatter: function(value) {

			$(".posVerticalText").change(function(){

				var indiceSlide = $(this).attr("indice");	

				$(slideOptions[indiceSlide]).children('.textsSlide').css({"top":value+"%"});

				$(guardarSlide[indiceSlide]).attr("styleTextSlideTop", value);

			})
			
			return value;	
								
		}

	})

	// HORIZONTAL

	var posHorizontalTexto = new Slider('.posHorizontalText'+i, {

		formatter: function(value) {

			$(".posHorizontalText").change(function(){

				var typeSlide = $(this).attr("typeSlide");
				var indiceSlide = $(this).attr("indice");

				if(typeSlide == "slideOption1"){

					$(slideOptions[indiceSlide]).children('.textsSlide').css({"left":value+"%"});

					$(guardarSlide[indiceSlide]).attr("styleTextSlideLeft", value);
					$(guardarSlide[indiceSlide]).attr("styleTextSlideRight", "");			

				}else{

					$(slideOptions[indiceSlide]).children('.textsSlide').css({"right":value+"%"});

					$(guardarSlide[indiceSlide]).attr("styleTextSlideRight", value);
					$(guardarSlide[indiceSlide]).attr("styleTextSlideLeft", "");

				}

			})

			return value;	
			
		}

	})

	// ANCHO

	var anchoImagenTexto = new Slider('.anchoText'+i, {

		formatter: function(value) {

			$(".anchoText").change(function(){

				var indiceSlide = $(this).attr("indice");
				
				$(slideOptions[indiceSlide]).children('.textsSlide').css({"width":value+"%"});

				$(guardarSlide[indiceSlide]).attr("styleTextSlideWidth", value);

			})

			return value;	
			
		}

	})

}

/*=============================================
CAMBIO DE BOTÓN
=============================================*/

$(".buttonSlide").change(function(){

	var textoBoton = $(this).val();
	var indiceSlide = $(this).attr("indice");

	$(slideOptions[indiceSlide]).children('.textsSlide').children("a").children("button").remove();

	$(slideOptions[indiceSlide]).children('.textsSlide').append('<a href="">'+

				                            					  '<button class="btn btn-default backColor text-uppercase">'+

				                         						  textoBoton+'<span class="fa fa-chevron-right"></span>'+

			                            						  '</button>'+

			                          							  '</a>');

	$(guardarSlide[indiceSlide]).attr("button", textoBoton);	

})

/*=============================================
CAMBIO DE URL BOTÓN
=============================================*/

$(".urlSlide").change(function(){

	var urlBoton = $(this).val();
	var indiceSlide = $(this).attr("indice");
	var botonSlide = $(".buttonSlide");

	if($(botonSlide[indiceSlide]).val() == ""){

		$(".urlSlide").val("");

		 swal({
	      title: "Error al poner la URL",
	      text: "¡Debe escribir primero el texto del botón!",
	      type: "error",
	      confirmButtonText: "¡Cerrar!"
	    });		

	}else{	

		$(slideOptions[indiceSlide]).children('.textsSlide').children("a").attr("href", urlBoton);
	
		$(guardarSlide[indiceSlide]).attr("url", urlBoton);	
	}

})

/*=============================================
GUARDAR SLIDE
=============================================*/

$(".guardarSlide").click(function(){

	
	var id = $(this).attr("id");
	var indiceSlide = $(this).attr("indice");
	var nombre = $(this).attr("nameSlide");
	var typeSlide = $(this).attr("typeSlide");

	var styleImgProductTop = $(this).attr("styleImgProductTop");
    var styleImgProductRight = $(this).attr("styleImgProductRight"); 
    var styleImgProductLeft = $(this).attr("styleImgProductLeft");
    var styleImgProductWidth = $(this).attr("styleImgProductWidth"); 


    var styleImgProduct = {"top": styleImgProductTop,
							"right": styleImgProductRight,
							"left": styleImgProductLeft,
							"width": styleImgProductWidth};

	var styleTextSlideTop = $(this).attr("styleTextSlideTop");
    var styleTextSlideRight = $(this).attr("styleTextSlideRight");
    var styleTextSlideLeft = $(this).attr("styleTextSlideLeft");
    var styleTextSlideWidth = $(this).attr("styleTextSlideWidth");

    var styleTextSlide = {"top": styleTextSlideTop,
						   "right": styleTextSlideRight,
						   "left": styleTextSlideLeft,
						   "width": styleTextSlideWidth};

	// CAPTURAMOS EL CAMBIO DE FONDO

	var imgFondo = $(this).attr("imgBackground");

	if(imgFondo == ""){

		subirFondo = $(".subirFondo");
		imgFondo = $(this).attr("rutaImgBackground");

	}

	// CAPTURAMOS EL CAMBIO DE IMAGEN DEL PRODUCT

	var imgProduct = $(this).attr("imgProduct");

	if(imgProduct == ""){

		subirImgProduct = $(".uploadImgProduct");
		imgProduct = $(this).attr("rutaImgProduct");
		
	}

	// CAPTURAMOS EL TÍTULO 1

	var title1Texto = $(this).attr("title1Text");
    var title1Color = $(this).attr("title1Color");

    var title1 = {"text": title1Texto,
			       "color": title1Color};

   // CAPTURAMOS EL TÍTULO 2

	var title2Texto = $(this).attr("title2Text");
    var title2Color = $(this).attr("title2Color");

    var title2 = {"text": title2Texto,
			       "color": title2Color};

	// CAPTURAMOS EL TÍTULO 3

	var title3Texto = $(this).attr("title3Text");
    var title3Color = $(this).attr("title3Color");

    var title3 = {"text": title3Texto,
			       "color": title3Color};
	
	var boton = $(this).attr("button");
	var url = $(this).attr("url");

	/*=============================================
	AJAX
	=============================================*/

	var datos = new FormData();
	datos.append("id", id);
	datos.append("name", nombre);
	datos.append("typeSlide", typeSlide);
	datos.append("styleImgProduct", JSON.stringify(styleImgProduct));
	datos.append("styleTextSlide", JSON.stringify(styleTextSlide));

	// ENVIAMOS EL CAMBIO DE FONDO

	datos.append("imgBackground", imgFondo);

	if(subirFondo != null){

		datos.append("uploadBackground", subirFondo[indiceSlide].files[0]);

	}else{

		datos.append("uploadBackground", subirFondo);
	}

	// ENVIAMOS EL CAMBIO DE IMAGEN PRODUCT

	datos.append("imgProduct", imgProduct);

	if(subirImgProduct != null){
		
	
		datos.append("uploadImgProduct", subirImgProduct[indiceSlide].files[0]);

	}else{

		datos.append("uploadImgProduct", subirImgProduct);

	}

	// ENVIAMOS EL CAMBIO DE TÍTULO 1

	datos.append("title1", JSON.stringify(title1));

	// ENVIAMOS EL CAMBIO DE TÍTULO 2

	datos.append("title2", JSON.stringify(title2));

	// ENVIAMOS EL CAMBIO DE TÍTULO 3

	datos.append("title3", JSON.stringify(title3));

	datos.append("button", boton);
	datos.append("url", url);

	$.ajax({

		url:"ajax/slide.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function(response){

			
					
			if(response == "ok"){

				swal({
				  type: "success",
				  title: "El slide ha sido cambiado correctamente",
				  showConfirmButton: true,
				  confirmButtonText: "Cerrar"
				  }).then((result) => {
					if (result.value) {

					window.location = "slide";

					}
				})
			}

		}

	})

})

/*=============================================
ELIMINAR SLIDE
=============================================*/

$(".eliminarSlide").click(function(){

	var idSlide = $(this).attr("id");
	var imgFondo = $(this).attr("imgBackground");
	var imgProduct = $(this).attr("imgProduct");

	swal({

		title: '¿Está seguro de borrar el slide?',
		text: "¡Si no lo está puede cancelar la accíón!",
		type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar slide!'
        }).then((result) => {
        if (result.value) {

        	window.location = "index.php?route=slide&idSlide="+idSlide+"&imgBackground="+imgFondo+"&imgProduct="+imgProduct;

        }


	})


})
