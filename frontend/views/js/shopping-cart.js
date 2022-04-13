$("#btnCheckout").click(function(){

    $(".listProduct table.tableProduct tbody").html("");

    var title=$(this).attr("title");
    var price=$(this).attr("price");
    var hour=$(this).attr("hour");
    var date=$(this).attr("date");
   
   
    $(".listProduct table.tableProduct tbody").append('<tr>'+
                                                            '<td class="valueTitle" >'+title+'</td>'+

                                                                    '<td>'+

                                                                        '<div class="form-group row">'+

                                                                            '<div class="col-xs-12" style="margin-left:-8px">'+

                                                                                '<li>'+
                                                                                    '<i style="margin-right:5px" class="fa fa-play-circle"></i> Acceso por Google Meet'+
                                                                                '</li>'+

                                                                                '<li>'+
                                                                                    '<i style="margin-right:5px" class="fa fa-clock-o"></i>'+hour+
                                                                                '</li>'+

                                                                                '<li>'+
                                                                                    '<i style="margin-right:5px" class="fa fa-calendar"></i>'+date+
                                                                                '</li>'+

                                                                            '</div>'+
                                                        
                                                                        '</div>'+
                                                                    
                                                                    '</td>'+

                                                            '<td>$<span class="valueItem">'+price+'</span></td>'+
                                                            
                                                       '<tr>');

    $(".valueSubtotal").html(price);
    $(".valueTotal").html(price);
    
})

//BOTON PAGAR

$(".btnPay").click(function(){

    var divisa = "USD";

    var cantidad = "1";

    var total = $(".valueTotal").html();
   
    var subtotal = $(".valueSubtotal").html();
    
    var title = $(".valueTitle").html();
    
    var idProduct=$(".buttonPurchase a").attr("idProduct");

    var data = new FormData();

    data.append("divisa",divisa);
    data.append("total", total);
    data.append("subtotal", subtotal);
    data.append("title", title);
    data.append("cantidad", cantidad);
    data.append("idProduct", idProduct);


    $.ajax({
        url:routeHidden+"ajax/carrito.ajax.php",
        method:"POST",
        data:data,
        cache:false,
        contentType: false,
        processData: false,

        success:function(response){
            console.log(response);
        
        }
    })
   
    

})