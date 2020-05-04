<!DOCTYPE html>
<html>
<?php
    session_start();
    $user = $_SESSION["username"];
    $host = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "yeet_airlines";

    $conn = new mysqli ($host, $dbuser, $dbpass, $dbname);

    if(mysqli_connect_error()){
        die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
    }else{

    }
?>

<head>
    <title> Admin Home Page </title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #98ff98;
        }
    </style>
</head>

<body>
    <h1>YEET Airlines Administrator View.</h1>
    <p>Welcome: </p>
    <?php
    echo $user;
    ?><br><br>
    
</body>

</html>