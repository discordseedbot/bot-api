<?php
	//Config Location [please change]
	$configLocation = "./config.json";

	//Token Location [please change]
	$tokenLocation = "./../token.txt";

	//  Please do NOT change anything below this line
	//  UNLESS you know what you are doing.

//Debugging Shit
if (ISSET($_GET['debug'])) {
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
}

	//Include './functions/get.php';
	require_once("./functions/update.php");
	require_once("./functions/ip.php");
	require_once(__DIR__."/functions/errorHandle.php");
	require_once('./req_handle.php');

			//Checks what the user requested to our responses.
	if(isset($_GET['token'])){
		$token = $_GET['token'];
		//Checks if token given is valid
		if (!strpos($token, file_get_contents($tokenLocation))){
			//Runs updateData from update.php
			updateData($configLocation, $_GET['req'], $_GET['data']);
			logwrite("Data Push");die();
		} else {
			$response = errorHandle("authentication","badToken");
			logwrite($response["message"]);die();
		}
	}
	if (ISSET($_GET['req'])) {
		req_handle($configLocation,$_GET['req']);
		logwrite("Request");die();
	} else {
		$response = errorHandle("requestHandler","unknownRequest");
		logwrite($response["message"]);die();
	}


	 /* Log users */
	 function logwrite($logType) {
	 	if(!isset($_GET['nolog'])){
		    $writeDirectory = "/etc/darioxlog";
		    $logFileName = "seedbot-api.csv";
			if ($logType === "Data Push") {
		    	$logFileName = "seedbot-api-datapush.csv";
			}
		    $logWriteDestination = $writeDirectory."/".$logFileName;
		    $log = fopen($logWriteDestination, 'a');
		    $writeToLogType;
		    $writeToLogIP = $_SERVER['REMOTE_ADDR'];
		    $writeToLogUserAgent = str_replace(",", " | ", $_SERVER['HTTP_USER_AGENT']);
		    $writeToLogHostname = $_SERVER["REMOTE_HOST"] ?: gethostbyaddr($_SERVER["REMOTE_ADDR"]);
		    $writeToLogCountry = ip_info($_SERVER['REMOTE_ADDR'], "country");
		    $writeToLogTime = date('l j \of F Y h;i:s A');
		    $writeToLogReferer = $_SERVER['HTTP_REFERER'];
			$writeToLog = $writeToLogTime.",".$writeToLogIP.",".$writeToLogUserAgent.",".$writeToLogCountry.",".str_replace(",", " ", $_GET['req']).",".$logType.",".$writeToLogReferer.",".$writeToLogHostname."\n";
			fwrite($log, $writeToLog);
		    fclose($log);
		}
	 }




?>
