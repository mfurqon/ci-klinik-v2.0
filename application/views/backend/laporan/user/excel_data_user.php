<?php

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$judul.xls");
header("Pragma: no-cache");
header("Expires: 0");

?>
<h3>
    <center>Export Excel Data User CI Klinik</center>
</h3>
<br />
<table class="table-data">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama User</th>
            <th>Alamat Email</th>
            <th>Nomor Telepon</th>
            <th>Alamat</th>
            <th>Role</th>
            <th>Tanggal Gabung</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($users as $user) : ?>
            <tr>
                <th scope="row"><?= $no++; ?></th>
                <td><?= $user['nama']; ?></td>
                <td><?= $user['email']; ?></td>
                <td style="mso-number-format:'\@';"><?= $user['telepon']; ?></td> <!-- Ini agar angka nol di depan dapat terbaca -->
                <td><?= $user['alamat']; ?></td>
                <td><?= $user['role_nama']; ?></td>
                <td><?= $user['tanggal_dibuat']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</body>

</html>