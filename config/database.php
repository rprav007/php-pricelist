<?php
// used to connect to the database
$host = getenv("MYSQL_SERVICE_HOST");
$db_name = getenv("MYSQL_DATABASE");
$username = getenv("MYSQL_USER");
$password = getenv("MYSQL_PASSWORD");

// $db_port = getenv("MYSQL_SERVICE_PORT");
 
try {
    $con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
}
 
// show error
catch(PDOException $exception){
    echo "Connection error: " . $exception->getMessage();
}
?>