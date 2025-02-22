<?php include('../config/auto_load.php'); ?>
<?php include('detailpendaftar_control.php'); ?>
<?php include('../template/header.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">DETAIL PENDAFTAR</h1>
  
  <div class="row">
    <div class="col-md-6">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">DATA DIRI</h6>
        </div>
        <div class="card-body">
          <div class="card-body">
            <div class="col-auto mt-3 text-center">
              <?php
              if(isset($data_pendaftar['foto']) && $data_pendaftar['foto'] != "") {
                $foto = '../uploads/' . $data_pendaftar['foto'];
              } else {
                $foto = '../assets/img/avatar.jpg';
              }
              ?>
              <img src="<?= $foto ?>" class="img-fluid rounded-circle" alt="menunggu" style="width: 200px;">
            </div>
            <br>
            <h5 class="card-title mb-3 text-center">
              <?= $data_pendaftar['nama'] ?>
            </h5>
            <ul class="list-group">
            <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">NISN</h6>
                <small class="text-muted"><?= $data_pendaftar['nisn'] ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Tempat, tanggal lahir</h6>
                <small class="text-muted"><?= $data_pendaftar['tmpt_lahir'] ?>, <?= date("d-m-Y", strtotime($data_pendaftar['tgl_lahir'])); ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Jenis kelamin</h6>
                <?php 
                if($data_pendaftar['jenis_kelamin'] == 'L') {
                  $kelamin = "Laki-laki";
                } else {
                  $kelamin = "Perempuan";
                }
                ?>

                <small class="text-muted"><?= $kelamin ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Agama</h6>
                <small class="text-muted"><?= $data_pendaftar['agama'] ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Alamat</h6>
                <small class="text-muted"><?= $data_pendaftar['alamat'] ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Email</h6>
                <small class="text-muted"><?= $data_pendaftar['email'] ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Telepon</h6>
                <small class="text-muted"><?= $data_pendaftar['telepon'] ?></small>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">DATA PENDAFTAR SEKOLAH</h6>
        </div>
        <div class="card-body">
          <div class="card-body">

            <?php 
            if($data_pendaftarinside['status'] == 0) {
              echo '
              <div class="alert alert-warning">
                  Registrant data has not been validated
              </div>';
            } else if($data_pendaftarinside['status'] == 1) {
              echo '
              <div class="alert alert-info">
                  Registrant data is stated <b>PASSED</b>
              </div>';
            } else if($data_pendaftarinside['status'] == 2) {
              echo '
              <div class="alert alert-danger">
                  Registrant data is stated <b>NOT QUALIFY</b>
              </div>';
            }
            ?>
            
            <ul class="list-group">
            <h6 class="m-0 font-weight-bold text-dark">Data Siswa</h6>
            <br>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">No KK</h6>
                <small class="text-muted"><?= $data_pendaftarinside['nokk'] ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">NIK </h6>
                <small class="text-muted"><?= $data_pendaftarinside['nik'] ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Anak ke</h6>
                <small class="text-muted"><?= $data_pendaftarinside['anakke'] ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Jumlah Saudara Kandung</h6>
                <small class="text-muted"><?= $data_pendaftarinside['jmlsaudara'] ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Hobi</h6>
                <small class="text-muted"><?= $data_pendaftarinside['hobi'] ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Cita-cita</h6>
                <small class="text-muted"><?= $data_pendaftarinside['citacita'] ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Prasekolah</h6>
                <small class="text-muted"><?= $data_pendaftarinside['prasekolah'] ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">IMUNISASI</h6>
                <small class="text-muted"><?= $data_pendaftarinside['imunisasi'] ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Nama Sekolah Asal</h6>
                <small class="text-muted"><?= $data_pendaftarinside['sekolahasal'] ?></small>
              </li>
              </ul>
              <br>
              <ul class="list-group">
              <h6 class="m-0 font-weight-bold text-dark">Data Orang Tua</h6>
              <br>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Nama Ayah</h6>
                <small class="text-muted"><?= $data_pendaftarinside['nama_ayah'] ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">NIK Ayah</h6>
                <small class="text-muted"><?= $data_pendaftarinside['nik_ayah'] ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Pendidikan Terakhir Ayah</h6>
                <small class="text-muted"><?= $data_pendaftarinside['pendidikan_ayah'] ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">No Telepon Ayah</h6>
                <small class="text-muted"><?= $data_pendaftarinside['nohp_ayah'] ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Pekerjaan Ayah</h6>
                <small class="text-muted"><?= $data_pendaftarinside['pekerjaan_ayah'] ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Penghasilan Ayah</h6>
                <small class="text-muted"><?= $data_pendaftarinside['penghasilan_ayah'] ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Nama Ibu</h6>
                <small class="text-muted"><?= $data_pendaftarinside['nama_ibu'] ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">NIK Ibu</h6>
                <small class="text-muted"><?= $data_pendaftarinside['nik_ibu'] ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Pendidikan Terakhir Ibu</h6>
                <small class="text-muted"><?= $data_pendaftarinside['pendidikan_ibu'] ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">No Telepon Ibu</h6>
                <small class="text-muted"><?= $data_pendaftarinside['nohp_ibu'] ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Pekerjaan Ibu</h6>
                <small class="text-muted"><?= $data_pendaftarinside['pekerjaan_ibu'] ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Penghasilan Ibu</h6>
                <small class="text-muted"><?= $data_pendaftarinside['penghasilan_ibu'] ?></small>
              </li>
            </ul>

            <br>
            <?php if (!empty($data_pendaftarinside['nama_wali']) || !empty($data_pendaftarinside['nik_wali']) || !empty($data_pendaftarinside['pendidikan_wali']) || !empty($data_pendaftarinside['nohp_wali']) || !empty($data_pendaftarinside['pekerjaan_wali']) || !empty($data_pendaftarinside['penghasilan_wali']) || !empty($data_pendaftarinside['hubungan_wali'])): ?>
              <ul class="list-group">
                <h6 class="m-0 font-weight-bold text-dark">Data Wali</h6>
            <br>
                <?php if (!empty($data_pendaftarinside['nama_wali'])): ?>
                  <li class="list-group-item">
                    <h6 class="mb-0" style="color: black;">Nama Wali</h6>
                    <small class="text-muted"><?= $data_pendaftarinside['nama_wali'] ?></small>
                  </li>
                <?php endif; ?>
                <?php if (!empty($data_pendaftarinside['nik_wali'])): ?>
                  <li class="list-group-item">
                    <h6 class="mb-0" style="color: black;">NIK Wali</h6>
                    <small class="text-muted"><?= $data_pendaftarinside['nik_wali'] ?></small>
                  </li>
                <?php endif; ?>
                <?php if (!empty($data_pendaftarinside['pendidikan_wali'])): ?>
                  <li class="list-group-item">
                    <h6 class="mb-0" style="color: black;">Pendidikan Terakhir Wali</h6>
                    <small class="text-muted"><?= $data_pendaftarinside['pendidikan_wali'] ?></small>
                  </li>
                <?php endif; ?>
                <?php if (!empty($data_pendaftarinside['nohp_wali'])): ?>
                  <li class="list-group-item">
                    <h6 class="mb-0" style="color: black;">No Telepon Wali</h6>
                    <small class="text-muted"><?= $data_pendaftarinside['nohp_wali'] ?></small>
                  </li>
                <?php endif; ?>
                <?php if (!empty($data_pendaftarinside['pekerjaan_wali'])): ?>
                  <li class="list-group-item">
                    <h6 class="mb-0" style="color: black;">Pekerjaan Wali</h6>
                    <small class="text-muted"><?= $data_pendaftarinside['pekerjaan_wali'] ?></small>
                  </li>
                <?php endif; ?>
                <?php if (!empty($data_pendaftarinside['penghasilan_wali'])): ?>
                  <li class="list-group-item">
                    <h6 class="mb-0" style="color: black;">Penghasilan Wali</h6>
                    <small class="text-muted"><?= $data_pendaftarinside['penghasilan_wali'] ?></small>
                  </li>
                <?php endif; ?>
                <?php if (!empty($data_pendaftarinside['hubungan_wali'])): ?>
                  <li class="list-group-item">
                    <h6 class="mb-0" style="color: black;">Hubungan dengan Siswa</h6>
                    <small class="text-muted"><?= $data_pendaftarinside['hubungan_wali'] ?></small>
                  </li>
                <?php endif; ?>
              </ul>
            <?php endif; ?>


            <br>
            <?php if (!empty($data_pendaftarinside['rek_kjp']) || !empty($data_pendaftarinside['rek_pip'])): ?>
              <ul class="list-group">
                <h6 class="m-0 font-weight-bold text-dark">Data Bantuan Pemerintah</h6>
            <br>
                <?php if (!empty($data_pendaftarinside['rek_kjp'])): ?>
                  <li class="list-group-item">
                    <h6 class="mb-0" style="color: black;">No Rekening KJP</h6>
                    <small class="text-muted"><?= $data_pendaftarinside['rek_kjp'] ?></small>
                  </li>
                <?php endif; ?>
                <?php if (!empty($data_pendaftarinside['rek_pip'])): ?>
                  <li class="list-group-item">
                    <h6 class="mb-0" style="color: black;">No Rekening PIP</h6>
                    <small class="text-muted"><?= $data_pendaftarinside['rek_pip'] ?></small>
                  </li>
                <?php endif; ?>
              </ul>
            <?php endif; ?>


            <button type="button" class="btn btn-primary mt-3 btn-block" data-toggle="modal" data-target="#modalvalidasi">
                Validation of registrant data
            </button>

            <!-- Modal -->
            <div class="modal fade" id="modalvalidasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <form action="<?= $base_url ?>/admin/detailpendaftar.php?id=<?= $id_pendaftar ?>" method="POST">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Registrar's Data Assessment</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                          <label for="nilai">Evaluate</label>
                          <select name="nilai" id="nilai" class="form-control" required>
                            <option value="">--Choose--</option>
                            <option value="1">Passed</option>
                            <option value="2">Not qualify</option>
                          </select>
                        </div>
                        <div class="modal-footer">
                            <button name="simpan" value="simpan_nilai" class="btn btn-primary">Store</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                      </form>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>

      <a href="pendaftaran.php" class="btn btn-danger">Kembali</a>
    </div>
    
  </div>
  
</div>
<!-- /.container-fluid -->

<?php include('../template/footer.php'); ?>