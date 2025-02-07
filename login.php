<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My school</title>

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
             <span class="px-3"><i class="bi bi-phone "></i> +62 134334773 </span>
          <i class="bi bi-clock"></i> Mon-Sat: 11:00 AM - 23:00 PM
            </div>
            <div class="col-md-6 text-end">
                <a href="" class="me-4 text-reset">
                    <i class="bi bi-facebook"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="bi bi-twitter"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="bi bi-google"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="bi bi-instagram"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="bi bi-linkedin"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="bi bi-github"></i>
                </a>
            </div>
          </div>
        </div>
      </section>
    <nav>
        <div class="wrapper1">
        <div class="logo">
        <img src="assets/assadah.png" alt="Logo Website">
        </div>
            <div class="menu">
                <ul>
                <li><a href="index.php">BERANDA</a></li>
                    <li><a href="about.html">TENTANG</a></li>
                    <li><a href="news_user.php">BERITA</a></li>
                    <li><a href="agenda.php">AGENDA</a></li>
                    <li><a href="login.php">REGISTRASI</a></li>
                    <li><a href="index.php#contact">KONTAK</a></li>
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
                    session_start();
                    
                    if(isset($_SESSION['pesan_registrasi'])) { ?>

                    <div class="alert alert-success">
                      <?= $_SESSION['pesan_registrasi'] ?>
                    </div>
 
                    <?php } 
                    
                    if(isset($_SESSION['login_error'])) { ?>

                    <div class="alert alert-danger">
                      <?= $_SESSION['login_error'] ?>
                    </div>

                    <?php } 
                    
                    session_destroy();
                    
                    ?>

                  </div>
                  <form class="user" action="login_control.php" method="POST">
                    <div class="form-group" style="margin-bottom: 20px;">
                      <input type="text" name="username" class="form-control form-control-user" id="username" placeholder="Enter the username" style="text-align: center;">
                    </div>
                    <div class="form-group" style="margin-bottom: 20px;">
                      <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" style="text-align: center;">
                    </div>
                    <button type="submit" name="btn_login" value="login" href="" class="btn btn-primary btn-user btn-block" style="display: block; margin: auto;">
                      Masuk
                    </button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="registrasi.php">Pendaftaran Siswa Baru!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
    
  <!-- Bootstrap core JavaScript-->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="assets/js/sb-admin-2.min.js"></script>

  <footer id="contact">
            <div class="layar-dalam">
                <div class="copyright">&copy; 2020 My school</div>
            </div>
        </footer>
        <script src="java.js"></script>

</body>
</body>
</html>
