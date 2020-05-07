<?php
	require('session.php');
	require('config.php');

	$id = -1;

    if(!empty($_GET)) {
        $id = $_GET['id'];
    }

    if ($id < 1) {
        header('location: index.php');
    }


	
	$sql = "DELETE FROM `orders` WHERE `orders`.`id` = $id";

	if($db->query($sql)){
		header('location: allorders.php?delete=1');
	}
	else{
		header('location: allorders.php?delete=0');
	}
