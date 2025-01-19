<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My school</title>

    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="news_user.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <!-- Custom fonts for this template-->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  

</head>
<body>
    <section id="topbar" class="mb-2 mb-lg-0 mb-sm-0 d-none d-lg-flex align-items-center pt-2 pb-2 bg-primary text-white topbar-transparent">
        <div class="container">
          <div class="row">
            <div class="col-lg-6   text-start">
             <span class="px-3"><i class="bi bi-phone "></i> +62 134334773 </span>
          <i class="bi bi-clock"></i> Mon-Sat: 11:00 AM - 23:00 PM
            </div>
            <div class="col-md-6 text-end">
                <a href="" class="me-4 text-reset">
                    <i class="bi bi-facebook"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="bi bi-twitter"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="bi bi-google"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="bi bi-instagram"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="bi bi-linkedin"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="bi bi-github"></i>
                </a>
            </div>
          </div>
        </div>
      </section>
    <nav>
        <div class="wrapper1">
            <div class="logo"><a href=''>My school</a></div>
            <div class="menu">
                <ul>
                <li><a href="index.php">BERANDA</a></li>
                    <li><a href="about.html">TENTANG</a></li>
                    <li><a href="news_user.php">BERITA</a></li>
                    <li><a href="agenda.php">AGENDA</a></li>
                    <li><a href="login.php">REGISTRASI</a></li>
                    <li><a href="index.php#contact">KONTAK</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <?php
include_once 'config/koneksi.php';

// Query untuk mengambil data dari tabel "berita"
$sql = "SELECT id, title, content, image, date FROM berita ORDER BY date DESC";
$result = $koneksi->query($sql);
?>      

<section class="content-container">
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="card">';
            echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" alt="News Image" class="card-img">';
            echo '<div class="card-body">';
            echo '<h3>' . htmlspecialchars($row['title']) . '</h3>';
            echo '<p>' . htmlspecialchars(substr($row['content'], 0, 150)) . '...</p>';
            echo '</div>';
            echo '<div class="card-footer">';
            echo '<p>' . date('F d, Y', strtotime($row['date'])) . '</p>';
            echo '<a href="news_detail.php?id=' . htmlspecialchars($row['id']) . '" class="font-weight-bold">Baca Selengkapnya</a>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo '<p>No news available at the moment.</p>';
    }
    ?>
</section>


<?php
// Tutup koneksi
$koneksi->close();
?>


<footer id="contact">
            <div class="layar-dalam">
                <div class="copyright">&copy; 2020 My school</div>
            </div>
        </footer>
        <script src="java.js"></script>
</body>
</html>