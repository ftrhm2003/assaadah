<?php
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

// Ambil parameter pendaftar_id
$pendaftar_id = isset($_GET['pendaftar_id']) ? (int)$_GET['pendaftar_id'] : 0;

// Query untuk mengambil nama dan nisn
$sql_pendaftar = "SELECT nama, nisn FROM pendaftar WHERE id = ?";
$stmt_pendaftar = $conn->prepare($sql_pendaftar);
$stmt_pendaftar->bind_param("i", $pendaftar_id);
$stmt_pendaftar->execute();
$result_pendaftar = $stmt_pendaftar->get_result();
$data_pendaftar = $result_pendaftar->fetch_assoc();
$stmt_pendaftar->close();

if (!$data_pendaftar) {
    die("Data pendaftar tidak ditemukan.");
}

// Ambil nama dan nisn dari hasil query
$nama = $data_pendaftar['nama'];
$nisn = $data_pendaftar['nisn'];

// Query semua berkas berdasarkan pendaftar_id
$sql_berkas = "SELECT kartu_keluarga, ktp, ijazah, akte_kelahiran, buku_kjp FROM berkas WHERE pendaftar_id = ?";
$stmt_berkas = $conn->prepare($sql_berkas);
$stmt_berkas->bind_param("i", $pendaftar_id);
$stmt_berkas->execute();
$result_berkas = $stmt_berkas->get_result();
$berkas = $result_berkas->fetch_assoc();
$stmt_berkas->close();

if ($berkas) {
    // Buat folder dengan nama dan nisn
    $folder_name = "downloads/" . str_replace(' ', '_', $nama) . "_" . $nisn;
    
    if (!is_dir($folder_name)) {
        mkdir($folder_name, 0777, true);
    }

    // Simpan semua berkas ke folder
    foreach ($berkas as $type => $content) {
        if ($content) {
            $file_name = $type . "_" . str_replace(' ', '_', $nama) . "_" . $nisn . ".pdf";
            file_put_contents("$folder_name/$file_name", $content);
        }
    }

    // Buat file ZIP dari folder
    $zip_name = $folder_name . ".zip";
    $zip = new ZipArchive();
    if ($zip->open($zip_name, ZipArchive::CREATE | ZipArchive::OVERWRITE)) {
        $files = scandir($folder_name);
        foreach ($files as $file) {
            if ($file !== '.' && $file !== '..') {
                $zip->addFile("$folder_name/$file", $file);
            }
        }
        $zip->close();
    }

    // Unduh file ZIP
    header('Content-Type: application/zip');
    header('Content-Disposition: attachment; filename="' . basename($zip_name) . '"');
    header('Content-Length: ' . filesize($zip_name));
    readfile($zip_name);
} else {
    echo "Berkas tidak ditemukan.";
}

$conn->close();
