<div class="container p-5">
    <?php if (!empty($temp_pemesanan_obat)) : ?>
        <div class="card shadow col-lg-11 p-5">
            <div class="row">
                <div class="title">
                    <div class="row">
                        <div class="col">
                            <h4 class="h4 font-weigth-bold mb-3">Keranjang Obat</h4>
                        </div>
                        <!-- <div class="col align-self-center text-right text-muted">3 items</div> -->
                    </div>
                </div>
                <?php foreach ($temp_pemesanan_obat as $tpo) : ?>
                    <div class="row border-top">
                        <div class="row main align-items-center my-3">
                            <div class="col-2"><img class="img-fluid" src="<?= base_url('assets/img/upload-obat/' . $tpo['gambar_obat']); ?>"></div>
                            <div class="col">
                                <div class="row text-muted"><?= $tpo['nama_obat']; ?></div>
                            </div>
                            <div class="col">
                                <a href="javascript:void(0);" class="btn btn-outline-primary minus-btn" data-id="<?= $tpo['id']; ?>" data-stok="<?= $tpo['stok']; ?>"><i class="fa-solid fa-minus fa-2xs"></i></a>
                                <input type="text" class="border p-1 text-center quantity-input" data-id="<?= $tpo['id']; ?>" value="<?= $tpo['jumlah_obat']; ?>" style="width: 40px; height: 40px;" readonly>
                                <a href="javascript:void(0);" class="btn btn-outline-primary plus-btn" data-id="<?= $tpo['id']; ?>" data-stok="<?= $tpo['stok']; ?>"><i class="fa-solid fa-plus fa-2xs"></i></a>
                            </div>
                            <div class="col">Rp <?= number_format($tpo['harga_obat']); ?></div>
                            <div class="col"><a href="<?= base_url('keranjang/hapus/' . $tpo['id']); ?>" class="btn btn-warning"><i class="fa-solid fa-xmark fa-xs"></i></a></div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <div class="row justify-content-between">
                    <button class="btn btn-primary col-3 mt-4" onclick="window.history.go(-1)">
                        <i class="fa-solid fa-arrow-left-long"></i> Kembali
                    </button>
                    <a href="<?= base_url('checkout-obat'); ?>" class="btn btn-success col-3 mt-4"><i class="fa-solid fa-cart-shopping fa-sm"></i> Lanjutkan Bayar</a>
                </div>
            </div>

        </div>
    <?php else : ?>
        <div class="card shadow p-5 text-center">
            <h3 class="text-primary">Keranjang Anda Masih Kosong 😥</h3>
            <p class="lead">Silakan lanjutkan belanja dan tambahkan obat ke keranjang Anda.</p>
            <i class="fa-solid fa-cart-shopping fa-5x fa-beat-fade my-5 text-primary"></i>
            <a href="<?= base_url('obat'); ?>" class="btn btn-primary btn-lg">
                <i class="fa-solid fa-arrow-right"></i> Mulai Belanja
            </a>
        </div>
    <?php endif; ?>
</div>