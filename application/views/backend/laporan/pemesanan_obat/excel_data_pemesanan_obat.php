<?php

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$judul.xls");
header("Pragma: no-cache");
header("Expires: 0");

?>
<style>
    .table-data td {
        text-align: center;
    }
</style>

<h3>
    <center>Export Excel Data Pemesanan Obat CI Klinik</center>
</h3>
<br />
<table class="table-data">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pengguna</th>
            <th>No Invoice</th>
            <th>Tanggal Pemesanan</th>
            <th>Jam Pemesanan</th>
            <th>Status Pembayaran</th>
            <th>Total Pembayaran (Rp)</th>
            <th>Metode Pemesanan</th>
            <th>Pilihan Pembayaran</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($pemesanan_obat as $po) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $po['nama']; ?></td>
                <td><?= $po['no_invoice']; ?></td>
                <td><?= $po['tanggal']; ?></td>
                <td><?= $po['jam']; ?></td>
                <td><?= $po['status_pembayaran']; ?></td>
                <td><?= number_format($po['total_pembayaran'], 0, ',', '.'); ?></td>
                <td><?= $po['metode_pembelian']; ?></td>
                <td><?= $po['metode_pembayaran']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</body>

</html>