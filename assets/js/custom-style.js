document.addEventListener("DOMContentLoaded", function() {
    // Ambil elemen gambar profile
    var profileImage = document.getElementById('profileImage');
    
    // Ambil nilai data-attribute judul
    var judul = profileImage.getAttribute('data-judul');
    
    // Cek nilai data-attribute judul dan ubah border jika sesuai
    if (judul === 'Profil Saya') {
        profileImage.style.border = '2px solid blue';
    }

    // Ambil elemen ikon keranjang
    var cartIcon = document.getElementById('cartIcon');
    
    // Ambil nilai data-attribute judul
    var judul = cartIcon.getAttribute('data-judul');
    
    // Cek nilai data-attribute judul dan ubah color jika sesuai
    if (judul === 'Data Keranjang Obat') {
        cartIcon.style.color = '#0463FA';
    }
});