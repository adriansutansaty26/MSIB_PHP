<?php
// array scalar
$m1 = ['nim'=>'202003001','nama'=>'Adrian Sutansaty','nilai'=>90];
$m2 = ['nim'=>'202004002','nama'=>'Aldo Haliansyah','nilai'=>85];
$m3 = ['nim'=>'202002003','nama'=>'Zidane Kasfarianto','nilai'=>65];
$m4 = ['nim'=>'202001004','nama'=>'Farhan Revanza','nilai'=>50];
$m5 = ['nim'=>'202003005','nama'=>'Silvi Agustina','nilai'=>75];
$m6 = ['nim'=>'202001006','nama'=>'Andelle Gianzra','nilai'=>80];
$m7 = ['nim'=>'202002007','nama'=>'Felixius Nilsen','nilai'=>60];
$m8 = ['nim'=>'202002008','nama'=>'Annisa Arrayyan','nilai'=>70];
$m9 = ['nim'=>'202004009','nama'=>'Wahyu Safitra','nilai'=>55];
$m10 = ['nim'=>'202003010','nama'=>'Delbert Emanuel','nilai'=>40];

$ar_judul = ['No', 'NIM', 'Nama', 'Nilai', 'Keterangan', 'Grade', 'Predikat'];

// array assosiative
$mahasiswa = [$m1, $m2, $m3, $m4, $m5, $m6, $m7, $m8, $m9, $m10];

// aggregate function in array
$jml_nilai = array_column($mahasiswa,'nilai');
$total_nilai = array_sum($jml_nilai);
$jml_siswa = count($mahasiswa);
$nilai_tertinggi = max($jml_nilai);
$nilai_terendah = min($jml_nilai);
$nilai_ratarata = $total_nilai / $jml_siswa;

//keterangan
$keterangan = [
    'Nilai Tertinggi'=>$nilai_tertinggi,
    'Nilai Terendah'=>$nilai_terendah,
    'Nilai Rata-Rata'=>$nilai_ratarata,
    'Jumlah Siswa'=>$jml_siswa
];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Belajar Array</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
    
<div class="container my-5">
    <h3 class="text-center">Daftar Nilai Mahasiswa</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <?php
                foreach($ar_judul as $jdl){
                ?>
                <th><?= $jdl ?></th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach($mahasiswa as $mhs){

                $grade = 'E';

                if($mhs['nilai']<=100&&$mhs['nilai']>=85){
                    $grade = "A";
                } else if($mhs['nilai']<=84&&$mhs['nilai']>=75){
                    $grade = "B";
                } else if($mhs['nilai']<=74&&$mhs['nilai']>=60){
                    $grade = "C";
                } else if($mhs['nilai']<=59&&$mhs['nilai']>=50){
                    $grade = "D";
                }

                $predikat = 'Buruk';
                switch ($grade) {
                    case 'A':
                        $predikat = 'Memuaskan';
                    break;
                    case 'B':
                        $predikat = 'Baik';
                    break;
                    case 'C':
                        $predikat = 'Cukup';
                    break;
                    case 'D':
                        $predikat = 'Kurang';
                    break;
                }

            ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $mhs['nim'] ?></td>
                <td><?= $mhs['nama'] ?></td>
                <td><?= $mhs['nilai'] ?></td>
                <td><?= $mhs['nilai']>60?'Lulus':'Tidak Lulus' ?></td>
                <td><?= $grade ?></td>
                <td><?= $predikat ?></td>
            </tr>
            <?php $no++; } ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="7"></th>
            </tr>
            <?php
            foreach ($keterangan as $ket => $hasil) {
            ?>
            <tr>
                <th colspan="6"><?= $ket ?></th>
                <th><?= $hasil ?></th>
            </tr>
            <?php } ?>
        </tfoot>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
</script>
</body>
</html>