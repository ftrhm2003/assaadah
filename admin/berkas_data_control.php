<?php

// Koneksi ke database
$koneksi = new mysqli('localhost', 'root', '', 'pendaftaran');

// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Ambil semua pendaftar dengan status baru (0) dan status dari pendaftarinside
$all_pendaftar = mysqli_query($koneksi, "SELECT pendaftar.*, 
                                                pendaftarinside.status AS status_pendaftarinside, 
                                                berkas.kartu_keluarga, 
                                                berkas.ktp, 
                                                berkas.ijazah, 
                                                berkas.akte_kelahiran, 
                                                berkas.buku_kjp 
                                          FROM pendaftar 
                                          LEFT JOIN berkas ON pendaftar.id = berkas.pendaftar_id 
                                          LEFT JOIN pendaftarinside ON pendaftar.id = pendaftarinside.pendaftar_inside_id");


if (!$all_pendaftar) {
    die('Query Error: ' . mysqli_error($koneksi));
}