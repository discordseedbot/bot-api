<?php
	//Config Location [please change]
	$configLocation = "./config.json";

	//Token Location [please change]
	$tokenLocation = "./../token.txt";

	//  Please do NOT change anything below this line
	//  UNLESS you know what you are doing.


			//Checks if ?req is in the URL bar after the file location
	$req = $_GET['req'];
	$data = $_GET['data'];
	$apiVersion = "1.2.3";
	$apiLicense = "GPL-3.0-or-later";

	include './functions/get.php';
	include './functions/update.php';

			//Checks what the user requested to our responses.

	if(!isset($_GET['token'])){
		if ($req === "connectionTest"){				echo "true";}
		elseif ($req === "userCount"){				getData($configLocation,$req);}
		elseif ($req === "channelCount"){			getData($configLocation,$req);}
		elseif ($req === "guildCount"){				getData($configLocation,$req);}
		elseif ($req === "botVersion"){				getData($configLocation,$req);}
		elseif ($req === "botBuild"){				getData($configLocation,$req);}
		elseif ($req === "botBuildDate"){			getData($configLocation,$req);}
		elseif ($req === "botBranch"){				getData($configLocation,$req);}
		elseif ($req === "botOwnerID"){				getData($configLocation,$req);}
		elseif ($req === "botLicense"){				getData($configLocation,$req);}
		elseif ($req === "packageName"){			getData($configLocation,$req);}
		elseif ($req === "packageDescription"){		getData($configLocation,$req);}
		elseif ($req === "isOnline"){				getData($configLocation,$req);}

			//API Requests
		elseif ($req === "apiLicense"){				getData($configLocation,$req);}
		elseif ($req === "packageAuthor"){			getData($configLocation,$req);}
		elseif ($req === "apiVersion"){				echo $apiVersion;}
		else{										echo file_get_contents('./error-400.html');}
	} else {
		$token = $_GET['token'];
		//Checks if token given is valid
		if (!strpos($token, file_get_contents($tokenLocation))){
			//Runs updateData from update.php
			updateData($configLocation, $req, $data);
		} else {
			echo "4xx Bad Token<br>You have sent an invalid token, either you bot is not configured properly or you are not authorized to do so.";
		}
	}

?>
