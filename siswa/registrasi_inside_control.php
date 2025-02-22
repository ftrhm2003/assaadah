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
    $nama_ayah = $_POST['nama_ayah'];
    $nik_ayah = $_POST['nik_ayah'];
    $pendidikan_ayah = $_POST['pendidikan_ayah'];
    $nohp_ayah = $_POST['nohp_ayah'];
    $pekerjaan_ayah = $_POST['pekerjaan_ayah'];
    $penghasilan_ayah = $_POST['penghasilan_ayah'];
    $nama_ibu = $_POST['nama_ibu'];
    $nik_ibu = $_POST['nik_ibu'];
    $pendidikan_ibu = $_POST['pendidikan_ibu'];
    $nohp_ibu = $_POST['nohp_ibu'];
    $pekerjaan_ibu = $_POST['pekerjaan_ibu'];
    $penghasilan_ibu = $_POST['penghasilan_ibu'];
    $nama_wali = $_POST['nama_wali'];
    $nik_wali = $_POST['nik_wali'];
    $pendidikan_wali = $_POST['pendidikan_wali'];
    $nohp_wali = $_POST['nohp_wali'];
    $pekerjaan_wali = $_POST['pekerjaan_wali'];
    $penghasilan_wali = $_POST['penghasilan_wali'];
    $hubungan_wali = $_POST['hubungan_wali'];
    $rek_kjp = $_POST['rek_kjp'];
    $rek_pip = $_POST['rek_pip'];


    // Ambil ID pendaftar dari session login
    if(isset($_SESSION['pendaftar_inside_id'])) {
        $pendaftar_inside_id = $_SESSION['pendaftar_inside_id'];

        // Insert data ke tabel pendaftar_inside
        $sql_pendaftarinside = "INSERT INTO pendaftarinside (pendaftar_inside_id, nokk, nik, anakke, jmlsaudara, hobi, citacita, prasekolah, imunisasi, sekolahasal, nama_ayah, nik_ayah, pendidikan_ayah, nohp_ayah, pekerjaan_ayah, penghasilan_ayah, nama_ibu, nik_ibu, pendidikan_ibu, nohp_ibu, pekerjaan_ibu, penghasilan_ibu, nama_wali, nik_wali, pendidikan_wali, nohp_wali, pekerjaan_wali, penghasilan_wali, hubungan_wali, rek_kjp, rek_pip) 
                                VALUES ('$pendaftar_inside_id', '$nokk', '$nik', '$anakke', '$jmlsaudara', '$hobi', '$citacita', '$prasekolah', '$imunisasi', '$sekolahasal', '$nama_ayah', '$nik_ayah', '$pendidikan_ayah', '$nohp_ayah', '$pekerjaan_ayah', '$penghasilan_ayah', '$nama_ibu', '$nik_ibu', '$pendidikan_ibu', '$nohp_ibu', '$pekerjaan_ibu', '$penghasilan_ibu', '$nama_wali', '$nik_wali', '$pendidikan_wali', '$nohp_wali', '$pekerjaan_wali', '$penghasilan_wali', '$hubungan_wali', '$rek_kjp', '$rek_pip')";
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
