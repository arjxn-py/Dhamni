<!-- The wireframe is used from cod with harry -->

<?php
$insert = false;
if(isset($_POST['name'])){
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
    $name = $_POST['name'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $groups = $_POST['blood_group'];
    $mobnum = $_POST['mobile'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $pin = $_POST['pincode'];
    $sql = "INSERT INTO `bank`.`recipient` (`name`, `age`, `sex` ,`blood_group`, `mobile`, `email`, `address`, `pincode`) VALUES ('$name', '$age', '$sex', '$groups', '$mobnum', '$email', '$address', '$pin')";
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
    <title>Welcome to Recipient Form</title>
    <link rel="stylesheet" href="style_recipient.css">
</head>
<body>
    <div class="container">
        <h1>Welcome to Recipient's Form</h3>
        <p>Enter your details to submit this form.</p>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for the US trip</p>";
        }
    ?>
        <form action="index_recipient.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your Name">
            <input type="text" name="age" id="age" placeholder="Enter your Age">
            <input type="text" name="sex" id="sex" placeholder="Enter your Sex">
            <input type="text" name="blood_group" id="blood_group" placeholder="Enter your Blood Group">
            <input type="phone" name="mobile" id="mobile" placeholder="Enter your phone">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="text" name="address" id="address" placeholder="Enter your Address">
            <input type="text" name="pincode" id="pincode" placeholder="Pin-code">
            <button class="btn">Submit</button> 
        </form>
    </div>
    <script src="index_recipient.js"></script>
    
</body>
</html>