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