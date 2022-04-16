$("#btnCheckout").click(function(){

    $(".listProduct table.tableProduct tbody").html("");

    var idUser = $(this).attr("idUser");
	var title = $(".buyNow .titleShopCart").html();
	var quantity = $(".buyNow .itemQuantity").val();
	var subtotal = $(".buyNow .subtotals span").html();

    /*=============================================
	SUMA SUBTOTAL
	=============================================*/

    var sumSubTotal = Number($(".sumSubTotal span").html()).toFixed(2);

	$(".valueSubtotal").html(sumSubTotal);
	$(".valueSubtotal").attr("value", sumSubTotal);

    /*=============================================
	TASAS DE IMPUESTO
	=============================================*/

    var taxTotal = ($(".valueSubtotal").html() * $("#taxRate").val()) /100;
	
	$(".valueTotalTax").html((taxTotal).toFixed(2));
	$(".valueTotalTax").attr("value",(taxTotal).toFixed(2));

    sumTotalBuy();

    /*=============================================
    MOSTRAR PRODUCTOS DEFINITIVOS A COMPRAR
    =============================================*/
   
    $(".listProduct table.tableProduct tbody").append('<tr>'+
                                                      '<td class="valueTitle" >'+title+'</td>'+
                                                      '<td class="valueQuantity" >'+quantity+'</td>'+
                                                      '<td>$<span class="valueItem" value="'+subtotal+'">'+subtotal+'</span></td>'+
                                                      '<tr>');

  
    
})

function sumTotalBuy(){

	var sumTotalTax = Number($(".valueSubtotal").html())+ 
	                  Number($(".valueTotalTax").html());


	$(".valueTotalBuy").html((sumTotalTax).toFixed(2));
	$(".valueTotalBuy").attr("value",(sumTotalTax).toFixed(2));

	//localStorage.setItem("total",hex_md5($(".valorTotalCompra").html()));
}


//BOTON PAGAR

$(".btnPay").click(function(){

    var divisa = "USD";
    var total = $(".valueTotalBuy").html();
    var tax = $(".valueTotalTax").html();
    var subtotal = $(".valueSubtotal").html();
    var title = $(".valueTitle").html();
    var quantity = $(".valueQuantity").html();
    var valueItem = $(".valueItem").html();
    var idProduct=$(".buyNow button").attr("idProduct");

    var data = new FormData();
    data.append("divisa", divisa);
    data.append("total", total);
    data.append("tax", tax);
    data.append("subtotal", subtotal);
    data.append("title", title);
    data.append("quantity", quantity);
    data.append("valueItem", valueItem);
    data.append("idProduct", idProduct);

   

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