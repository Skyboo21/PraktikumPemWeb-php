<?php
require 'koneksi.php';

if(isset($_POST['register'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 

    $cek_email = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    
    if(mysqli_num_rows($cek_email) > 0) {
        echo "<script>alert('Gagal! Email tersebut sudah terdaftar.');</script>";
    } else {
        $query = "INSERT INTO users (nama, email, password) VALUES ('$nama', '$email', '$password')";
        if(mysqli_query($conn, $query)) {
            echo "<script>alert('Pendaftaran Berhasil! Silakan Login.'); window.location.href='login.php';</script>";
        } else {
            echo "<script>alert('Pendaftaran Gagal!');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - NusaGo</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[url('https://upload.wikimedia.org/wikipedia/commons/thumb/8/8e/Bromo-Semeru-Batok-Widodaren.jpg/1200px-Bromo-Semeru-Batok-Widodaren.jpg')] bg-cover bg-center bg-no-repeat h-screen flex items-center justify-center">

    <div class="absolute inset-0 bg-black/50"></div>

    <div class="relative z-10 bg-white/10 backdrop-blur-md border border-white/20 p-8 rounded-2xl shadow-2xl w-[90%] max-w-md text-white mt-10 mb-10">
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold mb-1">Bergabung dengan Nusa<span class="text-blue-400">Go</span></h1>
            <p class="text-gray-200 text-sm">Buat akun barumu sekarang</p>
        </div>

        <form method="POST" action="" class="space-y-4">
            <div>
                <label class="block text-sm font-medium mb-1">Nama Lengkap</label>
                <input type="text" name="nama" placeholder="Masukkan nama lengkap" required class="w-full px-4 py-2.5 rounded-lg bg-white/20 border border-white/30 text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Email</label>
                <input type="email" name="email" placeholder="contoh@email.com" required class="w-full px-4 py-2.5 rounded-lg bg-white/20 border border-white/30 text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Password</label>
                <input type="password" name="password" placeholder="••••••••" required class="w-full px-4 py-2.5 rounded-lg bg-white/20 border border-white/30 text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <button type="submit" name="register" class="w-full py-3 mt-4 bg-blue-600 hover:bg-blue-700 transition duration-300 rounded-lg font-bold shadow-lg">Daftar Akun</button>
        </form>
        
        <p class="mt-5 text-center text-sm">
            Sudah punya akun? <a href="login.php" class="text-blue-400 font-bold hover:underline">Masuk di sini</a>
        </p>
    </div>
</body>
</html>