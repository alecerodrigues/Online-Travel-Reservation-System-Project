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

            $queryC = "SELECT * FROM customer WHERE username= '$username' AND password='$password'";
            $queryM = "SELECT * FROM manager WHERE username= '$username' AND password='$password'";

            $resultsC = mysqli_query($conn, $queryC);
            $resultsM = mysqli_query($conn, $queryM);

            if (mysqli_num_rows($resultsC) == 1) { 
                $_SESSION["username"] = $username;
                header('location: customer_home.php');
            }else if(mysqli_num_rows($resultsM) == 1) { 
                $_SESSION["username"] = $username;
                header('location: admin_home.php');
            }
            else{
                echo "User not found, log in again.";
                die();
            }
        }
    }else{
        echo "Please fill all fields.";
        die();
    }
?>