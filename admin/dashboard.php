<?php include('../config/auto_load.php'); ?>
<?php include('dashboard_control.php'); ?>
<?php include('../template/header.php'); ?>

<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
  <div class="row">
    <div class="col-md-12">
      <hr class="mt-3">
      <h2 class="text-gray-800">New Students Data</h2>
      <table style="width: 100%; text-align: center;" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>No</th>
            <th>Name</th>
            <th>Address</th>
            <th>Kartu Keluarga</th>
            <th>KTP</th>
            <th>Ijazah</th>
            <th>Akte Kelahiran</th>
            <th>Buku KJP</th>
            <th>Status</th>
            <th>Download</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($all_pendaftar)) { 
            
            foreach ($all_pendaftar as $index => $p) { ?>
              <tr>
                <td><?= $index + 1 ?></td>
                <td><?= htmlspecialchars($p['nama']) ?></td>
                <td><?= htmlspecialchars($p['alamat']) ?></td>
                <td><?= $p['kartu_keluarga'] ? "<a href='download.php?pendaftar_id={$p['id']}&type=kartu_keluarga'>✅</a>" : "❌" ?></td>
                <td><?= $p['ktp'] ? "<a href='download.php?pendaftar_id={$p['id']}&type=ktp'>✅</a>" : "❌" ?></td>
                <td><?= $p['ijazah'] ? "<a href='download.php?pendaftar_id={$p['id']}&type=ijazah'>✅</a>" : "❌" ?></td>
                <td><?= $p['akte_kelahiran'] ? "<a href='download.php?pendaftar_id={$p['id']}&type=akte_kelahiran'>✅</a>" : "❌" ?></td>
                <td><?= $p['buku_kjp'] ? "<a href='download.php?pendaftar_id={$p['id']}&type=buku_kjp'>✅</a>" : "❌" ?></td>
                <td><span class="badge badge-info">New</span></td>
                <td><a href="download_all.php?pendaftar_id=<?= $p['id'] ?>&nama=<?= urlencode($p['nama']) ?>" class="btn btn-primary">Download Semua</a></td>
              </tr>
          <?php }
          } else { ?>
            <tr>
              <td colspan="9" align="center"><b>There are no new registrants</b></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php include('../template/footer.php'); ?>
