




<?php
 include '../connection.php';

$sqlQuery = "SELECT * FROM Locations";

$resultOfQuery = $connectNow->query($sqlQuery);

if($resultOfQuery->num_rows > 0) 

{
    $clothItemRecored = array();
    while($rowFound = $resultOfQuery->fetch_assoc())
    {
        $clothItemRecored[] = $rowFound;
    }
    echo json_encode(
        array(
            "success"=>true,
            "data"=>$clothItemRecored
        )
    );
}
else //Do NOT allow user to login
{
    echo json_encode(array("success"=>false));
}



