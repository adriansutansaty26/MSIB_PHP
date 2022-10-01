<!-- 

Buatlah Class Pegawai dengan member class:

variabel : nip, nama, jabatan, agama, status
konstruktor (nip, nama, jabatan, agama, status)
fungsi:
- setGajiPokok (gunakan switch case : manager=>15jt, asmen=>10jt, kabag=>7jt, staff=>4jt)
- setTunjab = 20% dari Gaji Pokok
- setTunkel= 10% dari Gaji Pokok untuk sudah menikah (ternary)
- setZakatProfesi= 2,5% dari GajiPokok untuk muslim dan Gaji Kotor minimal 6jt
- mencetak => nip, nama, jabatan, agama, status, Gaji Pokok, Tunj Jab, Tunkel, Zakat, Gaji Bersih 

Buatlah objPegawai dengan data:
- 5 instance object pegawai
- cetaklah semua struktur gaji pegawai

-->

<?php
require 'Pegawai.php';

// public function __construct($nip, $nama, $jabatan, $agama, $status)

$pegawai1 = new Pegawai('001', 'Adrian Sutansaty', 'Manager', 'Islam', 'Menikah');
$pegawai1->mencetak();
$pegawai2 = new Pegawai('002', 'Felixius Nilsen', 'Asmen', 'Kristen', 'Belum Menikah');
$pegawai2->mencetak();
$pegawai3 = new Pegawai('003', 'Komang Danda', 'Kabag', 'Hindu', 'Menikah');
$pegawai3->mencetak();
$pegawai4 = new Pegawai('004', 'Kim Dahyun', 'Staff', 'Budha', 'Belum Menikah');
$pegawai4->mencetak();
$pegawai5 = new Pegawai('005', 'Chou Tzuyu', 'Staff', 'Konghuchu', 'Menikah');
$pegawai5->mencetak();
