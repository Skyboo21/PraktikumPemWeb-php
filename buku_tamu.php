<?php 
// Kita sudah beralih menggunakan Cookie
if(isset($_GET['logout'])) {
    setcookie("user_nama", "", time() - 3600, "/");
    setcookie("role", "", time() - 3600, "/");
    header("Location: index.html"); 
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Tamu - NusaGo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="background-color: #f4f7f6; margin: 0; padding: 0; display: flex; flex-direction: column; min-height: 100vh;">

    <nav class="navbar">
        <a href="index.html" class="nav-logo">Nusa<span>Go</span></a>
        <ul class="nav-links">
            <li><a href="index.html">Beranda</a></li>
            <li><a href="destinasi.php">Destinasi</a></li>
            <li><a href="layanan.php">Layanan</a></li> 
            <li><a href="ulasan.php">Ulasan</a></li> 
            <li><a href="buku_tamu.php" style="color: #ffffff; border-bottom: 2px solid #0056b3;">Buku Tamu</a></li>
            
            <div id="user-menu-area" style="display: flex; align-items: center; gap: 15px;"></div>
        </ul>
    </nav>

    <main style="flex: 1; padding-top: 150px; display: flex; justify-content: center; align-items: flex-start;">
        <section style="width: 100%; max-width: 600px; padding: 0 20px;">
            <div style="background: white; padding: 50px; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.08); text-align: center;">
                <h2 style="color: #0a192f; margin-bottom: 10px; font-size: 2.2rem; margin-top:0;">Buku Tamu NusaGo</h2>
                <p style="margin-bottom: 40px; color: #6b7280; font-size: 1.1rem;">Tinggalkan jejak petualanganmu dan sapa wisatawan lainnya!</p>
                
                <form id="wisataForm" onsubmit="event.preventDefault(); sambutWisatawan();">
                    <div style="display: flex; flex-direction: column; gap: 20px;">
                        <input type="text" id="nama_input" placeholder="Masukkan nama Anda..." required style="width: 100%; padding: 15px 20px; border: 2px solid #e5e7eb; border-radius: 10px; font-size: 1rem; outline: none; transition: 0.3s;" onfocus="this.style.borderColor='#0056b3'" onblur="this.style.borderColor='#e5e7eb'">
                        <button type="submit" style="width: 100%; padding: 15px; background-color: #0056b3; color: white; border: none; border-radius: 10px; cursor: pointer; font-weight: bold; font-size: 1.1rem; transition: 0.3s; box-shadow: 0 4px 15px rgba(0, 86, 179, 0.3);" onmouseover="this.style.backgroundColor='#003d82'" onmouseout="this.style.backgroundColor='#0056b3'">Kirim Jejak 🚀</button>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <footer class="footer" style="background: #0a192f; color: white; text-align: center; padding: 25px 0;">
        <p style="margin: 0;">&copy; 2026 NusaGo (Sistem Informasi Destinasi Wisata). Praktikum Pemrograman Web.</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>