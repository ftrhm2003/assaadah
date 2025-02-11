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
            <link rel="stylesheet" href="index.css">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
                integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <link rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.3/font/bootstrap-icons.min.css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
            <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
            <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        </head>
        <body>
        <section id="topbar" class="mb-2 mb-lg-0 mb-sm-0 d-none d-lg-flex align-items-center pt-2 pb-2 bg-primary text-white topbar-transparent">
        <div class="container">
          <div class="row">
            <div class="col-lg-6   text-start">
          <i class="bi bi-clock"></i> Senin - Jumat: 07:00 - 15:00 
            </div>
            <div class="col-md-6 text-end">
                <a href="https://www.facebook.com/mts.assaadah.3" class="text-white mx-2"><i class="bi bi-facebook"></i></a>
                <a href="https://www.instagram.com/mtsassaadah?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" class="text-white mx-2"><i class="bi bi-instagram"></i></a>
                <a href="https://www.youtube.com/@mtsassaadahofficial3446" class="text-white mx-2"><i class="bi bi-youtube"></i></a>
            </div>
          </div>
        </div>
      </section>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="#">
    <img src="assets/image.png" alt="Logo Website" class="me-2" style="height: 80px;">
</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">BERANDA</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">TENTANG</a></li>
                    <li class="nav-item"><a class="nav-link" href="news_user.php">BERITA</a></li>
                    <li class="nav-item"><a class="nav-link" href="agenda.php">AGENDA</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php">REGISTRASI</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php #contact">KONTAK</a></li>
                </ul>
            </div>
        </div>
    </nav>
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
    <a href="news_user.php" class="back-link">Kembali</a>
</div>

</body>
        <footer id="contact">
            <div class="layar-dalam">
                <div class="copyright">&copy; 2025 MTs Assa'adah</div>
            </div>
        </footer>
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
