<?php
// Koneksi ke database
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'pendaftaran'; // Nama database

$conn = new mysqli($host, $username, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    // Fungsi untuk memeriksa apakah file berformat PDF
    function is_pdf($filename) {
        return strtolower(pathinfo($filename, PATHINFO_EXTENSION)) === 'pdf';
    }

    // Array untuk menyimpan file yang wajib diunggah
    $required_files = ['kartu_keluarga', 'ktp', 'ijazah', 'akte_kelahiran'];

    // Validasi file wajib
    foreach ($required_files as $file) {
        if (empty($_FILES[$file]['tmp_name']) || !is_pdf($_FILES[$file]['name'])) {
            die("Error: File $file harus dalam format PDF dan tidak boleh kosong.");
        }
    }

    // Validasi opsional buku KJP
    if (isset($_FILES['buku_kjp']['name']) && $_FILES['buku_kjp']['name'] !== '' && !is_pdf($_FILES['buku_kjp']['name'])) {
        die("Error: Buku KJP harus dalam format PDF.");
    }

    // Ambil file dari form
    $kartu_keluarga = file_get_contents($_FILES['kartu_keluarga']['tmp_name']);
    $ktp = file_get_contents($_FILES['ktp']['tmp_name']);
    $ijazah = file_get_contents($_FILES['ijazah']['tmp_name']);
    $akte_kelahiran = file_get_contents($_FILES['akte_kelahiran']['tmp_name']);
    $buku_kjp = isset($_FILES['buku_kjp']['tmp_name']) && $_FILES['buku_kjp']['tmp_name'] !== '' 
                ? file_get_contents($_FILES['buku_kjp']['tmp_name']) 
                : null;

    // Update data berkas untuk pendaftar saat ini
    $stmt = $conn->prepare("UPDATE berkas SET kartu_keluarga = ?, ktp = ?, ijazah = ?, akte_kelahiran = ?, buku_kjp = ? WHERE pendaftar_id = (SELECT id FROM pendaftar ORDER BY id DESC LIMIT 1)");
    $stmt->bind_param("sssss", $kartu_keluarga, $ktp, $ijazah, $akte_kelahiran, $buku_kjp);

    // Eksekusi query
    if ($stmt->execute()) {
        echo "<script>
            alert('Berkas berhasil diunggah!');
            window.location.href = 'dashboard.php';
        </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Tutup koneksi
    $stmt->close();
    $conn->close();
}
?>