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
        echo "<script>alert('Berita berhasil diperbarui.');</script>";
    } else {
        echo "<script>alert('Gagal memperbarui berita.');</script>";
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Berita</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 40px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin-bottom: 8px;
            color: #333;
        }

        input[type="text"], input[type="date"], textarea, input[type="file"] {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            width: 100%;
        }

        textarea {
            resize: vertical;
        }

        button {
            padding: 12px 20px;
            font-size: 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        .back-link {
            text-align: center;
            margin-top: 20px;
        }

        .back-link button {
            background-color: #6c757d;
        }

        .back-link button:hover {
            background-color: #5a6268;
        }

        .form-group {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Edit Berita</h1>

        <!-- Display message if available -->
        <?php if (!empty($message)) { echo "<p style='color: red; text-align: center;'>$message</p>"; } ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <!-- Hidden input for the news ID -->
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($row['title']); ?>" required>
            </div>

            <div class="form-group">
                <label for="content">Content:</label>
                <textarea id="content" name="content" rows="5" required><?php echo htmlspecialchars($row['content']); ?></textarea>
            </div>

            <div class="form-group">
                <label for="image">Image (optional):</label>
                <input type="file" id="image" name="image">
            </div>

            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" id="date" name="date" value="<?php echo htmlspecialchars($row['date']); ?>" required>
            </div>

            <button type="submit">Update</button>
        </form>

        <div class="back-link">
            <a href="news.php"><button>Kembali</button></a>
        </div>
    </div>

</body>
</html>

<?php
$koneksi->close();
?>

