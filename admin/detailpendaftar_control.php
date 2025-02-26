<?php

$id_pendaftar = $_GET['id'];

$koneksi = new mysqli('localhost', 'root', '', 'pendaftaran');

// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Ambil data pendaftar
$sql_pendaftar = "SELECT * FROM pendaftar WHERE id = '$id_pendaftar'";
$result_pendaftar = mysqli_query($koneksi, $sql_pendaftar);
$data_pendaftar = mysqli_fetch_array($result_pendaftar);

if (!$result_pendaftar) {
    die('Query Error: ' . mysqli_error($koneksi));
}

// Ambil data pendaftarinside
$sql_pendaftarinside = "SELECT * FROM pendaftarinside WHERE pendaftar_inside_id = '$id_pendaftar'";
$result_pendaftarinside = mysqli_query($koneksi, $sql_pendaftarinside);
$data_pendaftarinside = mysqli_fetch_array($result_pendaftarinside);

if (!$result_pendaftarinside) {
    die('Query Error: ' . mysqli_error($koneksi));
}

// Ambil berkas sesuai id pendaftar
$sql_berkas = "SELECT kartu_keluarga, ktp, ijazah, akte_kelahiran, buku_kjp FROM berkas WHERE pendaftar_id = '$id_pendaftar'";
$result_berkas = mysqli_query($koneksi, $sql_berkas);
$data_berkas = mysqli_fetch_array($result_berkas);

if (!$result_berkas) {
    die('Query Error: ' . mysqli_error($koneksi));
}

// Ubah status
if (isset($_POST['simpan']) && $_POST['simpan'] == 'simpan_pendaftarinside') {
    $pendaftarinside = $_POST['pendaftarinside'];
    $sql_pendaftarinside = "UPDATE pendaftarinside SET status='$pendaftarinside' WHERE pendaftar_inside_id='$id_pendaftar'";
    $query_pendaftarinside = mysqli_query($koneksi, $sql_pendaftarinside);

    if ($query_pendaftarinside) {
        $_SESSION['pesan_sukses'] = "The status of the registrant was successfully changed";
        header('location:regis_data.php');
    } else {
        echo "Failed to update the registrant status";
        die;
    }
}
?>