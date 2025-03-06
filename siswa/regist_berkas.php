<?php 
session_start();
include('../config/auto_load.php'); 
include('dashboard_control.php'); 
include('../template/headersiswa.php'); 

// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'pendaftaran');
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Cek apakah pendaftar sudah ada
$result = $conn->query("SELECT id, is_verified FROM pendaftar ORDER BY id DESC LIMIT 1");
$data_pendaftar = $result->fetch_assoc();
$pendaftar_id = $data_pendaftar['id'] ?? null;

// Cek apakah berkas sudah lengkap
$berkas_lengkap = false;
if ($pendaftar_id) {
    $result = $conn->query("SELECT * FROM berkas WHERE pendaftar_id = $pendaftar_id");
    if ($result->num_rows > 0) {
        $data_berkas = $result->fetch_assoc();
        $berkas_lengkap = !empty($data_berkas['kartu_keluarga']) && 
                          !empty($data_berkas['ktp']) && 
                          !empty($data_berkas['ijazah']) && 
                          !empty($data_berkas['akte_kelahiran']);
    }
}

$conn->close();
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<div class="container-fluid">
<!-- Menampilkan peringatan jika data belum lengkap -->
<?php if (!$berkas_lengkap): ?>
    <div class="alert alert-warning text-center" role="alert">
        <strong>Perhatian!</strong> Segera lengkapi berkas pendaftaran untuk keperluan pendaftaran. ⚠️
    </div>
<?php else: ?>
    <div class="alert alert-success text-center" role="alert">
        <strong>Berkas sudah lengkap, Terimakasih!</strong> ✅
    </div>
<?php endif; ?>

<!-- Menampilkan Form jika data belum lengkap -->
<?php if (!$berkas_lengkap): ?>
        <h1 class="h3 mb-4 text-gray-800">Lengakapi berkas pendaftaran siswa</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">FORMULIR BERKAS</h6>
                    </div>
                    <div class="card-body">
                        <h5><strong>File harus dalam bentuk PDF</strong></h5>
                        <?php if(isset($_SESSION['pesan_sukses'])) { ?>
                        <div class="alert alert-success"><?= $_SESSION['pesan_sukses'] ?></div>
                        <?php unset($_SESSION['pesan_sukses']); } ?>

                        <form id="form-upload" action="upload.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                            <label for="kartu_keluarga">Kartu Keluarga (KK):</label>
                            <div class="custom-file">
                                <input type="file" name="kartu_keluarga" accept="application/pdf" class="custom-file-input" required>
                                <label class="custom-file-label" for="kartu_keluarga">
                                <?= !empty($existingFiles['kartu_keluarga']) ? $existingFiles['kartu_keluarga'] : 'pilih file' ?>
                                </label>
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="ktp">KTP Bapak/Ibu/Wali (diperbesar):</label>
                            <div class="custom-file">
                                <input type="file" name="ktp" accept="application/pdf" class="custom-file-input" required>
                                <label class="custom-file-label" for="ktp">
                                  <?= !empty($existingFiles['ktp']) ? $existingFiles['ktp'] : 'pilih file' ?>
                                </label>
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="ijazah">Ijazah atau SKL SD/MI:</label>
                            <div class="custom-file">
                                <input type="file" name="ijazah" accept="application/pdf" class="custom-file-input" required>
                                <label class="custom-file-label" for="ijazah">
                                  <?= !empty($existingFiles['ijazah']) ? $existingFiles['ijazah'] : 'pilih file' ?>
                                </label>
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="akte_kelahiran">Akte Kelahiran:</label>
                            <div class="custom-file">
                                <input type="file" name="akte_kelahiran" accept="application/pdf" class="custom-file-input" required>
                                <label class="custom-file-label" for="akte_kelahiran">
                                  <?= !empty($existingFiles['akte_kelahiran']) ? $existingFiles['akte_kelahiran'] : 'pilih file' ?>
                                </label>
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="buku_kjp">Buku Rekening KJP/PIP/PKH (Opsional):</label>
                            <div class="custom-file">
                                <input type="file" name="buku_kjp" accept="application/pdf" class="custom-file-input">
                                <label class="custom-file-label" for="buku_kjp">
                                  <?= !empty($existingFiles['buku_kjp']) ? $existingFiles['buku_kjp'] : 'pilih file' ?>
                                </label>
                            </div>
                            </div>

                            <div class="text-right">
                                <input class="btn btn-primary" type="submit" name="submit" value="Upload">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
<script>
  document.querySelectorAll('.custom-file-input').forEach(input => {
    input.addEventListener('change', function () {
      let fileName = this.files[0].name;
      let label = this.nextElementSibling;
      label.textContent = fileName;
    });
  });
</script>
<?php endif; ?>
</div>

<?php include('../template/footer.php'); ?>
