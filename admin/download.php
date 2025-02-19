<?php
// Koneksi ke database
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'pendaftaran'; // Sesuaikan dengan nama database kamu

$conn = new mysqli($host, $username, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil parameter pendaftar_id dan tipe berkas
$pendaftar_id = isset($_GET['pendaftar_id']) ? (int)$_GET['pendaftar_id'] : 0;
$type = isset($_GET['type']) ? $_GET['type'] : '';

// Validasi tipe berkas yang diizinkan
$allowed_types = ['kartu_keluarga', 'ktp', 'ijazah', 'akte_kelahiran', 'buku_kjp'];
if (!in_array($type, $allowed_types)) {
    die("Tipe berkas tidak valid.");
}

// Query untuk mengambil berkas berdasarkan pendaftar_id dan tipe
$sql = "SELECT $type FROM berkas WHERE pendaftar_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $pendaftar_id);
$stmt->execute();
$stmt->bind_result($file_content);
$stmt->fetch();
$stmt->close();

// Pastikan berkas ditemukan
if (!empty($file_content)) {
    // Tentukan nama file default
    $file_name = "{$type}_{$pendaftar_id}.pdf";

    // Set header untuk download file PDF
    header('Content-Type: application/pdf');
    header("Content-Disposition: attachment; filename=\"$file_name\"");
    header("Content-Length: " . strlen($file_content));

    // Tampilkan isi file
    echo $file_content;
} else {
    echo "Berkas tidak ditemukan.";
}

// Tutup koneksi
$conn->close();
?>
