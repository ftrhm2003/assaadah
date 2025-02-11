<?php
include('../config/auto_load.php');  // Memanggil session_start() dari auto_load.php
include('paymentcontrol.php');  // Mengikutkan logika pembayaran

include('../template/headersiswa.php');  // Menyertakan header template
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Registration payment</h1>

    <!-- Alert Notification -->
    <?php if (isset($_SESSION['pesan_sukses'])) { ?>
        <div class="alert alert-success">
            <?= $_SESSION['pesan_sukses']; ?>
        </div>
        <?php unset($_SESSION['pesan_sukses']); ?>
    <?php } ?>

    <div class="row">
        <!-- Registration Payment Form -->
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Registration payment form</h6>
                </div>
                <div class="card-body">
                    <form class="user" method="POST" enctype="multipart/form-data" action="<?= $base_url ?>/siswa/addpayment.php">
                        <?php if (isset($data_payment)) {
                            $id_payment = $data_payment['id'];
                            echo "<input type='hidden' name='id_payment' value='$id_payment'>";
                        } ?>
                        
                        <div class="form-group">
                            <label for="un">Payment date</label>
                            <input type="date" id="tanggal_pembayaran" placeholder="Payment date" name="tanggal_pembayaran" required>
                        </div>
                        <div class="form-group">
                            <label for="un">Proof of payment</label>
                            <input type="file" name="gambar" class="form-control mt-2" accept=".jpg, .jpeg, .png, .pdf" required>
                        </div>
                        
                        <hr>
                        <div class="text-right">
                            <button type="submit" name="btn_simpan" value="simpan_payment" class="btn btn-primary">Submit</button>
                            <a href="dashboard.php" class="btn btn-danger">Return</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Payment Registration -->
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">Registration payment</h6>
                </div>
                <div class="card-body">
                    <p>Below are the details of your registration payment:</p>
                    <div class="text-center mt-4">
                    <img src="../assets/payment-removebg-preview.png" alt="QR Code" class="img-fluid" style="max-width: 300px; margin: -30px 0;">
                    </div>

                    <div class="text-center mt-4">
                    <p style="margin: 5px 0; font-weight: bold; color: black;">MTs Assa'adah Cakung</p>
                    <p style="margin: 5px 0; font-weight: bold; color: black;">Mandiri Bank - 98762450101</p>
                    </div>


                    <hr>
                    <p class="text-muted">For any inquiries, please contact support:</p>
                    <p class="text-muted">email: education@gmail.com</p>
                    <p class="text-muted">contact: 098-657-6546</p>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?php include('../template/footer.php'); ?>
