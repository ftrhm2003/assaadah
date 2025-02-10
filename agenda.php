<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My School</title>

    <link rel="stylesheet" href="index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        html, body {
    height: 100%;
}
body {
    display: flex;
    flex-direction: column;
}
.container {
    flex: 1;
}
.navbar-brand img {
    height: 50px; /* Sesuaikan dengan ukuran yang pas */
    width: auto; /* Biar proporsi logo tetap */
}


    </style>
</head>

<body>
    <section id="topbar" class="d-none d-lg-flex align-items-center bg-primary text-white p-2">
        <div class="container d-flex justify-content-between">
            <div>
                <i class="bi bi-phone"></i> +62 134334773 &nbsp; | &nbsp;
                <i class="bi bi-clock"></i> Mon-Sat: 11:00 AM - 23:00 PM
            </div>
            <div>
                <a href="#" class="text-white mx-2"><i class="bi bi-facebook"></i></a>
                <a href="#" class="text-white mx-2"><i class="bi bi-twitter"></i></a>
                <a href="#" class="text-white mx-2"><i class="bi bi-google"></i></a>
                <a href="#" class="text-white mx-2"><i class="bi bi-instagram"></i></a>
                <a href="#" class="text-white mx-2"><i class="bi bi-linkedin"></i></a>
                <a href="#" class="text-white mx-2"><i class="bi bi-github"></i></a>
            </div>
        </div>
    </section>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="#">
    <img src="assets/assadah.png" alt="Logo Website" class="me-2" style="height: 80px;">
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
                    <li class="nav-item"><a class="nav-link" href="#contact">KONTAK</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <?php
        include('config/koneksi.php');
        $query = "SELECT * FROM agenda ORDER BY created_at DESC";
        $result = mysqli_query($koneksi, $query);
    ?>

    <section class="container my-4">
        <div class="row">
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <div class="col-md-6 col-lg-4 mb-3">
                    <div class="card p-3">
                        <h3><?php echo $row['title']; ?></h3>
                        <p><?php echo $row['description']; ?></p>
                        <p class="text-muted">Tanggal: <?php echo $row['date']; ?></p>
                        <a href="fetch_pdf.php?id=<?php echo $row['id']; ?>" target="_blank" class="btn btn-primary btn-sm">Download PDF</a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </section>

    <footer id="contact" class="bg-dark text-white text-center p-3">
        <p>&copy; 2025 MTs Assa'adah</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFywnYtYPsaePZbTwYHWo7f4aG+6bko6Y5O5q5s5w5w5w5w5w5w5w5w5w5w5w5w5w5w5w5w5w5w5w5w5w5w5w5w5w5w5w5w5w5" crossorigin="anonymous"></script>
</body>
</html>
