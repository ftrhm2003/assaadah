<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My school</title>
    <link rel="stylesheet" href="style1.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" 
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<body>
    <!-- Topbar -->
    <section id="topbar" class="mb-2 d-none d-lg-flex align-items-center pt-2 pb-2 bg-primary text-white topbar-transparent">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-start">
                    <span class="px-3"><i class="bi bi-phone"></i> +1 5589 55488 55 </span>
                    <i class="bi bi-clock"></i> Mon-Sat: 11:00 AM - 23:00 PM
                </div>
                <div class="col-md-6 text-end">
                    <a href="#" class="me-4 text-reset"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="me-4 text-reset"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="me-4 text-reset"><i class="bi bi-google"></i></a>
                    <a href="#" class="me-4 text-reset"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="me-4 text-reset"><i class="bi bi-linkedin"></i></a>
                    <a href="#" class="me-4 text-reset"><i class="bi bi-github"></i></a>
                </div>
            </div>
        </div>
    </section>

    <!-- Navbar -->
    <nav>
        <div class="wrapper1">
            <div class="logo"><a href="#">My School</a></div>
            <div class="menu">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="news_user.php">Berita</a></li>
                    <li><a href="agenda.php">Agenda</a></li>
                    <li><a href="login.php">Registration</a></li>
                    <li><a href="index.php#contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- PHP untuk Mengambil Data Agenda -->
    <?php
    include('config/koneksi.php');
    $query = "SELECT * FROM agenda ORDER BY created_at DESC";
    $result = mysqli_query($koneksi, $query);
    ?>

    <!-- Daftar Agenda -->
    <section class="timeline">
    <div class="container">
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <div class="desc mb-4">
                <h3><?php echo $row['title']; ?></h3>
                <p><?php echo $row['description']; ?></p>
                <div class="description-left-footer2">
                    <p><?php echo $row['date']; ?></p>
                    <p class="font-weight-bold2">
                        <a href="fetch_pdf.php?id=<?php echo $row['id']; ?>" target="_blank">Download PDF</a>
                    </p>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</section>


    <!-- Footer -->
    <footer id="contact">
        <div class="layar-dalam">
            <div class="copyright">&copy; 2020 My School</div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
