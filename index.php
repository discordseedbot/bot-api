<?php

	$SeedBotInstallLocation = "/home/seedbot";


	//  Please do NOT change anything below this line
	//  UNLESS you know what you are doing.


			//Checks if ?req is in the URL bar after the file location
	$req = $_GET['req'];
	$apiVersion = "1.1";
			//Making stuff easy for my
		$installdir = $SeedBotInstallLocation;
		$statdir = $installdir."/modules/stats";

			//Getting contents of package.json AND parsing it.
	$packageJSON = json_decode(file_get_contents($installdir."/package.json"), true);

			//Debugging Stuff
		//var_dump($_GET);
		//var_dump($packageJSON);

			//Checks what the user requested to our responses.

	if ($req === "test"){					echo "<h1>It Works!</h1>";}
	elseif ($req === "userCount"){			echo file_get_contents($statdir."users.txt");}
	elseif ($req === "channelCount"){		echo file_get_contents($statdir."channels.txt");}
	elseif ($req === "guildCount"){			echo file_get_contents($statdir."guilds.txt");}
	elseif ($req === "botBranch"){			echo $packageJSON["branch"];}
	elseif ($req === "packageName"){		echo $packageJSON['name'];}
	elseif ($req === "botVersion"){			echo $packageJSON['version'];}
	elseif ($req === "botBuild"){			echo $packageJSON["build"];}
	elseif ($req === "botDescription"){		echo $packageJSON["description"];}
	elseif ($req === "botOwnerID"){			echo $packageJSON["ownerID"];}
	elseif ($req === "botEngines"){			echo $packageJSON["engines"];}
	elseif ($req === "packageScripts"){		echo $packageJSON['scripts'];}
	elseif ($req === "botDependencies"){	echo $packageJSON['dependencies'];}
	elseif ($req === "packageRepository"){	echo $packageJSON['repository'];}
	elseif ($req === "author"){				echo $packageJSON["author"];}
	elseif ($req === "botLicense"){			echo $packageJSON["license"];}
	elseif ($req === "botBugReportUrl"){	echo $packageJSON['bugs']['url'];}
	elseif ($req === "botHomepage"){		echo $packageJSON['homepage'];}
	elseif ($req === "apiVersion"){			echo $apiVersion;}
	else{									echo "400 Bad Request<br>Please look at the source code of the API to grasp a better understanding!<br>";}


?>
