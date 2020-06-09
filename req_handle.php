<?php
	Include __DIR__."/functions/get.php";
	Include __DIR__."/functions/json.php";
	Include __DIR__."/functions/errorHandle.php";
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
	                    "isOnline");
						print_r(in_array($req,$reqArr));
	    if (in_array($req,$reqArr)) {
	        getData($cfg,$req);
	    } else {
	        switch ($req) {
	            case 'apiLicense':
					echo json_bute(file_get_contents("./manifest.json"));
	                die();
	                break;
	            case 'apiVersion':
					print_r(json_decode(file_get_contents(__DIR__."/manifest.json")->version));
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
