<?php

// Koneksi ke database
$koneksi = new mysqli('localhost', 'root', '', 'pendaftaran');

// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Ambil semua pendaftar dengan status baru (0)
$all_pendaftar = mysqli_query($koneksi, "SELECT pendaftar.*, 
                                                berkas.kartu_keluarga, 
                                                berkas.ktp, 
                                                berkas.ijazah, 
                                                berkas.akte_kelahiran, 
                                                berkas.buku_kjp 
                                          FROM pendaftar 
                                          LEFT JOIN berkas ON pendaftar.id = berkas.pendaftar_id 
                                          WHERE pendaftar.status = 0");

if (!$all_pendaftar) {
    die('Query Error: ' . mysqli_error($koneksi));
}