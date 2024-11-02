<?php

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$judul.xls");
header("Pragma: no-cache");
header("Expires: 0");

?>
<h3>
    <center>Cetak Excel Data Dokter CI Klinik</center>
</h3>
<br />
<table class="table-data">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Dokter</th>
            <th>NIP</th>
            <th>Spesialis</th>
            <th>Jenis Kelamin</th>
            <th>Telepon</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Jam Masuk</th>
            <th>Jam Keluar</th>
            <th>Tanggal Ditambahkan</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($dokter as $d) : ?>
            <tr>
                <th scope="row"><?= $no++; ?></th>
                <td><?= $d['nama_dokter']; ?></td>
                <td><?= $d['nip']; ?></td>
                <td><?= $d['gelar_spesialis']; ?></td>
                <td><?= $d['jenis_kelamin']; ?></td>
                <td style="mso-number-format:'\@';"><?= $d['telepon']; ?></td> <!-- Ini agar angka nol di depan dapat terbaca -->
                <td><?= $d['email']; ?></td>
                <td><?= $d['alamat']; ?></td>
                <td><?= $d['jam_masuk']; ?></td>
                <td><?= $d['jam_keluar']; ?></td>
                <td><?= $d['tanggal_ditambahkan']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</body>

</html>