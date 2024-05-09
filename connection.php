
<?php
$serverHost = "localhost";
$user = 'root';
//"u433014917_jooSql";
$password =''; 
//"Youssefysys3030";
$database = "brokers";



header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With, Access-Control-Allow-Origin");
header("Access-Control-Allow-Methods: POST, OPTIONS , GET");

 if($_SERVER['PHP_AUTH_USER'] != "realStateApp" ||  $_SERVER['PHP_AUTH_PW'] != "realStateApp2024"){
    header('WWW-Authenticate: Basic realm="My Realm"');
    header('HTTP/1.0 401 Unauthorized');
    echo "401 UNAUTHORIZED";
    exit;
} else {
    $connectNow = new mysqli($serverHost, $user, $password, $database);
}
if ($connectNow->connect_error) {
    die("Connection failed: " . $connectNow->connect_error);
}