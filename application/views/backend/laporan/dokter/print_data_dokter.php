<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Data Dokter</title>
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
        <center>Print Data Dokter CI Klinik</center>
    </h3>
    <br />
    <table class="table-data">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Dokter</th>
                <th>NIP</th>
                <th>Spesialisasi</th>
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
                    <td><?= $d['nama_spesialisasi']; ?></td>
                    <td><?= $d['jenis_kelamin']; ?></td>
                    <td><?= $d['telepon']; ?></td>
                    <td><?= $d['email']; ?></td>
                    <td><?= $d['alamat']; ?></td>
                    <td><?= $d['jam_masuk']; ?></td>
                    <td><?= $d['jam_keluar']; ?></td>
                    <td><?= date('d-m-Y', strtotime($d['tanggal_ditambahkan'])); ?></td>
                    <td>
                        <img src="<?= base_url('assets/img/upload-dokter/' . $d['gambar']); ?>" alt="gambar-dokter">
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