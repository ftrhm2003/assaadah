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

// Ambil parameter pendaftar_id dan nama
$pendaftar_id = isset($_GET['pendaftar_id']) ? (int)$_GET['pendaftar_id'] : 0;
$nama = isset($_GET['nama']) ? $_GET['nama'] : '';

// Query semua berkas berdasarkan pendaftar_id
$sql = "SELECT kartu_keluarga, ktp, ijazah, akte_kelahiran, buku_kjp FROM berkas WHERE pendaftar_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $pendaftar_id);
$stmt->execute();
$result = $stmt->get_result();
$berkas = $result->fetch_assoc();
$stmt->close();

if ($berkas) {
    // Buat folder sementara
    $folder_name = "downloads/" . str_replace(' ', '_', $nama);
    if (!is_dir($folder_name)) {
        mkdir($folder_name, 0777, true);
    }

    // Simpan semua berkas ke folder sementara dengan nama siswa ditambahkan
    foreach ($berkas as $type => $content) {
        if ($content) {
            // Buat nama file dengan format: "ktp_Syadam_Radyan_Anwar.pdf"
            $file_name = $type . "_" . str_replace(' ', '_', $nama) . ".pdf";
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

    // Hapus folder sementara setelah zip dibuat
    array_map('unlink', glob("$folder_name/*.*"));
    rmdir($folder_name);

    // Unduh file ZIP
    header('Content-Type: application/zip');
    header('Content-Disposition: attachment; filename="' . basename($zip_name) . '"');
    header('Content-Length: ' . filesize($zip_name));
    readfile($zip_name);

    // Hapus file ZIP setelah diunduh
    unlink($zip_name);
} else {
    echo "Berkas tidak ditemukan.";
}

$conn->close();
