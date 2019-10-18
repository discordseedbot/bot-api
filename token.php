<?php
function tokenValid($tokenGiven){
	switch ($tokenGiven) {
		case file_get_contents('./../token.txt'):
			echo "Valid Token<br>";
			return true;
			break;
		default:
			echo "403 Invalid Token";
			return false;
			break;
	}
}