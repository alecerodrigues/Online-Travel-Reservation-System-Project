<?php
    session_start();

    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'pass');

    if(!empty($username) && 
    !empty($password)){

        $host = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $dbname = "yeet_airlines";

        $conn = new mysqli ($host, $dbuser, $dbpass, $dbname);

        if(mysqli_connect_error()){
            die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
        }else{

            $query = "SELECT * FROM customer WHERE username= '$username' AND password='$password'";
            $results = mysqli_query($conn, $query);
            if (mysqli_num_rows($results) == 1) { 
                $_SESSION["username"] = $username;
                header('location: customer_home.html');
            }else{
                echo "User not found, log in again.";
                die();
            }
        }
    }else{
        echo "Please fill all fields.";
        die();
    }
?>