<?php
    include('header.php');
    
    if(!empty($_GET)){
        $logout = $_GET['logout'];

        if($logout == 1){
            echo "<p class='message'>Successfully logged out!</p>";
        }
    }

  ?>  

<!DOCTYPE html>
<html>
<head>
    <title>Store</title>
    <link rel="stylesheet" type="text/css" href="css/form.css">
</head>
<body>
    <h1>Welcome to the homepage</h1>
</body>
</html>