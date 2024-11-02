<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Data Obat</title>
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
        <img class="logo" src="<?= base_url('assets/img/logo-klinik-biru-remove-bg.webp'); ?>" alt="logo-klinik">
        <h1>CI Klinik</h1>
    </div>

    <h3>
        <center>Cetak Data Obat CI Klinik</center>
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
                <th>Gambar</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($obat as $o) : ?>
                <tr>
                    <th scope="row"><?= $no++; ?></th>
                    <td><?= $o['nama_obat']; ?></td>
                    <td><?= $o['nama_jenis_obat']; ?></td>
                    <td><?= number_format($o['harga']) ?></td>
                    <td><?= $o['deskripsi']; ?></td>
                    <td><?= $o['stok']; ?></td>
                    <td><?= $o['tanggal_kedaluwarsa']; ?></td>
                    <td>
                        <img src="<?= base_url('assets/img/upload-obat/' . $o['gambar']); ?>" alt="gambar-obat">
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