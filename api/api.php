<?php
header('Content-Type: application/json'); 

// Pastikan ini adalah URL dari Postman yang baru saja berhasil!
// (Biasanya berakhiran /var/1150/th/126/key/ac767c052bb95fbbfbcecb475d80d70a/)
$url = "https://webapi.bps.go.id/v1/api/list/model/data/lang/ind/domain/0000/var/1150/th/126/key/ac767c052bb95fbbfbcecb475d80d70a/";

$response = file_get_contents($url);

if ($response === FALSE) {
    echo json_encode(["error" => "Gagal mengambil data"]);
    exit;
}
echo $response;
?>