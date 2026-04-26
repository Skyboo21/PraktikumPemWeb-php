<?php
header('Content-Type: application/json');
session_start();

if(isset($_SESSION['user_nama'])) {
    echo json_encode([
        "status" => "logged_in", 
        "nama" => $_SESSION['user_nama'], 
        "role" => $_SESSION['role']
    ]);
} else {
    echo json_encode(["status" => "not_logged_in"]);
}
?>