<?php

	require_once(__DIR__."/json.php");
	function errorHandle($domain,$reason){
		$rootDir = str_replace("functions","",__DIR__);
		$funcDir = __DIR__."/";
		$config = json_decode(file_get_contents($rootDir."config.json"));
		$dataLoc =$rootDir.$config->dataLoc."/";$dataLoc."errors.json"


		$error = json_decode(file_get_contents($dataLoc."errors.json"),true);
		// Check if domain exists
		if (!is_valid_json(json_encode($error[$domain]))) {
			echo str_replace("\\/","/",json_bute($error["developer"]["unknownDomain"]));
			return $error["developer"]["unknownDomain"];
		}
		// Check of response exists
		if (!is_valid_json(json_encode($error[$domain][$reason]))) {
			echo str_replace("\\/","/",json_bute($error["developer"]["unknownReason"]));
			return $error["developer"]["unknownReason"];
		}

		echo str_replace("\\/","/",json_encode($error[$domain][$reason]));
		return $error[$domain][$reason];
	}
 ?>
