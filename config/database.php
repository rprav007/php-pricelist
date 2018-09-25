<?php
// Define configfile path
$db_config_file = "/data/db.php";
//
if (file_exists($db_config_file)) {
	// include config file if we have found it
	require_once($db_config_file);
	$using_config_file = "yes";
} else {
	// If file isn't there, we'll assume you want env vars
	$host = getenv("MYSQL_SERVICE_HOST");
	$port = getenv("MYSQL_SERVICE_PORT");
	$db_name = getenv("MYSQL_DATABASE");
	$username = getenv("MYSQL_USER");
	$password = getenv("MYSQL_PASSWORD");
	$using_config_file = "no";
}

try {
	//$serverName = “$host, $port”;
	$serverName = $host;
        $connectionInfo = array(“Database”=>$db_name, “UID”=>$username, “PWD”=>$password);
        //$conn = sqlsrv_connect($serverName, $connectionInfo);

	//$con = new PDO("sqlsrv:host={$host};dbname={$db_name};port={$port}", $username, $password);
	$con = new PDO("sqlsrv_connect($serverName, $connectionInfo)");
}

// to handle connection error
catch(PDOException $exception){
	echo "Connection error: " . $exception->getMessage();
}
?>
