

$("#calendar").fullCalendar({

    displayEventTime : false,
    selectable: true,
    unselectAuto: false, 
    monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],

    header:{
        right:""

    },

    dayClick: function (date, jsEvent, view) {

        var myDate = moment(new Date()).format('YYYY-MM-DD')
       
        var events = $('#calendar').fullCalendar('clientEvents');

        var isScheduled = false;

        if ((date.toDate().getDay() == 0 || date.toDate().getDay() == 1 || date.toDate().getDay() == 3 || date.toDate().getDay() == 5) && (date.format("YYYY-MM-DD") >= myDate)) {
            
            

            for (var i = 0; i < events.length; i++) {
           
                if (date.format("YYYY-MM-DD")==events[i].start.format("YYYY-MM-DD")) {
                    
                    //alert("La fecha seleccionada ya se encuentra agendada");  
                    isScheduled = true;  
                    $("#hour").hide();  
                    $("#booking").hide();
                    break;
                }
            }

            if(!isScheduled){
                document.getElementById("date").innerHTML = date.format("YYYY-MM-DD");
                switch(date.toDate().getDay()){
                    case 0: 
                    case 1: 
                    case 3: var hour = "19:30 PM";
                            break;
                    case 5: var hour = "09:00 AM";
                }

                $(".buttonPurchase #hour button small").text(hour);
                $("#hour").show();
                
            }
           
        }
        else if(date.format("YYYY-MM-DD") < myDate)
        {
            //alert("Fuera de la fecha actual");  
            $("#hour").hide();  
            $("#booking").hide();
        }
        else{
            //alert("Tu puedes agendar los dias Lunes, Martes, Jueves y Sabados");  
            $("#hour").hide(); 
            $("#booking").hide(); 
        } 
      
    },
    
    events:'../frontend/api/load.php',

    dayRender: function (date, cell) {

        var today = moment(new Date()).format('YYYY-MM-DD');
    
        if((date.format("YYYY-MM-DD") >= today) && (date.toDate().getDay() == 0  || date.toDate().getDay() == 1 || date.toDate().getDay() == 3 || date.toDate().getDay() == 5) ) {
            cell.css("background-color", "silver");
        }

    },

    

     

    

   

    
    
});

