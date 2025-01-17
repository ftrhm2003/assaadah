<?php
include 'config/koneksi.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Retrieve the PDF data from the database
    $query = "SELECT file_pdf, title FROM agenda WHERE id = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($fileData, $title);

    if ($stmt->num_rows > 0) {
        $stmt->fetch();

        // Send headers to serve the PDF
        header("Content-Type: application/pdf");
        header("Content-Disposition: inline; filename=\"$title.pdf\"");
        echo $fileData;
    } else {
        echo "PDF not found.";
    }

    $stmt->close();
} else {
    echo "No ID provided.";
}
?>
