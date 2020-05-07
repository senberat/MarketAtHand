<?php
    session_start();
    include('config.php');
    

    $error = '';

    if(isset($_SESSION['user_id'])){
        header('location: index.php');
    }

    if(!empty($_POST)){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "
                SELECT * FROM `user_login` 
                WHERE `username` = '$username' 
                AND `password` = '$password' 
               ";
        $result = $db->query($sql);
        
        if($result->num_rows == 1){
            $row = $result->fetch_assoc();
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['role'] = $row['role'];

            header('location: index.php');
        }       
        else{
            $error = 'Username or password not correct';
        }

    }

    include('header.php');

?>
  
  <form name="myform" method="post" action="login.php" >
    <label>Username</label>
    <input id="username" placeholder="username" type="text" name="username"><br/>

    <label>Password</label>
    <input id="password" placeholder="Password" type="password" name="password"><br/>

    <br/><br/>

    <input type="submit" value="Submit">
    <p id="errors"><?php echo $error; ?></p>
  </form>  
 
