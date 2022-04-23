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

$(".time_zone").append(" Hora de "+Intl.DateTimeFormat().resolvedOptions().timeZone);

var horas;

if($("input[name='idProduct']").html() != undefined){

var idProduct = $("input[name='idProduct']").val();
var data = new FormData();
data.append("idProduct", idProduct);



var routeHidden = $("#routeHidden").val();

$.ajax({
  url:routeHidden+"ajax/hours.ajax.php",
  method:"POST",
  data:data,
  cache:false,
  contentType: false,
  processData: false,
  dataType:"json",
  success:function(response){

    var daysDisable = [];
    var hoursAvailable = [];

    horas = JSON.parse(response);

    if(horas.Su.length == 0){
      daysDisable.push(0)
    }

    if(horas.Mo.length == 0){
       daysDisable.push(1)
    }

    if(horas.Tu.length == 0){
      daysDisable.push(2)
    }

    if(horas.We.length == 0){
      daysDisable.push(3)
    }

    if(horas.Th.length == 0){
      daysDisable.push(4)
    }

    if(horas.Fr.length == 0){
      daysDisable.push(5)
    }

    if(horas.Sa.length == 0){
      daysDisable.push(6)
    }

    /*=============================================
    FECHAS RESERVA
    =============================================*/
   
    $.datetimepicker.setLocale('es');

    $('.datetimepicker.entrada').datetimepicker({
      format:'Y-m-d',
      minDate: 0,
      dayOfWeekStart: 1,
      timepicker:false,
      disabledWeekDays: daysDisable,
      closeOnDateSelect:false,
      
    });

  }
})

}

$('.datetimepicker.entrada').change(function(){

  var today = new Date();
  var mes;
 
  if(today.getMonth()<9){
    mes = "0"+(today.getMonth()+1);
  }else{
    mes = today.getMonth()+1;
  }

  var date = today.getFullYear()+'-'+(mes)+'-'+today.getDate();

  if($(this).val() != "" && $(this).val() != date){

    var fechaEscogida = new Date($(this).val());
    var day = fechaEscogida.getDay();

    switch(day){
      case 0:
        var horaLocal = horas.Mo; break;
      case 1:
        var horaLocal = horas.Tu; break;
      case 2:
        var horaLocal = horas.We; break;
      case 3:
        var horaLocal = horas.Th; break;
      case 4:
        var horaLocal = horas.Fr; break;
      case 5:
        var horaLocal = horas.Sa; break;
      case 6:
        var horaLocal = horas.Su; break;
    }

    $(".horaInicio").html("");
    $(".seleccionHora").show();

    for(var i=0; i<horaLocal.length; i++){

      var horaActual = moment.utc("1998-07-02 "+horaLocal[i]).tz(Intl.DateTimeFormat().resolvedOptions().timeZone).format('HH:mm:ss');

      $(".horaInicio").append('<option value="'+horaActual+'">'+horaActual+'</option>');
    }

  }else{

    $(".seleccionHora").css({"display":"none"});
    $(this).val("");
  }
  
})


$(".disponibilidad").click(function() {

    var fechaEscogida = $('.datetimepicker.entrada').val();
    var horaEscogida = $('.horaInicio').val();

    if(fechaEscogida == "" || horaEscogida == null){

        swal({
            title: "Debe seleccionar Fecha y Hora",
            text: "",
            type: "warning",
            showCancelButton: false,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "¡Seleccionar!",
            closeOnConfirm: false
          })

    }else{

        var idProduct = $("input[name='idProduct']").val();

        var data = new FormData();
        data.append("idProduct", idProduct);
        data.append("date", fechaEscogida);
        data.append("hour", horaEscogida);
        data.append("time_zone", Intl.DateTimeFormat().resolvedOptions().timeZone);
        
        
        $.ajax({

            url:routeHidden+"ajax/booking.ajax.php",
            method: "POST",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            success:function(response){


                if(response == "ok"){
                    
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
                

                      $("#modalBuyNow").modal("show");

                }else{

                    swal({
                        title: "¡No disponible!",
                        text: "Lo sentimos, no hay disponibilidad para esa fecha y hora",
                        type: "warning",
                        showCancelButton: false,
                        confirmButtonColor: "#F8BB86",
                        confirmButtonText: "Volver a intentarlo",
                        closeOnConfirm: true
                      }) 

                }

            }
        
          })
        

    }

    


    
})

function sumTotalBuy(){

	var sumTotalTax = Number($(".valueSubtotal").html())+ 
	                  Number($(".valueTotalTax").html());


	$(".valueTotalBuy").html((sumTotalTax).toFixed(2));
	$(".valueTotalBuy").attr("value",(sumTotalTax).toFixed(2));

	localStorage.setItem("total",hex_md5($(".valueTotalBuy").html()));
}







