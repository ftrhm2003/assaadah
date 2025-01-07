<?php include('../config/auto_load.php'); ?>

<?php include('pendaftaran_control.php'); ?>


<?php include('../template/header.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Students data</h1>
  
  <div class="row">
    <div class="col-12">
      <?php if(isset($_SESSION['pesan_sukses'])) { ?>
              <div class="alert alert-info"><?= $_SESSION['pesan_sukses'] ?></div>
      <?php }
      
      unset($_SESSION['pesan_sukses']);
      ?>
    </div>
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
          <td>Avarage</td>
          <td>Status</td>
          <td>Actions</td>
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
          <!-- number_format(value, 2) -->
            <?=  number_format(($p['nilai_semester5'] + $p['nilai_semester4'] + $p['nilai_semester3'] + $p['nilai_semester2'] + $p['nilai_semester1']) / 5, 2) ?>
          </td>
          <?php

          if($p['status'] == 0) {
            $status = '<span class="badge badge-info">New</span>';

          } else if ($p['status'] == 1) {
            $status = '<span class="badge badge-success">Passed</span>';

          } else if ($p['status'] == 2) {
            $status = '<span class="badge badge-danger">Not qualify</span>';
          }

          ?>
          <td><?= $status ?></td>
          <td>
              <a href="detailpendaftar.php?id=<?= $p['id'] ?>" class="btn btn-primary btn-sm mb-1">Review</a> 
              <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalHapus_<?= $p['id'] ?>">Delete</a>
          </td>
        </tr>

        <!-- Modal -->
        <div class="modal fade" id="modalHapus_<?= $p['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Are you sure ?</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                    <p>You will delete the registrant data in the name "<?= $p['nama'] ?>". <br>
                    
                    <b> Data will be deleted permanently.<b></p>
                  </div>
                  <div class="modal-footer">
                      <a href="<?= $base_url ?>/admin/pendaftaran.php?action=hapus&id=<?= $p['id'] ?>" class="btn btn-danger">Delete</a>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  </div>
                </div>
            </div>
        </div>

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