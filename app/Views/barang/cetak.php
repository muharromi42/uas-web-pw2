<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Data Barang</title>
    <style>
        /* Tambahkan CSS khusus untuk PDF jika diperlukan */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 8px;
        }
    </style>
</head>

<body>
    <h1 style="text-align: center;">Laporan Data Barang makanan/minuman</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama barang</th>
                <th>Kategori</th>
                <th>jumlah</th>
                <th>harga</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($barangs as $barang) : ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $barang['nama_barang']; ?></td>
                    <td><?= $barang['kategori']; ?></td>
                    <td><?= $barang['jumlah']; ?></td>
                    <td><?= $barang['harga']; ?></td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>