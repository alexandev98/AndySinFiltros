
//BOTON PAGAR

$(".btnPay").click(function(){

    var divisa = "USD";
    var total = $(".valueTotalBuy").html();
    var totalCrypt = localStorage.getItem("total");
    var tax = $(".valueTotalTax").html();
    var subtotal = $(".valueSubtotal").html();
    var title = $(".valueTitle").html();
    var quantity = $(".valueQuantity").html();
    var valueItem = $(".valueItem").html();
    var idProduct=$(".buyNow button").attr("idProduct");

    var fechaEscogida = $('.datetimepicker.entrada').val();
    var horaEscogida = $('.horaInicio').val();
    
    

    var data = new FormData();
    data.append("divisa", divisa);
    data.append("total", total);
    data.append("totalCrypt", totalCrypt);
    data.append("tax", tax);
    data.append("subtotal", subtotal);
    data.append("title", title);
    data.append("quantity", quantity);
    data.append("valueItem", valueItem);
    data.append("idProduct", idProduct);
    data.append("date", fechaEscogida);
    data.append("hour", horaEscogida);
    data.append("time_zone", Intl.DateTimeFormat().resolvedOptions().timeZone);

   

    $.ajax({
        url:routeHidden+"ajax/carrito.ajax.php",
        method:"POST",
        data:data,
        cache:false,
        contentType: false,
        processData: false,

        success:function(response){
    
            window.location = response;
        
        }
    })
   
    

})