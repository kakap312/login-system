$(document).ready(function(){
    $("#loginform").submit(function(e){
        e.preventDefault();
        form  = $("#loginform")[0];
        formData = new FormData(form);
        var loginValidationResult = makeLoginValidationReguest(formData);
        
        if(loginValidationResult.isUsernameValid && loginValidationResult.isPasswordValid){
            var loginResult = makeLoginRequest(formData);
            if(!loginResult.error){
                alert(loginResult.message);
            }
        }else{
            if(!loginValidationResult.isUsernameValid){
                alert("Username Must be eight or more characters, Contain at least one Uppercase and number");
            }
            if(!loginValidationResult.isPasswordValid){
                alert("Password Must be  eight or more characters");
            }
        }
    });//end of submit

    function makeLoginValidationReguest(formData){
        var loginValidationResult;
        formData.append("action","login/validate");
        $.ajax({
        url:"../../../route/account/route.php",
        method:"POST",
        data:formData,
        processData:false,
        cache:false,
        async:false,
        contentType:false,
        success:function(data){
            loginValidationResult = $.parseJSON(data);
        },
    });//end of ajax
      return loginValidationResult;  
    }

    function makeLoginRequest(formData){
        var loginResult;
        formData.append("action","login");
        $.ajax({
        url:"../../../route/account/route.php",
        method:"POST",
        data:formData,
        processData:false,
        cache:false,
        async:false,
        contentType:false,
        success:function(data){
            loginResult = $.parseJSON(data);
        },
    });//end of ajax
      return loginResult; 
    }
});