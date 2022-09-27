<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TUGAS 2 | PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous"> 
  </head>
<body>

  <div class="container my-5">
  <?php 
      if(isset($_POST['proses'])){ 
        //tangkap request
        $namaPegawai = $_POST['namaPegawai'];
        $agama = $_POST['agama'];
        $jabatan = isset($_POST['jabatan'])?$_POST['jabatan']:"-";
        $status = isset($_POST['status'])?$_POST['status']:"-";
        $jumlahAnak = isset($_POST['jumlahAnak'])?$_POST['jumlahAnak']:0;
        $gajiPokok;
        switch ($jabatan) {
          case 'Manager':
            $gajiPokok = 20000000;
            break;
          case 'Asisten':
            $gajiPokok = 15000000;
            break;
          case 'Kabag':
            $gajiPokok = 10000000;
            break;
          default:
            $gajiPokok = 4000000; 
        }
        $tunjanganJabatan = $gajiPokok * 0.2;
        $tunjanganKeluarga;
        if($status=="Menikah" && $jumlahAnak<=2){
          $tunjanganKeluarga = $gajiPokok * 0.05;
        } elseif ($status=="Menikah" && ($jumlahAnak>=3 || $jumlahAnak<=5)){
          $tunjanganKeluarga = $gajiPokok * 0.10;
        } elseif ($status=="Menikah" && $jumlahAnak>=5){
          $tunjanganKeluarga = $gajiPokok * 0.15;
        } else {
          $tunjanganKeluarga = 0;
        }
        $gajiKotor = $gajiPokok + $tunjanganJabatan + $tunjanganKeluarga;
        $zakatProfesi = ($gajiKotor>=6000000)? $gajiKotor * 0.025 : 0;
        $takeHomePay = $gajiKotor - $zakatProfesi;
        ?>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Lihat Data
        </button>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Rincian Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <table class="table">
                  <tbody>
                    <tr>
                      <th scope="row">Nama</th>
                      <td><?= $namaPegawai ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Agama</th>
                      <td><?= $agama ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Jabatan</th>
                      <td><?= $jabatan ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Status</th>
                      <td><?= $status ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Jumlah Anak</th>
                      <td><?= $jumlahAnak ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Gaji Pokok</th>
                      <td>Rp<?= number_format($gajiPokok) ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Tunjangan Jabatan</th>
                      <td>RP<?= number_format($tunjanganJabatan) ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Tunjangan Keluarga</th>
                      <td>RP<?= number_format($tunjanganKeluarga) ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Gaji Kotor</th>
                      <td>RP<?= number_format($gajiKotor) ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Zakat Profesi</th>
                      <td>RP<?= number_format($zakatProfesi) ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Take Home Pay</th>
                      <th>RP<?= number_format($takeHomePay) ?></th>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
              </div>
            </div>
          </div>
        </div>
    <?php } ?>

    <form method="POST" action="index.php">
      <div class="mb-3">
        <label for="namaPegawai" class="form-label">Nama Pegawai</label>
        <input type="text" class="form-control" id="namaPegawai" name="namaPegawai">
      </div>
      <div class="mb-3">
        <label for="agama" class="form-label">Agama</label>
        <select class="form-select" id="agama" name="agama">
          <option selected value="-">-- Pilih Agama --</option>
          <option value="Islam">Islam</option>
          <option value="Kristen Protestan">Kristen Protestan</option>
          <option value="Katolik">Katolik</option>
          <option value="Hindu">Hindu</option>
          <option value="Budha">Budha</option>
          <option value="Konghucu">Konghucu</option>
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label">Jabatan</label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="jabatan" id="manager" value="Manager">
          <label class="form-check-label" for="manager">
            Manager
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="jabatan" id="asisten" value="Asisten">
          <label class="form-check-label" for="asisten">
            Asisten
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="jabatan" id="kabag" value="Kabag">
          <label class="form-check-label" for="kabag">
            Kabag
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="jabatan" id="staff" value="Staff">
          <label class="form-check-label" for="staff">
            Staff
          </label>
        </div>
      </div>
      <div class="mb-3">
        <label class="form-label">Status</label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="status" id="menikah" value="Menikah">
          <label class="form-check-label" for="menikah">
            Menikah
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="status" id="belum-menikah" value="Belum Menikah">
          <label class="form-check-label" for="belum-menikah">
            Belum Menikah
          </label>
        </div>
      </div>
      <div class="mb-3">
        <label for="jumlahAnak" class="form-label">Jumlah Anak</label>
        <input type="number" class="form-control" id="jumlahAnak" name="jumlahAnak">
      </div>
      <button type="submit" name="proses" class="btn btn-primary">Simpan</button>
    </form>
    

  </div>
    
</body>
<script src="js/jquery-3.6.1.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#exampleModal').modal('show');
  });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
