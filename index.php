<?php 
session_start(); 
if(isset($_GET['logout'])) {
    session_destroy(); 
    header("Location: index.php"); 
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - NusaGo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="background-color: #f4f7f6; margin: 0; padding: 0;">

    <nav class="navbar">
        <a href="index.php" class="nav-logo">Nusa<span>Go</span></a>
        <ul class="nav-links">
            <li><a href="index.php" style="color: #ffffff; border-bottom: 2px solid #0056b3;">Beranda</a></li>
            <li><a href="destinasi.php">Destinasi</a></li>
            <li><a href="layanan.php">Layanan</a></li> 
            <li><a href="ulasan.php">Ulasan</a></li> 
            <li><a href="buku_tamu.php">Buku Tamu</a></li>
            
            <?php if(isset($_SESSION['user_nama'])): ?>
                <li>
                    <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
                        <a href="admin_dashboard.php" class="btn-user">🛡️ Panel Admin</a>
                    <?php else: ?>
                        <a href="dashboard.php" class="btn-user">👤 Halo, <?= $_SESSION['user_nama']; ?></a>
                    <?php endif; ?>
                </li>
            <?php else: ?>
                <li>
                    <a href="login.php" class="btn-login">Masuk</a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>

    <header class="hero" id="beranda">
        <div class="hero-content">
            <h1>Eksplorasi Pesona Nusantara</h1>
            <p>Temukan surga wisata tersembunyi dan wujudkan liburan impianmu sekarang.</p>
            <a href="destinasi.php" class="btn-explore">Mulai Petualangan</a>
        </div>
    </header>

    <section style="padding: 80px 50px; background-color: #f4f7f6;">
        <div style="text-align: center; margin-bottom: 50px;">
            <h2 style="font-size: 2.5rem; color: #0a192f; margin-bottom: 10px;">Destinasi Terpopuler</h2>
            <p style="color: #6b7280; font-size: 1.1rem;">Intip beberapa surga tersembunyi favorit wisatawan bulan ini.</p>
        </div>
        
        <div style="display: flex; justify-content: center; gap: 30px; flex-wrap: wrap;">
            <article style="background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 10px 20px rgba(0,0,0,0.05); width: 320px;">
                <img src="Borobudur.jpg" alt="Candi Borobudur" style="width: 100%; height: 220px; object-fit: cover;">
                <div style="padding: 25px;">
                    <h3 style="color: #0a192f; margin-top: 0; margin-bottom: 10px; font-size: 1.4rem;">Candi Borobudur</h3>
                    <p style="color: #6b7280; font-size: 0.95rem; line-height: 1.5;">Situs warisan dunia dengan pesona arsitektur kuno dan lanskap hijau di Magelang.</p>
                </div>
            </article>

            <article style="background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 10px 20px rgba(0,0,0,0.05); width: 320px;">
                <img src="rajaampat.jpg" alt="Raja Ampat" style="width: 100%; height: 220px; object-fit: cover;">
                <div style="padding: 25px;">
                    <h3 style="color: #0a192f; margin-top: 0; margin-bottom: 10px; font-size: 1.4rem;">Raja Ampat</h3>
                    <p style="color: #6b7280; font-size: 0.95rem; line-height: 1.5;">Gugusan pulau karang eksotis dengan kekayaan biota laut yang tak tertandingi.</p>
                </div>
            </article>

            <article style="background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 10px 20px rgba(0,0,0,0.05); width: 320px;">
                <img src="gunungbromo.jpg" alt="Gunung Bromo" style="width: 100%; height: 220px; object-fit: cover;">
                <div style="padding: 25px;">
                    <h3 style="color: #0a192f; margin-top: 0; margin-bottom: 10px; font-size: 1.4rem;">Gunung Bromo</h3>
                    <p style="color: #6b7280; font-size: 0.95rem; line-height: 1.5;">Saksikan pemandangan matahari terbit yang magis di lanskap vulkanik memukau.</p>
                </div>
            </article>
        </div>

        <div style="text-align: center; margin-top: 60px;">
            <a href="destinasi.php" style="background-color: #0a192f; color: white; padding: 15px 40px; border-radius: 50px; text-decoration: none; font-weight: bold; font-size: 1.1rem; box-shadow: 0 4px 15px rgba(10, 25, 47, 0.3); transition: 0.3s; display: inline-block;">Lihat Semua Destinasi ➔</a>
        </div>
    </section>

    <section style="background: linear-gradient(135deg, #0a192f, #0056b3); color: white; padding: 60px 20px; text-align: center; margin: 20px 50px 80px 50px; border-radius: 20px; box-shadow: 0 15px 30px rgba(0,0,0,0.15);">
        <h2 style="font-size: 2.2rem; margin-top: 0; margin-bottom: 15px;">Siap Memulai Perjalananmu?</h2>
        <p style="font-size: 1.1rem; margin-bottom: 30px; color: #d1d5db;">Bergabunglah bersama ratusan petualang lainnya yang sudah menjelajah bersama NusaGo.</p>
        <a href="register.php" style="background-color: #ffdd00; color: #0a192f; padding: 15px 40px; border-radius: 50px; text-decoration: none; font-weight: bold; font-size: 1.1rem; box-shadow: 0 5px 15px rgba(255, 221, 0, 0.3); transition: 0.3s; display: inline-block;">Buat Akun Gratis ➔</a>
    </section>

    <footer class="footer" style="background: #0a192f; color: white; text-align: center; padding: 25px 0;">
        <p style="margin: 0;">&copy; 2026 NusaGo (Sistem Informasi Destinasi Wisata). Praktikum Pemrograman Web.</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>
