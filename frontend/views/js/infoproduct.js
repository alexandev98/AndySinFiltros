$("#hour button").click(function(){
    $("#booking").show();
})

//HEIGHT COMMENTS
$(".comments").css({"height":$(".comments .heightComments").height()+"px",
                    "overflow":"hidden",
                    "margin-bottom":"20px"})


$("#showMore").click(function(e){

    e.preventDefault();
    
    if($("#showMore").html() == "Ver más"){

        $(".comments").css({"overflow":"inherit"});

        $("#showMore").html("Ver menos");

    }else{

        $(".comments").css({"height":$(".comments .heightComments").height()+"px",
                            "overflow":"hidden",
                            "margin-bottom":"20px"})

        $("#showMore").html("Ver más");


    }

})

