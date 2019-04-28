$(document).ready(function(){ 

var hasError = false; 
		$('#password, #retypepassword').on('keyup', function () 
			{
			if ($('#password').val() == $('#retypepassword').val()) {
				$('#message').html('Matching').css('color', 'green');
					hasError = false;
					} 
					else {
					$('#message').html('Not Matching').css('color', 'red');
					hasError = true;		
					}
					
			});
			
			
 $("#login").submit(function(){  
         $(".error").remove();  
		
	 $(".requiredField1").each(function(){  
            if(jQuery.trim($(this).val()) == '') { //remove spaces.  
                hasError = true;  
                $(this).parent().append('<span class="error" style="color:red">Please answer </span>');  
                console.log('the value of hasError is '+hasError);  
            }  
        });  
					
			if(!hasError){
			$(this).submit();
		}
		
		return false;
		}); 
	
    //remove the error on change also on elements loaded after.  
    $("#login").on("change",".requiredField1",function(){  
        $(this).siblings(".error").remove();  
    });
	
	
	$("#sign_up").submit(function(){  
         $(".error").remove();  
		
	 $(".requiredField").each(function(){  
            if(jQuery.trim($(this).val()) == '') { //remove spaces.  
                hasError = true;  
                $(this).parent().append('<span class="error" style="color:red">Please answer </span>');  
                console.log('the value of hasError is '+hasError);  
            }  
        });  
					
			if(!hasError){
			$(this).submit();
		}
		
		return false;
		}); 
	
    //remove the error on change also on elements loaded after.  
    $("#sign_up").on("change",".requiredField",function(){  
        $(this).siblings(".error").remove();  
    });
	
	
	
	
	$("#loginHE").submit(function(){  
         $(".error").remove();  
		
	 $(".requiredFieldHE1").each(function(){  
            if(jQuery.trim($(this).val()) == '') { //remove spaces.  
                hasError = true;  
                $(this).parent().append('<span class="error" style="color:red">שדה חובה</span>');  
                console.log('the value of hasError is '+hasError);  
            }  
        });  
					
			if(!hasError){
			$(this).submit();
		}
		
		return false;
		}); 
	
    //remove the error on change also on elements loaded after.  
    $("#loginHE").on("change",".requiredFieldHE1",function(){  
        $(this).siblings(".error").remove();  
    });
	
	
	$("#sign_upHE").submit(function(){  
         $(".error").remove();  
		
	 $(".requiredFieldHE").each(function(){  
            if(jQuery.trim($(this).val()) == '') { //remove spaces.  
                hasError = true;  
                $(this).parent().append('<span class="error" style="color:red">שדה חובה</span>');  
                console.log('the value of hasError is '+hasError);  
            }  
        });  
					
			if(!hasError){
			$(this).submit();
		}
		
		return false;
		}); 
	
    //remove the error on change also on elements loaded after.  
    $("#sign_upHE").on("change",".requiredFieldHE",function(){  
        $(this).siblings(".error").remove();  
    });
	
});

