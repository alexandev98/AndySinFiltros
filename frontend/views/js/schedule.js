/*=============================================
FECHAS RESERVA
=============================================*/

$.datetimepicker.setLocale('es');

$('.datepicker.entrada').datetimepicker({
   format:'Y-m-d H:i',
   minDate: 0,
   defaultTime:'08:00',
   //defaultTime:(new Date().getHours()+1)+":00",
   allowTimes:[
    '08:00',
    '09:00',
    '10:00',
    '11:00',
    '12:00',
    '13:00',
    '14:00',
    '15:00',
    '16:00',
    '17:00',
    '18:00',
   ],
   disabledWeekDays: [0, 2, 4, 5],
   closeOnDateSelect:false
});

$('.datepicker.entrada').change(function(){

  
  if($(this).val() != ""){

    var fechaEntrada = $(this).val().split(" ");
    
    var fechaEscogida = new Date($(this).val());

    $('.datepicker.salida').val(fechaEntrada[0] +" "+(fechaEscogida.getHours()+2)+":00");
  }
  
})

/*=============================================
CALENDARIO
=============================================*/

$('#calendar1').fullCalendar({
	header: {
    	left: 'prev',
    	center: 'title',
    	right: 'next'
  },
  events: [
    {
      start: '2019-03-12',
      end: '2019-03-15',
      rendering: 'background',
      color: '#847059'
    },
    {
      start: '2019-03-22',
      end: '2019-03-24',
      rendering: 'background',
      color: '#FFCC29'
    }  
  ]


});
