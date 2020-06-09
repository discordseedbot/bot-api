<?php
	function getData($configLocation, $dataToGet) {
		$config = json_decode(file_get_contents($configLocation),true);
		$servername = $config["db"]["server"];
		$username = $config["db"]["username"];
		$password = $config["db"]["password"];
		$dbname = $config["db"]["db"];

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}

		$sql = "SELECT type, content FROM data;";
/*
		mysql_select_db($dbname);
		$retval = mysql_query($sql,$conn);

		if (!$retval) {
			echo "Could not get data: " . mysql_error();
			die();
		}

		while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
			echo $row[$dataToGet];
			var_dump($row);
		}
*/

		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		    // output data of each row
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
