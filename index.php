<?php
$insert = false;
if(isset($_POST['name'])){
$server = "localhost";
$username = "root";
$password = "";

$con = mysqli_connect($server, $username, $password);

if(!$con){
    die("Connection to this database failed due to ".mysqli_connect_error());
}
// echo"Success Connecting to the db";

$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$date = $_POST['date'];
$time = $_POST['time'];
$desc = $_POST['desc'];

$sql = "INSERT INTO `Travel_Site`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `date`, `time`, `other`, `dt`)
VALUES ('$name', '$age', '$gender', '$email', '$phone', '$date', '$time','$desc', current_timestamp());";

// echo $sql;

if ($con->query($sql) == true) {
    // echo "Successfully Inserted";
    $insert = true;
} else {
    echo "ERROR: $sql <br> $con->error";
}

$con->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Website</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <img class="bg" src="img.jpg" alt="Travel Places">
    <div class="container">
        <h1>Welcome to Traveller Registration Website</h1>
        <p>Enter your details and submit this form to confirm your booking in the trip</p>
        <?php
        if ($insert == true) {
            echo "<p class='submitMsg'>Thanks for submitting your form. Vist again for planning next trip !!</p>";
        }
        ?>

        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your Name">
            <input type="text" name="age" id="age" placeholder="Enter your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter your Gender">
            <input type="email" name="email" id="email" placeholder="Enter your Email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your Phone">
            <input type="text" name="date" id="date" placeholder="Enter the PickUp Date" onfocus="(this.type='date')">
            <input type="text" name="time" id="time" placeholder="Enter the PickUp Time" onfocus="(this.type='time')">
            <textarea name="desc" id="desc" cols="30" rows="10"
                placeholder="Enter PickUp point location information here..."></textarea>
            <button class="btn">Sumbit</button>
        </form>

    </div>
    <script src="index.js"></script>
</body>
</html>