<?php
	$email = $_POST['email'];
	$password = $_POST['password'];
	$phoneNumber = $_POST['phoneNumber'];
    $address= $_POST['address'];

	// Database connection
	$conn = new mysqli('localhost','root','','automatednegotiationsystem');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(email, password, phoneNumber, address) values(?, ?, ?, ?)");
		$stmt->bind_param("ssis", $email, $password, $phoneNumber, $address);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>