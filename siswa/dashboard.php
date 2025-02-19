<?php include('../config/auto_load.php'); ?>

<?php include('dashboard_control.php'); ?>

<?php include('../template/headersiswa.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

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

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
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
    <div class="col-md-6">
      <div class="row">
        <div class="col-md-12">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">FORMULIR BERKAS</h6>
            </div>
            <div class="card-body">
              <h5><strong>Foto Harus Dalam Bentuk PDF</strong></h5>
              <form action="upload.php" method="post" enctype="multipart/form-data" class="form-container">
                <!-- Kartu Keluarga -->
                <div class="form-group">
                  <label for="kartu_keluarga">Kartu Keluarga (KK):</label>
                  <div class="custom-file">
                    <input type="file" id="kartu_keluarga" name="kartu_keluarga" accept="application/pdf" class="custom-file-input">
                    <label class="custom-file-label" for="kartu_keluarga">
                      <?= !empty($existingFiles['kartu_keluarga']) ? $existingFiles['kartu_keluarga'] : 'Choose file' ?>
                    </label>
                  </div>
                </div>

                <!-- KTP -->
                <div class="form-group">
                  <label for="ktp">KTP Bapak/Ibu/Wali (diperbesar):</label>
                  <div class="custom-file">
                    <input type="file" id="ktp" name="ktp" accept="application/pdf" class="custom-file-input">
                    <label class="custom-file-label" for="ktp">
                      <?= !empty($existingFiles['ktp']) ? $existingFiles['ktp'] : 'Choose file' ?>
                    </label>
                  </div>
                </div>

                <!-- Ijazah -->
                <div class="form-group">
                  <label for="ijazah">Ijazah atau SKL SD/MI:</label>
                  <div class="custom-file">
                    <input type="file" id="ijazah" name="ijazah" accept="application/pdf" class="custom-file-input">
                    <label class="custom-file-label" for="ijazah">
                      <?= !empty($existingFiles['ijazah']) ? $existingFiles['ijazah'] : 'Choose file' ?>
                    </label>
                  </div>
                </div>

                <!-- Akte Kelahiran -->
                <div class="form-group">
                  <label for="akte_kelahiran">Akte Kelahiran:</label>
                  <div class="custom-file">
                    <input type="file" id="akte_kelahiran" name="akte_kelahiran" accept="application/pdf" class="custom-file-input">
                    <label class="custom-file-label" for="akte_kelahiran">
                      <?= !empty($existingFiles['akte_kelahiran']) ? $existingFiles['akte_kelahiran'] : 'Choose file' ?>
                    </label>
                  </div>
                </div>

                <!-- Buku KJP -->
                <div class="form-group">
                  <label for="buku_kjp">Buku Rekening KJP/PIP/PKH (Opsional):</label>
                  <div class="custom-file">
                    <input type="file" id="buku_kjp" name="buku_kjp" accept="application/pdf" class="custom-file-input">
                    <label class="custom-file-label" for="buku_kjp">
                      <?= !empty($existingFiles['buku_kjp']) ? $existingFiles['buku_kjp'] : 'Choose file' ?>
                    </label>
                  </div>
                </div>

                <div class="text-right">
                  <input class="btn btn-primary mb-5" type="submit" name="submit" value="Upload">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="row">
        <div class="col-md-12">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">PERSONAL DATA</h6>
            </div>
            <div class="card-body">
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
                    <h6 class="mb-0" style="color: black;">Place and date of birth</h6>
                    <small class="text-muted"><?= $data_pendaftar['tmpt_lahir'] ?>, <?= date("d-m-Y", strtotime($data_pendaftar['tgl_lahir'])); ?></small>
                  </li>
                  <li class="list-group-item">
                    <h6 class="mb-0" style="color: black;">Gender</h6>
                    <?php 
                    if($data_pendaftar['jenis_kelamin'] == 'L') {
                      $kelamin = "Male";
                    } else {
                      $kelamin = "Female";
                    }
                    ?>
                    <small class="text-muted"><?= $kelamin ?></small>
                  </li>
                  <li class="list-group-item">
                    <h6 class="mb-0" style="color: black;">Religion</h6>
                    <small class="text-muted"><?= $data_pendaftar['agama'] ?></small>
                  </li>
                  <li class="list-group-item">
                    <h6 class="mb-0" style="color: black;">Address</h6>
                    <small class="text-muted"><?= $data_pendaftar['alamat'] ?></small>
                  </li>
                  <li class="list-group-item">
                    <h6 class="mb-0" style="color: black;">Email</h6>
                    <small class="text-muted"><?= $data_pendaftar['email'] ?></small>
                  </li>
                  <li class="list-group-item">
                    <h6 class="mb-0" style="color: black;">Telephone</h6>
                    <small class="text-muted"><?= $data_pendaftar['telepon'] ?></small>
                  </li>
                </ul>
              </div>
            </div>
          </div>
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
