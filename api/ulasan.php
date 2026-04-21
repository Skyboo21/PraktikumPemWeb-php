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
    <title>Ulasan - NusaGo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="background-color: #f4f7f6; margin: 0; padding: 0; display: flex; flex-direction: column; min-height: 100vh;">

   <nav class="navbar">
        <a href="index.php" class="nav-logo">Nusa<span>Go</span></a>
        <ul class="nav-links">
            <li><a href="index.php">Beranda</a></li>
            <li><a href="destinasi.php">Destinasi</a></li>
            <li><a href="layanan.php">Layanan</a></li> 
            <li><a href="ulasan.php" style="color: #ffffff; border-bottom: 2px solid #0056b3;">Ulasan</a></li> 
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

    <main style="flex: 1; padding-top: 130px; padding-bottom: 80px;">
        <section style="max-width: 1000px; margin: 0 auto; padding: 0 20px;">
            <div style="text-align: center; margin-bottom: 50px;">
                <h2 style="font-size: 2.5rem; color: #0a192f; margin-bottom: 10px; margin-top:0;">Ulasan Wisatawan</h2>
                <p style="color: #6b7280; font-size: 1.1rem;">Apa kata mereka yang sudah menjelajah pesona nusantara bersama kami?</p>
            </div>
            
            <div style="display: flex; justify-content: center; gap: 30px; flex-wrap: wrap; margin-bottom: 80px;">
                <div style="background: white; padding: 40px; border-radius: 15px; box-shadow: 0 10px 20px rgba(0,0,0,0.05); width: 400px; position: relative;">
                    <div style="font-size: 4rem; color: #e5e7eb; position: absolute; top: 10px; left: 20px; font-family: serif;">"</div>
                    <p style="font-style: italic; color: #4b5563; margin-bottom: 25px; font-size: 1.1rem; position: relative; z-index: 1;">Liburan ke Bromo jadi lebih gampang berkat info dari NusaGo. Sangat membantu untuk yang baru pertama kali ke sana. Keren banget webnya!</p>
                    <div style="border-top: 2px solid #f3f4f6; padding-top: 20px; display: flex; align-items: center; gap: 15px;">
                        <div style="width: 50px; height: 50px; border-radius: 50%; background-color: #0056b3; color: white; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 1.2rem;">BS</div>
                        <div>
                            <h4 style="color: #0a192f; margin: 0; font-size: 1.1rem;">Budi Santoso</h4>
                            <span style="font-size: 0.9rem; color: #f59e0b;">⭐⭐⭐⭐⭐</span>
                        </div>
                    </div>
                </div>

                <div style="background: white; padding: 40px; border-radius: 15px; box-shadow: 0 10px 20px rgba(0,0,0,0.05); width: 400px; position: relative;">
                    <div style="font-size: 4rem; color: #e5e7eb; position: absolute; top: 10px; left: 20px; font-family: serif;">"</div>
                    <p style="font-style: italic; color: #4b5563; margin-bottom: 25px; font-size: 1.1rem; position: relative; z-index: 1;">Rekomendasi Raja Ampat-nya pas banget. Interface webnya juga enak dilihat dan tidak membingungkan. Sangat direkomendasikan!</p>
                    <div style="border-top: 2px solid #f3f4f6; padding-top: 20px; display: flex; align-items: center; gap: 15px;">
                        <div style="width: 50px; height: 50px; border-radius: 50%; background-color: #ffdd00; color: #0a192f; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 1.2rem;">SA</div>
                        <div>
                            <h4 style="color: #0a192f; margin: 0; font-size: 1.1rem;">Siti Aminah</h4>
                            <span style="font-size: 0.9rem; color: #f59e0b;">⭐⭐⭐⭐</span>
                        </div>
                    </div>
                </div>
            </div>

            <div style="background: white; padding: 40px; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.08); max-width: 650px; margin: 0 auto; border-top: 5px solid #0056b3;">
                <h3 style="color: #0a192f; margin-top: 0; margin-bottom: 10px; font-size: 1.8rem; text-align: center;">Bagikan Pengalamanmu!</h3>
                <p style="color: #6b7280; text-align: center; margin-bottom: 30px;">Tulis ulasanmu tentang destinasi yang sudah kamu kunjungi bersama NusaGo.</p>

                <form action="" method="POST" style="display: flex; flex-direction: column; gap: 20px;">
                    <div>
                        <label style="font-weight: bold; color: #0a192f; display: block; margin-bottom: 8px;">Nama Lengkap</label>
                        <input type="text" name="nama_reviewer" 
                               value="<?php echo isset($_SESSION['user_nama']) ? $_SESSION['user_nama'] : ''; ?>" 
                               placeholder="Masukkan nama kamu..." 
                               required 
                               style="width: 100%; padding: 12px 15px; border: 2px solid #e5e7eb; border-radius: 8px; font-size: 1rem; outline: none; transition: 0.3s; <?php echo isset($_SESSION['user_nama']) ? 'background-color: #f3f4f6; color: #6b7280;' : ''; ?>" 
                               <?php echo isset($_SESSION['user_nama']) ? 'readonly' : ''; ?>
                               onfocus="this.style.borderColor='#0056b3'" onblur="this.style.borderColor='#e5e7eb'">
                    </div>

                    <div>
                        <label style="font-weight: bold; color: #0a192f; display: block; margin-bottom: 8px;">Penilaian (Bintang)</label>
                        <select name="rating" required style="width: 100%; padding: 12px 15px; border: 2px solid #e5e7eb; border-radius: 8px; font-size: 1rem; outline: none; background: white; cursor: pointer;">
                            <option value="" disabled selected>-- Pilih Penilaian --</option>
                            <option value="5">⭐⭐⭐⭐⭐ (Sangat Puas)</option>
                            <option value="4">⭐⭐⭐⭐ (Puas)</option>
                            <option value="3">⭐⭐⭐ (Cukup)</option>
                            <option value="2">⭐⭐ (Kurang)</option>
                            <option value="1">⭐ (Kecewa)</option>
                        </select>
                    </div>

                    <div>
                        <label style="font-weight: bold; color: #0a192f; display: block; margin-bottom: 8px;">Ulasan Anda</label>
                        <textarea name="komentar" rows="4" placeholder="Ceritakan pengalaman liburan serumu di sini..." required style="width: 100%; padding: 12px 15px; border: 2px solid #e5e7eb; border-radius: 8px; font-size: 1rem; outline: none; transition: 0.3s; resize: vertical;" onfocus="this.style.borderColor='#0056b3'" onblur="this.style.borderColor='#e5e7eb'"></textarea>
                    </div>

                    <button type="submit" name="kirim_ulasan" style="margin-top: 10px; width: 100%; padding: 15px; background-color: #0056b3; color: white; border: none; border-radius: 8px; cursor: pointer; font-weight: bold; font-size: 1.1rem; transition: 0.3s; box-shadow: 0 4px 10px rgba(0, 86, 179, 0.3);" onmouseover="this.style.backgroundColor='#003d82'" onmouseout="this.style.backgroundColor='#0056b3'">Kirim Ulasan ✈️</button>
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