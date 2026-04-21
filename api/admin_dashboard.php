<?php
session_start();
require 'koneksi.php';

// 1. KEAMANAN
if(!isset($_SESSION['user_nama']) || $_SESSION['role'] != 'admin') {
    echo "<script>alert('Akses Ditolak!'); window.location.href='index.php';</script>";
    exit;
}

// 2. LOGIKA CRUD (USER & ADMIN)
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    mysqli_query($conn, "DELETE FROM users WHERE id='$id'");
    header("Location: admin_dashboard.php?page=kelola_user");
    exit;
}

if (isset($_POST['update_user'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    mysqli_query($conn, "UPDATE users SET nama='$nama', email='$email', role='$role' WHERE id='$id'");
    echo "<script>alert('Data Berhasil Diperbarui!'); window.location.href='admin_dashboard.php?page=kelola_user';</script>";
    exit;
}

// 3. LOGIKA CRUD DESTINASI
if (isset($_GET['action']) && $_GET['action'] == 'delete_dest' && isset($_GET['id'])) {
    $id = $_GET['id'];
    mysqli_query($conn, "DELETE FROM destinasi WHERE id='$id'");
    header("Location: admin_dashboard.php?page=kelola_destinasi");
    exit;
}

if (isset($_POST['tambah_destinasi'])) {
    $nama = $_POST['nama_wisata'];
    $lokasi = $_POST['lokasi'];
    $deskripsi = $_POST['deskripsi'];
    $gambar = $_POST['gambar'];
    mysqli_query($conn, "INSERT INTO destinasi (nama_wisata, lokasi, deskripsi, gambar) VALUES ('$nama', '$lokasi', '$deskripsi', '$gambar')");
    header("Location: admin_dashboard.php?page=kelola_destinasi");
    exit;
}

$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Panel Admin - NusaGo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-50 flex h-screen font-sans">

    <aside class="w-64 bg-[#0a192f] text-white flex flex-col shadow-2xl">
        <div class="p-6 text-center text-2xl font-black border-b border-gray-700">Admin<span class="text-blue-500">Panel</span></div>
        <nav class="flex-1 p-4 space-y-2">
            <a href="?page=dashboard" class="block px-4 py-2 rounded <?= $page == 'dashboard' ? 'bg-blue-600' : 'hover:bg-gray-700' ?>">🏠 Dashboard</a>
            <a href="?page=kelola_user" class="block px-4 py-2 rounded <?= ($page == 'kelola_user' || $page == 'edit_user') ? 'bg-blue-600' : 'hover:bg-gray-700' ?>">👥 Kelola User</a>
            <a href="?page=kelola_destinasi" class="block px-4 py-2 rounded <?= ($page == 'kelola_destinasi' || $page == 'add_dest') ? 'bg-blue-600' : 'hover:bg-gray-700' ?>">🌴 Kelola Destinasi</a>
        </nav>
        <div class="p-4 border-t border-gray-700">
            <a href="index.php" class="block text-center bg-green-600 mb-2 py-2 rounded font-bold text-xs">Ke Website</a>
            <a href="index.php?logout=true" class="block text-center bg-red-500 py-2 rounded font-bold text-xs">Logout</a>
        </div>
    </aside>

    <main class="flex-1 p-8 overflow-y-auto">
        
        <?php if($page == 'dashboard'): ?>
            <h1 class="text-3xl font-bold mb-6">Ringkasan Sistem</h1>
            <div class="grid grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-lg shadow border-t-4 border-blue-500">
                    <h3 class="text-gray-500 text-sm">Total User</h3>
                    <p class="text-3xl font-bold"><?php $q = mysqli_query($conn, "SELECT COUNT(*) as t FROM users WHERE role='user'"); $d = mysqli_fetch_assoc($q); echo $d['t']; ?></p>
                </div>
                <div class="mt-8 bg-white p-6 rounded-lg shadow border-t-4 border-yellow-500">
                <h3 class="text-xl font-bold mb-4">Statistik Kunjungan Wisatawan Mancanegara (Januari 2026)</h3>
                <canvas id="wisataChart" width="400" height="150"></canvas>
            </div>
                <div class="bg-white p-6 rounded-lg shadow border-t-4 border-green-500">
                    <h3 class="text-gray-500 text-sm">Destinasi</h3>
                    <p class="text-3xl font-bold"><?php $q = mysqli_query($conn, "SELECT COUNT(*) as t FROM destinasi"); $d = mysqli_fetch_assoc($q); echo $d['t'] ?? 0; ?></p>
                </div>
            </div>

        <?php elseif($page == 'kelola_user'): ?>
            <h1 class="text-3xl font-bold mb-6">Kelola Pengguna</h1>
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <table class="w-full text-left">
                    <thead class="bg-gray-100 border-b">
                        <tr><th class="p-4">Nama</th><th class="p-4">Email</th><th class="p-4">Role</th><th class="p-4 text-center">Aksi</th></tr>
                    </thead>
                    <tbody>
                        <?php $res = mysqli_query($conn, "SELECT * FROM users"); while($row = mysqli_fetch_assoc($res)): ?>
                        <tr class="border-b">
                            <td class="p-4"><?= $row['nama'] ?></td>
                            <td class="p-4"><?= $row['email'] ?></td>
                            <td class="p-4"><span class="px-2 py-1 rounded text-xs <?= $row['role']=='admin' ? 'bg-purple-100 text-purple-700' : 'bg-blue-100 text-blue-700' ?>"><?= $row['role'] ?></span></td>
                            <td class="p-4 text-center">
                                <a href="?page=edit_user&id=<?= $row['id'] ?>" class="text-blue-500 mr-2">Edit</a>
                                <a href="?page=kelola_user&action=delete&id=<?= $row['id'] ?>" class="text-red-500" onclick="return confirm('Hapus?')">Hapus</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>

        <?php elseif($page == 'edit_user'): ?>
            <?php $id=$_GET['id']; $q=mysqli_query($conn,"SELECT * FROM users WHERE id='$id'"); $d=mysqli_fetch_assoc($q); ?>
            <h1 class="text-3xl font-bold mb-6">Edit User</h1>
            <form action="" method="POST" class="bg-white p-6 rounded shadow max-w-lg">
                <input type="hidden" name="id" value="<?= $d['id'] ?>">
                <div class="mb-4"><label class="block font-bold">Nama</label><input type="text" name="nama" value="<?= $d['nama'] ?>" class="w-full border p-2 rounded"></div>
                <div class="mb-4"><label class="block font-bold">Email</label><input type="email" name="email" value="<?= $d['email'] ?>" class="w-full border p-2 rounded"></div>
                <div class="mb-4"><label class="block font-bold">Role</label><select name="role" class="w-full border p-2 rounded"><option value="user" <?= $d['role']=='user'?'selected':'' ?>>User</option><option value="admin" <?= $d['role']=='admin'?'selected':'' ?>>Admin</option></select></div>
                <button type="submit" name="update_user" class="bg-blue-600 text-white px-4 py-2 rounded font-bold">Simpan</button>
            </form>

        <?php elseif($page == 'kelola_destinasi'): ?>
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold">Kelola Destinasi</h1>
                <a href="?page=add_dest" class="bg-green-600 text-white px-4 py-2 rounded font-bold">+ Tambah</a>
            </div>
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <table class="w-full text-left">
                    <thead class="bg-gray-100 border-b">
                        <tr><th class="p-4">Nama Wisata</th><th class="p-4">Lokasi</th><th class="p-4 text-center">Aksi</th></tr>
                    </thead>
                    <tbody>
                        <?php $res = mysqli_query($conn, "SELECT * FROM destinasi"); while($row = mysqli_fetch_assoc($res)): ?>
                        <tr class="border-b">
                            <td class="p-4 font-bold"><?= $row['nama_wisata'] ?></td>
                            <td class="p-4"><?= $row['lokasi'] ?></td>
                            <td class="p-4 text-center">
                                <a href="?page=kelola_destinasi&action=delete_dest&id=<?= $row['id'] ?>" class="text-red-500" onclick="return confirm('Hapus?')">Hapus</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>

        <?php elseif($page == 'add_dest'): ?>
            <h1 class="text-3xl font-bold mb-6">Tambah Destinasi</h1>
            <form action="" method="POST" class="bg-white p-6 rounded shadow max-w-lg">
                <div class="mb-4"><label class="block font-bold">Nama Wisata</label><input type="text" name="nama_wisata" required class="w-full border p-2 rounded"></div>
                <div class="mb-4"><label class="block font-bold">Lokasi</label><input type="text" name="lokasi" required class="w-full border p-2 rounded"></div>
                <div class="mb-4"><label class="block font-bold">Deskripsi</label><textarea name="deskripsi" class="w-full border p-2 rounded"></textarea></div>
                <div class="mb-4"><label class="block font-bold">Nama File Gambar (Contoh: bromo.jpg)</label><input type="text" name="gambar" required class="w-full border p-2 rounded"></div>
                <button type="submit" name="tambah_destinasi" class="bg-blue-600 text-white px-4 py-2 rounded font-bold">Simpan</button>
            </form>
        <?php endif; ?>
        
    </main>
<script>
    <?php if($page == 'dashboard'): ?>
    // Mengambil data JSON dari api.php
    fetch('api.php')
        .then(response => response.json())
        .then(data => {
            // Kita ambil 5 bandara kedatangan utama saja agar grafik tidak terlalu padat
            // (2: Ngurah Rai, 3: Soetta, 4: Juanda, 5: Kualanamu, 6: Husein S)
            const pintuUtama = [2, 3, 4, 5, 6]; 
            const labelsBandara = [];
            const dataKunjungan = [];

            // Memisahkan label dan jumlah kunjungan
            data.vervar.forEach(item => {
                if(pintuUtama.includes(item.val)) {
                    labelsBandara.push(item.label.replace(/(<([^>]+)>)/gi, "")); // Bersihkan tag HTML
                    
                    // Membuat struktur kunci untuk mencari data (format BPS: [id_vervar]115001261)
                    const kodeBPS = item.val + "115001261"; 
                    
                    // Memasukkan angka ke dalam array
                    const jumlah = data.datacontent[kodeBPS] ? data.datacontent[kodeBPS] : 0;
                    dataKunjungan.push(jumlah);
                }
            });

            // Menggambar grafik dengan Chart.js
            const ctx = document.getElementById('wisataChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar', // Tipe grafik batang
                data: {
                    labels: labelsBandara,
                    datasets: [{
                        label: 'Jumlah Kunjungan Wisman',
                        data: dataKunjungan,
                        backgroundColor: 'rgba(59, 130, 246, 0.7)', // Warna biru Tailwind
                        borderColor: 'rgba(29, 78, 216, 1)',
                        borderWidth: 1,
                        borderRadius: 4
                    }]
                },
                options: {
                    responsive: true,
                    scales: { y: { beginAtZero: true } }
                }
            });
        })
        .catch(error => console.error('Ups, gagal memuat data:', error));
    <?php endif; ?>
    </script>
</body>
</html>