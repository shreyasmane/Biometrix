<?php
$response = array();
 
// check for required fields
if (isset($_POST['name']) && isset($_POST['birthdate']) && isset($_POST['sex']) && isset($_POST['aadharcardnumber']) && isset($_POST['address']) && isset($_POST['thumbimpression'])) {
 
    $name = $_POST['name'];
    $birthdate = $_POST['birthdate'];
    $sex = $_POST['sex'];
	$aadharcardnumber = $_POST['aadharcardnumber'];
	$address = $_POST['address'];
	$thumbimpression = $_POST['thumbimpression'];

    // include db connect class
    require_once __DIR__ . '/db_connect.php';
 
    // connecting to db
    $db = new DB_CONNECT();
 
    // mysql inserting a new row
    $result = mysql_query("INSERT INTO aadharcard(name, birthdate, sex,aadharcardnumber,address,thumbimpression) 
	VALUES('$name', '$birthdate', '$sex','$aadharcardnumber','$address','$thumbimpression')");
 
    // check if row inserted or not
    if ($result) {
        // successfully inserted into database
        $response["success"] = 1;
        $response["message"] = "User has successfully created.";
 
        // echoing JSON response
        echo json_encode($response);
    } else {
        // failed to insert row
        $response["success"] = 0;
        $response["message"] = "Oops! An error occurred.";
 
        // echoing JSON response
        echo json_encode($response);
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
    // echoing JSON response
    echo json_encode($response);
}
?>