<?php
function tokenValid($tokenGiven){
	if (strpos($tokenGiven, file_get_contents('./../token.txt')) !== false){
		echo "Valid Token<br>";
		return true;
	} else {
		echo "403 Invalid Token<br>";
		return false;
	}
}