
//BUTTON FACEBOOK
$("#btnFacebookRegister").click(function(){

    FB.login(function(response){

        validateUser(); 
    }, {scope: 'public_profile, email'})
})

//VALIDATE USER
function validateUser(){

    FB.getLoginStatus(function(response){
        statusChangeCallback(response);
    })
}

function statusChangeCallback(response){

    if(response.status == 'connected'){

        textApi();

    }else{

        swal({
            title: "¡ERROR!",
            text: "¡Ocurrió un error al ingresar con Facebook, vuelve a intentarlo!",
            type: "error",
            confirmButtonText: "Cerrar",
            closeOnConfirm: false
            },
  
            function(isConfirm){
                 if (isConfirm) {    
                    window.location = localStorage.getItem("routeCurrent");
              } 
            });  

    }
}

function testApi(){

    FB.api('/me?fields=id,name,email,picture',function(response){

        if(response.email == "undefined"){
            swal({
                title: "¡ERROR!",
                text: "¡Para ingresar al sistema debe proporcionar la información de correo electrónico",
                type: "error",
                confirmButtonText: "Cerrar",
                closeOnConfirm: false
                },
      
                function(isConfirm){
                     if (isConfirm) {    
                        window.location = localStorage.getItem("routeCurrent");
                  } 
                });  
        }else{

            var email = response.email;
            console.log("email", email);
            var name = response.name;
            console.log("name", name);
            var photo = "http://graph.facebook.com/"+response.id+"/picture?type=large";
            console.log("photo", photo);

            var datos = new FormData();
            datos.append("email", email);
            datos.append("nombre", name);
            datos.append("photo",photo);

            $.ajax({



            })
        }
    })
}