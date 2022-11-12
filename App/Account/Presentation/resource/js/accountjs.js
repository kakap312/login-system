
import{requestDataFromSever,createFormData,showMessage} from '../../../../core/presentation/resource/js/library.js';
$(document).ready(function(){

    var accountrouteurl = "../../../../route/account/AccountRoute.php";
    var requestMethod = "POST";
   
   
    $(".password-eye").click(function(){
        var typeValue = $('.password').attr('type') === 'password' ? 'text' : 'password';
        $('.password').attr('type',typeValue);
    });

    // validation call
    $("#username").change(function(){
        var formData = createFormData(null,['action','username'],['username/validate',$("#username").val()]);
        var response = requestDataFromSever(accountrouteurl,requestMethod,formData);
        showMessage(response,'.usernamemessage');
    });

    $('.password').change(function(){
        var formData  = createFormData(null,['action','password'],['password/validate',$(".password").val()]);
        var response = requestDataFromSever(accountrouteurl,requestMethod,formData);
        showMessage(response,'.passwordmessage');
    });

    // login , register call
    $("#loginform").submit(function(e){
        e.preventDefault();
        var formData  = createFormData($("#loginform")[0],['action'],['login']);
        var loginResult = requestDataFromSever(accountrouteurl,requestMethod,formData);
        if(loginResult.success){
            window.location.replace("http://localhost/login-system/app/core/presentation/resource/ui/Dashboard.php");
        }else{
            alert(getErrorMessages(loginResult.message));
        }  
    });//end of loginformsubmit
});
