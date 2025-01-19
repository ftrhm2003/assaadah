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
    <script src="../ckeditor/ckeditor.js"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
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

        input[type="text"], textarea, input[type="file"] {
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

        .back-link button {
            background-color: #6c757d;
            margin-top: 20px;
        }

        .back-link button:hover {
            background-color: #5a6268;
        }

        .message {
            color: red;
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Tambah Berita</h1>

        <!-- Display message if available -->
        <?php if (!empty($message)) { echo "<p class='message'>$message</p>"; } ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>
            </div>

            <div class="form-group">
                <label for="content">Content:</label>
                <textarea id="content" name="content" rows="5" required> </textarea>
                <script>
                    CKEDITOR.replace('content');
                </script>
            </div>

            <div class="form-group">
                <label for="image">Upload Image:</label>
                <input type="file" id="image" name="image" accept="image/*" required>
            </div>

            <button type="submit">Submit</button>
        </form>

        <div class="back-link">
            <a href="news.php"><button>Kembali ke Daftar Berita</button></a>
        </div>
    </div>

</body>
</html>
