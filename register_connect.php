<?php

    $email = filter_input(INPUT_POST, 'email');
    $pass = filter_input(INPUT_POST, 'password');

    if(!empty($email)){
        if(!empty($pass)){

            $host = "localhost";
            $dbuser = "root";
            $dbpass = "test";
            $dbname = "registration_test";

            $conn = new mysqli ($host, $dbuser, $dbpass, $dbname);

            if(mysqli_connect_error()){
                die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
            }else{
                $sql = "INSERT INTO test (email,pass) values ('$email, $pass)";
                if($conn->query($sql)){
                    echo "New Account Added";
                }else{
                    echo "ERROR: ".$sql."<br>".$conn->error;
                }
                $conn->close();
            }

        }else{
            echo "Password cannot be empty";
            die();
        }
    }else{
        echo "Email cannot be empty";
        die();
    }
?>