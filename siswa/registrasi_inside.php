<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  

  <title>Registration of Student Registration Applications</title>


 

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- css datepicker -->
  <link href="../assets/vendor/datepicker/css/bootstrap-datepicker.css" rel="stylesheet">

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
                    <h1 class="h4 text-gray-900 mb-4">Input Data</h1>
                    <h1 class="h4 text-gray-900 mb-4"><b>MTs Assa'adah Cakung</b></h1>
                  </div>
                  <form class="user" action="registrasi_inside_control.php" method="POST">
                    <div class="form-group">
                        <label for="nokk">Nomor KK</label>
                        <input type="text" class="form-control" id="nokk" placeholder="Enter KK Number" name="nokk">
                    </div>
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" class="form-control" id="nik" placeholder="Enter NIK" name="nik">
                    </div>
                    <div class="form-group">
                        <label for="anakke">Anak Ke</label>
                        <input type="text" class="form-control" id="anakke" placeholder="Enter number" name="anakke">
                    </div>
                    <div class="form-group">
                        <label for="jmlsaudara">Jumlah Saudara</label>
                        <input type="text" class="form-control" id="jmlsaudara" placeholder="Enter number" name="jmlsaudara">
                    </div>
                    <div class="form-group">
                        <label for="hobi">Hobi</label>
                        <input type="text" class="form-control" id="hobi" placeholder="Enter hobi" name="hobi">
                    </div>
                    <div class="form-group">
                        <label for="citacita">Cita Cita</label>
                        <input type="text" class="form-control" id="citacita" placeholder="Enter cita cita" name="citacita">
                    </div>
                
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Pra Sekolah</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="prasekolah" id="tk" value="1">
                                <label class="form-check-label" for="tk">
                                    Pernah TK
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="prasekolah" id="pd" value="2">
                                <label class="form-check-label" for="pd">
                                    Pernah PAUD
                                </label>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <label>Imunisasi</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="imunisasi" id="il" value="1">
                                <label class="form-check-label" for="il">
                                    Imunisasi Lengkap
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="imunisasi" id="ti" value="2">
                                <label class="form-check-label" for="ti">
                                    Tidak Imunisasi
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="imunisasi" id="vc" value="3">
                                <label class="form-check-label" for="vc">
                                    Vaksin Covid-19
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="sekolahasal">Sekolah Asal</label>
                            <input name="sekolahasal" type="text" class="form-control" id="sekolahasal" placeholder="Sekolah Asal">
                    </div>

                    <button name="btn_registrasi" value="simpan" class="btn btn-primary btn-user btn-block">
                      Simpan data
                    </button>
                  </form>
                  
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

</body>

</html>
