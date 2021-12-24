// PAGINATION

var item=0;
var itemPagination=$("#pagination li");
var interruptCycle=false;
var imgProduct=$(".imgProduct");
var stopInterval=false;

$("#slide ul li").css({"width":100/$("#slide ul li").lenght+"%"})
$("#slide ul").css({"width":$("#slide ul li").lenght*100+"%"})



// INITIAL ANIMATION
$(imgProduct[item]).animate({"top":-10+"%", "opacity": 0}, 100)
$(imgProduct[item]).animate({"top":30+"px", "opacity": 1}, 600)

$("#pagination li").click(function(){
    item=$(this).attr("item")-1;
    
    movementSlide(item);

})

function advance(){
    if(item == $("#slide ul li").lenght-1){
        item =0;
    }
    else{
        item++;
    }
    interruptCycle=true;
    movementSlide(item);
}
// ARROW ADVANCE
$("#slide #advance").click(function(){
    advance();
})

// ARROW BACK
$("#slide #back").click(function(){
    if(item == 0){
        item=$("#slide ul li").lenght-1;
    }
    else{
        item--;
    }
    movementSlide(item);
})

// SLIDE
function movementSlide(item){

    $("#slide ul li").finish();

    $("#slide ul").animate({"left": item*-100+"%"}, 1000, "easeOutQuart");
    $("#pagination li").css({"opacity":.5})

    $(itemPagination[item]).css({"opacity":1})

    interruptCycle=true;
        
    $(imgProduct[item]).animate({"top":-10+"%", "opacity": 0}, 100)
    $(imgProduct[item]).animate({"top":30+"px", "opacity": 1}, 600)

}

// SET TIME 3S
setInterval(function(){

    if(interruptCycle){
        interruptCycle = false;
        stopInterval = false;
        $("#slide ul li").finish();
    }
    else{
        if(!stopInterval){
            advance();
        }
       
    }
   
},3000)

// SHOW ARROWS
$("#slide").mouseover(function(){
    $("#slide #back").css({"opacity":1})
    $("#slide #advance").css({"opacity":1})
    stopInterval=true;
})

// DISMISS ARROWS
$("#slide").mouseout(function(){
    $("#slide #back").css({"opacity":0})
    $("#slide #advance").css({"opacity":0})

    stopInterval=false;

})




