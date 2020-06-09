<?php
	//Config Location [please change]
	$configLocation = "./config.json";

	//Token Location [please change]
	$tokenLocation = "./../token.txt";

	//  Please do NOT change anything below this line
	//  UNLESS you know what you are doing.

	Include './functions/get.php';
	Include './functions/update.php';
	Include "./functions/ip.php";

	$cfg = json_decode($configLocation,true);


 /* Log users */
 	if()
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
		req_handle($cfg,$req);
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
