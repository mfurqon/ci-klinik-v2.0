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
    <title>Cetak Data Dokter</title>
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
        <center>Cetak PDF Data Dokter CI Klinik</center>
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
                <th>Gambar</th>
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
                    <td><?= $d['telepon']; ?></td>
                    <td><?= $d['email']; ?></td>
                    <td><?= $d['alamat']; ?></td>
                    <td><?= $d['jam_masuk']; ?></td>
                    <td><?= $d['jam_keluar']; ?></td>
                    <td><?= $d['tanggal_ditambahkan']; ?></td>

                    <?php //konversi gambar menjadi format base64 agar dompdf bisa membaca gambar
                    $path = base_url('assets/img/upload-dokter/' . $d['gambar']);
                    $type = pathinfo($path, PATHINFO_EXTENSION);
                    $data = file_get_contents($path);
                    $gambar_dokter = 'data:image/' . $type . ';base64,' . base64_encode($data);
                    ?>

                    <td>
                        <img src="<?= $gambar_dokter; ?>" alt="gambar-dokter">
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>