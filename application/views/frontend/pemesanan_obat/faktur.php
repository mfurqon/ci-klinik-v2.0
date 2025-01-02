<div class=" bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <!-- Header -->
                <h2 class="text-center mb-4">Faktur Pemesanan Obat</h2>

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
                                <span class="badge bg-primary rounded-circle">3</span>
                                <span class="ms-2">Selesai</span>
                            </div>
                        </div>
                    </div>

                <!-- Invoice Card -->
                <div class="my-5 mx-auto card col-lg-8 shadow-sm">
                    <div class="card-body mx-4">
                        <div class="container">
                            <!-- Thank You Message -->
                            <div class="text-center my-5">
                                <i class="fas fa-check-circle text-success fa-3x mb-3"></i>
                                <h2 class="fw-normal text-muted">Terima Kasih Atas Pembelian Anda</h2>
                                <p class="text-muted">Pesanan Anda sedang diproses</p>
                            </div>

                            <!-- Invoice Header -->
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <ul class="list-unstyled">
                                        <li class="text-black fs-5 fw-bold"><?= $faktur['nama']; ?></li>
                                        <li class="text-muted mt-1">
                                            <span class="text-black">No. Invoice:</span> #<?= $faktur['no_invoice']; ?>
                                        </li>
                                        <li class="text-black mt-1"><?= $faktur['tanggal_pembayaran']; ?></li>
                                    </ul>
                                </div>
                                <div class="col-md-6 text-md-end">
                                    <p class="text-muted mb-1">Status Pembayaran</p>
                                    <span class="badge bg-success"><?= $faktur['status_pembayaran']; ?></span>
                                </div>
                            </div>

                            <!-- Items -->
                            <div class="row">
                                <div class="col-12">
                                    <div>
                                        <div class="card-body p-0">
                                            <div class="table-responsive">
                                                <table class="table mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>Produk</th>
                                                            <th class="text-center">Jumlah</th>
                                                            <th class="text-end">Harga</th>
                                                            <th class="text-end">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($detail_obat as $do): 
                                                        $harga_total_obat = $do['harga_obat'] * $do['jumlah_obat'];
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <p class="mb-0 fw-semibold"><?= $do['nama_obat']; ?></p>
                                                                <!-- <small class="text-muted">500mg - Strip isi 10 tablet</small> -->
                                                            </td>
                                                            <td class="text-center"><?= $do['jumlah_obat']; ?></td>
                                                            <td class="text-end">Rp <?= number_format($do['harga_obat'], 0, ',', '.'); ?></td>
                                                            <td class="text-end">Rp <?= number_format($harga_total_obat, 0, ',', '.'); ?></td>
                                                        </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Summary -->
                            <div class="row mt-4">
                                <div class="col-md-6 offset-md-6">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td>Subtotal:</td>
                                            <td class="text-end">Rp <?= number_format($faktur['subtotal'], 0, ',', '.'); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Biaya Admin:</td>
                                            <td class="text-end">Rp <?= number_format($faktur['biaya_admin'], 0, ',', '.'); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Biaya Pengiriman:</td>
                                            <td class="text-end">Rp <?= number_format($faktur['biaya_pengiriman'], 0, ',', '.'); ?></td>
                                        </tr>
                                        <tr>
                                            <td>PPN (12%):</td>
                                            <td class="text-end">Rp <?= number_format($faktur['ppn'], 0, ',', '.'); ?></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold border-top">Total:</td>
                                            <td class="fw-bold border-top text-end">Rp <?= number_format($faktur['total'], 0, ',', '.'); ?></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Metode Pemesanan:</td>
                                            <td class="fw-bold text-end"><?= $faktur['metode_pembelian']; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Pilihan Pembayaran:</td>
                                            <td class="fw-bold text-end"><?= $faktur['metode_pembayaran']; ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <!-- Footer -->
                            <div class="text-center mt-5 pt-4 border-top">
                                <p class="text-muted mb-2">Invoice ini sah dan diproses secara elektronik.</p>
                                <div class="btn-group no-print">
                                    <a class="btn btn-outline-success" href="<?= base_url('pemesanan-obat/cetak-invoice') ?>">
                                        <i class="fas fa-print me-2"></i>Cetak Invoice
                                    </a>
                                    <a class="btn btn-outline-danger" href="<?= base_url('pemesanan-obat/export-pdf-invoice'); ?>">
                                        <i class="fas fa-download me-2"></i>Unduh PDF
                                    </a>
                                    <a class="btn btn-outline-primary" href="<?= base_url(); ?>">Kembali ke Beranda</a>
                                </div>
                                <p class="mt-4 mb-0 text-muted small">Jika ada pertanyaan, silakan hubungi customer service kami di (021) 123-4567</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>