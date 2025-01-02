<?php
session_start();

$response = array("isLoggedIn" => false); 
if (isset($_SESSION['data_id']) && !empty($_SESSION['data_id'])) {
    $response["isLoggedIn"] = true;
}
error_log("Session data: " . print_r($_SESSION, true));
header('Content-Type: application/json');
echo json_encode($response);
?>
