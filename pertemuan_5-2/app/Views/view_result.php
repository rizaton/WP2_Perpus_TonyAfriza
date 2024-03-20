<html>

<head>
    <title>Form Menu</title>
    <style>
        .t1 {
            width: 100%;
        }

        .t1 table,
        .t1 td,
        .t1 th {
            border: 1px solid;
        }

        .t1 table {
            width: 100%;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <center>
        <p style="color: red;">
            <?= $message ?>
        </p>
    </center>
    <center>
        <form action="<?= base_url('menu/create'); ?>" method="post">
            <table>
                <tr>
                    <th colspan="3">
                        Form tambah data menu
                    </th>
                <tr>
                    <td colspan="3">
                        <hr>
                    </td>
                </tr>
                <tr>
                    <th>Kode Menu</th>
                    <th>:</th>
                    <td>
                        <input type="text" name="kode" id="kode">
                    </td>
                </tr>
                <tr>
                    <th>Nama Menu</th>
                    <td>:</td>
                    <td>
                        <input type="text" name="nama" id="nama">
                    </td>
                </tr>
                <tr>
                    <th>Harga Menu</th>
                    <td>:</td>
                    <td>
                        <input type="text" name="harga" id="harga">
                    </td>
                </tr>
                <tr>
                    <th>Gambar Menu</th>
                    <td>:</td>
                    <td>
                        <input type="text" name="gambar" id="gambar">
                    </td>
                </tr>
                <tr>
                    <td colspan="3" align="center">
                        <input type="submit" value="Submit">
                    </td>
                </tr>
            </table>
        </form>
    </center>
    <hr>
    <div class="t1">
        <table>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Kode Menu</th>
                    <th scope="col">Nama Menu</th>
                    <th scope="col">Harga Menu</th>
                    <th scope="col">Gambar Menu</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($menu as $m) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $m['kdmenu']; ?></td>
                        <td><?= $m['nmmenu']; ?></td>
                        <td><?= $m['harga']; ?></td>
                        <td><?= $m['gambar']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <hr>
    <center>
        <form action="<?= base_url('menu/update'); ?>" method="post">
            <table>
                <tr>
                    <th colspan="3">
                        Form update data menu
                    </th>
                <tr>
                    <td colspan="3">
                        <hr>
                    </td>
                </tr>
                <tr>
                    <th>Kode Menu</th>
                    <th>:</th>
                    <td>
                        <input type="text" name="kode" id="kode">
                    </td>
                </tr>
                <tr>
                    <th>Nama Menu</th>
                    <td>:</td>
                    <td>
                        <input type="text" name="nama" id="nama">
                    </td>
                </tr>
                <tr>
                    <th>Harga Menu</th>
                    <td>:</td>
                    <td>
                        <input type="text" name="harga" id="harga">
                    </td>
                </tr>
                <tr>
                    <th>Gambar Menu</th>
                    <td>:</td>
                    <td>
                        <input type="text" name="gambar" id="gambar">
                    </td>
                </tr>
                <tr>
                    <td colspan="3" align="center">
                        <input type="submit" value="Update">
                    </td>
                </tr>
            </table>
        </form>
    </center>
    <hr>
    <center>
        <form action="<?= base_url('menu/delete'); ?>" method="post">
            <table>
                <tr>
                    <th colspan="3">
                        Delete data menu
                    </th>
                <tr>
                    <td colspan="3">
                        <hr>
                    </td>
                </tr>
                <tr>
                    <th>Kode Menu</th>
                    <th>:</th>
                    <td>
                        <input type="text" name="kode" id="kode">
                    </td>
                </tr>
                <tr>
                    <td colspan="3" align="center">
                        <input type="submit" value="Delete">
                    </td>
                </tr>
            </table>
        </form>
    </center>
</body>

</html>