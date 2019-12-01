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

	Include './functions/get.php';
	Include './functions/update.php';
	Include "./functions/ip.php";


 /* Log users */
    $writeDirectory = "/etc/darioxlog";
    $logFileName = "seedbot-api.csv";
    $logWriteDestination = $writeDirectory."/".$logFileName;
    $log = fopen($logWriteDestination, a);
    $writeToLogType;
    $writeToLogIP = $_SERVER['REMOTE_ADDR'];
    $writeToLogUserAgent = str_replace(",", " | ", $_SERVER['HTTP_USER_AGENT']);
    $writeToLogHostname = $_SERVER['REMOTE_HOST'];
    $writeToLogCountry = ip_info($_SERVER['REMOTE_ADDR'], "country");
    $writeToLogTime = date('l j \of F Y h;i:s A');
    $writeToLogReferer = $_SERVER['HTTP_REFERER'];





			//Checks what the user requested to our responses.
    $logType = "Invalid Request/Inproper Use.";
	if(!isset($_GET['token'])){
    	$logType = "Request";
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
			$tokenValid = true;
			updateData($configLocation, $req, $data);
			$logType = "Push";
		} else {
			echo "4xx Bad Token<br>You have sent an invalid token, either you bot is not configured properly or you are not authorized to do so.";
			$tokenValid = false;
			$logType = "Failed Push";
		}
	}

	$writeToLog = $writeToLogTime.",".$writeToLogIP.",".$writeToLogUserAgent.",".$writeToLogCountry.",".str_replace(",", " ", $req).",".$logType.",".$writeToLogReferer.",".$writeToLogHostname."\n";
	fwrite($log, $writeToLog);
    fclose($log);



?>
