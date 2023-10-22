<?php
require 'vendor/autoload.php';

error_reporting(E_ERROR | E_PARSE);

// Initialize variables
$error_message = "";
$success_message = "";

use MongoDB\Client;
// Replace with your MongoDB Atlas connection string
$connectionString = "mongodb+srv://marjoriedeleon666:Reservation@cluster0.hq3leyp.mongodb.net/Reservation";


try {
    $client = new Client($connectionString);
    $collection = $client->Reservation->person; // Replace with your database and collection names

    $username = $_POST['username'];

	$slot = $_POST['slot'];
    $floor = $_POST['floor'];
	$car = $_POST['car'];
	$platenumber = $_POST['platenumber'];
	$model = $_POST['model'];
	$carcolor = $_POST['carcolor'];
    $date = $_POST['date'];
   
  

    // Update user information in the database
    $filter = ['username' => $username];
    $updateData = ['$set' => ['slot' => $slot, 'floor' => $floor, 'car' => $car, 'platenumber' => $platenumber, 'model' => $model, 'carcolor' => $carcolor, 'date' => $date]];
    $result = $collection->updateOne($filter, $updateData);

    if ($result->getModifiedCount() > 0) {
        $success_message = "Reservation successful!";
    } else {
        $error_message = "Registration failed. Please try again.";
    }
} catch (MongoDB\Driver\Exception\Exception $e) {
    $error_message = "Error.";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Reservation</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<style>
      .error-label {
          color: red;
      }
      .success-label {
          color: green;
      }
  </style>
</head>

<body>
	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="booking-form">
						<div class="form-header">
							<h1>ONLINE PARKING MANAGEMENT SYSTEM</h1>
						</div>
						<form action="update.php" method="POST">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<span class="form-label">Username</span>
								<input class="form-control" type="tel" name="username" id="username" placeholder="Enter your Username" required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<span class="form-label">Date</span>
		`						<input class="form-control" type="date" name="date" id="date" required>
							</div>
						</div>
					</div>

							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<span class="form-label">Car</span>
										<input class="form-control" type="text" name="car" id="car" placeholder="Enter your Car name" required>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<span class="form-label">Plate</span>
										<input class="form-control" type="text" name="platenumber" id="platenumber" placeholder="Enter your Plate Number" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<span class="form-label">Model</span>
										<input class="form-control" type="text" name="model" id="model" placeholder="Enter your Car Model" required>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<span class="form-label">Color</span>
										<input class="form-control" type="text" name="carcolor" id="carcolor" placeholder="Enter your Car Color" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<p class="form-label">Select Floor</p>
										<select name="floor" id="floor" required>
										<option>Select Floor</option>
										<option value='1'>1</option>
										<option value='2'>2</option>
										<option value='3'>3</option>
										<option value='4'>4</option>
										</select>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<p class="form-label">Select Slot Number</p>
										<select name="slot" id="slot" required>
										<option>Select Floor</option>
										<option value='1'>1</option>
										<option value='2'>2</option>
										<option value='3'>3</option>
										<option value='4'>4</option>
										<option value='5'>5</option>
										<option value='6'>6</option>
										<option value='7'>7</option>
										<option value='8'>8</option>
										<option value='9'>9</option>
										<option value='10'>10</option>
										<option value='11'>11</option>
										<option value='12'>12</option>
										</select>
									</div>
								</div>
							</div>
							<div class="form-btn">
								<button class="submit-btn">Reserve Now</button>
							</div>
							<br><label id="error-label" class="error-label"><?php echo $error_message; ?></label>
        <label id="success-label" class="success-label"><?php echo $success_message; ?></label>
						</form>
						
						<br><br>
						<div class="form-btn">
						<button class="submit-btn"><a href="../home/reservation/index.html"> Back</a></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
