$("#btnCheckout").click(function(){

    $(".listProduct table.tableProduct tbody").html("");

    var idProduct=$(this).attr("idProduct");
    console.log(idProduct);
    var title=$(this).attr("title");
    console.log(title);
    var price=$(this).attr("price");
    var hour=$(this).attr("hour");
    console.log(hour);
    var date=$(this).attr("date");
    console.log(date);
   
    $(".listProduct table.tableProduct tbody").append('<tr>'+
                                                       '<td>'+title+'</td>'+
                                                       '<td>'+
                                                            '<div class="form-group row">'+
                                                                '<div class="col-xs-12" style="margin-left:-18px">'+

                                                                    '<li>'+
                                                                        '<i style="margin-right:10px" class="fa fa-play-circle"></i> Acceso por Google Meet'+
                                                                    '</li>'+
                                                                    '<li>'+
                                                                        '<i style="margin-right:10px" class="fa fa-clock-o"></i>'+hour+
                                                                    '</li>'+
                                                                    '<li>'+
                                                                        '<i style="margin-right:10px" class="fa fa-calendar"></i>'+date+
                                                                    '</li>'+

                                                                '</div>'+
                                            
                                                            '</div>'+
                                                            
                                                            
                                                        '</td>'+

                                                       '<td>$<span>'+price+'</span></td>'+
                                                       '<tr>');

    $(".valueSubtotal").html(price);
    $(".valueTotal").html(price);
    

})