

<?php

  //  require('session.php');
    require('config.php');
    
    include('header.php');


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Bilbo+Swash+Caps" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Kalam" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="css/form.css">
    <!-- This is how you link your external JS file to your HTML -->
    <script type="text/javascript" src="js/form.js"></script>
</head>
<body>
  
  <form name="myform" method="Post" onsubmit="return formSubmit();" action="process.php" >
    <label>Name</label>
    <input id="name" placeholder="First Last" type="text" name="name"><br/>

    <label>Email</label>
    <input id="email" placeholder="email@domain.com" type="email" name="email"><br/>

    <label>Phone</label>
    <input id="phone" placeholder="123-123-1234" type="phone" name="phone"><br/>

    <label>City</label>
    <input type="text" name="city" id="city"><br>

    <label>Address</label>
    <input id="address" type="text" name="address"><br>

    <label>Post Code</label>
    <input id="postcode" placeholder="X9X 9X9" type="postcode" name="postcode"><br/>
    
    <label>Province</label>
    <select name=province id=province>
        <option value="">----- Select -----</option>
        <option value="Ontario">Ontario</option>
        <option value="BC">British Columbia</option>
        <option value="Newfoundland">Newfoundland and Labrador</option>
        <option value="Quebec">Quebec</option>
        <option value="NS">Noca Scotia</option>
        <option value="Manitoba">Manitoba</option>
        <option value="Alberta">Alberta</option>
        <option value="NB">New Brunswick</option>
        <option value="Sask">Saskatchewan</option>
        <option value="PrinceEd">Prince Edward Island</option>
        <option value="NWT">Northwest Territorries</option>
        <option value="Nunavut">Nunavut</option>
        <option value="Yukon">Yukon</option>
    </select>
    <br>

    <label>Potato</label>
    <input id="potato" name="potato" type="text"><br>

    <label>Tomato</label>
    <input id="tomato" name="tomato" type="text"><br>
    
    <label>Onion</label>
    <input id="onion" name="onion" type="text"><br>

    <label>Delivery time</label>
    <select name=delivery id=delivery>
        <option value="1">Express delivery (1 day)</option>
        <option value="2">Accelerated delivery (2 days)</option>
        <option value="3">Standard delivery (3 days)</option>
        <option value="4">Economy delivery (4 days)</option>
    </select><br>

    <br/>

    <input type="submit" value="Submit">
    <p id="errors"></p>
  </form>  
  
  <div class="formData">
    
  </div>
</body>
</html>








