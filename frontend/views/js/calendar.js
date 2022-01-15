

$("#calendar").fullCalendar({

    dayClick: function (date, jsEvent, view) {
        
        alert("Dia seleccionado: "+date.format());
    },
    events:'../frontend/api/load.php'
        

});