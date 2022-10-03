<?php

require_once 'Lingkaran.php';
require_once 'PersegiPanjang.php';
require_once 'Segitiga.php';

$ar_judul = ['No', 'Nama Bidang', 'Keterangan', 'Luas Bidang', 'Keliling Bidang'];

$lingkaran1 = new Lingkaran(10);
$lingkaran2 = new Lingkaran(15);
$persegipanjang1 = new PersegiPanjang(10, 5);
$persegipanjang2 = new PersegiPanjang(20, 11);
$segitiga1 = new Segitiga(12, 19);
$segitiga2 = new Segitiga(9, 13);

$kumpulan_bidang = [$lingkaran1, $lingkaran2, $persegipanjang1, $persegipanjang2, $segitiga1, $segitiga2];

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Belajar Abstract Class</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body class="bg-dark text-light">

    <div class="container my-5">
        <h3 class="text-center">Bidang Datar</h3>
        <br>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <?php
                    foreach ($ar_judul as $jdl) {
                    ?>
                        <th><?= $jdl ?></th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($kumpulan_bidang as $b) { ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $b->namaBidang(); ?></td>
                        <td><?= $b->keterangan(); ?></td>
                        <td><?= $b->luasBidang(); ?></td>
                        <td><?= $b->kelilingBidang(); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>