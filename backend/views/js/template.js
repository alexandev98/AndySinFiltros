/* iCheck */
$('input').iCheck({
    checkboxClass: 'icheckbox_square-blue',
    radioClass: 'iradio_square-blue',
    increaseArea: '20%' // optional
  });

/* jQueryKnob */
$('.knob').knob();

//Colorpicker
$('.my-colorpicker').colorpicker();

//Tags Input
$(".tagsInput").tagsinput({
  maxTags:10,
  confirmKeys: [44],
  cancelConfirmKeysOnEmpty: false,
  trimValue: false
})

$(".bootstrap-tagsinput").css({
  "width":"100%",
  "border-radius":"1px"
})