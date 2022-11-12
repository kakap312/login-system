
var orderrouteurl = "../../../route/order/OrderRoute.php";
var orderlist;
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

function calculateOrderSubTotal(){
    var subTotal=0;
    for (let index = 0; index < orderlist.length; index++) {
        subTotal += orderlist[index].total; 
    }
    return subTotal;
}