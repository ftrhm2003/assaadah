<?php

include('config/koneksi.php');
session_start();

if (isset($_POST['btn_registrasi'])) {
    $nama = $_POST['nama'];
    $nisn = $_POST['nisn'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = date("Y-m-d", strtotime($_POST['tanggal_lahir']));
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $password = md5($_POST['password']);
    $ulangi_password = md5($_POST['ulangi_password']);

    // Validasi password
    if ($password != $ulangi_password) {
        echo "Error: Password tidak sama";
        echo "<br><br> <button type='button' onclick='history.back();'> Return </button>";
        die;
    }

    // Insert ke tabel users
    $sql_user = "INSERT INTO users (nama, username, password, level) VALUES ('$nama', '$email', '$password', 'siswa')";
    $result_user = mysqli_query($koneksi, $sql_user);

    if ($result_user) {
        // Ambil ID terakhir dari tabel users
        $id_user = mysqli_insert_id($koneksi);

        // Insert ke tabel pendaftar
        $sql_pendaftar = "INSERT INTO pendaftar (nama, nisn, tmpt_lahir, tgl_lahir, jenis_kelamin, agama, alamat, email, telepon, users_id) 
                          values ('$nama', '$nisn', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin', '$agama', '$alamat', '$email', '$telepon', '$id_user')";

        $result_pendaftar = mysqli_query($koneksi, $sql_pendaftar);

        if ($result_pendaftar) {
            // Ambil ID terakhir dari pendaftar
            $pendaftar_id = mysqli_insert_id($koneksi);

            // Insert ke tabel berkas dengan pendaftar_id dan users_id
            $sql_berkas = "INSERT INTO berkas (pendaftar_id, users_id) VALUES ('$pendaftar_id', '$id_user')";
            $result_berkas = mysqli_query($koneksi, $sql_berkas);

            if ($result_berkas) {
                $_SESSION['pesan_registrasi'] = "Pendaftaran BERHASIL, Masuk menggunakan email dan password anda!";
                header('location:login.php');
            } else {
                echo "Error insert berkas: " . mysqli_error($koneksi);
                echo "<br><br> <button type='button' onclick='history.back();'> Return </button>";
                die;
            }
        } else {
            echo "Error insert pendaftar: " . mysqli_error($koneksi);
            echo "<br><br> <button type='button' onclick='history.back();'> Return </button>";
            die;
        }
    } else {
        echo "Error insert users: " . mysqli_error($koneksi);
        echo "<br><br> <button type='button' onclick='history.back();'> Return </button>";
        die;
    }
} else {
    header('location:registrasi.php');
}

?>
