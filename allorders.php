<?php

    require('session.php');
    require('config.php');
    
    include('header.php');

     if(!empty($_GET)){
            $delete = $_GET['delete'];

            if($delete == 1){
                echo "<p class='message'>Successfully deleted the order!</p>";
            }
            else{
                echo "<p class='message'>There was a problem deleting that order.</p>";
            }
        }

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
    <style type="text/css">
        table {
            border-collapse: collapse;
            border: 1px solid white;
            max-width: 600px;
            margin: 0 auto;
        }
        th, td {
            border: 1px solid white;
            padding: 5px;
            color: white;
        }
        
    </style>
</head>
<body>

    <?php 
        if ($result->num_rows > 0) {
           
    ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>City</th>
                    <th>Address</th>
                    <th>Post code</th>
                    <th>Province</th>
                    <th>Potato amt</th>
                    <th>Tomato amt</th>
                    <th>Onion amt</th>
                    <th>Delivery type</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    while($row = $result->fetch_assoc()) {
                      /*  echo '<pre>';
                        print_r($row);
                        echo '</pre>'; */
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['city']; ?></td>
                    <td>$<?php echo $row['address']; ?></td>
                    <td><?php echo $row['postcode']; ?></td>
                    <td><?php echo $row['province']; ?></td>
                    <td>$<?php echo $row['potato']; ?></td>
                    <td>$<?php echo $row['tomato']; ?></td>
                    <td><?php echo $row['onion']; ?></td>
                    <td><?php echo $row['delivery']; ?></td>
                    <td><a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a><br/></td>
                    
                </tr>
                <?php 
                    }
                ?>
            </tbody>
        </table>

    <?php 
        }
        else {
            echo "<p>No data to display</p>";
        }
    ?>

</body>
</html>










