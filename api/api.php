<?php
// WAJIB: Gunakan ../ karena koneksi.php ada di luar folder api
require '../koneksi.php';

// Pastikan variabel koneksi menggunakan $conn agar sinkron dengan yang lain
if (!$conn) {
    die(json_encode(["error" => "Koneksi database gagal"]));
}

// URL API BPS (Statistik Wisatawan)
$url = "https://webapi.bps.go.id/v1/api/list/model/data/domain/0000/var/1150/key/44e43b677a28469e80b27be30058e579/";

$response = file_get_contents($url);
echo $response;
?>