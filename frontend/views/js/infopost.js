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

    $(".info-post figure.view img").hide();

    $("#photo-post"+value).show();
    
})

function myFunction(x) {

    if (x.matches) { // If media query matches
      $(".comentarioPost h4 span").before("<br>");
    }

}
  
var x = window.matchMedia("(max-width: 767px)")
myFunction(x) // Call listener function at run time
