<?php

// Ambil data semua pendaftar
$all_pendaftar = mysqli_query($koneksi, "SELECT pendaftar.*, nilai.nilai_semester1, nilai.nilai_semester2, nilai.nilai_semester3, nilai.nilai_semester4, nilai.nilai_semester5, nilai.status FROM pendaftar, nilai WHERE pendaftar.id = nilai.pendaftar_id");

// Cek hasil query
if (!$all_pendaftar) {
    die('Query Error: ' . mysqli_error($koneksi));
}

if (isset($_GET['action']) && $_GET['action'] == "hapus") {
    $id_pendaftar = $_GET['id'];
    $query_pendaftar = mysqli_query($koneksi, "SELECT * FROM pendaftar WHERE id = '$id_pendaftar'");

    if (mysqli_num_rows($query_pendaftar)) {
        $data_pendaftar = mysqli_fetch_array($query_pendaftar);
        $id_user = $data_pendaftar['users_id'];

        // Hapus nilai
        $sql_hapus_nilai = mysqli_query($koneksi, "DELETE FROM nilai WHERE pendaftar_id = '$id_pendaftar'");

        // Hapus foto pendaftar jika file ada
        $file_path = '../uploads/' . $data_pendaftar['foto'];
        if (!empty($data_pendaftar['foto']) && file_exists($file_path)) {
            unlink($file_path);
        }

        // Hapus data pendaftar
        $sql_hapus_pendaftar = mysqli_query($koneksi, "DELETE FROM pendaftar WHERE id = '$id_pendaftar'");

        // Hapus data user
        $sql_hapus_user = mysqli_query($koneksi, "DELETE FROM users WHERE id = '$id_user'");

        // Periksa apakah semua query berhasil
        if ($sql_hapus_nilai && $sql_hapus_pendaftar && $sql_hapus_user) {
            // Tampilkan alert sukses
            echo "<script>
                alert('The registrant data was successfully deleted.');
                window.location.href = 'pendaftaran.php'; // Redirect to the registration page
            </script>";
        } else {
            // Tampilkan alert gagal
            echo "<script>
                alert('Failed to delete registrant data.Please try again.');
                window.history.back(); // Back to the previous page
            </script>";
        }
    } else {
        // Data pendaftar tidak ditemukan
        echo "<script>
            alert('Registrant data is not found!');
            window.history.back(); // Back to the previous page
        </script>";
    }
}

?>
