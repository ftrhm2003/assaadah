<?php
include('../config/auto_load.php');  // Memanggil session_start() dari auto_load.php
include('paymentdetail_control.php');  // Mengikutkan logika pembayaran (query untuk mengambil data pembayaran)

include('../template/header.php');  // Menyertakan header template
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Payment Data</h1>

    <!-- Alert Notification -->
    <?php if (isset($_SESSION['pesan_sukses'])) { ?>
        <div class="alert alert-success">
            <?= $_SESSION['pesan_sukses']; ?>
        </div>
        <?php unset($_SESSION['pesan_sukses']); ?>
    <?php } ?>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Payment Date</th>
                        <th>Proof of Payment</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while ($p = mysqli_fetch_array($all_pendaftar)) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $p['nama'] ?></td>
                            <td><?= $p['alamat'] ?></td>
                            <td><?= $p['tanggal_pembayaran'] ?></td>
                            <td>
                                <?php if (file_exists("../photo/" . $p['bukti_pembayaran'])) { ?>
                                    <img src="../photo/<?= $p['bukti_pembayaran'] ?>" alt="Bukti Pembayaran" width="200">
                                <?php } else { ?>
                                    <span class="text-danger">Image not found</span>
                                <?php } ?>
                            </td>
                            
                           

                            <td>
                                <a href="detailpendaftar.php?id=<?= $p['id'] ?>" class="btn btn-primary btn-sm mb-1">View detail</a> 
                                <a href="?action=hapus&id=<?= $p['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this payment?')">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>

                    <?php if (mysqli_num_rows($all_pendaftar) == 0) { ?>
                        <tr>
                            <td colspan="7" align="center">No payment records found</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include('../template/footer.php'); ?>
