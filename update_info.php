<?php
    session_start();
    $user = $_SESSION["username"];
    $first_name = filter_input(INPUT_POST, 'first_name');
    $last_name = filter_input(INPUT_POST, 'last_name');
    $address = filter_input(INPUT_POST, 'address');
    $city = filter_input(INPUT_POST, 'city');
    $zipcode = filter_input(INPUT_POST, 'zipcode');
    $telephone = filter_input(INPUT_POST, 'telephone');

    if(!empty($first_name) || 
    !empty($last_name) || 
    !empty($address) || 
    !empty($city) || 
    !empty($zipcode) || 
    !empty($telephone)){
  

        $host = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $dbname = "yeet_airlines";

        $conn = new mysqli ($host, $dbuser, $dbpass, $dbname);

        if(mysqli_connect_error()){
            die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
        }else{

            if(!empty($first_name)){
                $sql = "UPDATE customer SET first_name = '$first_name'
                WHERE username = '$user'";
                if($conn->query($sql)){
                    echo "Added";
                   // header('location: customer_home.php');
                }else{
                    echo "ERROR: ".$sql."<br>".$conn->error;
                }
            }

            if(!empty($last_name)){
                $sql = "UPDATE customer SET last_name = '$last_name'
                WHERE username = '$user'";
                if($conn->query($sql)){
                    echo "Added";
                   // header('location: customer_home.php');
                }else{
                    echo "ERROR: ".$sql."<br>".$conn->error;
                }
            }
            
            if(!empty($address)){
                $sql = "UPDATE customer SET address = '$address'
                WHERE username = '$user'";
                if($conn->query($sql)){
                    echo "Added";
                   // header('location: customer_home.php');
                }else{
                    echo "ERROR: ".$sql."<br>".$conn->error;
                }
            }

            if(!empty($city)){
                $sql = "UPDATE customer SET city = '$city'
                WHERE username = '$user'";
                if($conn->query($sql)){
                    echo "Added";
                   // header('location: customer_home.php');
                }else{
                    echo "ERROR: ".$sql."<br>".$conn->error;
                }
            }

            if(!empty($zipcode)){
                $sql = "UPDATE customer SET zipcode = '$zipcode'
                WHERE username = '$user'";
                if($conn->query($sql)){
                    echo "Added";
                   // header('location: customer_home.php');
                }else{
                    echo "ERROR: ".$sql."<br>".$conn->error;
                }
            }

            if(!empty($telephone)){
                $sql = "UPDATE customer SET telephone = '$telephone'
                WHERE username = '$user'";
                if($conn->query($sql)){
                    echo "Added";
                   // header('location: customer_home.php');
                }else{
                    echo "ERROR: ".$sql."<br>".$conn->error;
                }
            }
        
            header('location: customer_home.php');
            $conn->close();
        }


    }else{
        echo "Please fill a field to change.";
        die();
    }
?>