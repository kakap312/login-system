var drugrouteurl = "../../../route/drugs/DrugsRoute.php";
var orderrouteurl = "../../../route/order/OrderRoute.php";
var requestMethod = "POST";
 var drugs;
 var drugId;
 var orderlist;

$(document).ready(function(){
    $('.js-example-basic-single').select2({width:'100%'});

    /* 
    Drugs feature
    */
    sections = ['.renamedrugssection','.fetchdrugsection','.adddrugssection','.createordersession']
    fetchDrugs();
    populateDrugGroups();
    populateDrugTypes();
    populateDrugLocations();
    // show or hide child / adult input fields
    $(".druggroup").change(function(){
        $(".adultdossage").val("");
        $(".childdossage").val("");
        if($(this).find(":selected").text().trim() == "oral"){
            $(".adultdossage").show();
            $(".childdossage").show();
        }else{
            $(".adultdossage").hide();
            $(".childdossage").hide();
        }
    })
    $("#adddrugs").click(function(){
        showOrHideSection('.adddrugssection',sections);
    })
    $("#viewdrugs").click(function(){
        //drugs = fetchDrugs();
        drugs.success?createDrugViewUi(drugs.data):alert(drugs.message);
    })
    $("#adddrugbtn").click(function(e){
        if(confirm("Are you sure you want to add Drugs")){
            var createDrugReuslt = requestDataFromSever(drugrouteurl,requestMethod,createFormData($("#createdrug")[0],['action'],["createdrug"]));
            createDrugReuslt.success?alert(createDrugReuslt.message):alert(createDrugReuslt.message);
            // fetch drug again
            fetchDrugs();
        }
        
    })
    $(".updatedrugbtn").click(function(e){
        if(confirm("Are you sure you want to add Drugs")){
            var updateDrugRsult = requestDataFromSever(drugrouteurl,requestMethod,createFormData($("#updatedrug")[0],['action','drugId'],["updatedrug",drugId]));
            updateDrugRsult.success?alert(updateDrugRsult.message): alert(updateDrugRsult.message);
        }
    })
    $('#searchkey').change(function(){
        showOrHideSection('.fetchdrugsection',sections);
        $('.datarow').remove();
        $(".seemorebtn").hide();
        var searchResult = requestDataFromSever(
            drugrouteurl,
            requestMethod,
            createFormData(null,['action','searchkey'],['searchdrugs',$('#searchkey').val()])
            );
            searchResult.success?populatedrugView(searchResult.data):alert(searchResult.message);
       $('#searchkey').val(""); // empties the seach input 
    }) 
    
    /* 
    Order Feature
    */
    orderlist = []; 
   $('#createorder').click(function(){
    populateDrugNamesSelect();
    orderlist = [];
    showOrHideSection('.createordersession',sections);
    populateOrderTable(orderlist);
   })
   $('.pushorder').click(function(){
        orderlist.push(
            {   
                name :$('.drugsnames').val(),
                id:getDrugId($('.drugsnames').val().trim()),
                quantity:$('.quantity').val(),
                quoteprice:$('.quoteprice').val(),
                total:$('.quantity').val() * $('.quoteprice').val()
            }
        );
        populateOrderTable(orderlist);
   })
   $('.createorder').click(function(){
    alert(requestDataFromSever(orderrouteurl,requestMethod,createFormData($('#orderform')[0],['action','data'],['createorder',JSON.stringify(orderlist)])))
   })
})
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
function populateDrugGroups(){
    drugGroups = requestDataFromSever(drugrouteurl,requestMethod,createFormData(null,['action'],['druggroup'])).data
    for (let index = 0; index < drugGroups.length; index++) {
        $('.druggroup').append('<option>'+drugGroups[index].name+'</option>'); 
    }
}
function populateDrugTypes(){
    
    drugGroups = requestDataFromSever(drugrouteurl,requestMethod,createFormData(null,['action'],['drugtype'])).data
    for (let index = 0; index < drugGroups.length; index++) {
        $('.drugtype').append('<option value='+drugGroups[index].name +'> '+drugGroups[index].name+'</option>'); 
    }

}
function populateDrugLocations(){
    drugLocations = requestDataFromSever(drugrouteurl,requestMethod,createFormData(null,['action'],['druglocation'])).data
    for (let index = 0; index < drugLocations.length; index++) {
        $('.druglocation').append('<option>'+drugLocations[index].name+'</option>'); 
    }
}
function populatedrugView(drugsData){
    drugsData.forEach(drug => {
        $('.drugviewtable').append(
            "<tr class='datarow'><td>"+drug.name+"</td><td>"+
            drug.drugLocation +"</td><td>"+
            drug.drugAmount +"</td><td>"+
            drug.drugType +"</td><td>"+
            drug.childDossage +"</td><td>"+
            drug.adultDossage + "</td><td>"+
            drug.effect+
            "</td><td><select class='action' id="+drug.id+"><option disabled selected>select an action</option><option>Delete</option><option>Update</option></select></td></tr>"
            )
    });
    $('.action').change(function(){
        if(($(this).val() == "Delete")){
            if(confirm("Are you sure you want to delete Drugs")){
                var deleteResult = requestDataFromSever(drugrouteurl,requestMethod,createFormData(null,['action','drugid'],['deletedrug',$(this).attr('id')]));
                if(deleteResult.success){
                    fetchDrugs();
                    createDrugViewUi(drugs.data);
                }else{
                    alert(deleteResult.message);
                }
            }
        }else if(($(this).val() == "Update")){
            showOrHideSection('.renamedrugssection',sections);
            var drug = requestDataFromSever(
                drugrouteurl,
                requestMethod,
                createFormData(null,['action','drug_id'],["searchdrug",$(this).attr('id')])
            );  
            drugId = drug.data.id;
            populateUpdateForm(drug.data);
        }
    })
}
function populateOrderTable(orders){
    $('.datarow').remove();
    for (let index = 0; index < orders.length; index++) {
        $('.ordertable').append(
            "<tr class='datarow'><td>"+(index+1)+"</td><td>"+
            orders[index].name +"</td><td>"+
            orders[index].quantity +"</td><td>"+
            orders[index].quoteprice +"</td><td>"+
            orders[index].total +"</td><td>"+
            "<button class='btn-primary deleteorder' id="+(index+1)+">Delete</td></tr>"
            )
    }
    $('#subtotal').html(calculateOrderSubTotal().toFixed(2));
    $('.deleteorder').click(function(){
        orderlist.splice(parseInt($(this).attr('id'))-1,1);
        populateOrderTable(orderlist);
   })
}
function createFormData(form,actions,values){
   let  formData;
    if(form == null){
        formData = new FormData();
        for (let index = 0; index < actions.length; index++) {
            formData.append(actions[index],values[index]);
        }
        return formData;
    }else{
        formData = new FormData(form);
        for (let index = 0; index < actions.length; index++) {
            formData.append(actions[index],values[index]);
        }
        return formData;
    }
}
function fetchDrugs(){
        drugs = requestDataFromSever(
        drugrouteurl,
        requestMethod,
        createFormData(null,['action'],["viewdrugs"])
        );

        //return drugs;
}
function createDrugViewUi(drugs){
    showOrHideSection('.fetchdrugsection',sections);
    $('.datarow').remove();
    $(".seemorebtn").show();
    populatedrugView(drugs);

    var totalDrugs = requestDataFromSever(
        drugrouteurl,
        requestMethod,
        createFormData(null,['action'],["totaldrugs"])
        );
        if(totalDrugs.success){
            $('#totaldrugs').html(totalDrugs.data)
        }else{
            $('#totaldrugs').html("0");
            alert(totalDrugs.message);
        }
    

}
function populateUpdateForm(drugViewModel){
    $('.createdAt').val(drugViewModel.createdAt)
    $('.drugname').val(drugViewModel.name)
    $('.amount').val(drugViewModel.drugAmount)
    $('.weight').val(drugViewModel.drugWeight)
    $('.drugmanufacturer').val(drugViewModel.drugManufacturer)
    $('.drugmanufacturer').val(drugViewModel.drugManufacturer)
    $('.druggroup').val(drugViewModel.drugGroup)
    $('.druglocation').val(drugViewModel.drugLocation)
    if(drugViewModel.drugGroup.trim() == 'oral'){
        $('.adultdossage').val(drugViewModel.adultDossage)
        $('.childdossage').val(drugViewModel.childDossage)
    }else{
        $(".adultdossage").hide();
        $(".childdossage").hide();
    }
    $('.drugtype').val(drugViewModel.drugType)
    $('.expirydate').val(drugViewModel.expiryDate)
    $('.effect').val(drugViewModel.effect)
}
function showOrHideSection(sectionname,sections){
    for (let index = 0; index < sections.length; index++) {
        if(sectionname == sections[index]){
            $(sections[index]).show()
        }else{
            $(sections[index]).hide()
        } 
    }
}
function populateDrugNamesSelect(){
    $('.drugoption').remove();
       for (let index = 0; index < drugs.data.length; index++) {
        $('.drugsnames').append('<option class="drugoption" id='+drugs.data[index].id+'>'+drugs.data[index].name+'</option>'); 
       }
    
    
}
function calculateOrderSubTotal(){
    var subTotal=0;
    for (let index = 0; index < orderlist.length; index++) {
        subTotal += orderlist[index].total; 
    }
    return subTotal;
}
function getDrugId(name){
    var drugid;
    for (let index = 0; index < drugs.data.length; index++) {
        if(drugs.data[index].name == name){
            drugid = drugs.data[index].id;
        }
    }
    return drugid;
}
