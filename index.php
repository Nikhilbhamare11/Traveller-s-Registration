<?php
$insert = false;
if(isset($_POST['name'])){
$server = "localhost";
$username = "root";
$password = "";
$database = "travel_site";
$conn = mysqli_connect($server, $username, $password);

if(!$conn){
    die("Connection to this database failed due to ".mysqli_connect_error());
}
else{
    // echo"Success Connecting to the db";
}

// SQL query to create the database if it doesn't exist
$sql = "CREATE DATABASE IF NOT EXISTS `$database`";

// Execute the query to create the database
if (mysqli_query($conn, $sql)) {
    // echo "Database '$database' created successfully or already exists.<br>";

    // Select the database
    if (!mysqli_select_db($conn, $database)) {
        die("Error selecting database: " . mysqli_error($conn));
    }

}
else {
    echo "Error creating database: " . mysqli_error($conn);
}
// SQL query to create the 'trip' table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS `trip` (
    `sno` INT(8) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `age` INT(3) NOT NULL,
    `gender` VARCHAR(10) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `phone` INT(15) NOT NULL,
    `startingl` VARCHAR(255) NOT NULL,
    `dest` VARCHAR(255) NOT NULL,
    `date` DATE NOT NULL,
    `time` TIME NOT NULL,
    `desc1` TEXT NOT NULL,
    `desc2` TEXT NOT NULL,
    `dt` DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL )";

// Execute the query
if (mysqli_query($conn, $sql)) {
    // echo "Table 'threads' created successfully or already exists.<br>";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$from = $_POST['from'];
$to = $_POST['to'];
$date = $_POST['date'];
$time = $_POST['time'];
$desc = $_POST['desc'];
$desc1 = $_POST['desc1'];

$sql = "INSERT INTO `trip` (`name`, `age`, `gender`, `email`, `phone`, `startingl`, `dest`, `date`, `time`, `desc1`, `desc2`, `dt`)
VALUES ('$name', '$age', '$gender', '$email', '$phone', '$from', '$to', '$date', '$time', '$desc', '$desc1', current_timestamp())";

// echo $sql;

if ($conn->query($sql) == true) {
    // echo "Successfully Inserted";
    $insert = true;
} else {
    echo "ERROR: $sql <br> $conn->error";
}

$conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="app.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Travel Website</title>
</head>

<body>
    <div class="container mt-4">
        <h1>Welcome to Traveller Registration Website</h1>
        <p>Enter your details and submit this form to confirm your booking in the trip</p>
        <?php
        if ($insert == true) {
            echo '<div class="position-relative alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Your form is submitted.  Vist again for planning next trip !!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
        ?>
    </div>

    <div class="container py-2 my-4 text-center" id="cont">
        <form action="index.php" method="post">
            <h1 class="my4 py-2">Registration Form</h1>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your Name" required>
                <label for="floatingInput">Enter your Full Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="number" class="form-control" id="age" name="age" placeholder="Enter your Age">
                <label for="floatingInput">Enter your Age</label>
            </div>

            <div class="container-fluid border border-light-subtle rounded my-3 py-3 bg-white">
                <div class="row">
                    <div class="col-auto">
                        <label for="MyGender">Gender :</label>
                    </div>
                    <div class="col-auto">
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input border border-black" name="gender"
                                id="genderMale" value="Male">
                            <label class="form-check-label" for="genderMale">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input border border-black" name="gender"
                                id="genderFemale" value="Female">
                            <label class="form-check-label" for="genderFemale">Female</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input border border-black" name="gender"
                                id="genderOther" value="Other">
                            <label class="form-check-label" for="genderOther">Other</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your Email"
                    >
                <label for="floatingInput">Enter your Email</label>
            </div>
            <div class="form-floating mb-3">
                <input type="phone" class="form-control" id="phone" name="phone" placeholder="Enter your Phone"
                    required>
                <label for="floatingInput">Enter your Phone</label>
            </div>
            <div class="dropdowns">
                <div class="from mb-3">
                    <div class="form-floating">
                        <select class="form-select" id="floatingSelect" name="from" aria-label="Floating label select example" required>
                            <option selected>Select Your Starting Point Here</option>
                        </select>
                        <label for="floatingSelect">Enter your Starting Location</label>
                    </div>
                </div>
                <div class="to mb-3">
                    <div class="form-floating">
                        <select class="form-select" id="floatingSelect" name="to" aria-label="Floating label select example" required>
                            <option selected>Select Your Destination Point Here</option>
                        </select>
                        <label for="floatingSelect">Enter Your Destination Location</label>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="date" class="form-control" id="date" name="date"
                                placeholder="Enter the PickUp Date" required>
                            <label for="date">Enter the PickUp Date</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="time" class="form-control" id="time" name="time"
                                placeholder="Enter the PickUp Time" required>
                            <label for="time">Enter the PickUp Time</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-floating my-3">
                <textarea class="form-control" placeholder="Leave a PickUp point Location here" id="desc" name="desc"></textarea>
                <label for="floatingTextarea">Enter PickUp point location info here...</label>
            </div>
            <div class="form-floating my-3">
                <textarea class="form-control" placeholder="Leave a Dropping point Location here" id="desc1" name="desc1"></textarea>
                <label for="floatingTextarea">Enter Dropping point location info here...</label>
            </div>
            <button class="btn btn-success my-2" type="submit">Submit</button>
        </form>
    </div>

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
