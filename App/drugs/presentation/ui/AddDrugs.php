<div class = 'row adddrugssection'>
        <div class='col-md-12' id='headerinfomation'>
            <center>
            <h1>Create a new Drugs Form</h1>
            <p>Kindly fill in the form below to add a new drug to your store</p>
            </center>
        </div>
    <div class='col-md-12'>
        <div class='row'>
            <div class='col-md-3'>

            </div>
            <div class='col-md-6'>
            <form id='createdrug'>
        <input class="form-control" type="date" id='createdAt' name="createdat" required>
            <p class='creatatmessage'></p>
            <input class="form-control" type="text" id='drugname' name="drugname" placeholder="Drug Name" required>
            <p class='drugnamemessage'></p>
            <input class="form-control" type="number" id='amount' name="drugamount" placeholder="Drug Price" required>
            <p class='drugamountmessage'></p>
            <input class="form-control" type="text" id='weight' name="drugweight" placeholder="Drug Weight" required>
            <p class='drugamountmessage'></p>
            <input class="form-control" type="text" id='weight' name="drugmanufacturer" placeholder="Drug Manufacturer" required>
            <p class='drugamountmessage'></p>
            <input class="form-control" type="text" id='effect' name="effect" placeholder="Drug Effect" required>
            <p class='drugamountmessage'></p>
            <select class="druglocation js-example-basic-single form-control" name='druglocation'>
            </select> 
             <p class='usernamemessage'></p> 
            <select class="form-control druggroup js-example-basic-single" name='druggroup'>
            </select> 
             <p class='usernamemessage'></p> 
            <input class="form-control adultdossage" type="text" id='adultdossage' name="adultdossage" placeholder="Adult Dossage" required>
            <p class='usernamemessage'></p>
            <input class="form-control childdossage" type="text" id='childdossage' name="childdossage" placeholder="child Dossage" required>
            <p class='usernamemessage'></p>
        <select class="form-control drugtype js-example-basic-single" name='drugtype'>  
        </select>
        <p class='usernamemessage'></p>
        <input class="form-control" type="date" id='expirydate' name="expirydate" placeholder="Expiry Date" required><br>
        <div class="form-button">
        <button type='button' id="adddrugbtn"  class="ibtn">Add / Update</button>
        </div>
    </div>
    </form>   
                
            </div>
            <div class='col-md-3'>
                
            </div>
        </div>
         
    </div>