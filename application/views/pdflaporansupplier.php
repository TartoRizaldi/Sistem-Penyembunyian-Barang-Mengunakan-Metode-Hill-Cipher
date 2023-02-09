<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title;?></title>
        <style>
            #table {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            #table td, #table th {
                border: 1px solid #ddd;
                padding: 8px;
            }

            #table tr:nth-child(even){background-color: #f2f2f2;}

            #table tr:hover {background-color: #ddd;}

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
        <div style="text-align:center">
            <h3><?= $title; ?></h3>
        </div>
        <table id="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Kode Supplier</th>
                    <th>Nama Supplier</th>
                    <th>Alamat Supplier</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($supplier as $sp) : ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $sp['id_supplier']; ?></td>
                    <td><?= $sp['nama_supplier']; ?></td>
                    <td><?= $sp['alamat_supplier']; ?></td>
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