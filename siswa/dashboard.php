<?php include('../config/auto_load.php'); ?>

<?php include('dashboard_control.php'); ?>

<?php include('../template/headersiswa.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
  <div class="row">
    <div class="col-md-12">
      <?php if(isset($_SESSION['pesan_sukses'])) { ?>

      <div class="alert alert-success">
        <?= $_SESSION['pesan_sukses'] ?>
      </div>

      <?php } 
      unset($_SESSION['pesan_sukses']);

      ?>
    </div>
    <div class="col-md-6">
      
      <div class="row">
        <?php if(!isset($status)) { ?>
          <div class="col-md-12">
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Enter Value Data</h6>
              </div>
              <div class="card-body">
                  <p class="text-danger">* Enter your value to complete the registration process!</p>
                  <form class="user" method="POST" action="<?= $base_url ?>/siswa/dashboard.php">
                      <div class="form-group">
                          <label for="un">Semester value 1</label>
                          <input type="number" class="form-control" id="ns1" placeholder="Masukkan Nilai Semester 1" name="ns1">
                      </div>
                      <div class="form-group">
                          <label for="un">Semester value 2</label>
                          <input type="number" class="form-control" id="ns2" placeholder="Masukkan Nilai Semester 2" name="ns2">
                      </div>
                      <div class="form-group">
                          <label for="un">Semester value 3</label>
                          <input type="number" class="form-control" id="ns3" placeholder="Masukkan Nilai Semester 3" name="ns3">
                      </div>
                      <div class="form-group">
                          <label for="un">Semester value 4</label>
                          <input type="number" class="form-control" id="ns4" placeholder="Masukkan Nilai Semester 4" name="ns4">
                      </div>
                      <div class="form-group">
                          <label for="un">Semester value 5</label>
                          <input type="number" class="form-control" id="ns5" placeholder="Masukkan Nilai Semester 5" name="ns5">
                      </div>
                      <hr>
                      <div class="text-right">
                          <button type="submit" name="btn_simpan" value="simpan_nilai" class="btn btn-primary">Save</button>
                          <a href="dashboard.php" class="btn btn-danger">Return</a>
                      </div>
                  </form>
              </div>
            </div>
          </div>
        <?php } else if(isset($status) && $status == 0) { ?>
          <div class="col-md-12">
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Announcement of selection results</h6>
              </div>
              <div class="card-body">
                <div class="card text-center">
                  <div class="card-body">
                    <h5 class="card-title mb-3">Assessment Process</h5>
                    <div class="col-auto">
                      <i class="fas fa-spinner text-warning mb-3" style="font-size: 90px;"></i>
                    </div>
                    <p class="card-text">Thank you for registering at MTs Assa'adah Cakung</p>
                    <p class="card-text">Announcement on the date: </p>
                    <span class="badge badge-danger" style="font-size: 20px;">March 12, 2025</span>
                  </div>
                  <div class="card-footer text-muted">
                    <marquee style="margin-bottom: -5px;">MTs Assa'adah Cakung</marquee>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php } else if(isset($status) && $status == 1) { ?>
          <div class="col-md-12">
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Announcement of selection results</h6>
              </div>
              <div class="card-body">
                <div class="card text-center">
                  <div class="card-body">
                    <h5 class="card-title mb-3">You passed</h5>
                    <div class="col-auto">
                      <i class="far fa-check-circle text-success mb-3" style="font-size: 90px;"></i>
                    </div>
                    <p class="card-text">Congratulations you pass the selection at MTs Assa'adah Cakung.Re -register on the date: </p>
                    <span class="badge badge-danger" style="font-size: 20px;">March 12, 2025</span>
                  </div>
                  <div class="card-footer text-muted">
                    <marquee style="margin-bottom: -5px;">MTs Assa'adah Cakung</marquee>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
        <?php } else if(isset($status) && $status == 2) { ?>
          <div class="col-md-12">
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Announcement of selection results</h6>
              </div>
              <div class="card-body">
                <div class="card text-center">
                  <div class="card-body">
                    <h5 class="card-title mb-3">You don't qualify</h5>
                    <div class="col-auto">
                      <i class="fa fa-times text-danger mb-3" style="font-size: 90px;"></i>
                    </div>
                    <p class="card-text">You haven't passed.Thank you for following the selection well. </p>
                  </div>
                  <div class="card-footer text-muted">
                    <marquee style="margin-bottom: -5px;">MTs Assa'adah Cakung</marquee>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>


        <div class="col-md-12">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Re -registration requirements</h6>
            </div>
            <div class="card-body">
              <p>Students who pass the selection are required to re -register with the following files: </p>

              <!-- dari bootstrap -->
              <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  1. FC Act is born
                  <span class="badge badge-info badge-pill">1 sheet</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  2. FC Family card
                  <span class="badge badge-info badge-pill">1 sheet</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  3. FC Semester report card score 1-5
                  <span class="badge badge-info badge-pill">2 sheets</span>
                </li>
              </ul>
              <p class="text-danger mt-3">* Must re -register on: March 12, 2025</p>
            </div>
          </div>
        </div>
      
      </div>

    </div>
    <div class="col-md-6">
      <div class="row">
        <div class="col-md-12">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">PERSONAL DATA</h6>
            </div>
            <div class="card-body">
              <div class="card-body">
                <div class="col-auto mt-3 text-center">
                  <?php
                  if(isset($data_pendaftar['foto']) && $data_pendaftar['foto'] != '') {
                    $foto = '../uploads/' . $data_pendaftar['foto'];
                  } else {
                    $foto = '../assets/img/avatar.jpg';
                  }
                  ?>
                  <img src="<?= $foto ?>" class="img-fluid rounded-circle" alt="menunggu" style="width: 200px; height: 200px;">
                </div>
                <br>
                <div class="text-right">
                    <a href="editprofil.php" class="btn btn-warning btn-sm">Edit profile</a>
                    
                </div>
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
                    <small class="text-muted"><?= $data_pendaftar['agama'] ?></small>
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
      </div>
    </div>
  </div>
  
</div>
<!-- /.container-fluid -->

<?php include('../template/footer.php'); ?>
