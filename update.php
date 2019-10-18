<?php
function updateData($configLocation, $thingToUpdate, $thingToUpdateContent) {
	$config = json_decode(file_get_contents($configLocation));

	$servername = $config->{"servername"};
	$username = $config->{"username"};
	$password = $config->{"password"};
	$dbname = $config->{"database"};

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
	$sql = "UPDATE data SET data='$thingToUpdateContent' WHERE type='$thingToUpdate'";

	if (mysqli_query($conn, $sql)) {
	    echo "Record updated successfully";
	} else {
	    echo "Error updating record: " . mysqli_error($conn);
	}
	mysqli_close($conn);
}
?>
