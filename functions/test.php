<?php

	include './get.php';
	include './update.php';
	include './token.php';
		$token = "qT4sepbVSSH-V9ExrB7pJhK-bwEjHcp4F5gppP9FBVka7wFVHtWQuvQX";
		$req = "userCount";
		$data = "100";
		$configLocation = "../../config.json";
		//Checks if token given is valid
		if (tokenValid($token)){
			//Runs updateData from update.php
			updateData($configLocation, $req, $data);
		} else {
			echo "4xx Bad Token<br>You have sent an invalid token, either you bot is not configured properly or you are not authorized to do so.";
		}