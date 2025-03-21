<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  

  <title>Pendaftaran Aplikasi Registrasi Siswa</title>


 

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- css datepicker -->
  <link href="assets/vendor/datepicker/css/bootstrap-datepicker.css" rel="stylesheet">

  <style>
    .logo-login {
        max-height: 160px;
        margin-bottom: 20px;
    }
  </style>

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-md-7">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-md-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Pendaftaran akun siswa baru</h1>
                    <h1 class="h4 text-gray-900 mb-4"><b>MTs Assa'adah Cakung</b></h1>
                  </div>
                  <form class="user" action="registrasi_control.php" method="POST">
                    <div class="form-group">
                        <label for="nama">Name</label>
                        <input type="text" class="form-control" id="nama" placeholder="Enter name" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="nama">NISN</label>
                        <input type="text" class="form-control" id="nisn" placeholder="Enter NISN" name="nisn">
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="tempat_lahir">Tempat lahir</label>
                            <input type="text" class="form-control" id="tempat_lahir" placeholder="Place of birth" name="tempat_lahir">
                        </div>
                        <div class="col-md-6">
                            <label for="tanggal_lahir">Tanggal lahir</label>
                            <input type="text" class="form-control datepicker" id="tanggal_lahir" placeholder="Date of birth"  name="tanggal_lahir">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Jenis kelamin</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="lk" value="L">
                                <label class="form-check-label" for="lk">
                                    Laki-laki
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="pr" value="P">
                                <label class="form-check-label" for="pr">
                                    Perempuan
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="agama">Agama</label>
                            <select name="agama" id="agama" class="form-control">
                                <option value="">Pilih agama</option>
                                <option value="islam">Islam</option>
                                <option value="kristen">Kristen</option>
                                <option value="katolik">Katolik</option>
                                <option value="hindu">Hindu</option>
                                <option value="budha">Budha</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control"></textarea>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="email">Email</label>
                            <input name="email" type="email" class="form-control" id="email" placeholder="Email">
                        </div>
                        <div class="col-md-6">
                            <label for="telepon">Telepon</label>
                            <input name="telepon" type="text" class="form-control" id="telepon" placeholder="Telephone">
                        </div>
                    </div>

                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

                    <div class="form-group row">
                        <!-- Input Password -->
                        <div class="col-md-6">
                            <label for="password">Password</label>
                            <div class="input-group">
                                <input name="password" type="password" class="form-control" id="password" placeholder="Password">
                                <div class="input-group-append">
                                    <span class="input-group-text toggle-password" data-target="password" style="cursor: pointer;">
                                        <i class="fas fa-eye"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Input Ulangi Password -->
                        <div class="col-md-6">
                            <label for="ulangi_password">Ulangi Password</label>
                            <div class="input-group">
                                <input name="ulangi_password" type="password" class="form-control" id="ulangi_password" placeholder="Repeat the password">
                                <div class="input-group-append">
                                    <span class="input-group-text toggle-password" data-target="ulangi_password" style="cursor: pointer;">
                                        <i class="fas fa-eye"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button name="btn_registrasi" value="simpan" class="btn btn-primary btn-user btn-block">
                      Daftarkan
                    </button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="login.php">Apakamu sudah memiliki akun? Login!</a>
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

  <!-- js datepicker -->
  <script src="assets/vendor/datepicker/js/bootstrap-datepicker.min.js"></script>

  <script type="text/javascript">
    $(function(){
        $(".datepicker").datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            todayHighlight: true,
        });
    });
  </script>

  <script>
  document.querySelectorAll(".toggle-password").forEach(function(element) {
      element.addEventListener("click", function() {
          var targetId = this.getAttribute("data-target");
          var passwordField = document.getElementById(targetId);
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
  });
  </script>
</body>

</html>
