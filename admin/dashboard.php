<?php
ob_start(); // Menyimpan output dalam buffer
session_start();
?>

<?php include('../config/auto_load.php'); ?>

<?php include('dashboard_control.php') ?>

<?php include('../template/header.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
  <div class="row">
    <div class="col-md-6">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="h3 font-weight-bold text-info text-uppercase mb-1">Pendaftar Masuk</div>

                <div class="h5 mt-3 font-weight-bold">
                  <?= mysqli_num_rows($jml_pendaftar) ?> Siswa
                </div>
                <div class="row no-gutters align-items-center">
                  
                  <div class="col">
                    <div class="progress progress-sm mr-2">
                      <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-users fa-2x text-gray-300" style="font-size: 90px;"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="h3 font-weight-bold text-success text-uppercase mb-1">Data Terverifikasi</div>

                  <div class="h5 mt-3 font-weight-bold">
                    <?= mysqli_num_rows($jml_lolos) ?> Siswa
                  </div>
                  <div class="row no-gutters align-items-center">
                    
                    <div class="col">
                      <div class="progress progress-sm mr-2">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-users fa-2x text-gray-300" style="font-size: 90px;"></i>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>


<?php

$file = '../hasil_seleksi.json';

// Jika file tidak ada, buat file kosong
if (!file_exists($file)) {
    file_put_contents($file, json_encode([]));
}

// Fungsi untuk membaca hasil seleksi
function getSeleksi() {
    global $file;
    return json_decode(file_get_contents($file), true);
}

// Fungsi untuk menyimpan hasil seleksi
function saveSeleksi($data) {
    global $file;
    file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));
}

// Ambil status seleksi saat ini
$seleksi = getSeleksi();
$status = $seleksi['status'] ?? null;

// **Proses Pengumuman**
if (isset($_POST['submit'])) {
    $status = $_POST['status']; // 1 = Lolos Semua, 2 = Tidak Lolos Semua

    $seleksi = ["status" => $status]; // Simpan status seleksi global

    saveSeleksi($seleksi);

    $_SESSION['pesan_sukses'] = "Pengumuman berhasil dikirim ke semua pendaftar!";
    header("Location: dashboard.php");
    exit;
}

// **Fitur Hapus Pengumuman**
if (isset($_POST['hapus_pengumuman'])) {
    file_put_contents($file, json_encode([])); // Reset file JSON
    $_SESSION['pesan_sukses'] = "Semua pengumuman telah dihapus!";
    header("Location: dashboard.php");
    exit;
}
?>

  <hr class="mt-3">
  <div class="row">
    <div class="col-md-12">
    <div class="col-md-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">PENGUMUMAN HASIL PENDAFTARAN</h6>
            </div>
            <div class="card-body">
            <?php if (isset($_SESSION['pesan_sukses'])): ?>
        <p style="color: green;"><?php echo $_SESSION['pesan_sukses']; unset($_SESSION['pesan_sukses']); ?></p>
    <?php endif; ?>

    <h3>Status Pengumuman:</h3>
    <?php if ($status === null): ?>
        <p style="color: red;">Belum ada pengumuman.</p>
    <?php elseif ($status == 1): ?>
        <p style="color: green;">✔ Pengumuman telah dikirim: **Semua pendaftar LOLOS**</p>
    <?php elseif ($status == 2): ?>
        <p style="color: red;">⏱ Pengumuman telah dikirim: **Pendaftaran sedang di proses**</p>
    <?php endif; ?>

    <hr>

    <h3>Umumkan Hasil Pendaftaran:</h3>
    <form method="POST">
        <label for="status">Pilih Hasil Pendaftaran:</label>
        <select name="status">
            <option value="">Pilih</option>
            <option value="1">Lolos Semua</option>
            <option value="2">Proses pendaftaran</option>
        </select>
        <br>
        <button type="submit" name="submit">Umumkan Hasil pendaftaran</button>
    </form>

    <hr>

    <h3>Hapus Pengumuman:</h3>
    <form method="POST">
        <button type="submit" name="hapus_pengumuman" style="background-color: red; color: white;">
            Hapus Semua Pengumuman
        </button>
    </form>


                
            </div>
        </div>
    </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

<?php include('../template/footer.php'); ?>