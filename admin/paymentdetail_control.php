<?php
// Mengambil data pendaftar dan pembayaran
$all_pendaftar = mysqli_query($koneksi, "
    SELECT pendaftar.*, 
           payment.tanggal_pembayaran, 
           payment.bukti_pembayaran, 
           payment.status 
    FROM pendaftar 
    JOIN payment ON pendaftar.id = payment.pendaftar_id
");

// Cek apakah query berhasil
if (!$all_pendaftar) {
    die('Query Error: ' . mysqli_error($koneksi));
}

// Proses hapus data
if (isset($_GET['action']) && $_GET['action'] == "hapus") {
    $id_pendaftar = $_GET['id'];
    $query_pendaftar = mysqli_query($koneksi, "SELECT * FROM pendaftar WHERE id = '$id_pendaftar'");

    if (mysqli_num_rows($query_pendaftar)) {
        $data_pendaftar = mysqli_fetch_array($query_pendaftar);
        $id_user = $data_pendaftar['users_id'];

        // Hapus data pembayaran terlebih dahulu
        $sql_hapus_payment = mysqli_query($koneksi, "DELETE FROM payment WHERE pendaftar_id = '$id_pendaftar'");

        // Hapus data nilai
        $sql_hapus_nilai = mysqli_query($koneksi, "DELETE FROM nilai WHERE pendaftar_id = '$id_pendaftar'");

        // Hapus foto pendaftar
        unlink('../photo/' . $data_pendaftar['foto']);

        // Hapus data pendaftar
        $sql_hapus_pendaftar = mysqli_query($koneksi, "DELETE FROM pendaftar WHERE id = '$id_pendaftar'");

        // Hapus data user
        $sql_hapus_user = mysqli_query($koneksi, "DELETE FROM users WHERE id = '$id_user'");

        // Cek apakah semua query berhasil
        if (!$sql_hapus_payment || !$sql_hapus_nilai || !$sql_hapus_pendaftar || !$sql_hapus_user) {
            die('Query Error: ' . mysqli_error($koneksi));
        }

        // Simpan session
        $_SESSION['pesan_sukses'] = "Data pendaftar berhasil dihapus";
        header('location: paymentdetail.php');  // Redirect setelah penghapusan
    } else {
        die('Data pendaftar tidak ditemukan!');
    }
}
?>
