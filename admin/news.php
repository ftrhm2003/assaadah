<?php
include('../config/auto_load.php');
include_once '../config/koneksi.php';
include_once 'news_control.php';
include('../template/header.php');

// Query untuk mengambil data dari tabel "berita"
$sql = "SELECT id, title, content, image, date FROM berita";
$result = $koneksi->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Berita</title>
</head>
<body>
    <!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">News Data</h1>

<!-- Alert Notification -->
<?php if (isset($_SESSION['pesan_sukses'])) { ?>
    <div class="alert alert-success">
        <?= $_SESSION['pesan_sukses']; ?>
    </div>
    <?php unset($_SESSION['pesan_sukses']); ?>
<?php } ?>

<style>
        button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
        }
        
        .delete-button {
            background-color: red;
        }

        .delete-button:hover {
            background-color: darkred;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
    </style>

    <a href="tambahnews.php"><button>Tambah Berita</button></a> 
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>Image</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['title']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['content']) . "</td>";
                    echo "<td><img src='data:image/jpeg;base64," . base64_encode($row['image']) . "' alt='Image' style='width:150px; height:auto;'></td>";
                    echo "<td>" . htmlspecialchars($row['date']) . "</td>";
                    echo "<td>";
                    echo "<a href='editnews.php?id=" . htmlspecialchars($row['id']) . "'><button class='edit-button'>Edit</button></a> ";
                    echo "<a href='deletenews.php?id=" . htmlspecialchars($row['id']) . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus berita ini?\");'><button class='delete-button'>Delete</button></a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Tidak ada data tersedia</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
<?php include('../template/footer.php'); ?>
<?php
// Tutup koneksi
$koneksi->close();
?>
