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

// Cek apakah ID disediakan
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data berita berdasarkan ID
    $sql = "SELECT * FROM berita WHERE id = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Berita tidak ditemukan.";
        exit;
    }
} else {
    echo "ID tidak disediakan.";
    exit;
}

// Proses form edit berita
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $date = $_POST['date'];

    // Periksa apakah file diunggah
    if (!empty($_FILES['image']['name'])) {
        $image = file_get_contents($_FILES['image']['tmp_name']);
        $sql = "UPDATE berita SET title = ?, content = ?, images = ?, date = ? WHERE id = ?";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("ssbsi", $title, $content, $image, $date, $id);
    } else {
        $sql = "UPDATE berita SET title = ?, content = ?, date = ? WHERE id = ?";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("sssi", $title, $content, $date, $id);
    }

    if ($stmt->execute()) {
        echo "Berita berhasil diperbarui.";
    } else {
        echo "Gagal memperbarui berita.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Berita</title>
</head>
<body>
    <h1>Edit Berita</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($row['title']); ?>" required><br><br>
        <label for="content">Content:</label><br>
        <textarea id="content" name="content" required><?php echo htmlspecialchars($row['content']); ?></textarea><br><br>
        <label for="image">Image (optional):</label><br>
        <input type="file" id="image" name="image"><br><br>
        <label for="date">Date:</label><br>
        <input type="date" id="date" name="date" value="<?php echo htmlspecialchars($row['date']); ?>" required><br><br>
        <button type="submit">Update</button>
    </form>
    <a href="news.php"><button>Kembali</button></a>
</body>
</html>
<?php
$koneksi->close();
?>
