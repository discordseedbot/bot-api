<?php
function getData($configLocation, $dataToGet) {

	$config = json_decode(file_get_contents($configLocation));
	if ($cfg===NULL)
	$servername = $config->{"servername"};
	$username = $config->{"username"};
	$password = $config->{"password"};
	$dbname = $config->{"database"};

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT type, data FROM data";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        if($row['type'] == $dataToGet){
				echo $row['data'];
			}
	    }
	} else {
	    echo "0 results";
	}

	$conn->close();

}
?>
