<?php
include '../config/koneksi.php';

// Proses hapus data berdasarkan ID
$id = $_GET['id'];

$query = "DELETE FROM agenda WHERE id = $id";
if (mysqli_query($koneksi, $query)) {
    header('Location: agenda.php');
} else {
    echo "Error: " . mysqli_error($koneksi);
}
?>
