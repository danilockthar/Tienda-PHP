<?php
header('content-type: application/json; charset=utf-8');
header("access-control-allow-origin: *");

header("Access-Control-Allow-Methods: POST, GET, OPTIONS");

	$dbServername = "localhost";
	$dbUsername = "Cangr3j0";
	$dbPassword = "36871326c";
	$dbName = "dani";

	$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);


define("KEY", "danilockthar");
define("COD", "AES-128-ECB");


define("MPID", "4076639315300282");
define ("MPSECRETID", "QYVVxIgIS4REUHjb2ow836aU2CV2s44V");
