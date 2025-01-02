<?php //konversi gambar menjadi format base64 agar dompdf bisa membaca gambar
$path = base_url('assets/img/klinik/logo-klinik-biru-remove-bg.webp');
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$gambar_logo = 'data:image/' . $type . ';base64,' . base64_encode($data);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul; ?></title>
    <style>
        <?php echo file_get_contents('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css'); ?>
    </style>
</head>

<body>
    <div class="justify-content-center">

        <div class="mt-0 mx-auto col-lg-8">
            <div class="card-body mx-4">
                <div class="container">
                    <div class="my-3" style="display: table; width: 100%;">
                        <div style="display: table-cell; width: 50%; vertical-align: middle;">
                            <img src="<?= $gambar_logo; ?>" alt="logo-klinik" style="max-width: 200px;">
                            <h1 class="fw-bold text-primary d-inline align-middle ms-2">CI Klinik</h1>
                        </div>
                        <div style="display: table-cell; width: 50%; font-size: 0.9rem; text-align: right; vertical-align: middle;">
                            <p class="mb-0">Jl. Keadilan 1 Kota Jakarta Timur DKJ</p>
                            <p class="mb-0">08123456789</p>
                            <p class="mb-0">ci-klinik@gmail.com</p>
                        </div>
                    </div>


                    <hr class="mb-5" style="border: 1px solid black;">

                    <!-- Invoice Header -->
                    <div class="d-flex justify-content-between mb-4">
                        <div>
                            <ul class="list-unstyled">
                                <li class="text-black fw-bold"><?= $faktur['nama']; ?></li>
                                <li class="text-muted mt-1">
                                    <span class="text-black">No. Invoice:</span> #<?= $faktur['no_invoice']; ?>
                                </li>
                                <li class="text-black mt-1"><?= $faktur['tanggal_pembayaran']; ?></li>
                            </ul>
                        </div>
                        <div class="text-md-end">
                            <p class="text-muted mb-1">Status Pembayaran</p>
                            <span class="badge text-bg-success"><?= $faktur['status_pembayaran']; ?></span>
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
                                                            <p class="mb-0"><?= $do['nama_obat']; ?></p>
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
                                    <td class="border-top"></td>
                                    <td class="border-top"></td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Total:</td>
                                    <td class="fw-bold text-end">Rp <?= number_format($faktur['total'], 0, ',', '.'); ?></td>
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
                        <p class="text-muted mb-1">Invoice ini sah dan diproses secara elektronik.</p>
                        <p class="mb-0 text-muted small">Jika ada pertanyaan, silakan hubungi customer service kami di (021) 123-4567</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>