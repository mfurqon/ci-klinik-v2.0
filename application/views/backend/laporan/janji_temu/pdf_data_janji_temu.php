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
    <title>Export PDF Data Janji Temu</title>
</head>

<body>
    <style type="text/css">
        h1 {
            display: inline-block;
            font-family: Roboto, 'Segoe UI', sans-serif;
            color: #0d6efd;
            margin: 0;
        }

        .table-data {
            width: 100%;
            border-collapse: collapse;
        }

        .table-data td {
            text-align: center;
        }

        .table-data tr th,
        .table-data tr td {
            border: 1px solid black;
            font-size: 11pt;
            font-family: Verdana;
            padding: 10px;
        }

        h3 {
            font-family: Verdana;
        }

        img {
            max-width: 100px;
            max-height: 100px;
        }

        img.logo {
            width: 50px;
            height: 50px;
            margin-right: 10pt;
        }
    </style>

    <center>
        <img class="logo" src="<?= $gambar_logo; ?>" alt="logo-klinik">
        <h1>CI Klinik</h1>
    </center>

    <h3>
        <center>Export PDF Data Janji Temu CI Klinik</center>
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
                    <td><?= $jt['telepon_user']; ?></td>
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