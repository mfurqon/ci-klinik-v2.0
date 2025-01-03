<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Data Pemesanan Obat</title>
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
        <center>Print Data Pemesanan Obat CI Klinik</center>
    </h3>
    <br />
    <table class="table-data">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pengguna</th>
                <th>No Invoice</th>
                <th>Tanggal Pemesanan</th>
                <th>Jam Pemesanan</th>
                <th>Status Pembayaran</th>
                <th>Total Pembayaran (Rp)</th>
                <th>Metode Pemesanan</th>
                <th>Pilihan Pembayaran</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($pemesanan_obat as $po) : ?>
                <tr class="text-center">
                    <td><?= $no++; ?></td>
                    <td><?= $po['nama']; ?></td>
                    <td><?= $po['no_invoice']; ?></td>
                    <td><?= $po['tanggal']; ?></td>
                    <td><?= $po['jam']; ?></td>
                    <td><?= $po['status_pembayaran']; ?></td>
                    <td><?= number_format($po['total_pembayaran'], 0, ',', '.'); ?></td>
                    <td><?= $po['metode_pembelian']; ?></td>
                    <td><?= $po['metode_pembayaran']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>