
<?php
$serverHost = "localhost";
$user = 'root';
//"u433014917_jooSql";
$password =''; 
//"Youssefysys3030";
$database = "brokers";

$connectNow = new mysqli($serverHost, $user, $password, $database);

if ($connectNow->connect_error) {
    die("Connection failed: " . $connectNow->connect_error);
}