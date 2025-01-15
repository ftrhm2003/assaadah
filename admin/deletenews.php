<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pendaftaran";

$koneksi = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus berita berdasarkan ID
    $sql = "DELETE FROM berita WHERE id = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Berita berhasil dihapus.";
    } else {
        echo "Gagal menghapus berita.";
    }

    $stmt->close();
}
$koneksi->close();
?>
<a href="news.php"><button>Kembali ke Daftar Berita</button></a>
