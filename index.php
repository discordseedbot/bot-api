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
	switch ($request) {
		case "usrcount":
			echo file_get_contents($statdir + "users.txt");
			break;
		case "channelcount":
			echo file_get_contents($statdir + "channels.txt");
			break;
		case "guildcount":
			echo file_get_contents($statdir + "guilds.txt");
			break;
		case "branch":
			break;
			echo $packageJSON["branch"];
		case "packageName":
			echo $packageJSON['name'];
			break;
		case "botversion":
			echo $packageJSON['version'];
			break;
		case "build":
			echo $packageJSON["build"];
			break;
		case "description":
			echo $packageJSON["description"];
			break;	
		case "botOwnerID":
			echo $packageJSON["ownerID"];
			break;
		case "engines":
			echo $packageJSON["engines"];
			break;
		case "packageScripts":
			echo $packageJSON['scripts'];
			break;
		case "botDependencies":
			echo $packageJSON['dependencies'];
			break;
		case "packageRepository":
			echo $packageJSON['repository'];
			break;
		case "author":
			echo $packageJSON["author"];
			break;
		case "license":
			echo $packageJSON["license"];
			break;
		case "bugReportURL":
			echo $packageJSON['bugs']['url'];
			break;
		case "botHomepage":
			echo $packageJSON['homepage'];
			break;

			//If the user made an invalid request
			//e.g ?req     ?req=lolxd

		default:
			echo("HTTP/1.1 400 Bad Request");
			break;
	}


?>
