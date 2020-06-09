<?php
	Include __DIR__."/functions/get.php";
	require_once(__DIR__."/functions/json.php");
	require_once(__DIR__."/functions/errorHandle.php");
	function req_handle($cfg,$req) {
	    $reqArr = array("userCount",
	                    "channelCount",
	                    "guildCount",
	                    "botVersion",
	                    "botBuild",
	                    "botBuildDate",
	                    "botOwnerID",
	                    "botLicense",
	                    "packagename",
	                    "packagedescription",
	                    "packageAuthor",
						"lastAPIUpdate",
	                    "isOnline");
	    if (in_array($req,$reqArr)) {
	        getData($cfg,$req);
	    } else {
			$manifest = file_get_contents("./manifest.json");
	        switch ($req) {
	            case 'apiLicense':
					echo json_decode($manifest,true)["license"];
	                die();
	                break;
	            case 'apiVersion':
					echo json_decode($manifest,true)["version"];
	                die();
	                break;
	            case 'connectionTest':
	                echo "true";
	                die();
	                break;
	            default:
	                errorHandle("requestHandler","unknownRequest");
	                die();
	                break;
	        }
	    }


	}
 ?>
