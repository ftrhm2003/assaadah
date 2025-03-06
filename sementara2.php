<?php
session_start();
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Koneksi ke database
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'pendaftaran';

$conn = new mysqli($host, $username, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    function is_pdf($filename) {
        return strtolower(pathinfo($filename, PATHINFO_EXTENSION)) === 'pdf';
    }

    // Folder penyimpanan
    $uploadDir = "uploads/";

    // File wajib diunggah
    $required_files = ['kartu_keluarga', 'ktp', 'ijazah', 'akte_kelahiran'];
    $filePaths = [];

    foreach ($required_files as $file) {
        if (!isset($_FILES[$file]) || $_FILES[$file]['error'] !== UPLOAD_ERR_OK || !is_pdf($_FILES[$file]['name'])) {
            die("Error: File $file harus dalam format PDF dan tidak boleh kosong.");
        }

        // Simpan file ke folder uploads
        $filePath = $uploadDir . basename($_FILES[$file]['name']);
        if (!move_uploaded_file($_FILES[$file]['tmp_name'], $filePath)) {
            die("Error: Gagal mengunggah $file.");
        }

        $filePaths[$file] = $filePath;
    }

    // Buku KJP (opsional)
    $buku_kjp_path = null;
    if (!empty($_FILES['buku_kjp']['tmp_name']) && is_pdf($_FILES['buku_kjp']['name'])) {
        $buku_kjp_path = $uploadDir . basename($_FILES['buku_kjp']['name']);
        move_uploaded_file($_FILES['buku_kjp']['tmp_name'], $buku_kjp_path);
    }

    // Ambil ID pendaftar terbaru
    $result = $conn->query("SELECT id FROM pendaftar ORDER BY id DESC LIMIT 1");
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $pendaftar_id = $row['id'];

        // Update database dengan path file
        $stmt = $conn->prepare("UPDATE berkas SET kartu_keluarga = ?, ktp = ?, ijazah = ?, akte_kelahiran = ?, buku_kjp = ? WHERE pendaftar_id = ?");
        $stmt->bind_param("sssssi", $filePaths['kartu_keluarga'], $filePaths['ktp'], $filePaths['ijazah'], $filePaths['akte_kelahiran'], $buku_kjp_path, $pendaftar_id);

        if ($stmt->execute()) {
            $_SESSION['berkas_uploaded'] = true;
            $_SESSION['pesan_sukses'] = "Berkas berhasil diunggah!";
            header("Location: regist_berkas.php");
            exit();
        } else {
            die("Error: " . $stmt->error);
        }

        $stmt->close();
    } else {
        die("Error: Tidak ada pendaftar yang ditemukan.");
    }

    $conn->close();
}
?>
