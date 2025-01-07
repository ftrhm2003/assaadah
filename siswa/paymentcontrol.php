<?php

$id_user = $_SESSION['id_users'];
$sql_pendaftar = "SELECT * FROM pendaftar WHERE users_id = '$id_user'";
$result_pendaftar = mysqli_query($koneksi, $sql_pendaftar);

if (mysqli_num_rows($result_pendaftar)) {

    $data_pendaftar = mysqli_fetch_array($result_pendaftar);
    $id_pendaftar = $data_pendaftar['id'];

    $sql_payment = "SELECT * FROM payment WHERE pendaftar_id = '$id_pendaftar'";
    $result_payment = mysqli_query($koneksi, $sql_payment);

    if (mysqli_num_rows($result_payment)) {
        $data_payment = mysqli_fetch_array($result_payment);
        $status = $data_payment['status'];
    }

    // Simpan data nilai
    if (isset($_POST['btn_simpan']) && $_POST['btn_simpan'] == 'simpan_payment') {

        // Mendapatkan tanggal pembayaran dari POST
        $tanggal_pembayaran = $_POST['tanggal_pembayaran'];

        // Cek apakah file diunggah
        if (isset($_FILES["gambar"]) && $_FILES["gambar"]["error"] == 0) {
            // Path folder upload
            $target_dir = "../photo/";
            $file_name = basename($_FILES["gambar"]["name"]);
            $target_file = $target_dir . $file_name;

            // Buat folder jika belum ada
            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0777, true);
            }

            // Validasi tipe file
            $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $allowed_types = ['jpg', 'jpeg', 'png', 'pdf'];

            if (in_array($file_type, $allowed_types)) {
                if (is_uploaded_file($_FILES["gambar"]["tmp_name"])) {
                    if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
                        // Simpan data ke database
                        $sql_insert_payment = "INSERT INTO payment (tanggal_pembayaran, bukti_pembayaran, status, pendaftar_id)
                                               VALUES ('$tanggal_pembayaran', '$file_name', 0, '$id_pendaftar')";
                        $query_insert_payment = mysqli_query($koneksi, $sql_insert_payment);

                        if ($query_insert_payment) {
                            // Sukses
                            header('location:dashboard.php');
                        } else {
                            echo "Error: " . mysqli_error($koneksi);
                            die;
                        }
                    } else {
                        echo "Error uploading file.";
                        die;
                    }
                } else {
                    echo "Possible file upload attack detected.";
                    die;
                }
            } else {
                echo "File type not allowed. Only JPG, JPEG, PNG, and PDF files are accepted.";
                die;
            }
        } else {
            echo "File bukti pembayaran tidak ditemukan atau terjadi kesalahan saat mengunggah.";
            die;
        }
    }
}

?>
