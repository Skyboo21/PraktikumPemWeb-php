<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>NusaGo - Eksplorasi Wisata Indonesia</title>
</head>
<body>

    <nav class="navbar">
        <a href="#beranda" class="nav-logo">Nusa<span>Go</span></a>
        <ul class="nav-links">
            <li><a href="#beranda">Beranda</a></li>
            <li><a href="#destinasi">Destinasi</a></li>
            <li><a href="#keunggulan">Layanan</a></li> 
            <li><a href="#testimoni">Ulasan</a></li> 
            <li><a href="#buku-tamu">Buku Tamu</a></li>
            
            <?php if(isset($_SESSION['user_nama'])): ?>
                <li>
                    <a href="dashboard.php" style="background-color: #f4f7f6; color: #0056b3; padding: 8px 20px; border-radius: 5px; font-weight: bold; border: 2px solid #0056b3;">👤 Halo, <?= $_SESSION['user_nama']; ?></a>
                </li>
            <?php else: ?>
                <li>
                    <a href="login.php" style="background-color: #0056b3; padding: 8px 20px; border-radius: 5px; color: white; font-weight: bold; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">Masuk</a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>

    <header class="hero" id="beranda">
        <div class="hero-content">
            <h1>Eksplorasi Pesona Nusantara</h1>
            <p>Temukan surga wisata tersembunyi dan wujudkan liburan impianmu sekarang.</p>
            <a href="#destinasi" class="btn-explore">Mulai Petualangan</a>
        </div>
    </header>

    <div class="container">
        <section class="daftar-wisata" id="destinasi">
            <div class="section-title">
                <h2>Rekomendasi Destinasi</h2>
                <p>Pilihan terbaik untuk petualangan alam dan budaya Anda selanjutnya.</p>
            </div>

            <div class="twitch-slider-container">
                <button class="slider-btn left-btn" onclick="geserTwitch(-1)">&#10094;</button>

                <div class="twitch-track" id="twitchTrack">
                    
                    <article class="wisata-card">
                        <div class="img-wrapper">
                            <img src="Borobudur.jpg" alt="Candi Borobudur">
                        </div>
                        <div class="card-content">
                            <h3>Candi Borobudur</h3>
                            <p>Situs warisan dunia dengan pesona arsitektur kuno dan lanskap hijau di Magelang.</p>
                        </div>
                    </article>

                    <article class="wisata-card">
                        <div class="img-wrapper">
                            <img src="pantaikuta.jpg" alt="Pantai Kuta">
                        </div>
                        <div class="card-content">
                            <h3>Pantai Kuta, Bali</h3>
                            <p>Nikmati deburan ombak dan keindahan matahari terbenam di pantai paling ikonik di Bali.</p>
                        </div>
                    </article>

                    <article class="wisata-card">
                        <div class="img-wrapper">
                            <img src="rajaampat.jpg" alt="Raja Ampat">
                        </div>
                        <div class="card-content">
                            <h3>Raja Ampat, Papua</h3>
                            <p>Gugusan pulau karang eksotis dengan kekayaan biota laut yang tak tertandingi.</p>
                        </div>
                    </article>

                    <article class="wisata-card">
                        <div class="img-wrapper">
                            <img src="gunungbromo.jpg" alt="Gunung Bromo">
                        </div>
                        <div class="card-content">
                            <h3>Gunung Bromo, Jatim</h3>
                            <p>Saksikan pemandangan matahari terbit yang magis di lanskap vulkanik paling spektakuler.</p>
                        </div>
                    </article>

                    <article class="wisata-card">
                        <div class="img-wrapper">
                            <img src="pulaukomodo.jpg" alt="Taman Nasional Komodo">
                        </div>
                        <div class="card-content">
                            <h3>Pulau Komodo, NTT</h3>
                            <p>Habitat asli kadal raksasa prasejarah dengan perbukitan savana dan pantai merah jambu.</p>
                        </div>
                    </article>

                    <article class="wisata-card">
                        <div class="img-wrapper">
                            <img src="danautoba.jpg" alt="Danau Toba">
                        </div>
                        <div class="card-content">
                            <h3>Danau Toba, Sumut</h3>
                            <p>Danau vulkanik terbesar di dunia dengan keindahan Pulau Samosir di tengah-tengahnya.</p>
                        </div>
                    </article>

                </div>

                <button class="slider-btn right-btn" onclick="geserTwitch(1)">&#10095;</button>
            </div>
        </section>

        </div>
<section class="keunggulan" id="keunggulan">
            <div class="section-title">
                <h2>Layanan Kami</h2>
                <p>Nikmati kemudahan eksplorasi wisata bersama NusaGo.</p>
            </div>
            <div class="keunggulan-grid">
                <div class="keunggulan-card">
                    <div class="icon">🌍</div>
                    <h3>Jelajah Bebas</h3>
                    <p>Temukan destinasi tersembunyi di seluruh pelosok negeri.</p>
                </div>
                <div class="keunggulan-card">
                    <div class="icon">🛡️</div>
                    <h3>Aman & Terpercaya</h3>
                    <p>Informasi valid dan panduan lengkap untuk liburanmu.</p>
                </div>
                <div class="keunggulan-card">
                    <div class="icon">💡</div>
                    <h3>Rekomendasi Cerdas</h3>
                    <p>Dapatkan saran wisata sesuai dengan minat dan gayamu.</p>
                </div>
            </div>
        </section>

        <section class="testimoni" id="testimoni">
            <div class="section-title">
                <h2>Ulasan Wisatawan</h2>
                <p>Apa kata mereka yang sudah menjelajah bersama kami?</p>
            </div>
            <div class="testimoni-grid">
                <div class="testimoni-card">
                    <p class="quote">"Liburan ke Bromo jadi lebih gampang berkat info dari NusaGo. Keren banget webnya!"</p>
                    <div class="user-info">
                        <h4>Budi Santoso</h4>
                        <span>Traveler Enthusiast</span>
                    </div>
                </div>
                <div class="testimoni-card">
                    <p class="quote">"Rekomendasi Raja Ampat-nya pas banget. Interface webnya juga enak dilihat."</p>
                    <div class="user-info">
                        <h4>Siti Aminah</h4>
                        <span>Nature Lover</span>
                    </div>
                </div>
            </div>
        </section>

        <section class="form-section" id="buku-tamu">
            <div class="form-container">
                <h2>Buku Tamu</h2>
                <p>Tinggalkan jejak kunjunganmu di website NusaGo!</p>
                <form id="wisataForm" onsubmit="event.preventDefault(); sambutWisatawan();">
                    <div class="input-group">
                        <input type="text" id="nama_input" placeholder="Masukkan nama Anda..." required>
                        <button type="submit">Kirim Jejak</button>
                    </div>
                </form>
            </div>
        </section>
        
    <footer class="footer">
        <p>&copy; 2026 NusaGo (Sistem Informasi Destinasi Wisata). Praktikum Pemrograman Web.</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>