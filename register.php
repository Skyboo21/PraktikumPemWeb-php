<?php
require 'koneksi.php';

$pesan = "";
$tipe_pesan = "";

if(isset($_POST['register'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    // Enkripsi password untuk keamanan
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 

    // Cek apakah email sudah ada di database
    $cek_email = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    
    if(mysqli_num_rows($cek_email) > 0) {
        $pesan = "Email sudah terdaftar! Gunakan email lain.";
        $tipe_pesan = "error";
    } else {
        // Menyimpan data ke database (Otomatis diberi hak akses sebagai 'user')
        $query = "INSERT INTO users (nama, email, password, role) VALUES ('$nama', '$email', '$password', 'user')";
        if(mysqli_query($conn, $query)) {
            $pesan = "Pendaftaran berhasil! Silakan Masuk.";
            $tipe_pesan = "sukses";
        } else {
            $pesan = "Terjadi kesalahan, gagal mendaftar!";
            $tipe_pesan = "error";
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
<body class="bg-[url('rajaampat.jpg')] bg-cover flex items-center justify-center h-screen text-white">
    <div class="bg-black/50 backdrop-blur-md p-10 rounded-2xl shadow-2xl w-full max-w-md">
        <h1 class="text-3xl font-bold text-center mb-6">Daftar Akun Nusa<span class="text-blue-400">Go</span></h1>
        
        <?php if($pesan): ?>
            <div class="<?= $tipe_pesan == 'sukses' ? 'bg-green-500' : 'bg-red-500' ?> p-3 rounded mb-6 text-center font-bold">
                <?= $pesan ?>
            </div>
        <?php endif; ?>

        <form action="" method="POST" class="space-y-4">
            <input type="text" name="nama" placeholder="Nama Lengkap" required class="w-full p-3 rounded bg-white/20 border border-white/30 outline-none focus:border-blue-400 transition">
            
            <input type="email" name="email" placeholder="Email" required class="w-full p-3 rounded bg-white/20 border border-white/30 outline-none focus:border-blue-400 transition">
            
            <input type="password" name="password" placeholder="Password" required class="w-full p-3 rounded bg-white/20 border border-white/30 outline-none focus:border-blue-400 transition">
            
            <button type="submit" name="register" class="w-full py-3 mt-2 bg-blue-600 rounded-lg font-bold hover:bg-blue-700 transition duration-300 shadow-lg">Daftar Sekarang</button>
        </form>
        
        <p class="text-center mt-6 text-sm text-gray-200">Sudah punya akun? <a href="login.php" class="text-blue-400 font-bold hover:underline">Masuk di sini</a></p>
    </div>
</body>
</html>