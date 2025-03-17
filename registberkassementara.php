<?php include('../config/auto_load.php'); ?>

<?php include('dashboard_control.php'); ?>

<?php include('../template/headersiswa.php'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Lengkapi berkas</h1>
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
                      <?= !empty($existingFiles['kartu_keluarga']) ? $existingFiles['kartu_keluarga'] : 'pilih file' ?>
                    </label>
                  </div>
                </div>

                <!-- KTP -->
                <div class="form-group">
                  <label for="ktp">KTP Bapak/Ibu/Wali (diperbesar):</label>
                  <div class="custom-file">
                    <input type="file" id="ktp" name="ktp" accept="application/pdf" class="custom-file-input">
                    <label class="custom-file-label" for="ktp">
                      <?= !empty($existingFiles['ktp']) ? $existingFiles['ktp'] : 'pilih file' ?>
                    </label>
                  </div>
                </div>

                <!-- Ijazah -->
                <div class="form-group">
                  <label for="ijazah">Ijazah atau SKL SD/MI:</label>
                  <div class="custom-file">
                    <input type="file" id="ijazah" name="ijazah" accept="application/pdf" class="custom-file-input">
                    <label class="custom-file-label" for="ijazah">
                      <?= !empty($existingFiles['ijazah']) ? $existingFiles['ijazah'] : 'pilih file' ?>
                    </label>
                  </div>
                </div>

                <!-- Akte Kelahiran -->
                <div class="form-group">
                  <label for="akte_kelahiran">Akte Kelahiran:</label>
                  <div class="custom-file">
                    <input type="file" id="akte_kelahiran" name="akte_kelahiran" accept="application/pdf" class="custom-file-input">
                    <label class="custom-file-label" for="akte_kelahiran">
                      <?= !empty($existingFiles['akte_kelahiran']) ? $existingFiles['akte_kelahiran'] : 'pilih file' ?>
                    </label>
                  </div>
                </div>

                <!-- Buku KJP -->
                <div class="form-group">
                  <label for="buku_kjp">Buku Rekening KJP/PIP/PKH (Opsional):</label>
                  <div class="custom-file">
                    <input type="file" id="buku_kjp" name="buku_kjp" accept="application/pdf" class="custom-file-input">
                    <label class="custom-file-label" for="buku_kjp">
                      <?= !empty($existingFiles['buku_kjp']) ? $existingFiles['buku_kjp'] : 'pilih file' ?>
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