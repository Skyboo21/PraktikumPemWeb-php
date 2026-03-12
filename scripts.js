// ================= TWITCH CAROUSEL LOGIC =================
let indexTwitch = 0;

function updateTwitchCarousel() {
    const cards = document.querySelectorAll('.wisata-card');
    if(cards.length === 0) return; // Mencegah error jika kartu tidak ditemukan
    
    const totalCards = cards.length;

    // Bersihkan semua class
    cards.forEach(card => {
        card.classList.remove('active', 'prev', 'next');
    });

    // Tentukan urutan
    let center = indexTwitch;
    let left = (indexTwitch - 1 + totalCards) % totalCards;
    let right = (indexTwitch + 1) % totalCards;

    // Berikan class
    cards[center].classList.add('active');
    cards[left].classList.add('prev');
    cards[right].classList.add('next');
}

function geserTwitch(arah) {
    const cards = document.querySelectorAll('.wisata-card');
    indexTwitch += arah;
    
    // Looping batas index       
    if (indexTwitch < 0) {
        indexTwitch = cards.length - 1;
    } else if (indexTwitch >= cards.length) {
        indexTwitch = 0;
    }
    
    updateTwitchCarousel();
}

// Menjalankan animasi slider dan cek login saat web pertama kali dibuka
document.addEventListener('DOMContentLoaded', function() {
    updateTwitchCarousel();
    cekStatusLogin(); // Panggil fungsi cek login
});

// ================= FITUR LOGIN (LOCALSTORAGE) =================
function cekStatusLogin() {
    // Mengecek apakah ada nama user yang tersimpan di memori browser
    var userName = localStorage.getItem("userName");
    var navLogin = document.getElementById("nav-login");
    var navUser = document.getElementById("nav-user");
    var teksNamaUser = document.getElementById("teks-nama-user");

    if (userName) {
        // Jika sudah login: Sembunyikan tombol "Masuk", tampilkan Nama
        if(navLogin) navLogin.style.display = "none";
        if(navUser) {
            navUser.style.display = "inline-block";
            teksNamaUser.innerHTML = "👤 " + userName;
        }
    } else {
        // Jika belum login: Tampilkan tombol "Masuk", sembunyikan Nama
        if(navLogin) navLogin.style.display = "inline-block";
        if(navUser) navUser.style.display = "none";
    }
}

// ================= FORM LOGIC (SYARAT PRAKTIKUM) =================
function sambutWisatawan() {
    var elemenInput = document.getElementById("nama_input");
    var namaWisatawan = elemenInput.value.trim();

    if (namaWisatawan === "") {
        alert("Oops! Mohon masukkan nama Anda terlebih dahulu sebelum mengirim jejak.");
        elemenInput.focus(); 
        return; 
    }

    var verifikasi = confirm("Apakah Anda yakin ingin mengirim data kunjungan atas nama:\n" + namaWisatawan + "?");

    if (verifikasi === true) {
        alert("Sip! Terima kasih Kak " + namaWisatawan + ", data kunjungan Anda berhasil diverifikasi dan disimpan.");
        document.getElementById("wisataForm").reset(); 
    } else {
        alert("Pengiriman data dibatalkan. Silakan periksa kembali nama Anda jika ada yang salah ketik.");
        elemenInput.focus();
    }
}