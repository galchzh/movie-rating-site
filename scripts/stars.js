
$('document').ready(function() {
  $('.toggleswitch').bootstrapToggle();
  var x=1;
  $("fieldset[id^='demo'] .stars").click(function() {
   // alert($(this).val());
    $(this).attr("checked");
	//$("div[id=result"+x+"").attr("value",$(this).val());
	 document.getElementById("result"+x+"").setAttribute('value',$(this).val());
	x=x+1;
  });
});
