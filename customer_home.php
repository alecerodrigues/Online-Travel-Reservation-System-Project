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
        $query = "SELECT first_name, last_name, address, city, zipcode, telephone FROM customer WHERE username= '$user'";
        $results = mysqli_query($conn, $query);
        $row = mysqli_fetch_row($results);
        
        $first_name = $row[0];
        $last_name = $row[1];
        $address = $row[2];
        $city = $row[3];
        $zipcode = $row[4];
        $telephone = $row[5];
    }
?>

<head>
    <title> Customer Home Page </title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: lightgoldenrodyellow;
        }

        #userInfo {
            display: none;
        }

        #userEdit {
            display: none;
        }

        #reservations {

            display: none;
        }
    </style>
</head>

<body>
    <h1>Thank you for choosing YEET Airlines.</h1>
    <p>Welcome: </p>
    <?php
    echo $user;
    ?><br><br>
    <button onclick="show('userInfo')">Show User Information</button> <br></br>

    <div id='userInfo'>
        <ul style="list-style-type:square;">
            <li>First Name: <?php echo $first_name ?></li>
            <li>Last Name: <?php echo $last_name ?></li>
            <li>Street Address: <?php echo $address ?></li>
            <li>City: <?php echo $city ?></li>
            <li>Zipcode: <?php echo $zipcode ?></li>
            <li>Telephone: <?php echo $telephone ?></li>
        </ul>
        <button onclick="hide('userInfo')">Close User Information</button> 
        <button onclick="flip('userInfo', 'userEdit')">Edit User Information</button> <br>
    </div>

    <div id='userEdit'>
        First Name: <br><input type="text" name="first_name"> <br><br>
        Last Name: <br><input type="text" name="last_name"> <br><br>
        Street Address: <br><input type="text" name="address"> <br><br>
        City: <br><input type="text" name="city"> <br><br>
        Zipcode: <br><input type="number" name="zipcode"> <br><br>
        Telephone: <br><input type="text" name="telephone"> <br><br>
        <button>Submit</button>
        <!--needs functionality -->
        <button onclick="hide('userEdit')">Close Editing Menu</button> 
    </div>
    <br>

    <button onclick="show('reservations')">Show All Reservations</button>
    <button onclick="hide('reservations')">Close Reservations</button> <br></br>

    <div id='reservations'>
        Active Reservations and Itineraries:
        <br>
        Reservation History:
    </div>


    <div id='navigation'>
        <a href="index.html">Logout?</a>
        <br></br>
        <a href="reserve.html">Book a new flight.</a>
    </div>

    <script>
        function show(id) {
            document.getElementById(id).style.display = "block";
        }
        function flip(a, b) {
            document.getElementById(a).style.display = "none";
            document.getElementById(b).style.display = "block";
        }
        function hide(id) {
            document.getElementById(id).style.display = "none";
        }
    </script>
</body>

</html>