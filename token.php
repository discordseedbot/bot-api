<?php
function tokenValid($tokenGiven){
	if ($tokenGiven === file_get_contents('./../token.txt')){
		echo "Valid Token<br>";
		return true;
	} else {
		echo "403 Invalid Token<br>";
		return false;
	}
}