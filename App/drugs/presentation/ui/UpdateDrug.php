<div class = 'row renamedrugssection'>
        <div class='col-md-12' id='headerinfomation'>
            <center>
            <h1>Update  Drugs Form</h1>
            <p>Kindly fill in the form below to Update a drug to your store</p>
            </center>
        </div>
    <div class='col-md-12'>
        <div class= 'row'>
            <div class='col-md-3'>

            </div>

            <div class='col-md-6'>
            <form id='updatedrug'>
        <input class="form-control createdAt" type="date"  name="createdat" required>
            <p class='creatatmessage'></p>
            <input class="form-control drugname" type="text" name="drugname" placeholder="Drug Name" required>
            <p class='drugnamemessage'></p>
            <input class="form-control amount" type="number"  name="drugamount" placeholder="Drug Price" required>
            <p class='drugamountmessage'></p>
            <input class="form-control weight" type="text"  name="drugweight" placeholder="Drug Weight" required>
            <p class='drugamountmessage'></p>
            <input class="form-control drugmanufacturer" type="text" id='drugmanufacturer' name="drugmanufacturer" placeholder="Drug Manufacturer" required>
            <p class='drugamountmessage'></p>
            <input class="form-control effect" type="text"  name="effect" placeholder="Drug Effect" required>
            <p class='drugamountmessage'></p>
            <select class="form-control druglocation js-example-basic-single" name='druglocation'>
            </select> 
             <p class='usernamemessage'></p> 
            <select class="form-control druggroup js-example-basic-single" name='druggroup'>
            </select> 
             <p class='usernamemessage'></p> 
            <input class="form-control adultdossage" type="text" id='adultdossage' name="adultdossage" placeholder="Adult Dossage" required>
            <p class='usernamemessage'></p>
            <input class="form-control childdossage" type="text" id='childdossage' name="childdossage" placeholder="child Dossage" required>
            <p class='usernamemessage'></p>
        <select class="drugtype js-example-basic-single form-control" name='drugtype'>  
        </select>
        <p class='usernamemessage'></p>
        <input class="form-control expirydate" type="date" id='expirydate' name="expirydate" placeholder="Expiry Date" required><br>
        <div class="form-button">
        <button type='button'  class="ibtn updatedrugbtn">Add / Update</button>
        </div>
    </div>
    </form>    

            </div>

            <div class='col-md-3'>

            </div>
        </div>
        
    </div>