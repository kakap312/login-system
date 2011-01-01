
import {requestDataFromSever,createFormData,showMessage,showOrHideSection} from '../../../core/presentation/resource/js/library.js';
var drugrouteurl = "../../../../route/drugs/DrugsRoute.php";
var requestMethod = "POST";
var drugs;
var drugId;

$(document).ready(function(){

    fetchDrugs();
    populateDrugGroups();
    populateDrugTypes();
    populateDrugLocations();

    $("#adddrugmenu").click(function(){
        showOrHideSection('.adddrugssection');
    })
     
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
    $("#viewdrugsmenu").click(function(){
        drugs.success?createDrugViewUi():alert(drugs.message);
    });

    $("#adddrugbtn").click(function(e){
        if(confirm("Are you sure you want to add Drugs")){
            var createDrugReuslt = requestDataFromSever(drugrouteurl,requestMethod,createFormData($("#createdrug")[0],['action'],["createdrug"]));
            createDrugReuslt.success?alert(createDrugReuslt.message):alert(createDrugReuslt.message);
        }
    });
    $(".updatedrugbtn").click(function(e){
        if(confirm("Are you sure you want to add Drugs")){
            var updateDrugRsult = requestDataFromSever(drugrouteurl,requestMethod,createFormData($("#updatedrug")[0],['action','drugId'],["updatedrug",drugId]));
            updateDrugRsult.success?alert(updateDrugRsult.message): alert(updateDrugRsult.message);
        }
    });
    $('#searchkey').change(function(){
        showOrHideSection('.fetchdrugsection');
        $('.datarow').remove();
        var searchedDrugs = requestDataFromSever(drugrouteurl,requestMethod,createFormData(null,['action','searchkey'],['searchdrugs',$('#searchkey').val()]));
        searchedDrugs.success?populateViewDrugsUi(searchedDrugs.data):alert(searchedDrugs.message);
       $('#searchkey').val("");
    }); 
}); // end of $(document).ready function

function populateDrugGroups(){
    var drugGroups = requestDataFromSever(drugrouteurl,requestMethod,createFormData(null,['action'],['druggroup'])).data;
    for (let index = 0; index < drugGroups.length; index++) {
        $('.druggroup').append('<option>'+drugGroups[index].name+'</option>'); 
    }
}

function populateDrugTypes(){
    var drugTypes = requestDataFromSever(drugrouteurl,requestMethod,createFormData(null,['action'],['drugtype'])).data
    for (let index = 0; index < drugTypes.length; index++) {
        $('.drugtype').append('<option value='+drugTypes[index].name +'> '+drugTypes[index].name+'</option>'); 
    }
}
function populateDrugLocations(){
    var drugLocations = requestDataFromSever(drugrouteurl,requestMethod,createFormData(null,['action'],['druglocation'])).data
    for (let index = 0; index < drugLocations.length; index++) {
        $('.druglocation').append('<option>'+drugLocations[index].name+'</option>'); 
    }
}
function populateViewDrugsUi(){
    fetchDrugs();
    if(drugs.data.length > 0){
    $('#totaldrugs').html(drugs.data.length);
    drugs.data.forEach(drug => {
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
    })
    $('.action').change(function(){
        if(($(this).val() == "Delete")){
            if(confirm("Are you sure you want to delete Drugs")){
                var deleteResult = requestDataFromSever(drugrouteurl,requestMethod,createFormData(null,['action','drugid'],['deletedrug',$(this).attr('id')]));
                deleteResult.success?createDrugViewUi():alert(deleteResult.message);
            }
        }else if(($(this).val() == "Update")){
            showOrHideSection('.renamedrugssection');
            var drug = requestDataFromSever(
                drugrouteurl,
                requestMethod,
                createFormData(null,['action','drug_id'],["searchdrug",$(this).attr('id')])
            );  
            drugId 
            populateUpdateForm(drug);
        }
    })
}else{
        alert("No drugs to dispplay");
}
}
function fetchDrugs(){
        drugs = requestDataFromSever(
        drugrouteurl,
        requestMethod,
        createFormData(null,['action'],["fetchdrugs"])
        );
}
function createDrugViewUi(){
    showOrHideSection('.fetchdrugsection');
    $('.datarow').remove();
    populateViewDrugsUi();
}

function populateUpdateForm(drug){
    $('.createdAt').val(drug.createdAt)
    $('.drugname').val(drug.name)
    $('.amount').val(drug.drugAmount)
    $('.weight').val(drug.drugWeight)
    $('.drugmanufacturer').val(drug.drugManufacturer)
    $('.drugmanufacturer').val(drug.drugManufacturer)
    $('.druggroup').val(drug.drugGroup)
    $('.druglocation').val(drug.drugLocation)
    if(drug.drugGroup.trim() == 'oral'){
        $('.adultdossage').val(drug.adultDossage)
        $('.childdossage').val(drug.childDossage)
    }else{
        $(".adultdossage").hide();
        $(".childdossage").hide();
    }
    $('.drugtype').val(drugViewModel.drugType)
    $('.expirydate').val(drugViewModel.expiryDate)
    $('.effect').val(drugViewModel.effect)
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

function populateDrugNamesSelect(){
    $('.drugoption').remove();
       for (let index = 0; index < drugs.data.length; index++) {
        $('.drugsnames').append('<option class="drugoption" id='+drugs.data[index].id+'>'+drugs.data[index].name+'</option>'); 
       }
}