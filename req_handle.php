<?php


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
                    "isOnline",
                );

    if (in_array($req,$reqArr)) {
        getData($cfg,$req);
        die();
    } else {
        switch ($req) {
            case 'apiLicense':

                die();
                break;
            case 'apiVersion':

                die();
                break;
            case 'connectionTest':
                echo "true";
                die();
                break;
            default:
                echo file_get_contents('./error-400.html');
                header("HTTP/1.0 400 Bad Request");
                die();
                break;
        }
    }

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
    else{										echo }


}
 ?>
