
//CAPTURE ROUTE
var routeCurrent = location.href;

$(".btnIngress, .facebook, .google").click(function(){
    localStorage.setItem("routeCurrent", routeCurrent);
})

$("input").focus(function(){
    $(".alert").remove();
})

//VALIDATE REPEATED EMAIL

var repeatedEmail = false;

var routeHidden = $("#routeHidden").val();

$("#regEmail").change(function(){

    var email = $("#regEmail").val();

    var datos = new FormData();
    datos.append("validateEmail", email);

    $.ajax({

        url:routeHidden+"ajax/users.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success:function(response){
            
            if(response == "false"){

                $(".alert").remove();
                repeatedEmail = false;
                
            }else{

                var mode = JSON.parse(response).mode;

                if(mode == "directo"){

					mode = "esta página";
				}

                $("#regEmail").parent().before('<div class="alert alert-warning"><strong>ERROR:</strong> El correo electrónico ya existe en la base de datos, fue registrado a través de '+mode+', por favor ingrese otro diferente.</div>')

					
                repeatedEmail = true;

            }
        }
    })
})

//VALIDAR EL REGISTRO DE USUARIO

function registerUser(){

    //VALIDAR EL NOMBRE
    var nombre = $("#regUser").val();

    if(nombre != ""){
        var expression = /^[a-zA-ZñNáéíóúÁÉÍÓÚ ]*$/;

        if(!expression.test(nombre)){
            $("#regUser").parent().before('<div class="alert alert-warning"><strong>ERROR:</strong> No se permiten números ni caracteres especiales</div>')
            return false;
        }
    }
    else{

        $("#regUser").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')
        return false;

    }

     //VALIDAR EL EMAIL
    var email = $("#regEmail").val();

    if(email != ""){
        var expression = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

        if(!expression.test(email)){
            $("#regEmail").parent().before('<div class="alert alert-warning"><strong>ERROR:</strong> Escriba correctamente el correo electrónico</div>')
            return false;
        }

        if(repeatedEmail){
            $("#regEmail").parent().before('<div class="alert alert-danger"><strong>ERROR:</strong> El correo electrónico ya existe en la base de datos, por favor ingrese otro diferente.</div>')
            return false;
        }
    }
    else{

        $("#regEmail").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')
        return false;

    }

    //VALIDAR LA CONTRASEÑA
    var password = $("#regPassword").val();

    if(password != ""){
        var expression = /^[a-zA-Z0-9]*$/;

        if(!expression.test(password)){
            $("#regPassword").parent().before('<div class="alert alert-warning"><strong>ERROR:</strong> No se permiten caracteres especiales</div>')
            return false;
        }
    }
    else{

        $("#regPassword").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')
        return false;

    }

    var policies = $("#regPolicies:checked").val();

    if(policies != "on"){
        $("#regPolicies").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Debe aceptar nuestras condiciones de uso y politicas de privacidad</div>')
        return false;
    }

    return true;
}

//CHANGE PHOTO
$("#btnChangePhoto").click(function(){

    $("#imgProfile").toggle();
    $("#uploadImage").toggle();

})

$("#dataImage").change(function(){

    var image = this.files[0];

    //VALIDATE IMAGE FORMAT

    if(image["type"] != "image/jpeg" && image["type"] != "image/png"){

        $("#dataImage").val("");

        swal({
            title: "¡Error al subir la imagen!",
            text: "¡La imagen debe estar en formato JPG o PNG!",
            type: "error",
            confirmButtonText: "Cerrar",
            closeOnConfirm: false
        },
        
        function(isConfirm){

            if(isConfirm){
                window.location = routeHidden+"perfil";
            }
        });
   
    }
    else if(Number(image["size"]) > 2000000){

        $("#dataImage").val("");

        swal({
            title: "¡Error al subir la imagen!",
            text: "¡La imagen no debe pesar mas de 2 MB!",
            type: "error",
            confirmButtonText: "Cerrar",
            closeOnConfirm: false
        },
        
        function(isConfirm){

            if(isConfirm){
                window.location = routeHidden+"perfil";
            }
        });
   
    }
    else{

        var dataImage = new FileReader;
        dataImage.readAsDataURL(image);

        $(dataImage).on("load", function(event){

            var routeImage = event.target.result;

            $(".prev").attr("src", routeImage);
        })

    }
})
