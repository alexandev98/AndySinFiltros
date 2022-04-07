
//BUTTON FACEBOOK
$(".facebook").click(function(){

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

        testApi();

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

    FB.api('/me?fields=id,name,email,picture.width(150).height(150)',function(response){

        if(response.email == null){
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
            var name = response.name;
            var photo = response.picture.data.url;

            var datos = new FormData();
            datos.append("email", email);
            datos.append("name", name);
            datos.append("photo",photo);

            $.ajax({

                url:routeHidden+"ajax/users.ajax.php",
                method:"POST",
                data:datos,
                cache:false,
                contentType:false,
                processData:false,
                success:function(response){

                    if(response == "ok"){
                        window.location = localStorage.getItem("routeCurrent");
                    }
                    else{

                        swal({
                            title: "¡ERROR!",
                            text: "¡El correo electrónico"+email+" ya esta registrado con un método diferente a Facebook!",
                            type: "error",
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                            },
                  
                            function(isConfirm){

                                if (isConfirm){   

                                    window.location = localStorage.getItem("routeCurrent");

                                    FB.getLoginStatus(function(response){

                                        if(response.status === 'connected'){

                                            FB.logout(function(response){

                                                deleteCookie("fblo_338528568340291");

                                                setTimeout(function(){

                                                    window.location=routeHidden+"salir";
                                                },500)

                                            });

                                        }

                                            function deleteCookie(name){
                                                document.cookie = name + '=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
                                            }
                                        
                                    })
                                }
                                 
                            });  
                    }
                }




            })
        }
    })
}

//SALIR DE FACEBOOK

$(".salir").click(function(e){

    e.preventDefault();

    FB.getLoginStatus(function(response){

        if(response.status === 'connected'){

            FB.logout(function(response){

                deleteCookie("fblo_338528568340291");

                setTimeout(function(){

                    window.location=routeHidden+"salir";
                },500)

            });

        }

            function deleteCookie(name){
                document.cookie = name + '=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
            }
        
    })
})