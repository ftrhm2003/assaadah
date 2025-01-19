<?php
include_once 'config/koneksi.php';

// Periksa apakah ID berita tersedia di URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    // Query untuk mengambil data berita berdasarkan ID
    $sql = "SELECT title, content, image, date FROM berita WHERE id = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
        <!DOCTYPE html>
        <html lang="id">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Detail Berita</title>
            <link rel="stylesheet" href="news_detail.css"> <!-- Tambahkan file CSS Anda -->
        </head>
        <body>
        <div class="news-detail-container">
    <!-- News Title -->
    <h1><?php echo htmlspecialchars($row['title']); ?></h1>

    <!-- News Date -->
    <p><em>Published on: <?php echo date('d M Y', strtotime($row['date'])); ?></em></p>

    <!-- News Image -->
    <figure>
        <img src="data:image/jpeg;base64,<?php echo base64_encode($row['image']); ?>" alt="<?php echo htmlspecialchars($row['title']); ?> Image">
        <figcaption><?php echo htmlspecialchars($row['title']); ?></figcaption>
    </figure>

    <!-- News Content (Render HTML content) -->
    <article>
        <!-- Using echo to display the content as HTML instead of plain text -->
        <?php echo $row['content']; ?>
    </article>

    <!-- Back to Home Button -->
    <a href="news_user.php" class="back-link">Back to Home</a>
</div>

</body>

        </html>
        <?php
    } else {
        echo "<p>Berita tidak ditemukan.</p>";
    }
    $stmt->close();
} else {
    echo "<p>Invalid ID.</p>";
}

// Tutup koneksi
$koneksi->close();
?>
