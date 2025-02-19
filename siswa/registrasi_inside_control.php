<?php
include('../config/koneksi.php');
session_start();

if(isset($_POST['btn_registrasi'])) {
    // Ambil data dari form
    $nokk = $_POST['nokk'];
    $nik = $_POST['nik'];
    $anakke = $_POST['anakke'];
    $jmlsaudara = $_POST['jmlsaudara'];
    $hobi = $_POST['hobi'];
    $citacita = $_POST['citacita'];
    $prasekolah = $_POST['prasekolah'];
    $imunisasi = $_POST['imunisasi'];
    $sekolahasal = $_POST['sekolahasal'];

    // Ambil ID pendaftar dari session login
    if(isset($_SESSION['pendaftar_inside_id'])) {
        $pendaftar_inside_id = $_SESSION['pendaftar_inside_id'];

        // Insert data ke tabel pendaftar_inside
        $sql_pendaftarinside = "INSERT INTO pendaftarinside (pendaftar_inside_id, nokk, nik, anakke, jmlsaudara, hobi, citacita, prasekolah, imunisasi, sekolahasal) 
                                VALUES ('$pendaftar_inside_id', '$nokk', '$nik', '$anakke', '$jmlsaudara', '$hobi', '$citacita', '$prasekolah', '$imunisasi', '$sekolahasal')";
        $result_pendaftarinside = mysqli_query($koneksi, $sql_pendaftarinside);

        if ($result_pendaftarinside) {
            // Update is_verified di tabel pendaftar
            $sql_update_verifikasi = "UPDATE pendaftar SET is_verified = 1 WHERE id = '$pendaftar_inside_id'";
            mysqli_query($koneksi, $sql_update_verifikasi);

            $_SESSION['pesan_registrasi'] = "SUCCESSFUL registration";
            header('location:dashboard.php');
        } else {
            echo "Error insert pendaftar_inside: " . mysqli_error($koneksi);
        }
    } else {
        echo "Error: pendaftar_id tidak ditemukan di session.";
    }
} else {
    header('location:registrasi_inside.php');
}
?>
