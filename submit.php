<?php
// Get the form data
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Create a connection to the Azure MySQL database
$servername = "myeganserver.mysql.database.azure.com";
$username = "teresa";
$password = "TvaCae041r";
$database = "myegandatabase";

$con = mysqli_init();
mysqli_ssl_set($con, NULL, NULL, "{path to CA cert}", NULL, NULL);
mysqli_real_connect($con, $servername, $username, $password, $database, 3306, NULL, MYSQLI_CLIENT_SSL);

// Check the connection
if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
}

// Insert the form data into the database
$sql = "INSERT INTO form_data (name, email, message) VALUES ('$name', '$email', '$message')";

if ($con->query($sql) === TRUE) {
    echo "Data stored successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

// Close the database connection
$con->close();
?>
