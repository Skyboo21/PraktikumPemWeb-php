<?php
header('Content-Type: application/json');
require 'koneksi.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 

    $cek_email = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    
    if(mysqli_num_rows($cek_email) > 0) {
        echo json_encode(["status" => "error", "message" => "Email sudah terdaftar!"]);
    } else {
        $query = "INSERT INTO users (nama, email, password) VALUES ('$nama', '$email', '$password')";
        if(mysqli_query($conn, $query)) {
            echo json_encode(["status" => "success", "message" => "Pendaftaran berhasil!"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Gagal mendaftar!"]);
        }
    }
}
?>