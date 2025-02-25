<?php
include('../config/auto_load.php');  // Memanggil session_start() dari auto_load.php
include('paymentcontrol.php');  // Mengikutkan logika pembayaran

include('../template/headersiswa.php');  // Menyertakan header template
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Warning Alert -->
<?php if(isset($data_pendaftar['is_verified']) && $data_pendaftar['is_verified'] == 0) { ?>
    <div class="alert alert-warning text-center" role="alert">
      <strong>Perhatian!</strong> Segera lengkapi data tambahan untuk keperluan pendaftaran. <br>
      
    </div>
  <?php } else { ?>
    <div class="alert alert-success text-center" role="alert">
      <strong>Data sudah lengkap!</strong> ✅
    </div>
  <?php } ?>

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Registrasi data siswa</h1>

    <!-- Alert Notification -->
    <?php if (isset($_SESSION['pesan_sukses'])) { ?>
        <div class="alert alert-success">
            <?= $_SESSION['pesan_sukses']; ?>
        </div>
        <?php unset($_SESSION['pesan_sukses']); ?>
    <?php } ?>

      
        <div class="card shadow mb-4">
          <div class="card-body">
            <form class="user" action="registrasi_inside_control.php" method="POST">
                <h6 class="m-0 font-weight-bold text-primary mb-3">Data Siswa:</h6>
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
                <div class="form-group">
                <label for="prasekolah">Pra Sekolah</label>
                    <select class="form-control" id="prasekolah" name="prasekolah">
                        <option value="">-- Pilih Prasekolah --</option>
                        <option value="Pernah TK">Pernah TK</option>
                        <option value="Pernah PAUD">Pernah PAUD</option>
                    </select>
                </div>
                <div class="form-group">
                <label for="imunisasi">IMUNISASI</label>
                    <select class="form-control" id="imunisasi" name="imunisasi">
                        <option value="">-- Pilih Imunisasi --</option>
                        <option value="Imunisasi Lengkap">Imunisasi Lengkap</option>
                        <option value="Tidak Imunisasi">Tidak Imunisasi</option>
                        <option value="Vaksin Covid-19">Vaksin Covid-19</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="sekolahasal">Sekolah Asal</label>
                    <input name="sekolahasal" type="text" class="form-control" id="sekolahasal" placeholder="Sekolah Asal">
                </div>
                

                <h6 class="m-0 font-weight-bold text-primary mt-4 mb-3">Data orang tua:</h6>
                <div class="form-group">
                    <label for="nama_ayah">Nama Ayah</label>
                    <input type="text" class="form-control" id="nama_ayah" placeholder="isi nama ayah" name="nama_ayah">
                </div>
                <div class="form-group">
                    <label for="nik_ayah">NIK Ayah</label>
                    <input type="text" class="form-control" id="nik_ayah" placeholder="isi nik ayah" name="nik_ayah">
                </div>
                <div class="form-group">
                <label for="pendidikan_ayah">Pendidikan terakhir Ayah</label>
                    <select class="form-control" id="pendidikan_ayah" name="pendidikan_ayah">
                        <option value="">-- Pilih Pendidikan Ayah --</option>
                        <option value="SD">SD</option>
                        <option value="SMP">SMP</option>
                        <option value="SMA">SMA</option>
                        <option value="D3">D3</option>
                        <option value="S1">S1</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nohp_ayah">No Telepon Ayah (jika ada)</label>
                    <input type="text" class="form-control" id="nohp_ayah" placeholder="isi no telepon ayah" name="nohp_ayah">
                </div>
                <div class="form-group">
                    <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                    <input type="text" class="form-control" id="pekerjaan_ayah" placeholder="isi pekerjaan ayah" name="pekerjaan_ayah">
                </div>
                <div class="form-group">
                <label for="penghasilan_ayah">Penghasilan Ayah</label>
                    <select class="form-control" id="penghasilan_ayah" name="penghasilan_ayah">
                        <option value="">-- Pilih Pendidikan Ayah --</option>
                        <option value="Kurang dari 500.000">Kurang dari 500.000</option>
                        <option value="500.000 - 1000.000">500.000 - 1000.000</option>
                        <option value="1000.000 - 2000.000">1000.000 - 2000.000</option>
                        <option value="2000.000 - 3000.000">2000.000 - 3000.000</option>
                        <option value="3000.000 - 5000.000">3000.000 - 5000.000</option>
                        <option value="Tidak ada penghasilan">Tidak ada penghasilan</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="nama_ibu">Nama Ibu</label>
                    <input type="text" class="form-control" id="nama_ibu" placeholder="isi nama ibu" name="nama_ibu">
                </div>
                <div class="form-group">
                    <label for="nik_ibu">NIK Ibu</label>
                    <input type="text" class="form-control" id="nik_ibu" placeholder="isi nik ibu" name="nik_ibu">
                </div>
                <div class="form-group">
                <label for="pendidikan_ibu">Pendidikan terakhir Ibu</label>
                    <select class="form-control" id="pendidikan_ibu" name="pendidikan_ibu">
                        <option value="">-- Pilih Pendidikan Ibu --</option>
                        <option value="SD">SD</option>
                        <option value="SMP">SMP</option>
                        <option value="SMA">SMA</option>
                        <option value="D3">D3</option>
                        <option value="S1">S1</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nohp_ibu">No Telepon Ibu (jika ada)</label>
                    <input type="text" class="form-control" id="nohp_ibu" placeholder="isi no telepon ibu" name="nohp_ibu">
                </div>
                <div class="form-group">
                    <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                    <input type="text" class="form-control" id="pekerjaan_ibu" placeholder="isi pekerjaan ibu" name="pekerjaan_ibu">
                </div>
                <div class="form-group">
                <label for="penghasilan_ibu">Penghasilan Ibu</label>
                    <select class="form-control" id="penghasilan_ibu" name="penghasilan_ibu">
                        <option value="">-- Pilih Pendidikan Ibu --</option>
                        <option value="Kurang dari 500.000">Kurang dari 500.000</option>
                        <option value="500.000 - 1000.000">500.000 - 1000.000</option>
                        <option value="1000.000 - 2000.000">1000.000 - 2000.000</option>
                        <option value="2000.000 - 3000.000">2000.000 - 3000.000</option>
                        <option value="3000.000 - 5000.000">3000.000 - 5000.000</option>
                        <option value="Tidak ada penghasilan">Tidak ada penghasilan</option>
                    </select>
                </div>
               
                <h6 class="m-0 font-weight-bold text-primary mt-4 mb-3">Data Wali (di isi jika siswa tinggal bersama wali/bukan orang tua):</h6>  
                <div class="form-group">
                    <label for="nama_wali">Nama Wali</label>
                    <input type="text" class="form-control" id="nama_wali" placeholder="isi nama wali" name="nama_wali">
                </div>
                <div class="form-group">
                    <label for="nik_wali">NIK Wali</label>
                    <input type="text" class="form-control" id="nik_wali" placeholder="isi nik wali" name="nik_wali">
                </div>
                <div class="form-group">
                <label for="pendidikan_wali">Pendidikan terakhir Wali</label>
                    <select class="form-control" id="pendidikan_wali" name="pendidikan_wali">
                        <option value="">-- Pilih Pendidikan Wali --</option>
                        <option value="SD">SD</option>
                        <option value="SMP">SMP</option>
                        <option value="SMA">SMA</option>
                        <option value="D3">D3</option>
                        <option value="S1">S1</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nohp_wali">No Telepon Wali</label>
                    <input type="text" class="form-control" id="nohp_wali" placeholder="isi no telepon wali" name="nohp_wali">
                </div>
                <div class="form-group">
                    <label for="pekerjaan_wali">Pekerjaan Wali</label>
                    <input type="text" class="form-control" id="pekerjaan_wali" placeholder="isi pekerjaan wali" name="pekerjaan_wali">
                </div>
                <div class="form-group">
                <label for="penghasilan_wali">Penghasilan Wali</label>
                    <select class="form-control" id="penghasilan_wali" name="penghasilan_wali">
                        <option value="">-- Pilih Pendidikan Wali --</option>
                        <option value="Kurang dari 500.000">Kurang dari 500.000</option>
                        <option value="500.000 - 1000.000">500.000 - 1000.000</option>
                        <option value="1000.000 - 2000.000">1000.000 - 2000.000</option>
                        <option value="2000.000 - 3000.000">2000.000 - 3000.000</option>
                        <option value="3000.000 - 5000.000">3000.000 - 5000.000</option>
                        <option value="Tidak ada penghasilan">Tidak ada penghasilan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="hubungan_wali">Hubungan dengan Siswa</label>
                    <input type="text" class="form-control" id="hubungan_wali" placeholder="isi hubungan dengan siswa" name="hubungan_wali">
                </div>

                <h6 class="m-0 font-weight-bold text-primary mt-4 mb-3">Data bantuan pemerintah (di isi jika ada):</h6>
                <div class="form-group">
                    <label for="rek_kjp">No rekening KJP</label>
                    <input type="text" class="form-control" id="rek_kjp" placeholder="isi no rekening kjp" name="rek_kjp">
                </div>
                <div class="form-group">
                    <label for="rek_pip">No rekening PIP</label>
                    <input type="text" class="form-control" id="rek_pip" placeholder="isi no rekening pip" name="rek_pip">
                </div>

                <button name="btn_registrasi" value="simpan" class="btn btn-primary btn-user btn-block">
                    Simpan data
                </button>
            </form>
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
