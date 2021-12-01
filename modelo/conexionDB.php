<?php

class ConexionBD{
	public static function cBD(){
		$servername = 'bufurlcqychhpp6jyg9f-mysql.services.clever-cloud.com';
		$database = 'bufurlcqychhpp6jyg9f';
		$username = 'ujrny0fewond7qdd';
		$password = '2WhBQFR5jB743T5U0g2e';

		
		$db = new PDO("mysql:host=bufurlcqychhpp6jyg9f-mysql.services.clever-cloud.com;dbname=bufurlcqychhpp6jyg9f", "ujrny0fewond7qdd" , "2WhBQFR5jB743T5U0g2e");
		return $db;
	}
}