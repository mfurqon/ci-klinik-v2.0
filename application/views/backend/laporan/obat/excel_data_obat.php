<?php

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$judul.xls");
header("Pragma: no-cache");
header("Expires: 0");

?>
<h3>
    <center>Export Excel Data Obat CI Klinik</center>
</h3>
<br />
<table class="table-data">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Obat</th>
            <th>Jenis Obat</th>
            <th>Harga (Rp)</th>
            <th>Deskripsi</th>
            <th>Stok</th>
            <th>Tanggal Kedaluwarsa</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($obat as $o) : ?>
            <tr>
                <th scope="row"><?= $no++; ?></th>
                <td><?= $o['nama_obat']; ?></td>
                <td><?= $o['nama_jenis_obat']; ?></td>
                <td><?= $o['harga'] ?></td>
                <td><?= $o['deskripsi']; ?></td>
                <td><?= $o['stok']; ?></td>
                <td><?= $o['tanggal_kedaluwarsa']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</body>

</html>