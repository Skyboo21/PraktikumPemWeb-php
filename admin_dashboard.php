<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <title>Panel Admin - NusaGo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-50 flex flex-col md:flex-row h-screen font-sans">

    <aside class="w-full md:w-64 bg-[#0a192f] text-white flex flex-col shadow-2xl flex-shrink-0">
        <div class="p-4 flex justify-between items-center border-b border-gray-700">
            <div class="text-xl md:text-2xl font-black">Admin<span class="text-blue-500">Panel</span></div>
            <div class="md:hidden flex gap-2">
                <a href="index.html" class="bg-green-600 px-3 py-1 rounded font-bold text-sm">Web</a>
                <a href="login.php?logout=true" class="bg-red-500 px-3 py-1 rounded font-bold text-sm">Logout</a>
            </div>
        </div>
        <nav class="flex md:flex-col overflow-x-auto p-2 md:p-4 gap-2 whitespace-nowrap">
            <a href="?page=dashboard" class="block px-4 py-2 rounded <?= $page == 'dashboard' ? 'bg-blue-600' : 'hover:bg-gray-700' ?>">🏠 Dashboard</a>
            <a href="?page=kelola_user" class="block px-4 py-2 rounded <?= ($page == 'kelola_user' || $page == 'edit_user') ? 'bg-blue-600' : 'hover:bg-gray-700' ?>">👥 Kelola User</a>
        </nav>
        <div class="hidden md:block p-4 border-t border-gray-700 text-sm mt-auto">
            <p class="mb-2 text-gray-400 italic">Login sebagai: <b><?= $_COOKIE['user_nama'] ?></b></p>
            <a href="index.html" class="block text-center bg-green-600 mb-2 py-2 rounded font-bold">Ke Website</a>
            <a href="login.php?logout=true" class="block text-center bg-red-500 py-2 rounded font-bold">Logout</a>
        </div>
    </aside>

    <main class="flex-1 p-4 md:p-8 overflow-y-auto">
        <?php if($page == 'dashboard'): ?>
            <h1 class="text-2xl md:text-3xl font-bold mb-6 text-gray-800">Ringkasan Sistem</h1>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6 mb-8">
                <div class="bg-white p-6 rounded-lg shadow border-t-4 border-blue-500">
                    <h3 class="text-gray-500 text-sm uppercase font-bold">Total Wisatawan</h3>
                    <p class="text-4xl font-black text-gray-800">
                        <?php 
                        $q = mysqli_query($conn, "SELECT COUNT(*) as t FROM users WHERE LOWER(role)='user'");
                        $d = mysqli_fetch_assoc($q);
                        echo $d['t'] ?? 0; 
                        ?>
                    </p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow border-t-4 border-purple-500">
                    <h3 class="text-gray-500 text-sm uppercase font-bold">Total Admin</h3>
                    <p class="text-4xl font-black text-gray-800">
                        <?php 
                        $q = mysqli_query($conn, "SELECT COUNT(*) as t FROM users WHERE LOWER(role)='admin'");
                        $d = mysqli_fetch_assoc($q);
                        echo $d['t'] ?? 0; 
                        ?>
                    </p>
                </div>
            </div>

            <div class="bg-white p-4 md:p-6 rounded-lg shadow border-t-4 border-yellow-500">
                <h3 class="text-lg md:text-xl font-bold mb-4">Statistik Kunjungan Wisatawan Mancanegara (API BPS)</h3>
                <div class="h-[250px] md:h-[300px]">
                    <canvas id="wisataChart"></canvas>
                </div>
            </div>

        <?php elseif($page == 'kelola_user'): ?>
            <h1 class="text-2xl md:text-3xl font-bold mb-6 text-gray-800">Daftar Pengguna</h1>
            <div class="bg-white rounded-lg shadow overflow-x-auto">
                <table class="w-full text-left min-w-[600px]">
                    <thead class="bg-gray-100 border-b">
                        <tr><th class="p-4">Nama</th><th class="p-4">Email</th><th class="p-4">Role</th><th class="p-4 text-center">Aksi</th></tr>
                    </thead>
                    <tbody>
                        <?php 
                        $res = mysqli_query($conn, "SELECT * FROM users ORDER BY role ASC"); 
                        while($row = mysqli_fetch_assoc($res)): 
                        ?>
                        <tr class="border-b hover:bg-gray-50 transition">
                            <td class="p-4 font-medium"><?= $row['nama'] ?></td>
                            <td class="p-4"><?= $row['email'] ?></td>
                            <td class="p-4">
                                <span class="px-2 py-1 rounded text-xs font-bold <?= strtolower($row['role'])=='admin' ? 'bg-purple-100 text-purple-700' : 'bg-blue-100 text-blue-700' ?>">
                                    <?= strtoupper($row['role']) ?>
                                </span>
                            </td>
                            <td class="p-4 text-center">
                                <a href="?page=edit_user&id=<?= $row['id'] ?>" class="text-blue-600 font-bold hover:underline mr-3">Edit</a>
                                <a href="?page=kelola_user&action=delete&id=<?= $row['id'] ?>" class="text-red-500 font-bold hover:underline" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>

        <?php elseif($page == 'edit_user'): ?>
            <?php 
            $id = $_GET['id']; 
            $q = mysqli_query($conn, "SELECT * FROM users WHERE id='$id'"); 
            $d = mysqli_fetch_assoc($q); 
            ?>
            <h1 class="text-2xl md:text-3xl font-bold mb-6 text-gray-800">Edit Data Pengguna</h1>
            <form action="" method="POST" class="bg-white p-6 md:p-8 rounded-lg shadow max-w-lg border-t-4 border-blue-600">
                <input type="hidden" name="id" value="<?= $d['id'] ?>">
                <div class="mb-4">
                    <label class="block font-bold mb-1">Nama Lengkap</label>
                    <input type="text" name="nama" value="<?= $d['nama'] ?>" required class="w-full border p-2.5 rounded-lg focus:ring-2 focus:ring-blue-400 outline-none">
                </div>
                <div class="mb-4">
                    <label class="block font-bold mb-1">Alamat Email</label>
                    <input type="email" name="email" value="<?= $d['email'] ?>" required class="w-full border p-2.5 rounded-lg focus:ring-2 focus:ring-blue-400 outline-none">
                </div>
                <div class="mb-6">
                    <label class="block font-bold mb-1">Hak Akses (Role)</label>
                    <select name="role" class="w-full border p-2.5 rounded-lg bg-gray-50 outline-none">
                        <option value="user" <?= strtolower($d['role'])=='user' ? 'selected' : '' ?>>User (Wisatawan)</option>
                        <option value="admin" <?= strtolower($d['role'])=='admin' ? 'selected' : '' ?>>Admin (Pengelola)</option>
                    </select>
                </div>
                <div class="flex flex-col md:flex-row gap-3">
                    <button type="submit" name="update_user" class="bg-blue-600 text-white px-6 py-2.5 rounded-lg font-bold hover:bg-blue-700 shadow-md transition text-center">Simpan</button>
                    <a href="?page=kelola_user" class="bg-gray-200 text-gray-700 px-6 py-2.5 rounded-lg font-bold hover:bg-gray-300 transition text-center">Batal</a>
                </div>
            </form>
        <?php endif; ?>
    </main>

    <script>
    <?php if($page == 'dashboard'): ?>
    fetch('data_bps.php')
        .then(response => response.json())
        .then(data => {
            const pintuUtama = [2, 3, 4, 5, 6]; 
            const labelsBandara = [];
            const dataKunjungan = [];

            if(data && data.vervar) {
                data.vervar.forEach(item => {
                    const valAngka = parseInt(item.val);
                    if(pintuUtama.includes(valAngka)) {
                        labelsBandara.push(item.label.replace(/(<([^>]+)>)/gi, ""));
                        const kodeBPS = item.val + "115001261"; 
                        const jumlah = data.datacontent[kodeBPS] ? data.datacontent[kodeBPS] : 0;
                        dataKunjungan.push(jumlah);
                    }
                });

                const ctx = document.getElementById('wisataChart').getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labelsBandara,
                        datasets: [{
                            label: 'Jumlah Kunjungan Wisman',
                            data: dataKunjungan,
                            backgroundColor: 'rgba(59, 130, 246, 0.7)',
                            borderColor: 'rgba(29, 78, 216, 1)',
                            borderWidth: 2,
                            borderRadius: 5
                        }]
                    },
                    options: { 
                        maintainAspectRatio: false,
                        responsive: true, 
                        scales: { y: { beginAtZero: true } } 
                    }
                });
            }
        })
        .catch(error => console.error('Gagal memuat grafik:', error));
    <?php endif; ?>
    </script>
</body>
</html>