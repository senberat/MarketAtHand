/*
    The function formSubmit() is called when the form "myform" is submitted.
    It runs some validations and shows the output.
*/
function formSubmit(){
    var myOutput = ''; // we will use this to store the output of the form
    var errors = ''; // we will use this to store any error messages.
    
    // Fetching the values of all the fields entered by the user.


    // Using getElementById for most of the fields as they have just one
    // input field unlike radio buttons which have multiple.
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var postcode = document.getElementById('postcode').value;
    var phone = document.getElementById('phone').value;
    var city = document.getElementById('city').value;
    var address = document.getElementById('address').value;
    var province = document.getElementById('province').value;
    var potato = document.getElementById('potato').value;
    var tomato = document.getElementById('tomato').value;
    var onion = document.getElementById('onion').value;

    potato = parseInt(potato);
    tomato = parseInt(tomato);
    onion = parseInt(onion);

    

    // Writing a regular expression to validate Post Code
    // Post code format example is N2E 1A6

    var postcoderegex = /^[A-Z][0-9][A-Z]\s[0-9][A-Z][0-9]$/;

    // Converting the postcode to uppercase before testing
    postcode = postcode.toUpperCase(); 

    // Testing if the postcode fits the pattern
    if(postcoderegex.test(postcode)){ // Returns true if postcode satisfies the pattern
        errors += ''; // No error in postcode
    }
    else{
        errors += 'Post code is not in correct format <br/>'; // Error found in postcode
    }

    // Writing a regular expression to validate Phone
    // Phone format example is 123-123-1234 or 123.123.1234
    // or (123)-(123)-(1234) or (123).(123).(1234) or 1231231234
    // or 123/123/1234 or (123)/123/1234
    // or (123).123.1234 or (123)-123-1234 and some more that satisfy the rules

    var phoneregex = /^\(?(\d{3})\)?[\.\-\/\s]?(\d{3})[\.\-\/\s]?(\d{4})$/;

    // Testing if the phone fits the pattern
    if(phoneregex.test(phone)){ // Returns true if phone satisfies the pattern
        errors += ''; // No error in phone
    }
    else{
        // Error found in phone; concatenating to the existing list of errors
        errors += 'Phone is not in correct format <br/>'; 
    }

    if (name == '') {
        errors += 'Name field cannot be empty <br>';
        document.getElementById('name').focus();
    }

    if (email == '') {
        errors += 'Email field cannot be empty <br>';
        document.getElementById('email').focus();

    }
   
    if (address == '') {
        errors += 'Address field cannot be empty <br>';
        document.getElementById('address').focus();
    }
   
    if (province == '') {
        errors += 'Please select a province <br>';
        document.getElementById('province').focus();
    }

    if (isNaN(onion) == true) {
        errors += 'Onion input is not a number <br>';
        document.getElementById('onion').focus();
    }

    if (isNaN(potato) == true) {
        errors += 'Potato input is not a number <br>';
        document.getElementById('potato').focus();
    }

    if (isNaN(tomato) == true) {
        errors += 'Tomato input is not a number <br>';
        document.getElementById('tomato').focus();
    }

    var solditems = 0;
    if (isNaN(potato) == false) {
        if(potato < 0) {
            errors += 'Potato amount cannot be negative<br>'
        }
        else 
        solditems += potato;
    }
    if (isNaN(tomato) == false) {
        if(tomato < 0) {
            errors += 'Tomato amount cannot be negative<br>'
        }
        else 
        solditems += tomato;
    }
    if (isNaN(onion) == false) {
        if(onion < 0) {
            errors += 'Onion amount cannot be negative<br>'
        }
        else 
        solditems += onion;
    }
    
   

    if (solditems == 0 || solditems < 0) {
        errors += 'You must purchase something <br>';
    } 
    else {
        errors += '';
    }

    // Comparing the errors string if any errors were found.
    if(errors.trim() != ''){ // trim is the function that trims any empty spaces from front or back
        // Showing the errors
        document.getElementById('errors').innerHTML = errors + '-- Please fix the above errors --';
        document.getElementById('errors').style.border = '2px dashed white';
    }
    else{
        // If no errors found

        var cost = 0; // setting a variable to store cost


        if(potato > 0) {
            cost += 5 * potato;
        }
        if(tomato > 0) {
            cost += 3 * tomato;
        }
        if(onion > 0) {
            cost += 4 * onion;
        }


        // Preparing the myOutput
        myOutput = `Name: ${name} <br>
                    Lunch: ${lunch}<br>
                    Campus: ${campus}<br>
                    Total Amount: $${cost}<br>
                    `;
        // removing any error messages
        document.getElementById('errors').innerHTML = '';
        document.getElementById('errors').style.border = '0px';
        // Showing the values put in by the user and the total cost
        document.getElementById('formResult').innerHTML = myOutput;
    }

    // Return false will stop the form from submitting and keep it on the current page.

    if(errors != '') {
    return false;
    }
    else{
        return true;
    }
}