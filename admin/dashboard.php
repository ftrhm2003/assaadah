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
              <div class="h3 font-weight-bold text-info text-uppercase mb-1">Registered</div>

                <div class="h5 mt-3 font-weight-bold">
                  <?= mysqli_num_rows($jml_pendaftar) ?> Students
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
                <div class="h3 font-weight-bold text-success text-uppercase mb-1">Passed the selection</div>

                  <div class="h5 mt-3 font-weight-bold">
                    <?= mysqli_num_rows($jml_lolos) ?> Students
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
  <hr class="mt-3">
  <h2 class="text-gray-800">New Students Data</h2>
  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered table-hover">
          <tr>
            <td>No</td>
            <td>Name</td>
            <td>Address</td>
            <td>Semester 5</td>
            <td>Semester 4</td>
            <td>Semester 3</td>
            <td>Semester 2</td>
            <td>Semester 1</td>
            <td>Average</td>
            <td>Status</td>
          </tr>

          <?php
          $no = 1;
          while($p = mysqli_fetch_array($all_pendaftar)) { ?>

          <tr>
            <td><?= $no++ ?></td>
            <td><?= $p['nama'] ?></td>
            <td><?= $p['alamat'] ?></td>
            <td><?= $p['nilai_semester5'] ?></td>
            <td><?= $p['nilai_semester4'] ?></td>
            <td><?= $p['nilai_semester3'] ?></td>
            <td><?= $p['nilai_semester2'] ?></td>
            <td><?= $p['nilai_semester1'] ?></td>
            <td>
              <?=  number_format(($p['nilai_semester5'] + $p['nilai_semester4'] + $p['nilai_semester3'] + $p['nilai_semester2'] + $p['nilai_semester1']) / 5, 2) ?>
            </td>
            <td><span class="badge badge-info">New</span></td>
          </tr>

          <?php }
          
          
          if(mysqli_num_rows($all_pendaftar) == 0) {
            echo "<tr><td colspan='8' align='center'><b>There are no new registrants</b></td></tr>";
          }

          ?>
          
      </table>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

<?php include('../template/footer.php'); ?>