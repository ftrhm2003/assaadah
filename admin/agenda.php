<?php
include('../config/auto_load.php');  // Memanggil session_start() dari auto_load.php


include('../template/header.php');  // Menyertakan header template

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Agenda data</h1>

    <!-- Alert Notification -->
    <?php if (isset($_SESSION['pesan_sukses'])) { ?>
        <div class="alert alert-success">
            <?= $_SESSION['pesan_sukses']; ?>
        </div>
        <?php unset($_SESSION['pesan_sukses']); ?>
    <?php } ?>

    <?php
include '../config/koneksi.php';

// Ambil semua agenda dari database
$query = "SELECT * FROM agenda ORDER BY created_at DESC";
$result = mysqli_query($koneksi, $query);
?>

<body>
    <h1>Kelola Agenda Sekolah</h1>
    <a href="tambahagenda.php">Tambah Agenda</a>
    <hr>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <div>
            <h3><?php echo $row['title']; ?></h3>
            <p><strong>Tanggal:</strong> <?php echo $row['date']; ?></p>
            <p><?php echo $row['description']; ?></p>
            <small>Dibuat pada: <?php echo $row['created_at']; ?></small>
            <br>
            <a href="ubahagenda.php?id=<?php echo $row['id']; ?>">Edit</a> | 
            <a href="deleteagenda.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus agenda ini?')">Hapus</a>
            <hr>
        </div>
    <?php endwhile; ?>
</body>
</html>

</div>

<?php include('../template/footer.php'); ?>