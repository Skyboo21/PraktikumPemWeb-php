<?php
header('Content-Type: application/json');

if(isset($_COOKIE['user_nama'])) {
    echo json_encode([
        "status" => "logged_in", 
        "nama" => $_COOKIE['user_nama'], 
        "role" => $_COOKIE['role']
    ]);
} else {
    echo json_encode(["status" => "not_logged_in"]);
}
?>