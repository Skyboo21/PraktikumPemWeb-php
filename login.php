<?php
require 'koneksi.php';

// LOGIKA LOGOUT (Menghapus Cookie)
if(isset($_GET['logout'])) {
    setcookie("user_nama", "", time() - 3600, "/");
    setcookie("role", "", time() - 3600, "/");
    header("Location: index.html");
    exit;
}

// LOGIKA LOGIN
$error = "";
if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    
    if(mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row['password']) || $password == $row['password']) {
            
            // JURUS VERCEL: Simpan ke Cookie selama 1 Hari (86400 detik)
            setcookie("user_nama", $row['nama'], time() + 86400, "/");
            setcookie("role", strtolower($row['role']), time() + 86400, "/");
            
            if(strtolower($row['role']) == 'admin') {
                header("Location: admin_dashboard.php");
            } else {
                header("Location: dashboard.php"); 
            }
            exit;
        }
    }
    $error = "Email atau Password salah!";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - NusaGo</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[url('rajaampat.jpg')] bg-cover flex items-center justify-center h-screen text-white">
    <div class="bg-black/50 backdrop-blur-md p-8 md:p-10 rounded-2xl shadow-2xl w-11/12 max-w-md border border-white/10">
        <h1 class="text-3xl font-bold text-center mb-6">Masuk ke Nusa<span class="text-blue-400">Go</span></h1>
        <?php if($error): ?><div class="bg-red-500 p-2 rounded mb-4 text-center font-bold"><?= $error ?></div><?php endif; ?>
        <form action="" method="POST" class="space-y-4">
            <input type="email" name="email" placeholder="Email" required class="w-full p-3 rounded bg-white/20 border border-white/30 outline-none focus:border-blue-400 transition">
            <input type="password" name="password" placeholder="Password" required class="w-full p-3 rounded bg-white/20 border border-white/30 outline-none focus:border-blue-400 transition">
            <button type="submit" name="login" class="w-full py-3 mt-2 bg-blue-600 rounded-lg font-bold hover:bg-blue-700 transition duration-300 shadow-lg">Masuk</button>
        </form>
        <p class="text-center mt-6 text-sm text-gray-200">Belum punya akun? <a href="register.php" class="text-blue-400 font-bold hover:underline">Daftar di sini</a></p>
    </div>
</body>
</html>