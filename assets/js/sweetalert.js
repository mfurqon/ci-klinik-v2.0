document.addEventListener("DOMContentLoaded", () => {
    const form = document.querySelector("form");
    const button = document.getElementById("buat-janji-temu");

    if (form && button) {
        button.addEventListener("click", function (event) {
            event.preventDefault(); // Mencegah pengiriman form langsung
            Swal.fire({
                title: "Apakah Anda yakin?",
                text: "Apakah Anda yakin ingin buat janji temu?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, buat!",
                cancelButtonText: "Batal",
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // Kirim form jika pengguna menekan "Ya"
                }
            });
        });
    }
});
