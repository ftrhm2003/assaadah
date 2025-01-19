<?php
include('../config/auto_load.php');
include_once '../config/koneksi.php';
include_once 'news_control.php';
include('../template/header.php');

// Query untuk mengambil data dari tabel "berita"
$sql = "SELECT id, title, content, image, date FROM berita ORDER BY date desc";
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
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 20px;
        background-color: #f4f4f9;
        color: #333;
    }

    button {
        background-color: #007BFF;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #0056b3;
    }
    
    .delete-button {
        background-color: #dc3545;
    }

    .delete-button:hover {
        background-color: #b02a37;
    }

    .edit-button {
        background-color: #28a745;
    }

    .edit-button:hover {
        background-color: #218838;
    }

    a {
        text-decoration: none;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        background: white;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        overflow: hidden;
    }

    thead {
        background-color: #007BFF;
        color: white;
    }

    thead th {
        padding: 15px;
        text-align: left;
        font-weight: bold;
        text-transform: uppercase;
    }

    tbody tr {
        border-bottom: 1px solid #ddd;
    }

    tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tbody td {
        padding: 15px;
        vertical-align: middle;
        color: #555;
    }

    tbody img {
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    tbody tr:hover {
        background-color: #f1f1f1;
    }

    tbody td:last-child {
        display: flex;
        gap: 10px;
    }

    .table-container {
        overflow-x: auto;
    }

    .add-button {
        display: inline-block;
        margin-bottom: 15px;
        text-align: center;
    }
</style>

<div class="table-container">
        <a href="tambahnews.php" class="add-button"><button>Tambah Berita</button></a>
        <table>
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
                        echo "<td>" . htmlspecialchars(substr($row['content'], 0, 100)) . "...</td>";
                        echo "<td><img src='data:image/jpeg;base64," . base64_encode($row['image']) . "' alt='Image' style='width:150px; height:auto;'></td>";
                        echo "<td>" . htmlspecialchars($row['date']) . "</td>";
                        echo "<td>";
                        echo "<a href='editnews.php?id=" . htmlspecialchars($row['id']) . "'><button class='edit-button'>Edit</button></a>";
                        echo "<a href='deletenews.php?id=" . htmlspecialchars($row['id']) . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus berita ini?\");'><button class='delete-button'>Delete</button></a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' style='text-align: center;'>Tidak ada data tersedia</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<?php include('../template/footer.php'); ?>
<?php
// Tutup koneksi
$koneksi->close();
?>
