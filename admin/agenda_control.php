<?php
include '../config/koneksi.php';

if (isset($_POST['update'])) {
    // Process to update agenda
    $id = $_POST['id'];
    $title = mysqli_real_escape_string($koneksi, $_POST['title']);
    $date = mysqli_real_escape_string($koneksi, $_POST['date']);
    $description = mysqli_real_escape_string($koneksi, $_POST['description']);
    $fileUpdated = '';

    // Handle file upload
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $fileTmp = $_FILES['file']['tmp_name'];
        $fileType = $_FILES['file']['type'];

        // Validate that the uploaded file is a PDF
        if ($fileType === "application/pdf") {
            $fileData = file_get_contents($fileTmp);
            $fileUpdated = ", file_pdf = '" . mysqli_real_escape_string($koneksi, $fileData) . "'";
        } else {
            echo "Error: Only PDF files are allowed.";
            exit;
        }
    }

    // Update query
    $query = "UPDATE agenda 
              SET title = '$title', date = '$date', description = '$description' $fileUpdated 
              WHERE id = $id";
    if (mysqli_query($koneksi, $query)) {
        header('Location: agenda.php');
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Process to add new agenda
    $title = mysqli_real_escape_string($koneksi, $_POST['title']);
    $date = mysqli_real_escape_string($koneksi, $_POST['date']);
    $description = mysqli_real_escape_string($koneksi, $_POST['description']);
    $fileData = '';

    // Handle file upload
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $fileTmp = $_FILES['file']['tmp_name'];
        $fileType = $_FILES['file']['type'];

        // Validate that the uploaded file is a PDF
        if ($fileType === "application/pdf") {
            $fileData = file_get_contents($fileTmp);
        } else {
            echo "Error: Only PDF files are allowed.";
            exit;
        }
    }

    // Insert query
    $query = "INSERT INTO agenda (title, date, description, file_pdf) 
              VALUES ('$title', '$date', '$description', '" . mysqli_real_escape_string($koneksi, $fileData) . "')";
    if (mysqli_query($koneksi, $query)) {
        header('Location: agenda.php');
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    header('Location: agenda.php');
}
?>

