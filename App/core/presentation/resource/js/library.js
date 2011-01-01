/* 
parameters - these are attribute sent to the functions on server.
values - these are values attached to parameters
existingFormData - is an already existing formData which needs an append
*/
function createFormData(existingFormData,parameters,values){
   let  createdFormData;
    if(existingFormData == null){
        createdFormData = new FormData();
        for (let index = 0; index < parameters.length; index++) {
            createdFormData.append(parameters[index],values[index]);
        }
        return createdFormData;
    }else{
        createdFormData = new FormData(existingFormData);
        for (let index = 0; index < parameters.length; index++) {
            createdFormData.append(parameters[index],values[index]);
        }
        return createdFormData;
    }
}
function showMessage(response,messageContainer){
    response.success? $(messageContainer).hide(): $(messageContainer).html(response.message).css("color","orange").show();
}
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