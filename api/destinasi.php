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
    <title>Destinasi - NusaGo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="background-color: #f4f7f6; margin: 0; padding: 0;">

    <nav class="navbar">
        <a href="index.php" class="nav-logo">Nusa<span>Go</span></a>
        <ul class="nav-links">
            <li><a href="index.php">Beranda</a></li>
            <li><a href="destinasi.php" style="color: #ffffff; border-bottom: 2px solid #0056b3;">Destinasi</a></li>
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

    <header style="background: linear-gradient(rgba(10, 25, 47, 0.8), rgba(0, 86, 179, 0.8)), url('rajaampat.jpg') center/cover; padding: 140px 20px 70px; text-align: center; color: white;">
        <h1 style="font-size: 3rem; margin: 0 0 10px 0;">Jelajahi Surga Nusantara</h1>
        <p style="font-size: 1.2rem; color: #e2e8f0; max-width: 600px; margin: 0 auto;">Temukan destinasi yang pas untuk jiwa petualangmu. Dari pegunungan megah hingga lautan biru yang tak bertepi.</p>
    </header>

    <div class="container" style="padding-top: 50px;">
        <section class="daftar-wisata" id="destinasi-spesial">
            <div class="section-title">
                <h2 style="color: #0a192f; font-size: 2rem;">Rekomendasi Spesial Minggu Ini</h2>
                <p style="color: #555;">Pilihan eksklusif yang wajib masuk daftar kunjunganmu.</p>
            </div>

            <div class="twitch-slider-container">
                <button class="slider-btn left-btn" onclick="geserTwitch(-1)">&#10094;</button>

                <div class="twitch-track" id="twitchTrack">
                    <article class="wisata-card">
                        <div class="img-wrapper"><img src="Borobudur.jpg" alt="Candi Borobudur"></div>
                        <div class="card-content">
                            <h3>Candi Borobudur</h3>
                            <p>Situs warisan dunia dengan pesona arsitektur kuno dan lanskap hijau di Magelang.</p>
                        </div>
                    </article>
                    <article class="wisata-card">
                        <div class="img-wrapper"><img src="pantaikuta.jpg" alt="Pantai Kuta"></div>
                        <div class="card-content">
                            <h3>Pantai Kuta, Bali</h3>
                            <p>Nikmati deburan ombak dan keindahan matahari terbenam di pantai paling ikonik di Bali.</p>
                        </div>
                    </article>
                    <article class="wisata-card">
                        <div class="img-wrapper"><img src="rajaampat.jpg" alt="Raja Ampat"></div>
                        <div class="card-content">
                            <h3>Raja Ampat, Papua</h3>
                            <p>Gugusan pulau karang eksotis dengan kekayaan biota laut yang tak tertandingi.</p>
                        </div>
                    </article>
                </div>

                <button class="slider-btn right-btn" onclick="geserTwitch(1)">&#10095;</button>
            </div>
        </section>
    </div>

    <section style="padding: 60px 50px 100px 50px; background-color: #ffffff;">
        <div style="text-align: center; margin-bottom: 50px;">
            <h2 style="font-size: 2.2rem; color: #0a192f; margin-bottom: 10px;">Semua Destinasi</h2>
            <p style="color: #6b7280; font-size: 1.1rem;">Eksplorasi tanpa batas, pilih tujuan liburanmu berikutnya.</p>
        </div>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; max-width: 1200px; margin: 0 auto;">
            
            <article style="background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.08); transition: 0.3s; cursor: pointer;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                <img src="Borobudur.jpg" alt="Candi Borobudur" style="width: 100%; height: 200px; object-fit: cover;">
                <div style="padding: 20px;">
                    <h3 style="color: #0056b3; margin-top: 0; margin-bottom: 10px;">Candi Borobudur</h3>
                    <p style="color: #555; font-size: 0.95rem; line-height: 1.5; margin-bottom: 0;">📍 Magelang, Jawa Tengah</p>
                </div>
            </article>

            <article style="background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.08); transition: 0.3s; cursor: pointer;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                <img src="pantaikuta.jpg" alt="Pantai Kuta" style="width: 100%; height: 200px; object-fit: cover;">
                <div style="padding: 20px;">
                    <h3 style="color: #0056b3; margin-top: 0; margin-bottom: 10px;">Pantai Kuta</h3>
                    <p style="color: #555; font-size: 0.95rem; line-height: 1.5; margin-bottom: 0;">📍 Bali, Indonesia</p>
                </div>
            </article>

            <article style="background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.08); transition: 0.3s; cursor: pointer;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                <img src="rajaampat.jpg" alt="Raja Ampat" style="width: 100%; height: 200px; object-fit: cover;">
                <div style="padding: 20px;">
                    <h3 style="color: #0056b3; margin-top: 0; margin-bottom: 10px;">Raja Ampat</h3>
                    <p style="color: #555; font-size: 0.95rem; line-height: 1.5; margin-bottom: 0;">📍 Papua Barat</p>
                </div>
            </article>

            <article style="background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.08); transition: 0.3s; cursor: pointer;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                <img src="gunungbromo.jpg" alt="Gunung Bromo" style="width: 100%; height: 200px; object-fit: cover;">
                <div style="padding: 20px;">
                    <h3 style="color: #0056b3; margin-top: 0; margin-bottom: 10px;">Gunung Bromo</h3>
                    <p style="color: #555; font-size: 0.95rem; line-height: 1.5; margin-bottom: 0;">📍 Jawa Timur</p>
                </div>
            </article>

            <article style="background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.08); transition: 0.3s; cursor: pointer;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                <img src="pulaukomodo.jpg" alt="Taman Nasional Komodo" style="width: 100%; height: 200px; object-fit: cover;">
                <div style="padding: 20px;">
                    <h3 style="color: #0056b3; margin-top: 0; margin-bottom: 10px;">Pulau Komodo</h3>
                    <p style="color: #555; font-size: 0.95rem; line-height: 1.5; margin-bottom: 0;">📍 Nusa Tenggara Timur</p>
                </div>
            </article>

            <article style="background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.08); transition: 0.3s; cursor: pointer;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                <img src="danautoba.jpg" alt="Danau Toba" style="width: 100%; height: 200px; object-fit: cover;">
                <div style="padding: 20px;">
                    <h3 style="color: #0056b3; margin-top: 0; margin-bottom: 10px;">Danau Toba</h3>
                    <p style="color: #555; font-size: 0.95rem; line-height: 1.5; margin-bottom: 0;">📍 Sumatera Utara</p>
                </div>
            </article>

        </div>
    </section>

    <footer class="footer" style="background: #0a192f; color: white; text-align: center; padding: 25px 0;">
        <p style="margin: 0;">&copy; 2026 NusaGo (Sistem Informasi Destinasi Wisata). Praktikum Pemrograman Web.</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>