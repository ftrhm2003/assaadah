<?php
// Koneksi ke database
$servername = "localhost";
$username = "root"; // Ganti sesuai kredensial Anda
$password = "";     // Ganti sesuai kredensial Anda
$dbname = "pendaftaran";

$koneksi = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Inisialisasi variabel untuk pesan error atau sukses
$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $date = date('Y-m-d');

    // Periksa apakah file gambar diunggah
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image = file_get_contents($_FILES['image']['tmp_name']);

        // Query untuk menyisipkan data ke tabel "berita"
        $stmt = $koneksi->prepare("INSERT INTO berita (title, content, image, date) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $title, $content, $image, $date);

        if ($stmt->execute()) {
            $message = "Berita berhasil ditambahkan!";
        } else {
            $message = "Gagal menambahkan berita: " . $koneksi->error;
        }

        $stmt->close();
    } else {
        $message = "Harap unggah file gambar yang valid.";
    }
}

$koneksi->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Berita</title>
</head>
<body>
    <h1>Tambah Berita</h1>

    <?php if (!empty($message)) { echo "<p style='color: red;'>$message</p>"; } ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <label for="title">Name:</label><br>
        <input type="text" id="title" name="title" required><br><br>

        <label for="content">Content:</label><br>
        <textarea id="content" name="content" rows="5" required></textarea><br><br>

        <label for="image">Upload Image:</label><br>
        <input type="file" id="image" name="image" accept="image/*" required><br><br>

        <button type="submit">Submit</button>
        
    </form>
    <a href="news.php"><button>Kembali ke Daftar Berita</button></a>
</body>
</html>