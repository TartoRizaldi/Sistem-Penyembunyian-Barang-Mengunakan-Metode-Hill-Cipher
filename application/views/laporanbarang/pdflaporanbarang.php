<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <style>
        #table {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #table2 {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
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
    <table id="table2">
        <tr>
            <td>
                <img src="<?= base_url('assets/img/logo.jpg') ?>" alt="Logo Tiara" width="50%">
            </td>
            <td>
                <h2 class="m-0 font-weight-bold ">TIARA PHOTO DIGITAL</h2>
                <h6 class="font-weight-bold">Jl. Setia Budi, Besusu Tengah, Kec. Palu Timur, Kota Palu, Sulawesi Tengah 94111</h6>
            </td>
        </tr>
    </table>

    <div style="text-align:center">
        <h2><?= $title; ?></h2>
    </div>
    Tanggal : <?php echo date('l, d-m-Y') ?>
    <table id="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Satuan</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Supplier</th>
                <th>ID User</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($barang as $brg) : ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $brg['id_barang']; ?></td>
                    <td><?= $brg['nama_barang']; ?></td>
                    <td><?= $brg['nama_satuan']; ?></td>
                    <td><?= $brg['stok']; ?></td>
                    <td><?= $brg['harga']; ?></td>
                    <td><?= $brg['nama_supplier']; ?></td>
                    <td><?= $brg['id']; ?></td>
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