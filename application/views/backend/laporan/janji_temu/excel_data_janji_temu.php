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
    <center>Export Excel Data Janji Temu CI Klinik</center>
</h3>
<br />
<table class="table-data">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama User</th>
            <th>Email User</th>
            <th>No Telepon User</th>
            <th>Nama Dokter</th>
            <th>Tanggal Temu</th>
            <th>Jam Temu</th>
            <th>Keluhan</th>
            <th>Status</th>
            <th>Tanggal Dibuat</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($janji_temu as $jt) : ?>
            <tr>
                <th scope="row"><?= $no++; ?></th>
                <td><?= $jt['nama_user']; ?></td>
                <td><?= $jt['email_user']; ?></td>
                <td style="mso-number-format:'\@';"><?= $jt['telepon_user']; ?></td> <!-- Ini agar angka nol di depan dapat terbaca -->
                <td><?= $jt['nama_dokter']; ?></td>
                <td><?= date('d-m-Y', strtotime($jt['tanggal_temu'])); ?></td>
                <td><?= $jt['jam_temu']; ?></td>
                <td><?= $jt['keluhan']; ?></td>
                <td><?= $jt['status']; ?></td>
                <td><?= date('d-m-Y', strtotime($jt['tanggal_dibuat'])); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</body>

</html>