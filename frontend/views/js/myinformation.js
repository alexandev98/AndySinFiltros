// CAROUSEL
$(".flexslider").flexslider({
    animation:"slide",
    controlNav:true,
    animationLoop:false,
    slideshow:false,
    itemWidth:100,
    itemMargin:5
});

$(".flexslider ul li img").click(function() {

    var value=$(this).attr("value");

    $(".myInformation figure.view img").hide();

    $("#info"+value).show();
    
})