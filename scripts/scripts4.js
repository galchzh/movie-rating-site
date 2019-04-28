$(document).ready(function(){ 




 $(".rating").on("click", function(){
        var $this = $(this); //  assign $(this) to $this
        var ratingValue = $this.val();  // use '.val()' as shown here
        alert(ratingValue);
    });
});


});