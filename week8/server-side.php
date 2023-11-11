<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");



$id = $_POST["id"];
$F_Name = $_POST["F_Name"];
$L_Name = $_POST["L_Name"];
$email = $_POST["email"];
$email2 = $_POST["email2"];
$profesi = $_POST["profesi"];


$new_data = "$id,$F_Name,$L_Name,$email,$email2,$profesi";


$csv_path = 'datapribadi.csv';


$result = file_put_contents($csv_path, $new_data . "\n", FILE_APPEND | LOCK_EX);


if ($result === false) {
    $response = array("status" => "error", "message" => "Error writing data to the CSV file.");
} else {
    $response = array("status" => "success", "message" => "Data successfully written to the CSV file.");
    
    // Redirect to the specified URL
    header("Location: https://alvinbernerdian.alwaysdata.net/week8/");
    exit(); 
}


echo json_encode($response);
?>