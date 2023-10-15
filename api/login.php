<?php
require 'vendor/autoload.php';

// Connect to MongoDB Atlas
$mongoClient = new MongoDB\Client("mongodb+srv://marjoriedeleon666:Reservation@cluster0.hq3leyp.mongodb.net/Reservation");

// Select the database and collection
$database = $mongoClient->Reservation;
$collection = $database->person;

$errorMsg = ""; // Initialize an error message variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Query for the user
    $query = ["username" => $username, "password" => $password];
    $user = $collection->findOne($query);

    if ($user) {
        // Successful login, set session variables or redirect to a protected area
        header("Location: home/index.html");
        
    } else {
        // Invalid login, display an error message
        echo "Invalid username or password";
    }
}
?>
