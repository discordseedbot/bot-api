<?php
	function getData($configLocation, $dataToGet) {
		$config = json_decode(file_get_contents($configLocation),true);
		$servername = $config["db"]["server"];
		$username = $config["db"]["username"];
		$password = $config["db"]["password"];
		$dbname = $config["db"]["dbname"];

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}

		$sql = "SELECT type, content FROM data;";

		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		    while($row = $result->fetch_assoc()) {
		        if($row['type'] == $dataToGet) {
					echo $row['content'];
				}
		    }
		} else {
		    echo "huh, thats weird. it should've worked but it didn't.";
		}

		$conn->close();
	}
?>
