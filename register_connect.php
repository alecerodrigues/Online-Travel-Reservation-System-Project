<?php

    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'pass');
    $first_name = filter_input(INPUT_POST, 'first_name');
    $last_name = filter_input(INPUT_POST, 'last_name');
    $address = filter_input(INPUT_POST, 'address');
    $city = filter_input(INPUT_POST, 'city');
    $zipcode = filter_input(INPUT_POST, 'zipcode');
    $telephone = filter_input(INPUT_POST, 'telephone');

    if(!empty($username) && 
    !empty($password) && 
    !empty($first_name) && 
    !empty($last_name) && 
    !empty($address) && 
    !empty($city) && 
    !empty($zipcode) && 
    !empty($telephone)){
  

        $host = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $dbname = "yeet_airlines";

        $conn = new mysqli ($host, $dbuser, $dbpass, $dbname);

        if(mysqli_connect_error()){
            die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
        }else{
            $sql = "INSERT INTO customer (username,password,first_name,last_name,address,city,zipcode,telephone) 
                values ('$username','$password','$first_name','$last_name','$address','$city','$zipcode','$telephone')";
            if($conn->query($sql)){
                echo "New Account Added";
            }else{
                echo "ERROR: ".$sql."<br>".$conn->error;
            }
            $conn->close();
        }


    }else{
        echo "Please fill all fields.";
        die();
    }
?>