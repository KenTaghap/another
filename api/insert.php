<?php
// Include MongoDB PHP library
require 'vendor/autoload.php';


// Set up MongoDB connection
$client = new MongoDB\Client('mongodb+srv://marjoriedeleon666:Reservation@cluster0.hq3leyp.mongodb.net/Reservation');
$database = $client->selectDatabase('Reservation');
$collection = $database->selectCollection('person');

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST["username"];
    $fullname = $_POST["fullname"];
	$email = $_POST["email"];
    $contact = $_POST["contact"];
	$password = $_POST["password"];

    // Check if username already exists
    $existingUser = $collection->findOne(['username' => $username]);
    if ($existingUser) {
        echo "Username already exists.";
    } else {
        // Insert new user into MongoDB
        $newUser = [
            'username' => $username,
            'fullname' => $fullname,
            'email' => $email,
            'contact' => $contact,
			'password' => $password,
            'slot' => 0,
            'floor' => 0,
            'car' => "none",
            'platenumber' => "none",
            'model' => "none",
            'carcolor' => "none",
            'date' => "none",
            'timein' => "none",
            'timeout' => "none",

        ];
        $collection->insertOne($newUser);
        echo "Registration successful!";
    }
}



?>
<div id="center_button"><button onclick="location.href='index.html'">Back to Home</button></div>
