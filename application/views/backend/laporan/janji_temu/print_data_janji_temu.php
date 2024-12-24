<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Data Janji Temu</title>
</head>

<body>
    <style type="text/css">
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
        <center>Print Data Janji Temu CI Klinik</center>
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


    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>