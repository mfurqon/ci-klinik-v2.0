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
    <title>Export PDF Data User</title>
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
        <center>Export PDF Data User CI Klinik</center>
    </h3>
    <br />
    <table class="table-data">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama User</th>
                <th>Alamat Email</th>
                <th>Nomor Telepon</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Role</th>
                <th>Tanggal Gabung</th>
                <th>Gambar</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($users as $user) : ?>
                <tr>
                    <th scope="row"><?= $no++; ?></th>
                    <td><?= $user['nama']; ?></td>
                    <td><?= $user['email']; ?></td>
                    <td><?= $user['telepon']; ?></td>
                    <td><?= $user['jenis_kelamin_user']; ?></td>
                    <td><?= date('d-m-Y', strtotime($user['tanggal_lahir_user'])); ?></td>
                    <td><?= $user['alamat']; ?></td>
                    <td><?= $user['role_nama']; ?></td>
                    <td><?= $user['tanggal_dibuat']; ?></td>

                    <?php //konversi gambar menjadi format base64 agar dompdf bisa membaca gambar
                    $path = base_url('assets/img/profile/' . $user['gambar']);
                    $type = pathinfo($path, PATHINFO_EXTENSION);
                    $data = file_get_contents($path);
                    $gambar_user = 'data:image/' . $type . ';base64,' . base64_encode($data);
                    ?>

                    <td>
                        <img src="<?= $gambar_user; ?>" alt="gambar-user">
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>