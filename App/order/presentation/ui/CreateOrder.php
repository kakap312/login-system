<div class = 'row createordersession'>
        <div class='col-md-12' id='headerinfomation'>
            <center>
            <h1>Create  Order  Form</h1>
            <p>Kindly fill in the form below to create an order</p>
            </center>
        </div><br>
    <div class='row'>
    <div class='col-lg-4'>
        <form id='orderform'>
        <input class="form-control createdAt" type="date"  name="createdat" required>
            <p class='creatatmessage'></p>
            <select class="form-control js-example-basic-single drugsnames" name='Drugs'>
            </select> 
            <p class='creatatmessage'></p>
            <select class="form-control js-example-basic-single supplier" name='Supplier'>
                <option disable>Select a supplier </option>
            </select> 
            <p class='creatatmessage'></p>
            <input class="form-control quantity" type="number"  name="Quantity" placeholder="Quantity" required>
            <p class='drugamountmessage'></p>
            <input class="form-control quoteprice" type="number"  name="QuotePrice" placeholder="Quote Price" required>
            <p class='drugamountmessage'></p>
        <div class="form-button">
        <button type='button'  class="ibtn pushorder">Push Order</button>
        </div>
        </form>
    </div>
    <div class='col-lg-8'>
    <table class='table table-hover ordertable'>
            <thead>
            <tr>
                <th>S/N</th>
                <th>Drug Name</th>
                <th>Quanity</th>
                <th>Quote Price</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
            </thead>
        </table>
        <h5 class='subtotal'>SubTotal: GH¢ <span id='subtotal'></span></h5>
        <button  type='button' class='btn-primary createorder'>Create Order</button>

    </div>
</div>
        
    </div>
