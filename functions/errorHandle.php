<?php
if (strpos("\\",__DIR__)) {
	$rootDir = str_replace("functions","",__DIR__);
	$funcDir = __DIR__."\\";
	$config = json_decode(file_get_contents($rootDir."config.json"));
	$dataLoc = $rootDir.$config->dataLoc."\\";
	$errorLoc = $dataLoc."errors.json";
} else {
	$rootDir = str_replace("functions","",__DIR__);
	$funcDir = __DIR__."/";
	$config = json_decode(file_get_contents($rootDir."config.json"));
	$dataLoc = $rootDir.$config->dataLoc."/";
	$errorLoc = $dataLoc."errors.json";
}
	Include __DIR__."/json.php";
function errorHandle($domain,$reason){
	$error = json_decode(file_get_contents($errorLoc));
	// Check if domain exists
	if (!is_valid_json($error->$domain)) {
		print_r(json_bute($error->developer->unknownDomain));
		return $error->developer->unknownDomain;
	}
	// Check of response exists
	if (!is_valid_json($error->$reason)) {
		print_r(json_bute($error->developer->unknownReason));
		return $error->developer->unknownReason;
	}

	print_r(json_bute($error->$domain));
	return $error->$domain->$reason;
}
 ?>
