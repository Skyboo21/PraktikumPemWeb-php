// ================= TWITCH CAROUSEL LOGIC =================
let indexTwitch = 0;

function updateTwitchCarousel() {
    const cards = document.querySelectorAll('.wisata-card');
    if(cards.length === 0) return; 
    
    const totalCards = cards.length;
    cards.forEach(card => card.classList.remove('active', 'prev', 'next'));

    let center = indexTwitch;
    let left = (indexTwitch - 1 + totalCards) % totalCards;
    let right = (indexTwitch + 1) % totalCards;

    cards[center].classList.add('active');
    cards[left].classList.add('prev');
    cards[right].classList.add('next');
}

function geserTwitch(arah) {
    const cards = document.querySelectorAll('.wisata-card');
    indexTwitch += arah;
    if (indexTwitch < 0) indexTwitch = cards.length - 1;
    else if (indexTwitch >= cards.length) indexTwitch = 0;
    updateTwitchCarousel();
}

// ================= FORM LOGIC (SYARAT PRAKTIKUM) =================
function sambutWisatawan() {
    var elemenInput = document.getElementById("nama_input");
    var namaWisatawan = elemenInput.value.trim();

    if (namaWisatawan === "") {
        alert("Oops! Mohon masukkan nama Anda terlebih dahulu.");
        elemenInput.focus(); 
        return; 
    }
    var verifikasi = confirm("Kirim data atas nama:\n" + namaWisatawan + "?");
    if (verifikasi === true) {
        alert("Terima kasih Kak " + namaWisatawan + ", data tersimpan.");
        document.getElementById("wisataForm").reset(); 
    }
}

// --- SISTEM AUTENTIKASI FRONTEND ---
document.addEventListener("DOMContentLoaded", async () => {
    // Jalankan animasi gambar destinasi
    updateTwitchCarousel();

    const userMenuArea = document.getElementById('user-menu-area');
    if(userMenuArea) {
        try {
            // Cek apakah ada user yang sedang login
            const response = await fetch('api/cek_session.php');
            const data = await response.json();

            if (data.status === 'logged_in') {
                let menuHTML = '';
                if (data.role === 'admin') {
                    menuHTML = `<li><a href="admin_dashboard.php" class="btn-user">🛡️ Panel Admin</a></li>`;
                } else {
                    menuHTML = `<li><a href="dashboard.php" class="btn-user">👤 Halo, ${data.nama}</a></li>`;
                }
                menuHTML += `<li><a href="login.php?logout=true" style="background-color: #ef4444; color: white; padding: 8px 15px; border-radius: 5px; text-decoration: none; font-weight: bold; margin-left: 10px;">Logout</a></li>`;
                userMenuArea.innerHTML = menuHTML;
            } else {
                // Jika belum login, tampilkan tombol Masuk
                userMenuArea.innerHTML = `<li><a href="login.php" class="btn-login">Masuk</a></li>`;
            }
        } catch (error) {
            console.error("Gagal terhubung ke API:", error);
            // Tetap tampilkan tombol Masuk walau terjadi error API
            userMenuArea.innerHTML = `<li><a href="login.php" class="btn-login">Masuk</a></li>`;
        }
    }
});