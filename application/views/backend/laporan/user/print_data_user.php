<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Data User</title>
</head>

<body>
    <style type="text/css">
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

        div.logo {
            display: flex;
            width: 100%;
            height: 50pt;
            margin: 10pt 0;
            justify-content: center;
            align-items: center;
        }

        h1 {
            display: inline-block;
            font-family: Roboto, 'Segoe UI', sans-serif;
            color: #0d6efd;
            margin: 0;
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

    <div class="logo">
        <img class="logo" src="<?= base_url('assets/img/klinik/logo-klinik-biru-remove-bg.webp'); ?>" alt="logo-klinik">
        <h1>CI Klinik</h1>
    </div>

    <h3>
        <center>Print Data User CI Klinik</center>
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
                    <td><?= $user['alamat']; ?></td>
                    <td><?= $user['role_nama']; ?></td>
                    <td><?= $user['tanggal_dibuat']; ?></td>
                    <td>
                        <img src="<?= base_url('assets/img/profile/' . $user['gambar']); ?>" alt="gambar-user">
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>