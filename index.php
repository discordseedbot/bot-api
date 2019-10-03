<?php

	$SeedBotInstallLocation = "/home/seedbot";


	//  Please do NOT change anything below this line
	//  UNLESS you know what you are doing.


			//Checks if ?req is in the URL bar after the file location
	if (isset($_GET[['req']])){$request = $GET_['req'];}else{header("HTTP/1.1 400 Bad Request");}
	
			//Making stuff easy for my
		$installdir = $SeedBotInstallLocation;
		$statdir = $installdir + "/modules/stats/";

			//Getting contents of package.json AND parsing it.
	$packageJSON = json_decode(file_get_contents($installdir."/package.json"), true);


			//Checks what the user requested to our responses.
	switch $request {
		case "usrcount":
			echo file_get_contents($statdir + "users.txt");
			break;
		case "channelcount":
			echo file_get_contents($statdir + "channels.txt");
			break;
		case "guildcount":
			echo file_get_contents($statdir + "guilds.txt");

		case "branch":
			echo $packageJSON["branch"];
		case "packageName":
			echo $packageJSON['name'];
		case "botversion":
			echo $packageJSON['version'];
		case "build":
			echo $packageJSON["build"];
		case "description":
			echo $packageJSON["description"];	
		case "botOwnerID":
			echo $packageJSON["ownerID"];
		case "engines":
			echo $packageJSON["engines"];
		case "packageScripts":
			echo $packageJSON['scripts'];
		case "botDependencies":
			echo $packageJSON['dependencies'];
		case "packageRepository":
			echo $packageJSON['repository'];
		case "author":
			echo $packageJSON["author"];
		case "license":
			echo $packageJSON["license"];
		case "bugReportURL":
			echo $packageJSON['bugs']['url'];
		case "botHomepage":
			echo $packageJSON['homepage'];

			//If the user made an invalid request
			//e.g ?req     ?req=lolxd

		default:
			header("HTTP/1.1 400 Bad Request");
	}


?>
