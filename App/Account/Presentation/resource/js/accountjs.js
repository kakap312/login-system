
$(document).ready(function(){
    // load library.js file
    $.getScript('../../../../core/presentation/resource/js/library.js');

    var accountrouteurl = "../../../../route/account/AccountRoute.php";
    var requestMethod = "POST";
   
   
    $(".password-eye").click(function(){
        var typeValue = $('.password').attr('type') === 'password' ? 'text' : 'password';
        $('.password').attr('type',typeValue);
    });

    // validation call
    $("#username").change(function(){
        formData = createFormData(null,['action','username'],['username/validate',$("#username").val()]);
        response = requestDataFromSever(accountrouteurl,requestMethod,formData);
        showMessage(response,'.usernamemessage');
    });

    $('.password').change(function(){
        formData  = createFormData(null,['action','password'],['password/validate',$(".password").val()]);
        response = requestDataFromSever(accountrouteurl,requestMethod,formData);
        showMessage(response,'.passwordmessage');
    });

    // login , register call
    $("#loginform").submit(function(e){
        e.preventDefault();
        formData  = createFormData($("#loginform")[0],['action'],['login']);
        loginResult = requestDataFromSever(accountrouteurl,requestMethod,formData);
        if(loginResult.success){
            window.location.replace("http://localhost/login-system/app/core/presentation/resource/ui/Dashboard.php");
        }else{
            alert(getErrorMessages(loginResult.message));
        }  
    });//end of loginformsubmit
});
