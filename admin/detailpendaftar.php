<?php include('../config/auto_load.php'); ?>
<?php include('detailpendaftar_control.php'); ?>
<?php include('../template/header.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Registrant details</h1>
  
  <div class="row">
    <div class="col-md-6">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">PERSONAL DATA</h6>
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
                <h6 class="mb-0" style="color: black;">Place and date of birth</h6>
                <small class="text-muted"><?= $data_pendaftar['tmpt_lahir'] ?>, <?= date("d-m-Y", strtotime($data_pendaftar['tgl_lahir'])); ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Gender</h6>
                <?php 
                if($data_pendaftar['jenis_kelamin'] == 'L') {
                  $kelamin = "Male";
                } else {
                  $kelamin = "Female";
                }
                ?>

                <small class="text-muted"><?= $kelamin ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Religion</h6>
                <small class="text-muted">Islam</small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Address</h6>
                <small class="text-muted"><?= $data_pendaftar['alamat'] ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Email</h6>
                <small class="text-muted"><?= $data_pendaftar['email'] ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Telephone</h6>
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
          <h6 class="m-0 font-weight-bold text-primary">Registrar's Value Data</h6>
        </div>
        <div class="card-body">
          <div class="card-body">

            <?php 
            if($data_nilai['status'] == 0) {
              echo '
              <div class="alert alert-warning">
                  Registrant data has not been validated
              </div>';
            } else if($data_nilai['status'] == 1) {
              echo '
              <div class="alert alert-info">
                  Registrant data is stated <b>PASSED</b>
              </div>';
            } else if($data_nilai['status'] == 2) {
              echo '
              <div class="alert alert-danger">
                  Registrant data is stated <b>NOT QUALIFY</b>
              </div>';
            }
            ?>
            
            <ul class="list-group">
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Semester score 1</h6>
                <small class="text-muted"><?= $data_nilai['nilai_semester1'] ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Semester score 2</h6>
                <small class="text-muted"><?= $data_nilai['nilai_semester2'] ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Semester score 3</h6>
                <small class="text-muted"><?= $data_nilai['nilai_semester3'] ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Semester score 4</h6>
                <small class="text-muted"><?= $data_nilai['nilai_semester4'] ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Semester score 5</h6>
                <small class="text-muted"><?= $data_nilai['nilai_semester5'] ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Avarage score</h6>
                <small class="text-muted"><?= number_format(($data_nilai['nilai_semester5'] + $data_nilai['nilai_semester4'] + $data_nilai['nilai_semester3'] + $data_nilai['nilai_semester2'] + $data_nilai['nilai_semester1']) / 5, 2) ?></small>
              </li>
            </ul>

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

      <a href="pendaftaran.php" class="btn btn-danger">Return</a>
    </div>
    
  </div>
  
</div>
<!-- /.container-fluid -->

<?php include('../template/footer.php'); ?>