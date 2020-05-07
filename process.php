<?php

 	require('session.php');
    require('config.php');

	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$postcode = $_POST['postcode'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$province = $_POST['province'];
	$potato = $_POST['potato'];
	$tomato = $_POST['tomato'];
	$onion = $_POST['onion'];
	$delivery = $_POST['delivery'];


	$cost = 0;
	$shippingprice = 0;
	if ($name == '') {
		echo 'Name is required';
		
	}

	if ($email == '') {
		echo 'Email is required';
		die();
	}


	if ($phone == '') {
		echo 'Please enter a phone number';
		die();
	}

	if ($postcode == '') {
		echo 'Post code cannot be empty';
		die();
	}

	if ($address == '') {
		echo 'Address field cannot be empty';
		die();
	}

	if ($city == '') {
		echo 'Please specify your city';
		die();
	}

	if ($province == '') {
		echo 'Plese select your province';
		die();
	}

	if($potato < 0) {
            echo 'Product numbers cannot be negative';
            die();
        }
        
    if($tomato < 0) {
            echo 'Product numbers cannot be negative';
            die();
        }
        
    if($onion < 0) {
            echo 'Product numbers cannot be negative';
            die();
        }
 
    if ($delivery == 1) {
    	$shippingprice = 30;
    }
	
	if ($delivery == 2) {
    	$shippingprice = 25;
    }
	
	if ($delivery == 3) {
    	$shippingprice = 20;
    }
	
	if ($delivery == 4) {
    	$shippingprice = 15;
    }

    $tax = 0;
		switch ($province) {
			case 'Ontario':
				$tax = 1.13; 
				break;
			case 'BC':
				$tax = 1.12;
				break;
			case 'Alberta':
				$tax = 1.05;
				break;
			case 'Newfoundland':
				$tax = 1.15;
				break;
			case 'NB':
				$tax = 1.15;
				break;
			case 'Manitoba':
				$tax = 1.13;
				break;
			case 'NWT':
				$tax = 1.05;
				break;
			case 'NS':
				$tax = 1.15;
				break;
			case 'Nunavut':
				$tax = 1.05;
				break;
			case 'PrinceEd':
				$tax = 1.15;
				break;
			case 'Quebec':
				$tax = 1.14975;
				break;
			case 'Saskatchewan':
				$tax = 1.11;
				break;
			case 'Yukon':
				$tax = 1.05;
				break;
		}
	$taxtext = ($tax - 1.00) * 100;

	$numpotato = $potato * 5; 
	$numtomato = $tomato * 3;
	$numonion =  $onion * 4;

	$cost = $numpotato + $numtomato + $numonion;

	if ($cost == 0) {
    	echo 'Error: No item bought';
    	die();
    }

	$totalprice = $numpotato + $numtomato + $numonion + $shippingprice;
	$totalwithtax = $totalprice * $tax;
	$taxitself = $totalwithtax - $totalprice;


	echo '<table align=center style="border:2px solid black; text-align:center;"><td>';
	echo '<p style="font-family:verdana; font-size:26px; color:blue;">';
	echo "Name: $name<br>";
	echo "Email: $email<br>";
	echo "Phone: $phone<br>";
	echo "Delivery address: $address<br>$city, $province<br> $postcode<br>";
	echo "$potato of potato @ 5 CAD : $$numpotato<br>";
	echo "$tomato of tomato @ 3 CAD: $$numtomato<br>";
	echo "$onion of onion @ 4 CAD: $$numonion<br>";
	echo "Shipping charges: $$shippingprice<br>";
	echo "Sub total: $$totalprice<br>";
	echo "Tax @ $taxtext%: $$taxitself<br>";
	echo "Total: $$totalwithtax<br>";
	echo '</p>';
	echo '</td></table>';

	$sql = "INSERT INTO 
        orders
        (id, name, email, phone, city, address, postcode, province, potato, tomato, onion, delivery) 
        VALUES (NULL, '$name', '$email', '$phone', '$city', '$address', '$postcode', '$province', '$potato', '$tomato', '$onion', '$delivery');";


        

        if($db->query($sql)) {
            echo "Record created successfully!";
        }
        else {
            echo "Sorry, could not save in DB<br>";
            echo $db->error;
        }
?>