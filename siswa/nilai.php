<?php include('../config/auto_load.php'); ?>

<?php include('nilai_control.php'); ?>

<?php include('../template/headersiswa.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Score edit</h1>
  <div class="row">
  <div class="col-md-6">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Edit score data</h6>
        </div>
        <div class="card-body">
            <p class="text-danger">* Change if there is a mistake!</p>
            <form class="user" method="POST" action="<?= $base_url ?>/siswa/nilai.php">
              <?php if(isset($data_nilai)) {
                // echo "edit nilai";
                $id_nilai = $data_nilai['id'];
                echo "<input type='hidden' name='id_nilai' value='$id_nilai'>";

              } else {
                // echo "insert nilai";
              }
              ?>

                <div class="form-group">
                    <label for="un">Semester score 1</label>
                    <input type="text" class="form-control" id="ns1" placeholder="Masukkan Nilai Semester 1" name="ns1" value="<?php if(isset($data_nilai['nilai_semester1'])) { echo $data_nilai['nilai_semester1']; } ?>">
                </div>
                <div class="form-group">
                    <label for="un">Semester score 2</label>
                    <input type="text" class="form-control" id="ns2" placeholder="Masukkan Nilai Semester 2" name="ns2" value="<?php if(isset($data_nilai['nilai_semester2'])) { echo $data_nilai['nilai_semester2']; } ?>">
                </div>
                <div class="form-group">
                    <label for="un">Semester score 3</label>
                    <input type="text" class="form-control" id="ns3" placeholder="Masukkan Nilai Semester 3" name="ns3" value="<?php if(isset($data_nilai['nilai_semester3'])) { echo $data_nilai['nilai_semester3']; } ?>">
                </div>
                <div class="form-group">
                    <label for="un">Semester score 4</label>
                    <input type="text" class="form-control" id="ns4" placeholder="Masukkan Nilai Semester 4" name="ns4" value="<?php if(isset($data_nilai['nilai_semester4'])) { echo $data_nilai['nilai_semester4']; } ?>">
                </div>
                <div class="form-group">
                    <label for="un">Semester score 5</label>
                    <input type="text" class="form-control" id="ns5" placeholder="Masukkan Nilai Semester 5" name="ns5" value="<?php if(isset($data_nilai['nilai_semester5'])) { echo $data_nilai['nilai_semester5']; } ?>">
                </div>
                <hr>
                <div class="text-right">
                    <button type="submit" name="btn_simpan" value="simpan_nilai" class="btn btn-primary">Submit</button>
                    <a href="dashboard.php" class="btn btn-danger">Return</a>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

<?php include('../template/footer.php'); ?>