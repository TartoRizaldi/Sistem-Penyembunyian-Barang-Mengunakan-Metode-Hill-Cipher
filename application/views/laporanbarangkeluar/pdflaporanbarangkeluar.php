<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        #table {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #table td,
        #table th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #table tr:hover {
            background-color: #ddd;
        }

        #table th {
            padding-top: 10px;
            padding-bottom: 10px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <td width="35%">
                <img src="<?= base_url('assets/img/logo.jpg') ?>" alt="Logo Tiara" style="position: absolute; width:25%; height: auto;">
            </td>
            <td>
                <h2>TIARA PHOTO DIGITAL</h2>
                <p>Jl. Setia Budi, Besusu Tengah, Palu Timur, Kota Palu, Sulawesi Tengah 94111</p>
            </td>
        </tr>
        <tr>
            <td>

            </td>
        </tr>
    </table>
    <hr class="line-title">
    <div style="text-align:center">
        <h2><?= $title ?></h2>
    </div>
    <h5><?= $subtitle ?></h5>
    Tanggal : <?php echo date('l, d-m-Y'); ?>
    <table id="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Barang Keluar</th>
                <th>Nama Barang</th>
                <th>Tanggal Keluar</th>
                <th>Stok</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($datafilter as $row) : ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $row->id_barangkeluar; ?></td>
                    <td><?= $row->nama_barang; ?></td>
                    <td><?= $row->tgl_keluar; ?></td>
                    <td><?= $row->stok_keluar; ?></td>
                    <td><?= $row->total; ?></td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
    <script type="text/javascript">
                window.print();
            </script>
</body>

</html>