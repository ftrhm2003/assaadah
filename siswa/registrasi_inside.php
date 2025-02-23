<?php
include('../config/auto_load.php');  // Memanggil session_start() dari auto_load.php
include('paymentcontrol.php');  // Mengikutkan logika pembayaran

include('../template/headersiswa.php');  // Menyertakan header template
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Registrasi data siswa</h1>

    <!-- Alert Notification -->
    <?php if (isset($_SESSION['pesan_sukses'])) { ?>
        <div class="alert alert-success">
            <?= $_SESSION['pesan_sukses']; ?>
        </div>
        <?php unset($_SESSION['pesan_sukses']); ?>
    <?php } ?>


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
                  <h6 class="m-0 font-weight-bold text-primary">Data siswa :</h6>
                  <br>
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
                                <input class="form-check-input" type="radio" name="prasekolah" id="tk" value="Pernah TK">
                                <label class="form-check-label" for="tk">
                                    Pernah TK
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="prasekolah" id="pd" value="Pernah PAUD">
                                <label class="form-check-label" for="pd">
                                    Pernah PAUD
                                </label>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <label>Imunisasi</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="imunisasi" id="il" value="Imunisasi Lengkap">
                                <label class="form-check-label" for="il">
                                    Imunisasi Lengkap
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="imunisasi" id="ti" value="Tidak Imunisasi">
                                <label class="form-check-label" for="ti">
                                    Tidak Imunisasi
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="imunisasi" id="vc" value="Vaksin Covid-19">
                                <label class="form-check-label" for="vc">
                                    Vaksin Covid-19
                                </label>
                            </div>
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <label for="sekolahasal">Sekolah Asal</label>
                        <input name="sekolahasal" type="text" class="form-control" id="sekolahasal" placeholder="Sekolah Asal">
                    </div>

                    <br>

                    <h6 class="m-0 font-weight-bold text-primary">Data orang tua/wali:</h6>
                    <div class="form-group">
                        <label for="nama_ayah">Nama Ayah</label>
                        <input type="text" class="form-control" id="nama_ayah" placeholder="isi nama ayah" name="nama_ayah">
                    </div>
                    <div class="form-group">
                        <label for="nik_ayah">NIK Ayah</label>
                        <input type="text" class="form-control" id="nik_ayah" placeholder="isi nik ayah" name="nik_ayah">
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Pendidikan terakhir Ayah</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pendidikan_ayah" id="sd" value="SD">
                                <label class="form-check-label" for="sd">
                                    SD
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pendidikan_ayah" id="smp" value="SMP">
                                <label class="form-check-label" for="smp">
                                    SMP
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pendidikan_ayah" id="sma" value="SMA">
                                <label class="form-check-label" for="sma">
                                    SMA
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pendidikan_ayah" id="d3" value="D3">
                                <label class="form-check-label" for="d3">
                                    D3
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pendidikan_ayah" id="s1" value="S1">
                                <label class="form-check-label" for="s1">
                                    S1
                                </label>
                            </div>
                        </div>
                    <div class="form-group">
                        <label for="nohp_ayah">No Telepon Ayah</label>
                        <input type="text" class="form-control" id="nohp_ayah" placeholder="isi no telepon ayah" name="nohp_ayah">
                    </div>
                    <div class="form-group">
                        <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                        <input type="text" class="form-control" id="pekerjaan_ayah" placeholder="isi pekerjaan ayah" name="pekerjaan_ayah">
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Penghasilan Ayah</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="penghasilan_ayah" id="gaji1" value="Kurang dari 500.000">
                                <label class="form-check-label" for="gaji1">
                                    Kurang dari 500.000
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="penghasilan_ayah" id="gaji2" value="500.000 - 1000.000">
                                <label class="form-check-label" for="gaji2">
                                    500.000 - 1000.000
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="penghasilan_ayah" id="gaji3" value="1000.000 - 2000.000">
                                <label class="form-check-label" for="gaji3">
                                    1000.000 - 2000.000
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="penghasilan_ayah" id="gaji4" value="2000.000 - 3000.000">
                                <label class="form-check-label" for="gaji4">
                                    2000.000 - 3000.000
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="penghasilan_ayah" id="gaji5" value="3000.000 - 5000.000">
                                <label class="form-check-label" for="gaji5">
                                    3000.000 - 5000.000
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="penghasilan_ayah" id="gaji6" value="Tidak ada penghasilan">
                                <label class="form-check-label" for="gaji6">
                                    Tidak ada penghasilan
                                </label>
                            </div>
                        </div>
                        
                    <div class="form-group">
                        <label for="nama_ibu">Nama Ibu</label>
                        <input type="text" class="form-control" id="nama_ibu" placeholder="isi nama ibu" name="nama_ibu">
                    </div>
                    <div class="form-group">
                        <label for="nik_ibu">NIK Ibu</label>
                        <input type="text" class="form-control" id="nik_ibu" placeholder="isi nik ibu" name="nik_ibu">
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Pendidikan terakhir Ibu</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pendidikan_ibu" id="sd" value="SD">
                                <label class="form-check-label" for="sd">
                                    SD
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pendidikan_ibu" id="smp" value="SMP">
                                <label class="form-check-label" for="smp">
                                    SMP
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pendidikan_ibu" id="sma" value="SMA">
                                <label class="form-check-label" for="sma">
                                    SMA
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pendidikan_ibu" id="d3" value="D3">
                                <label class="form-check-label" for="d3">
                                    D3
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pendidikan_ibu" id="s1" value="S1">
                                <label class="form-check-label" for="s1">
                                    S1
                                </label>
                            </div>
                        </div>
                    <div class="form-group">
                        <label for="nohp_ibu">No Telepon Ibu</label>
                        <input type="text" class="form-control" id="nohp_ibu" placeholder="isi no telepon ibu" name="nohp_ibu">
                    </div>
                    <div class="form-group">
                        <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                        <input type="text" class="form-control" id="pekerjaan_ibu" placeholder="isi pekerjaan ibu" name="pekerjaan_ibu">
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Penghasilan Ibu</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="penghasilan_ibu" id="gaji1" value="Kurang dari 500.000">
                                <label class="form-check-label" for="gaji1">
                                    Kurang dari 500.000
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="penghasilan_ibu" id="gaji2" value="500.000 - 1000.000">
                                <label class="form-check-label" for="gaji2">
                                    500.000 - 1000.000
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="penghasilan_ibu" id="gaji3" value="1000.000 - 2000.000">
                                <label class="form-check-label" for="gaji3">
                                    1000.000 - 2000.000
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="penghasilan_ibu" id="gaji4" value="2000.000 - 3000.000">
                                <label class="form-check-label" for="gaji4">
                                    2000.000 - 3000.000
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="penghasilan_ibu" id="gaji5" value="3000.000 - 5000.000">
                                <label class="form-check-label" for="gaji5">
                                    3000.000 - 5000.000
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="penghasilan_ibu" id="gaji6" value="Tidak ada penghasilan">
                                <label class="form-check-label" for="gaji6">
                                    Tidak ada penghasilan
                                </label>
                            </div>
                        </div>
                    <h6 class="m-0 font-weight-bold text-primary">Data Wali (di isi jika siswa tinggal bersama wali/bukan orang tua):</h6>  
                    <div class="form-group">
                        <label for="nama_wali">Nama Wali</label>
                        <input type="text" class="form-control" id="nama_wali" placeholder="isi nama wali" name="nama_wali">
                    </div>
                    <div class="form-group">
                        <label for="nik_wali">NIK Wali</label>
                        <input type="text" class="form-control" id="nik_wali" placeholder="isi nik wali" name="nik_wali">
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Pendidikan terakhir Wali</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pendidikan_wali" id="sd" value="SD">
                                <label class="form-check-label" for="sd">
                                    SD
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pendidikan_wali" id="smp" value="SMP">
                                <label class="form-check-label" for="smp">
                                    SMP
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pendidikan_wali" id="sma" value="SMA">
                                <label class="form-check-label" for="sma">
                                    SMA
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pendidikan_wali" id="d3" value="D3">
                                <label class="form-check-label" for="d3">
                                    D3
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pendidikan_wali" id="s1" value="S1">
                                <label class="form-check-label" for="s1">
                                    S1
                                </label>
                            </div>
                        </div>
                    <div class="form-group">
                        <label for="nohp_wali">No Telepon Wali</label>
                        <input type="text" class="form-control" id="nohp_wali" placeholder="isi no telepon wali" name="nohp_wali">
                    </div>
                    <div class="form-group">
                        <label for="pekerjaan_wali">Pekerjaan Wali</label>
                        <input type="text" class="form-control" id="pekerjaan_wali" placeholder="isi pekerjaan wali" name="pekerjaan_wali">
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Penghasilan Wali</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="penghasilan_wali" id="gaji1" value="Kurang dari 500.000">
                                <label class="form-check-label" for="gaji1">
                                    Kurang dari 500.000
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="penghasilan_wali" id="gaji2" value="500.000 - 1000.000">
                                <label class="form-check-label" for="gaji2">
                                    500.000 - 1000.000
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="penghasilan_wali" id="gaji3" value="1000.000 - 2000.000">
                                <label class="form-check-label" for="gaji3">
                                    1000.000 - 2000.000
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="penghasilan_wali" id="gaji4" value="2000.000 - 3000.000">
                                <label class="form-check-label" for="gaji4">
                                    2000.000 - 3000.000
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="penghasilan_wali" id="gaji5" value="3000.000 - 5000.000">
                                <label class="form-check-label" for="gaji5">
                                    3000.000 - 5000.000
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="penghasilan_wali" id="gaji6" value="Tidak ada penghasilan">
                                <label class="form-check-label" for="gaji6">
                                    Tidak ada penghasilan
                                </label>
                            </div>
                            <div class="form-group">
                            <label for="hubungan_wali">Hubungan dengan Siswa</label>
                            <input type="text" class="form-control" id="hubungan_wali" placeholder="isi hubungan dengan siswa" name="hubungan_wali">
                            </div>

                            <h6 class="m-0 font-weight-bold text-primary">Data bantuan pemerintah (di isi jika ada):</h6>

                            <div class="form-group">
                            <label for="rek_kjp">No rekening KJP</label>
                            <input type="text" class="form-control" id="rek_kjp" placeholder="isi no rekening kjp" name="rek_kjp">
                            </div>

                            <div class="form-group">
                            <label for="rek_pip">No rekening PIP</label>
                            <input type="text" class="form-control" id="rek_pip" placeholder="isi no rekening pip" name="rek_pip">
                            </div>

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

</div>
<!-- /.container-fluid -->

<?php include('../template/footer.php'); ?>
