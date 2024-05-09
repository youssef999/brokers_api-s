//TEST

<?php

include "../connection.php";

$postData = json_decode(file_get_contents('php://input'), true);
//buildings
$name =$postData['name'];
$lat= $postData['lat'];
$lng= $postData['lng'];
$locationName= $postData['location_name'];
$price= $postData['price'];
$userId= $postData['user_id'];
$RoleId= $postData['role_id'];
$type= $postData['type'];
$phone= $postData['phone'];
$cat= $postData['cat'];
$whats= $postData['whats'];

$location_country= $postData['location_country'];
$location_area= $postData['location_area'];
$address= $postData['address'];
$building_number= $postData['building_number'];
$toilet_number= $postData['toilet_number'];
$rooms_number= $postData['rooms_number'];
$floor_number= $postData['floor_number'];
$area= $postData['area'];
$monthly_rent= $postData['monthly_rent'];
$bank_security= $postData['bank_security'];
$rent_time= $postData['rent_time'];
$availability_time= $postData['availability_time'];
$images= $postData['images'];
$threeDImages= $postData['threeDImages'];

//location_country
// location_area
// address
// building_number
// toilet_number
// rooms_number
// floor_number
// area
// monthly_rent
// bank_security
// rent_time
// availability_time
// Images in list
// 3d_images

$sqlQuery ="INSERT INTO buildings 
SET name='$name',
lat='$lat',lng='$lng',
phone='$phone',
cat='$cat',
location_name='$locationName',price='$price',
user_id='$userId',RoleId='$RoleId',
type='$type',
location_country='$location_country',
location_area='$location_area',
address='$address',
building_number='$building_number',
toilet_number='$toilet_number',
rooms_number='$rooms_number',floor_number='$floor_number',
area='$area',monthly_rent='$monthly_rent',
bank_security='$bank_security',rent_time='$rent_time',
availability_time='$availability_time',
images='$images',threeDImages='$threeDImages'

";
//$sqlQuery = "SELECT * FROM buildings";

$queryResult = $connectNow->query($sqlQuery);

if($queryResult) {
      echo json_encode(array("success"=>true));
}

else{
    echo json_encode(array("success" => false, "error" => $connectNow->error));
}

