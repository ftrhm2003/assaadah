<?php 
// Menahan output agar tidak mengganggu session_start()
ob_start(); 

// Pastikan sesi belum dimulai sebelum memulai
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    
}
?>

<?php
$registrasi_file = 'config/registrasi_status.json';
$registrasi_status = json_decode(file_get_contents($registrasi_file), true)["tampilkan"];
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>MTs Assa'adah Cakung</title>

<link rel="icon" href="assets/LOGO_MTS.png" type="image/png" sizes="32x32">


    <link rel="stylesheet" href="index.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <!-- Custom fonts for this template-->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  

</head>
<body>
<section id="topbar" class="mb-2 mb-lg-0 mb-sm-0 d-none d-lg-flex align-items-center pt-2 pb-2 bg-primary text-white topbar-transparent">
        <div class="container">
          <div class="row">
            <div class="col-lg-6   text-start">
          <i class="bi bi-clock"></i> Senin - Jumat: 07:00 - 15:00 
            </div>
            <div class="col-md-6 text-end">
                <a href="https://www.facebook.com/mts.assaadah.3" class="text-white mx-2"><i class="bi bi-facebook"></i></a>
                <a href="https://www.instagram.com/mtsassaadah?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" class="text-white mx-2"><i class="bi bi-instagram"></i></a>
                <a href="https://www.youtube.com/@mtsassaadahofficial3446" class="text-white mx-2"><i class="bi bi-youtube"></i></a>
            </div>
          </div>
        </div>
      </section>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="#">
    <img src="assets/image.png" alt="Logo Website" class="me-2" style="height: 80px;">
</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">BERANDA</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">TENTANG</a></li>
                    <li class="nav-item"><a class="nav-link" href="news_user.php">BERITA</a></li>
                    <li class="nav-item"><a class="nav-link" href="agenda.php">AGENDA</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php">REGISTRASI</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php #contact">KONTAK</a></li>
                </ul>
            </div>
        </div>
    </nav>
    
<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center" >

      <div class="col-md-7">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-md-12">
                <div class="p-5">
                  <div class="text-center">
                    

                    <h1 class="h4 text-gray-900" style="margin-bottom: 20px;">PENDAFTARAN SISWA</h1>
                    

                    <?php 
                    // Tampilkan pesan registrasi jika ada
                    if(isset($_SESSION['pesan_registrasi'])) { ?>
                        <div class="alert alert-success">
                            <?= $_SESSION['pesan_registrasi']; ?>
                        </div>
                        <?php unset($_SESSION['pesan_registrasi']); // Hapus setelah ditampilkan 
                    }

                    // Tampilkan pesan error login jika ada
                    if(isset($_SESSION['login_error'])) { ?>
                        <div class="alert alert-danger">
                            <?= $_SESSION['login_error']; ?>
                        </div>
                        <?php unset($_SESSION['login_error']); // Hapus setelah ditampilkan 
                    }
                    ?>

                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

                    <form class="user" action="login_control.php" method="POST">
                        <div class="form-group" style="margin-bottom: 20px;">
                            <input type="text" name="username" class="form-control form-control-user" id="username" 
                                placeholder="Email" style="text-align: center;">
                        </div>
                        
                        <div class="form-group" style="margin-bottom: 20px; position: relative;">
                            <input type="password" name="password" class="form-control form-control-user" id="password" 
                                placeholder="Password" style="text-align: center;">
                            
                            <!-- Toggle Eye Icon -->
                            <span id="togglePassword" 
                                style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); cursor: pointer;">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>

                        <button type="submit" name="btn_login" value="login" class="btn btn-primary btn-user btn-block" 
                            style="display: block; margin: auto;">
                            Masuk
                        </button>
                        <div class="text-center mt-2">
                      <a class="small" href="forgot_password_form.php">Lupa Password!</a>
                  </div>
                    </form>
                    <hr>
                  <?php if ($registrasi_status): ?>
                      <div class="text-center">
                          <a class="small" href="registrasi.php">Pendaftaran Siswa Baru!</a>
                      </div>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
        </div>
        <?php 
        // Pastikan sesi hanya dihancurkan jika aktif
        if (session_status() === PHP_SESSION_ACTIVE) {
            session_destroy();
        }
        ?>
    
<!-- jQuery (Pastikan di-load lebih dahulu) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript -->
<script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts -->
<script src="assets/js/sb-admin-2.min.js"></script>

<!-- File JavaScript Custom -->
<script src="java.js"></script>
<script>
 document.getElementById("togglePassword").addEventListener("click", function() {
  var passwordField = document.getElementById("password");
  var icon = this.querySelector("i");

    if (passwordField.type === "password") {
       passwordField.type = "text";
      icon.classList.remove("fa-eye");
      icon.classList.add("fa-eye-slash"); // Ubah ke ikon mata tertutup
        } else {
          passwordField.type = "password";
          icon.classList.remove("fa-eye-slash");
          icon.classList.add("fa-eye"); // Ubah ke ikon mata terbuka
                }
        });
</script>


<footer id="contact" style="
    background: #343a40; 
    color: white; 
    text-align: center; 
    padding: 10px 0; 
    width: 100%; 
    position: absolute; 
    bottom: 0;">
    <div class="layar-dalam">
        <div class="copyright mb-2">&copy; 2025 MTs Assa'adah</div>
    </div>
</footer>


</body>
</body>
</html>

<?php 
// Mengirim output setelah semua proses selesai
ob_end_flush(); 
?>
