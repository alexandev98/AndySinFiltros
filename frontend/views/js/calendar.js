

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
                    
                    isScheduled = true;  
                    $("#schedule").hide();  
                    break;
                }
            }

            if(!isScheduled){
                $("#date").html(date.format("YYYY-MM-DD"));
                $("#btnCheckout").attr("date", date.format("YYYY-MM-DD"));
                //document.getElementById("date").innerHTML = date.format("YYYY-MM-DD");
                switch(date.toDate().getDay()){
                    case 0: 
                    case 1: 
                    case 3: 
                            var hourChicago = moment.tz("2022-01-17 19:30", "America/Chicago");
                            break;
                    case 5: 
                            var hourChicago = moment.tz("2022-01-17 09:30", "America/Chicago");
                }


                $("#schedule #hour strong").html(hourChicago.tz(Intl.DateTimeFormat().resolvedOptions().timeZone).format('HH:mm A'));
                $("#time-zone").html("Hora en "+Intl.DateTimeFormat().resolvedOptions().timeZone);
                $("#btnCheckout").attr("hour", hourChicago.tz(Intl.DateTimeFormat().resolvedOptions().timeZone).format('HH:mm A'));
                $("#schedule").show();
                 
               
                
            }
           
        }
        else if(date.format("YYYY-MM-DD") < myDate)
        {
           
            $("#schedule").hide();  
          
        }
        else{
           
            $("#schedule").hide(); 
            
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

