<?php
require 'koneksi.php';

// PROTEKSI ANTI-VERCEL (Gunakan Cookie)
if(!isset($_COOKIE['user_nama'])) {
    echo "<script>alert('Sesi habis atau Anda belum Login!'); window.location.href='index.html';</script>";
    exit;
}
?>

// Fitur Logout
if(isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pengguna - NusaGo</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans text-gray-800">

    <nav class="bg-[#0a192f] text-white py-4 px-6 shadow-md flex justify-between items-center fixed w-full top-0 z-50">
        <a href="index.html" class="text-2xl font-bold">Nusa<span class="text-blue-500">Go</span></a>
        <div class="flex items-center space-x-4">
            <span class="hidden md:inline-block font-medium">Halo, <?= $_SESSION['user_nama']; ?>!</span>
            <img src="https://ui-avatars.com/api/?name=<?= urlencode($_SESSION['user_nama']); ?>&background=0056b3&color=fff" alt="Profil" class="w-10 h-10 rounded-full border-2 border-blue-400">
            <a href="?logout=true" class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded-lg text-sm font-bold transition">Logout</a>
        </div>
    </nav>

    <div class="pt-24 pb-12 px-6 max-w-7xl mx-auto">
        <div class="mb-8">
            <h1 class="text-3xl font-extrabold text-[#001f3f]">Dashboard Pengguna</h1>
            <p class="text-gray-600">Pantau aktivitas liburan dan destinasi favoritmu di sini.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-blue-500 hover:shadow-md transition">
                <h3 class="text-gray-500 text-sm font-bold mb-1">Destinasi Favorit Disimpan</h3>
                <p class="text-3xl font-black text-[#0a192f]">12 <span class="text-sm font-normal text-gray-400">tempat</span></p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-green-500 hover:shadow-md transition">
                <h3 class="text-gray-500 text-sm font-bold mb-1">Riwayat Kunjungan</h3>
                <p class="text-3xl font-black text-[#0a192f]">5 <span class="text-sm font-normal text-gray-400">perjalanan</span></p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-yellow-500 hover:shadow-md transition">
                <h3 class="text-gray-500 text-sm font-bold mb-1">Status Member</h3>
                <p class="text-2xl font-black text-yellow-500 mt-1">⭐ Gold Explorer</p>
            </div>
        </div>

        <h2 class="text-2xl font-bold text-[#001f3f] mb-6">Wishlist Destinasi Anda</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition duration-300 transform hover:-translate-y-2">
                <img src="Borobudur.jpg" alt="Borobudur" class="w-full h-48 object-cover">
                <div class="p-5">
                    <h3 class="text-xl font-bold text-blue-700 mb-2">Candi Borobudur</h3>
                    <p class="text-sm text-gray-600 mb-4">Jawa Tengah, Indonesia</p>
                    <button class="w-full bg-blue-100 text-blue-700 font-bold py-2 rounded-lg hover:bg-blue-200 transition">Lihat Detail Tiket</button>
                </div>
            </div>
            <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition duration-300 transform hover:-translate-y-2">
                <img src="rajaampat.jpg" alt="Raja Ampat" class="w-full h-48 object-cover">
                <div class="p-5">
                    <h3 class="text-xl font-bold text-blue-700 mb-2">Raja Ampat</h3>
                    <p class="text-sm text-gray-600 mb-4">Papua Barat, Indonesia</p>
                    <button class="w-full bg-blue-100 text-blue-700 font-bold py-2 rounded-lg hover:bg-blue-200 transition">Lihat Detail Tiket</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>