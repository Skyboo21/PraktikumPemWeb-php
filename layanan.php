<?php 
session_start(); 
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
    <title>Layanan - NusaGo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="background-color: #f4f7f6; margin: 0; padding: 0;">

    <nav class="navbar">
        <a href="index.html" class="nav-logo">Nusa<span>Go</span></a>
        <ul class="nav-links">
            <li><a href="index.html">Beranda</a></li>
            <li><a href="destinasi.php">Destinasi</a></li>
            <li><a href="layanan.php" style="color: #ffffff; border-bottom: 2px solid #0056b3;">Layanan</a></li> 
            <li><a href="ulasan.php">Ulasan</a></li> 
            <li><a href="buku_tamu.php">Buku Tamu</a></li>
            
            <div id="user-menu-area" style="display: flex; align-items: center; gap: 15px;"></div>
        </ul>
    </nav>

    <header style="background: linear-gradient(rgba(10, 25, 47, 0.85), rgba(0, 86, 179, 0.7)), url('danautoba.jpg') center/cover; padding: 140px 20px 70px; text-align: center; color: white;">
        <h1 style="font-size: 3rem; margin: 0 0 10px 0;">Layanan Terbaik NusaGo</h1>
        <p style="font-size: 1.2rem; color: #e2e8f0; max-width: 600px; margin: 0 auto;">Pendamping setia petualanganmu. Kami hadir untuk membuat setiap perjalananmu lebih mudah, aman, dan berkesan.</p>
    </header>

    <section style="padding: 80px 50px; background-color: #f4f7f6;">
        <div style="text-align: center; margin-bottom: 50px;">
            <h2 style="font-size: 2.5rem; color: #0a192f; margin-bottom: 10px;">Mengapa Memilih Kami?</h2>
            <p style="color: #6b7280; font-size: 1.1rem;">Fasilitas utama yang membuat NusaGo berbeda dari yang lain.</p>
        </div>
        
        <div style="display: flex; justify-content: center; gap: 30px; flex-wrap: wrap; max-width: 1100px; margin: 0 auto;">
            <div style="background: white; padding: 40px 30px; border-radius: 15px; box-shadow: 0 10px 20px rgba(0,0,0,0.05); width: 300px; text-align: center; transition: 0.3s;" onmouseover="this.style.transform='translateY(-10px)'" onmouseout="this.style.transform='translateY(0)'">
                <div style="font-size: 3.5rem; margin-bottom: 20px;">🌍</div>
                <h3 style="color: #0056b3; margin-bottom: 15px;">Jelajah Bebas</h3>
                <p style="color: #6b7280; line-height: 1.6;">Temukan destinasi tersembunyi di seluruh pelosok negeri dengan informasi yang lengkap.</p>
            </div>
            <div style="background: white; padding: 40px 30px; border-radius: 15px; box-shadow: 0 10px 20px rgba(0,0,0,0.05); width: 300px; text-align: center; transition: 0.3s;" onmouseover="this.style.transform='translateY(-10px)'" onmouseout="this.style.transform='translateY(0)'">
                <div style="font-size: 3.5rem; margin-bottom: 20px;">🛡️</div>
                <h3 style="color: #0056b3; margin-bottom: 15px;">Aman & Terpercaya</h3>
                <p style="color: #6b7280; line-height: 1.6;">Informasi yang valid dan panduan lengkap untuk memastikan liburanmu aman tanpa kendala.</p>
            </div>
            <div style="background: white; padding: 40px 30px; border-radius: 15px; box-shadow: 0 10px 20px rgba(0,0,0,0.05); width: 300px; text-align: center; transition: 0.3s;" onmouseover="this.style.transform='translateY(-10px)'" onmouseout="this.style.transform='translateY(0)'">
                <div style="font-size: 3.5rem; margin-bottom: 20px;">💡</div>
                <h3 style="color: #0056b3; margin-bottom: 15px;">Rekomendasi Cerdas</h3>
                <p style="color: #6b7280; line-height: 1.6;">Dapatkan saran destinasi wisata yang sesuai dengan minat, gaya, dan *budget* liburanmu.</p>
            </div>
        </div>
    </section>

    <section style="padding: 80px 50px; background-color: #ffffff;">
        <div style="text-align: center; margin-bottom: 60px;">
            <h2 style="font-size: 2.5rem; color: #0a192f; margin-bottom: 10px;">Cara Kerja NusaGo</h2>
            <p style="color: #6b7280; font-size: 1.1rem;">Hanya dengan 3 langkah mudah menuju liburan impianmu.</p>
        </div>
        
        <div style="display: flex; justify-content: center; gap: 50px; flex-wrap: wrap; max-width: 1000px; margin: 0 auto;">
            <div style="text-align: center; width: 260px;">
                <div style="background-color: #e6f0fa; color: #0056b3; width: 80px; height: 80px; line-height: 80px; border-radius: 50%; font-size: 2rem; margin: 0 auto 20px; font-weight: 900; box-shadow: 0 5px 15px rgba(0, 86, 179, 0.2);">1</div>
                <h3 style="color: #0a192f; margin-bottom: 15px;">Eksplorasi</h3>
                <p style="color: #555; line-height: 1.6;">Cari dan temukan destinasi impianmu dari katalog rekomendasi eksklusif kami.</p>
            </div>
            
            <div style="text-align: center; width: 260px;">
                <div style="background-color: #e6f0fa; color: #0056b3; width: 80px; height: 80px; line-height: 80px; border-radius: 50%; font-size: 2rem; margin: 0 auto 20px; font-weight: 900; box-shadow: 0 5px 15px rgba(0, 86, 179, 0.2);">2</div>
                <h3 style="color: #0a192f; margin-bottom: 15px;">Daftar / Masuk</h3>
                <p style="color: #555; line-height: 1.6;">Buat akun untuk mengakses *dashboard* pribadi dan merencanakan riwayat liburanmu.</p>
            </div>
            
            <div style="text-align: center; width: 260px;">
                <div style="background-color: #e6f0fa; color: #0056b3; width: 80px; height: 80px; line-height: 80px; border-radius: 50%; font-size: 2rem; margin: 0 auto 20px; font-weight: 900; box-shadow: 0 5px 15px rgba(0, 86, 179, 0.2);">3</div>
                <h3 style="color: #0a192f; margin-bottom: 15px;">Mulai Petualangan</h3>
                <p style="color: #555; line-height: 1.6;">Siapkan ranselmu, kemas barangmu, dan wujudkan liburan yang tak terlupakan!</p>
            </div>
        </div>
    </section>

    <section style="background: linear-gradient(135deg, #0056b3, #0a192f); color: white; padding: 70px 20px; text-align: center; margin: 50px 50px 80px 50px; border-radius: 20px; box-shadow: 0 15px 30px rgba(0,0,0,0.2);">
        <h2 style="font-size: 2.2rem; margin-top: 0; margin-bottom: 15px;">Punya Pengalaman Liburan Seru?</h2>
        <p style="font-size: 1.1rem; margin-bottom: 35px; color: #d1d5db; max-width: 600px; margin-left: auto; margin-right: auto;">Bagikan ceritamu dan tinggalkan jejak petualanganmu bersama wisatawan lainnya di NusaGo!</p>
        <a href="buku_tamu.php" style="background-color: #ffdd00; color: #0a192f; padding: 15px 40px; border-radius: 50px; text-decoration: none; font-weight: bold; font-size: 1.1rem; box-shadow: 0 6px 20px rgba(255, 221, 0, 0.3); transition: 0.3s; display: inline-block;">Tulis di Buku Tamu 📝</a>
    </section>

    <footer class="footer" style="background: #0a192f; color: white; text-align: center; padding: 25px 0;">
        <p style="margin: 0;">&copy; 2026 NusaGo (Sistem Informasi Destinasi Wisata). Praktikum Pemrograman Web.</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>