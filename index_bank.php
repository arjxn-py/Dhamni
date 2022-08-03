<!-- The wireframe is used from cod with harry -->

<?php
$insert = false;
if(isset($_POST['bankname'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $name = $_POST['bankname'];
    $address = $_POST['address'];
    $pin = $_POST['pincode'];
    $groups = $_POST['groups'];
    $mobnum = $_POST['mobile'];
    $email = $_POST['email'];
    $sql = "INSERT INTO `bank`.`bank` (`bankname`, `address`, `pincode`, `groups`, `mobile`, `email`) VALUES ('$name', '$address', '$pin', '$groups', '$mobnum', '$email')";
    // echo $sql;

    // Execute the query
    if($con->query($sql) == true){
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Blood Bank Form</title>
    <link rel="stylesheet" href="style_bank.css">
</head>
<body>
    <div class="container">
        <h1>Welcome to Blood Bank Detail's Form</h3>
        <p>Enter your details to submit this form.</p>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for the US trip</p>";
        }
    ?>
        <form action="index_bank.php" method="post">
            <input type="text" name="bankname" id="bankname" placeholder="Enter your name">
            <input type="text" name="address" id="address" placeholder="Enter your Address">
            <input type="text" name="pincode" id="pincode" placeholder="Pin-code">
            <input type="text" name="groups" id="groups" placeholder="Enter the groups avialable">
            <input type="phone" name="mobile" id="mobile" placeholder="Enter your phone">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <button class="btn">Submit</button> 
        </form>
    </div>
    <script src="index_bank.js"></script>
    
</body>
</html>