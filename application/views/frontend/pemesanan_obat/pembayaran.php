<style>
    .payment-method-card,
    .delivery-method-card {
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .payment-method-card:hover,
    delivery-method-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .payment-method-card.selected,
    .delivery-method-card.selected {
        border-color: var(--bs-primary);
        background-color: rgba(13, 110, 253, 0.05);
    }

    .order-summary {
        background-color: #f8f9fa;
        border-radius: 1rem;
        padding: 1.5rem;
    }

    .divider {
        border-top: 1px dashed #dee2e6;
        margin: 1rem 0;
    }
</style>

<body class="bg-light">
    <form action="checkout-obat" method="post">

        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <!-- Header -->
                    <h2 class="text-center mb-4">Pembayaran Pemesanan Obat</h2>

                    <!-- Stepper -->
                    <div class="d-flex justify-content-center mb-5">
                        <div class="d-flex align-items-center">
                            <div class="d-flex align-items-center">
                                <span class="badge bg-primary rounded-circle">1</span>
                                <span class="ms-2">Keranjang</span>
                            </div>
                            <i class="fas fa-chevron-right mx-3"></i>
                            <div class="d-flex align-items-center">
                                <span class="badge bg-primary rounded-circle">2</span>
                                <span class="ms-2">Pembayaran</span>
                            </div>
                            <i class="fas fa-chevron-right mx-3"></i>
                            <div class="d-flex align-items-center">
                                <span class="badge bg-secondary rounded-circle">3</span>
                                <span class="ms-2">Selesai</span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Form Pembayaran -->
                        <div class="col-md-8">
                            <div class="card shadow-sm mb-4">
                                <div class="card-body">
                                    <h5 class="card-title h4 mb-4">Detail Pengiriman</h5>
                                    <div class="mb-3">
                                        <label class="form-label">Nama Lengkap</label>
                                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama lengkap" value="<?= $user['nama']; ?>">
                                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Nomor Telepon</label>
                                        <input type="tel" name="telepon" id="telepon" class="form-control" placeholder="Masukkan nomor telepon" value="<?= $user['telepon']; ?>">
                                        <?= form_error('telepon', '<small class="text-danger pl-3">', '</small>') ?>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Alamat Lengkap</label>
                                        <textarea class="form-control" rows="3" placeholder="Masukkan alamat lengkap" name="alamat" id="alamat"><?= $user['alamat']; ?></textarea>
                                        <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>') ?>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Catatan (Opsional)</label>
                                        <textarea class="form-control" rows="2" placeholder="Tambahkan catatan untuk pesanan" name="catatan" id="catatan"><?= set_value('catatan'); ?></textarea>
                                    </div>

                                    <h5 class="card-title h4 mt-4">Metode Pembelian</h5>
                                    <?= form_error('metode_pembelian', '<small class="text-danger pl-3">', '</small>') ?>
                                    <div class="row g-3">
                                        <div class="col-md-12">
                                            <label class="card delivery-method-card">
                                                <input type="radio" name="metode_pembelian" value="Delivery" hidden>
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <div>
                                                            <i class="fa-solid fa-truck me-2"></i>
                                                            <strong>Delivery</strong>
                                                        </div>
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="card delivery-method-card">
                                                <input type="radio" name="metode_pembelian" value="Pick-up" hidden>
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <div>
                                                            <i class="fa-solid fa-motorcycle me-2"></i>
                                                            <strong>Pick-up</strong>
                                                        </div>
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                    </div>


                                    <h5 class="card-title h4 mt-4">Metode Pembayaran</h5>
                                    <?= form_error('metode_pembayaran', '<small class="text-danger pl-3">', '</small>') ?>
                                    <div class="row g-3">
                                        <div class="section-header d-flex align-items-center mb-2">
                                            <i class="fas fa-university me-2"></i>
                                            <h5 class="mb-0">Transfer Bank</h5>
                                        </div>
                                        <?php foreach ($daftar_bank as $db) : ?>
                                            <div class="col-md-12">
                                                <label class="card payment-method-card">
                                                    <input type="radio" name="metode_pembayaran" value="<?= $db['nama_bank']; ?>" hidden>
                                                    <div class="card-body">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div>
                                                                <strong><?= $db['nama_bank']; ?></strong>
                                                                <div class="text-muted small">No. Rekening: <?= $db['no_rekening']; ?></div>
                                                            </div>
                                                            <img src="<?= base_url('assets/img/bank/' . $db['gambar']); ?>" alt="<?= $db['alt']; ?>" class="bank-logo" style="max-width: 100px;">
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                        <?php endforeach; ?>

                                        <div class="section-header d-flex align-items-center mb-2">
                                            <i class="fas fa-wallet me-2"></i>
                                            <h5 class="mb-0">E-wallet</h5>
                                        </div>
                                        <?php foreach ($daftar_ewallet as $de) : ?>
                                            <div class="col-md-12">
                                                <label class="card payment-method-card">
                                                <input type="radio" name="metode_pembayaran" value="<?= $de['nama_ewallet']; ?>" hidden>
                                                    <div class="card-body">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div>
                                                                <strong><?= $de['nama_ewallet']; ?></strong>
                                                            </div>
                                                            <img src="<?= base_url('assets/img/e-wallet/' . $de['gambar']); ?>" alt="Gopay Logo" class="ewallet-logo" style="max-width: 100px;">
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- Ringkasan Pesanan -->
                        <div class="col-md-4">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title mb-4">Ringkasan Pesanan</h5>

                                    <div class="order-summary">
                                        <?php
                                        $subtotal = 0;
                                        $biaya_admin = 1000;
                                        $biaya_pengiriman = 10000;
                                        $biaya_pickup = 0;
                                        $ppn = 0;

                                        foreach ($temp_pemesanan_obat as $tpo) :
                                            $harga = $tpo['harga_obat'] * $tpo['jumlah_obat'];
                                            $subtotal += $harga;
                                        ?>
                                            <div class="d-flex justify-content-between mb-2">
                                                <span><?= $tpo['nama_obat']; ?> (<?= $tpo['jumlah_obat']; ?>x)</span>
                                                <span>Rp <?= number_format($harga, 0, ',', '.'); ?></span>
                                            </div>
                                        <?php endforeach; ?>
                                        
                                        <?php
                                        // Menghitung PPN 12%
                                        $ppn = ($subtotal + $biaya_admin + $biaya_pickup) * .12;
                                        // Menghitung total akhir dengan menambahkan biaya tambahan dan PPN
                                        $total = $subtotal + $biaya_admin + $biaya_pickup + $ppn;
                                        ?>

                                        <div class="divider"></div>

                                        <div class="d-flex justify-content-between mb-2">
                                            <span>Subtotal</span>
                                            <span>Rp <?= number_format($subtotal, 0, ',', '.'); ?></span>
                                            <input type="hidden" name="subtotal" id="subtotal" value="<?= $subtotal; ?>">
                                        </div>
                                        <div class="d-flex justify-content-between mb-2">
                                            <span>Biaya Pengiriman</span>
                                            <span>Rp <span id="biaya-pengiriman"><?= number_format($biaya_pickup, 0, ',', '.'); ?></span></span>
                                            <input type="hidden" name="biaya_pengiriman" id="biaya_pengiriman" value="<?= $biaya_pickup; ?>">
                                        </div>
                                        <div class="d-flex justify-content-between mb-2">
                                            <span>Biaya Admin</span>
                                            <span>Rp <?= number_format($biaya_admin, 0, ',', '.'); ?></span>
                                            <input type="hidden" name="biaya_admin" id="biaya_admin" value="<?= $biaya_admin; ?>">
                                        </div>
                                        <div class="d-flex justify-content-between mb-2">
                                            <span>PPN 12%</span>
                                            <span>Rp <?= number_format($ppn, 0, ',', '.'); ?></span>
                                            <input type="hidden" name="ppn" id="ppn" value="<?= $ppn; ?>">
                                        </div>

                                        <div class="divider"></div>

                                        <div class="d-flex justify-content-between">
                                            <strong>Total</strong>
                                            <strong class="text-primary">Rp <span id="total"><?= number_format($total, 0, ',', '.'); ?></span></strong>
                                            <input type="hidden" name="total_harga" id="total_harga" value="<?= $total; ?>">
                                        </div>
                                    </div>

                                    <div class="mt-4">
                                        <button type="submit" class="btn btn-primary w-100 py-3">Bayar Sekarang</button>
                                        <button type="button" class="btn btn-outline-secondary w-100 mt-2" onclick="window.location.href='<?= base_url('keranjang'); ?>'">Kembali ke Keranjang</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>


    <script>
        // Toggle selected payment method
        document.querySelectorAll('.payment-method-card').forEach(card => {
            card.addEventListener('click', () => {
                document.querySelectorAll('.payment-method-card').forEach(c => {
                    c.classList.remove('selected');
                });
                card.classList.add('selected');
            });
        });

        // Toggle selected delivery method
        document.querySelectorAll('.delivery-method-card').forEach(card => {
            card.addEventListener('click', () => {
                document.querySelectorAll('.delivery-method-card').forEach(c => {
                    c.classList.remove('selected');
                });
                card.classList.add('selected');
            });
        });

        const subtotal = <?= $subtotal ?>;
        const biayaAdmin = <?= $biaya_admin ?>;
        const biayaPengiriman = <?= $biaya_pengiriman ?>;
        const biayaPickup = <?= $biaya_pickup ?>;
        const ppn = <?= $ppn ?>;

        document.querySelectorAll('input[name="metode_pembelian"]').forEach(input => {
            input.addEventListener('change', function() {
                let biaya = (this.value === 'Delivery') ? biayaPengiriman : biayaPickup;

                // Update biaya pengiriman
                document.getElementById('biaya-pengiriman').innerText = biaya.toLocaleString('id-ID');
                document.getElementById('biaya_pengiriman').value = biaya;

                // Hitung total
                let total = subtotal + biayaAdmin + biaya + ppn;
                document.getElementById('total').innerText = total.toLocaleString('id-ID');
                document.getElementById('total_harga').value = total;
            });
        });
    </script>