<?php
// Beri tahu browser bahwa ini adalah data JSON
header('Content-Type: application/json');

// URL API BPS (Statistik Wisatawan)
$url = "https://webapi.bps.go.id/v1/api/list/model/data/domain/0000/var/1150/key/44e43b677a28469e80b27be30058e579/";

// Menggunakan cURL (Lebih aman, diizinkan Vercel, dan disukai BPS)
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Abaikan error SSL Vercel

// Menyamar sebagai Browser Chrome agar tidak diblokir BPS
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36'); 

$response = curl_exec($ch);

// Cek jika ada error saat mengambil data
if(curl_errno($ch)) {
    echo json_encode(["error" => "Gagal mengambil data BPS: " . curl_error($ch)]);
} else {
    echo $response; // Tampilkan data BPS
}

curl_close($ch);
?>