<?php

$id_pendaftar = $_GET['id'];

$sql_pendaftar = "SELECT * FROM pendaftar where id = '$id_pendaftar'";
$result_pendaftar = mysqli_query($koneksi, $sql_pendaftar);
$data_pendaftar = mysqli_fetch_array($result_pendaftar);

// cek hasil
if(!$result_pendaftar) {
    die('Query Error : '. mysqli_error($koneksi));
}

$sql_pendaftarinside = "SELECT * FROM pendaftarinside where pendaftar_inside_id = '$id_pendaftar'";
$result_pendaftarinside = mysqli_query($koneksi, $sql_pendaftarinside);
$data_pendaftarinside = mysqli_fetch_array($result_pendaftarinside);

// cek hasil
if(!$result_pendaftarinside) {
    die('Query Error : '. mysqli_error($koneksi));
}

// ubah status 
if(isset($_POST['simpan']) && $_POST['simpan'] == 'simpan_pendaftarinside') {

    $pendaftarinside = $_POST['pendaftarinside'];

    $sql_pendaftarinside = " UPDATE pendaftarinside set status='$pendaftarinside' where pendaftar_inside_id='$id_pendaftar'";
    $query_pendaftarinside = mysqli_query($koneksi,$sql_pendaftarinside);

    if($query_pendaftarinside) {
        // berhasil
        $_SESSION['pesan_sukses'] = "The status of the registrant was successfully changed";
        header('location:regis_data.php');
    } else {
        echo "Failed to update the registrant status"; die;
    }
}




?>