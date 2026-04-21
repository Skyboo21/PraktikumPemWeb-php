<?php
session_start();
require 'koneksi.php';

if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    
    if(mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_assoc($query);
        
        if(password_verify($password, $data['password'])) {
            // Simpan identitas ke memori (Session)
            $_SESSION['user_nama'] = $data['nama'];
            $_SESSION['role'] = $data['role']; // INI YANG BIKIN SISTEM TAHU KAMU ADMIN

            // Logika Pembagian Jalur (Multi-role)
            if($data['role'] == 'admin') {
                echo "<script>alert('Selamat datang Admin " . $data['nama'] . "!'); window.location.href='admin_dashboard.php';</script>";
            } else {
                echo "<script>alert('Selamat datang, " . $data['nama'] . "!'); window.location.href='dashboard.php';</script>";
            }
        } else {
            echo "<script>alert('Gagal! Password yang Anda masukkan SALAH.');</script>";
        }
    } else {
        echo "<script>alert('Gagal! Email tidak ditemukan, silakan daftar dulu.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - NusaGo</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[url('gunungbromo.jpg')] bg-cover bg-center bg-no-repeat h-screen flex items-center justify-center">
    <div class="absolute inset-0 bg-black/40"></div>

    <div class="relative z-10 bg-white/10 backdrop-blur-md border border-white/20 p-8 rounded-2xl shadow-2xl w-[90%] max-w-md text-white">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold mb-2">Nusa<span class="text-blue-400">Go</span></h1>
            <p class="text-gray-200 text-sm">Masuk untuk melanjutkan petualanganmu</p>
        </div>

       <form method="POST" action="" class="space-y-5">
            <div>
                <label class="block text-sm font-medium mb-1">Email</label>
                <input type="email" name="email" placeholder="contoh@email.com" required class="w-full px-4 py-3 rounded-lg bg-white/20 border border-white/30 text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Password</label>
                <input type="password" name="password" placeholder="••••••••" required class="w-full px-4 py-3 rounded-lg bg-white/20 border border-white/30 text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            <button type="submit" name="login" class="w-full py-3 bg-blue-600 hover:bg-blue-700 transition duration-300 rounded-lg font-bold shadow-lg">Masuk Sekarang</button>
        </form>

        <p class="mt-6 text-center text-sm">
            Belum punya akun? <a href="register.php" class="text-blue-400 font-bold hover:underline">Daftar di sini</a>
        </p>
    </div>
</body>
</html>