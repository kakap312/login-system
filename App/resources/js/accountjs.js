$(document).ready(function(){
    var isUsernameValid=false;
    var isPasswordValid = false;
    var accountrouteurl = "../../../route/account/accountroute.php";
    var requestMethod = "POST";
    
    $(".password-eye").click(function(){
        var typeValue = $('.password').attr('type') === 'password' ? 'text' : 'password';
        $('.password').attr('type',typeValue);
    });
    $("#registerlink").click(function(){
        $("#loginform").css("display","none");
        $("#registerForm").css("display","block");
    });
    $("#loginlink").click(function(){
        $("#loginform").css("display","block");
        $("#registerForm").css("display","none");
    });

    // validation call
    $("#username").change(function(){
        formData = new FormData();
        formData.append("action","username/validate");
        formData.append("username",$("#username").val());
        isUsernameValid = requestDataFromSever(accountrouteurl,requestMethod,formData);
        if(!isUsernameValid){
            $(".usernamemessage").html("Username must be 8 characters,contain at least a number and no space").css("color","orange").show()
        }else{
            $(".usernamemessage").hide()
        }
    });
    $('.password').change(function(){
        formData = new FormData();
        formData.append("action","password/validate");
        formData.append("password",$(".password").val());
        isPasswordValid = requestDataFromSever(accountrouteurl,requestMethod,formData);
        if(!isPasswordValid){
            $(".passwordmessage").html("Password must be between 1 and 8 characters").css("color","orange").show()
        }else{
            $(".passwordmessage").hide()
        }
    })
    $("#fullname").change(function(){
        formData = new FormData();
        formData.append("action","name/validate");
        formData.append("fullname",$("#fullname").val());
        var isFullNameValid = requestDataFromSever(accountrouteurl,requestMethod,formData);
        if(!isFullNameValid){
            $(".fullnamemessage").html("Full name must be between 1 and 20 characters,with no number and a space ( eg Emmanuel Agyeman)").css("color","orange").show()
        }else{
            $(".fullnamemessage").hide()
        }
    })

    // login , register call
    $("#loginform").submit(function(e){
        e.preventDefault();
        form  = $("#loginform")[0];
        formData = new FormData(form);
        formData.append("action","login");
        var loginResult = requestDataFromSever(accountrouteurl,requestMethod,formData);
        if(loginResult.errorCode == 10){
            window.location.replace("http://localhost/login-system/app/core/presentation/ui/Dashboard.php");
        }else{
            alert(getErrorMessages(loginResult.errorCode));
        }
        
    });//end of loginformsubmit

    $("#registerForm").submit(function(e){
        e.preventDefault();
        form  = $("#registerForm")[0];
        formData = new FormData(form);
        formData.append("action","register");
        var registerResult = requestDataFromSever(accountrouteurl,requestMethod,formData);
        alert(getErrorMessages(registerResult.errorCode));
    });//end of registerformsubmit


});
function requestDataFromSever(url,method,data){
    var requestData;
    $.ajax({
        url:url,
        type:method,
        data:data,
        processData:false,
        cache:false,
        async:false,
        contentType:false,
        dataType:"JSON",
        success:function(data){
            requestData = data;
        },
    });//end of ajax
    return requestData;
}
function getErrorMessages($code){
    var error = {
        "10":"You have Login successfully",
        "20":"Sorry! account cannot be found,check your account credentials and try again",
        "30": "Sorry! Username taken.Kindly change it and try again",
        "40":"Congrat Account created successfully",
        "50":"Error creating account!"
    }
    return error[$code];
}