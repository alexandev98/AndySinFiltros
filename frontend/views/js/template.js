// GRID OR LIST

var btnList = $(".btnList");

for(var i=0; i<btnList.length; i++){
        
    $("#btnGrid"+i).click(function(){

        var numero = $(this).attr("id").substr(-1);
        
        $(".list"+numero).hide();
        $(".grid"+numero).show();
        
    })

    $("#btnList"+i).click(function(){

        var numero = $(this).attr("id").substr(-1);
        
        $(".list"+numero).show();
        $(".grid"+numero).hide();
        
    })
}

$.scrollUp({

	scrollText:"",
	scrollSpeed: 2000,
	easingType: "easeOutQuint"

})

// BREADCRUMB
var pagActive = $(".pagActive").html();

if(pagActive != null){
    var regPagActive = pagActive.replace(/-/g, " ");
    $(".pagActive").html(regPagActive);
}


$( '#navbar .navbar-nav li' ).on( 'click', function () {

    
    

});


