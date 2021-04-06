<?php 
$host = "";
$user = "";
$password = "";
$database = "pistock";

$conn = new mysqli($host, $user, $password, $database);

$conn->connect_errno;

print $conn->error;

if (mysqli_connect_error()) {
	echo "Failed to connect to Database: $database" . mysqli_connect_error();
}

$site = "SELECT sitename FROM settings";
$getsite = mysqli_query($conn, $site);

if(! $getsite) {
	die('Could not fetch data: '.mysqli_error($conn));
}
while($row = mysqli_fetch_assoc($getsite)){
	$sitename = htmlspecialchars($row['sitename']);
}
?>
