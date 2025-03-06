<?php include('../config/auto_load.php'); ?>

<?php include('dashboard_control.php'); ?>

<?php include('../template/headersiswa.php'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<!-- Begin Page Content -->
<div class="container-fluid">

<h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

<!-- Warning Alert -->
<?php if(isset($data_pendaftar['is_verified']) && $data_pendaftar['is_verified'] == 0) { ?>
    <div class="alert alert-warning text-center" role="alert">
      <strong>Perhatian!</strong> Segera lengkapi data tambahan untuk keperluan pendaftaran. <br>
      <a href="registrasi_inside.php" class="btn btn-primary mt-2">Lengkapi Data</a>
    </div>
  <?php } else { ?>
    <div class="alert alert-success text-center" role="alert">
      <strong>Data sudah lengkap!</strong> ✅
    </div>
  <?php } ?>


<!-- Row utama yang sudah ada -->
<div class="row">
    <div class="col-md-12">
        <?php if(isset($_SESSION['pesan_sukses'])) { ?>
        <div class="alert alert-success">
            <?= $_SESSION['pesan_sukses'] ?>
        </div>
        <?php } 
        unset($_SESSION['pesan_sukses']);
        ?>
    </div>
</div>


<?php
$file = '../hasil_seleksi.json';

// Jika file tidak ada, buat file kosong
if (!file_exists($file)) {
    file_put_contents($file, json_encode([]));
}

// Ambil data seleksi
$seleksi = json_decode(file_get_contents($file), true);

// Cek apakah ada pengumuman
$status = $seleksi['status'] ?? null;
?>
<div class="col-md-12">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">PENGUMUMAN HASIL PENDAFTARAN</h6>
        </div>
        <div class="card-body">
            <div class="card text-center">
                <div class="card-body">
                    
                        <?php if ($status === null): ?>
                        <h5 class="card-title mb-3">Belum ada pengumuman</h5>
                        <p class="card-text">Terima kasih telah mendaftar di MTs Assa'adah</p>
                        <p class="text-danger mt-3">* Pengumuman hasil pendaftaran: mm-dd-yyyy</p>
                        
                        <?php elseif ($status == 1): ?>
                        <h5 class="card-title mb-3">KAMU LOLOS</h5>
                        <div class="col-auto">
                            <i class="far fa-check-circle text-success mb-3" style="font-size: 90px;"></i>
                        </div>
                        <p class="card-text">Selamat datang di MTs Assa'adah</p>
                        <p class="card-text">Silahkan bergabung ke dalam grup whatsapp berikut:</p>
                        <p class="card-text" href="">link</p>
                        
                        <?php elseif ($status == 2): ?>
                        <h5 class="card-title mb-3">Pendaftaran sedang di proses</h5>
                        <div class="col-auto">
                            <i class="fa fa-clock text-danger mb-3" style="font-size: 90px;"></i>
                        </div>
                        <p class="card-text">Terima kasih telah mendaftar di MTs Assa'adah</p>
                        <p class="text-danger mt-3">* Pengumuman hasil pendaftaran: mm-dd-yyyy</p>
                    <?php endif; ?>

                </div>
                <div class="card-footer text-muted">
                    <marquee style="margin-bottom: -5px;">MTs Assa'adah</marquee>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- menyusun Re-registration requirements dan PERSONAL DATA sejajar -->
<div class="row">
    <!-- Re-registration requirements -->
    <div class="col-md-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">LANGKAH MENDAFTAR</h6>
            </div>
            <div class="card-body">
                <p>Untuk para pendaftar silahkan baca langkah-langkah pendaftaran dibawah ini</p>
                <a href="../assets/langkah pendaftaran.pdf" target="_blank">--Buka PDF--</a>

                
            </div>
        </div>
    </div>
    

    <!-- PERSONAL DATA-->
    <div class="col-md-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DATA DIRI</h6>
            </div>
            <div class="card-body">
                <div class="col-auto mt-3 text-center">
                    <?php
                    if(isset($data_pendaftar['foto']) && $data_pendaftar['foto'] != '') {
                        $foto = '../uploads/' . $data_pendaftar['foto'];
                    } else {
                        $foto = '../assets/img/avatar.jpg';
                    }
                    ?>
                    <img src="<?= $foto ?>" class="img-fluid rounded-circle" alt="menunggu" style="width: 200px; height: 200px;">
                </div>
                <br>
                <div class="text-right">
                    <a href="editprofil.php" class="btn btn-warning btn-sm">Edit profile</a>
                </div>
                <h5 class="card-title mb-3 text-center">
                    <?= $data_pendaftar['nama'] ?>
                </h5>
                <ul class="list-group">
                    <li class="list-group-item">
                        <h6 class="mb-0" style="color: black;">NISN</h6>
                        <small class="text-muted"><?= $data_pendaftar['nisn'] ?></small>
                    </li>
                    <li class="list-group-item">
                        <h6 class="mb-0" style="color: black;">Tempat, Tanggal lahir</h6>
                        <small class="text-muted"><?= $data_pendaftar['tmpt_lahir'] ?>, <?= date("d-m-Y", strtotime($data_pendaftar['tgl_lahir'])); ?></small>
                    </li>
                    <li class="list-group-item">
                        <h6 class="mb-0" style="color: black;">Gender</h6>
                        <?php 
                        if($data_pendaftar['jenis_kelamin'] == 'L') {
                            $kelamin = "Laki-laki";
                        } else {
                            $kelamin = "Perempuan";
                        }
                        ?>
                        <small class="text-muted"><?= $kelamin ?></small>
                    </li>
                    <li class="list-group-item">
                        <h6 class="mb-0" style="color: black;">Agama</h6>
                        <small class="text-muted"><?= $data_pendaftar['agama'] ?></small>
                    </li>
                    <li class="list-group-item">
                        <h6 class="mb-0" style="color: black;">Alamat</h6>
                        <small class="text-muted"><?= $data_pendaftar['alamat'] ?></small>
                    </li>
                    <li class="list-group-item">
                        <h6 class="mb-0" style="color: black;">Email</h6>
                        <small class="text-muted"><?= $data_pendaftar['email'] ?></small>
                    </li>
                    <li class="list-group-item">
                        <h6 class="mb-0" style="color: black;">Telepon</h6>
                        <small class="text-muted"><?= $data_pendaftar['telepon'] ?></small>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</div>

  
</div>
<!-- /.container-fluid -->
<script>
  document.querySelectorAll('.custom-file-input').forEach(input => {
    input.addEventListener('change', function () {
      let fileName = this.files[0].name;
      let label = this.nextElementSibling;
      label.textContent = fileName;
    });
  });
</script>


<?php include('../template/footer.php'); ?>