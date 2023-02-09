<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Laporan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <h1><?= $title ?></h1>
    <h2><?= $subtitle ?></h2>

    <br>
    <br>
    <br>

    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Barang Masuk</th>
                <th>Nama Barang</th>
                <th>Tanggal Masuk</th>
                <th>Stok</th>
                <th>Total</th>
                <th>Supplier</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach ($datafilter as $row): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row->id_barangmasuk; ?></td>
                <td><?= $row->nama_barang; ?></td>
                <td><?= $row->tgl_masuk; ?></td>
                <td><?= $row->stok_masuk; ?></td>
                <td><?= $row->total; ?></td>
                <td><?= $row->total; ?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>