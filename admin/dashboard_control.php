<?php

// tabel pendaftar
$all_pendaftar = mysqli_query($koneksi, "SELECT * FROM pendaftar, pendaftarinside WHERE pendaftar.id = pendaftarinside.pendaftar_inside_id AND pendaftarinside.status = 0");

// cek hasil
if(!$all_pendaftar) {
    die('Query Error : '. mysqli_error($koneksi));
}

// jml pendaftar
$jml_pendaftar = mysqli_query($koneksi, "SELECT * FROM pendaftar, pendaftarinside WHERE pendaftar.id = pendaftarinside.pendaftar_inside_id");

// cek hasil
if(!$jml_pendaftar) {
    die('Query Error : '. mysqli_error($koneksi));
}

// jml LOLOS
$jml_lolos = mysqli_query($koneksi, "SELECT * FROM pendaftar, pendaftarinside WHERE pendaftar.id = pendaftarinside.pendaftar_inside_id AND pendaftarinside.status = 1");

// cek hasil
if(!$jml_lolos) {
    die('Query Error : '. mysqli_error($koneksi));
}

?>