<?php
// Pastikan koneksi database tersedia
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Ambil data semua pendaftar
$all_pendaftar = mysqli_query($koneksi, "SELECT pendaftar.*, pendaftarinside.nama_ayah, pendaftarinside.nama_ibu, pendaftarinside.status FROM pendaftar 
JOIN pendaftarinside ON pendaftar.id = pendaftarinside.pendaftar_inside_id");


if (!$all_pendaftar) {
    die('Query Error: ' . mysqli_error($koneksi));
}

// Jika tombol hapus ditekan
if (isset($_GET['action']) && $_GET['action'] == "hapus") {
    $id_pendaftar = mysqli_real_escape_string($koneksi, $_GET['id']);

    // Cek apakah data pendaftar ada
    $query_pendaftar = mysqli_query($koneksi, "SELECT * FROM pendaftar WHERE id = '$id_pendaftar'");
    if (mysqli_num_rows($query_pendaftar)) {
        $data_pendaftar = mysqli_fetch_array($query_pendaftar);
        $id_user = $data_pendaftar['users_id'];

        // Hapus data di tabel pendaftarinside
        $sql_hapus_pendaftarinside = mysqli_query($koneksi, "DELETE FROM pendaftarinside WHERE pendaftar_inside_id = '$id_pendaftar'");
        if (!$sql_hapus_pendaftarinside) {
            die("Error deleting pendaftarinside: " . mysqli_error($koneksi));
        }

        // Hapus foto pendaftar jika ada
        $file_path = '../uploads/' . $data_pendaftar['foto'];
        if (!empty($data_pendaftar['foto']) && file_exists($file_path)) {
            unlink($file_path);
        }

        // Hapus data di tabel pendaftar
        $sql_hapus_pendaftar = mysqli_query($koneksi, "DELETE FROM pendaftar WHERE id = '$id_pendaftar'");
        if (!$sql_hapus_pendaftar) {
            die("Error deleting pendaftar: " . mysqli_error($koneksi));
        }

        // Hapus data di tabel users
        $sql_hapus_user = mysqli_query($koneksi, "DELETE FROM users WHERE id = '$id_user'");
        if (!$sql_hapus_user) {
            die("Error deleting user: " . mysqli_error($koneksi));
        }

        // Redirect setelah sukses
        echo "<script>
            alert('The registrant data was successfully deleted.');
            window.location.href = 'regis_data.php';
        </script>";
        exit();
    } else {
        // Data pendaftar tidak ditemukan
        echo "<script>
            alert('Registrant data is not found!');
            window.history.back();
        </script>";
        exit();
    }
}
?>
