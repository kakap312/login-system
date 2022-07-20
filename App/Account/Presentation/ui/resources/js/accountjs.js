$(document).ready(function(){
    $("#username").change(function(){
        formData = new FormData();
        formData.append("action","username/validate");
        formData.append("username",$("#username").val());
        var isUsernameValid = requestDataFromSever("../../../route/account/route.php","POST",formData);
        if(!isUsernameValid){
            $(".usernamemessage").html("Username must be 8 characters,contain at least a number and no space").css("color","orange").show()
        }else{
            $(".usernamemessage").hide()
        }
    });
    $('#password').change(function(){
        formData = new FormData();
        formData.append("action","password/validate");
        formData.append("password",$("#password").val());
        var isPasswordValid = requestDataFromSever("../../../route/account/route.php","POST",formData);
        if(!isPasswordValid){
            $(".passwordmessage").html("Username must be 8 characters").css("color","orange").show()
        }else{
            $(".passwordmessage").hide()
        }
    })

    $("#loginform").submit(function(e){
        e.preventDefault();
        form  = $("#loginform")[0];
        formData = new FormData(form);
        formData.append("action","login/validate");
        var loginResult = requestDataFromSever("../../../route/account/route.php","POST",formData);
            if(!loginResult.error){
                alert(loginResult.message);
            }else{
                alert("login in");
            }
    });//end of loginformsubmit

    $("#registerform").submit(function(e){
        e.preventDefault();
        form  = $("#registerform")[0];
        formData = new FormData(form);
        formData.append("action","login/validate");
        var loginResult = requestDataFromSever("../../../route/account/route.php","POST",formData);
            if(!loginResult.error){
                alert(loginResult.message);
            }else{
                alert("login in");
            }
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
        async:false,
        success:function(data){
            requestData = data;
        },
    });//end of ajax
    return requestData;
}