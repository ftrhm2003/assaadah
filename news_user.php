<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MTs Assa'adah Cakung</title>

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
 <style>
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap");

:root {
  --primary-color: #3685fb;
  --primary-color-dark: #2f73d9;
  --secondary-color: #fafcff;
  
  --extra-light: #ffffff;

}

* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}

.section__container {
  max-width: var(--max-width);
  margin: auto;
  padding: 5rem 1rem;
}

.btn {
  padding: 0.75rem 2rem;
  outline: none;
  border: none;
  font-size: 1rem;
  color: var(--extra-light);
  background-color: var(--primary-color);
  border-radius: 5rem;
  cursor: pointer;
  transition: 0.3s;
}

.btn:hover {
  background-color: var(--primary-color-dark);
}
</style>
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

    <?php
include_once 'config/koneksi.php';

// Query to fetch the 3 newest news entries from the "berita" table
$sql = "SELECT id, title, content, image, date, created_at FROM berita ORDER BY created_at DESC";
$result = $koneksi->query($sql);
?>

<section class="container my-5">
<h1 class="heading"> <span>Portal</span> Berita </h1>
    <div class="row">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="col-lg-4 col-md-6 col-sm-12 mb-4">'; // Responsive grid
                echo '<div class="card h-100 shadow-sm">'; // Menambahkan shadow dan ketinggian seragam
                echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" alt="News Image" class="card-img-top">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . htmlspecialchars($row['title']) . '</h5>';
                echo '<p class="card-text">' . htmlspecialchars(substr(strip_tags($row['content']), 0, 150)) . '...</p>';
                echo '</div>';
                echo '<div class="card-footer bg-white text-end">';
                echo '<small class="text-muted pt-4">' . date('F d, Y', strtotime($row['date'])) . '</small><br>';
                echo '<a href="news_detail.php?id=' . htmlspecialchars($row['id']) . '" class="btn btn-primary btn-sm mt-2 mb-2">Baca Selengkapnya</a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<div class="col-12"><p class="text-center">No news available at the moment.</p></div>';
        }
        ?>
    </div>
</section>

<footer id="contact" style="
    background: #343a40; 
    color: white; 
    text-align: center; 
    padding: 10px 0; 
    width: 100%; 
    position: absolute; 
    bottom: 0;">
    <div class="layar-dalam">
        <div class="copyright mb-2">&copy; 2025 MTs Assa'adah</div>
    </div>
</footer>
        <script src="java.js"></script>
</body>
</html>