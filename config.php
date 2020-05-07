<?php
	
	$servername = "localhost";
    $username = "admin";
    $password = "";
    $dbname = "store";

    $db = new mysqli($servername, $username, $password, $dbname);

    if($db->connect_error){
        die("Connection failed: " . $db->connect_error);
    }

    $sql = "SELECT `id`, `name`, `email`, `phone`, `city`, `address`, `postcode`, `province`, `potato`, `tomato`, `onion`, `delivery` FROM orders";

    $result = $db -> query($sql);
