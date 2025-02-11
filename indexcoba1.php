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
        <div class="logo">
        <img src="assets/image.png" alt="Logo Website">
        </div>
            <div class="menu">
                <ul>
                    <li><a href="#home">BERANDA</a></li>
                    <li><a href="about.php">TENTANG</a></li>
                    <li><a href="news_user.php">BERITA</a></li>
                    <li><a href="agenda.php">AGENDA</a></li>
                    <li><a href="login.php">REGISTRASI</a></li>
                    <li><a href="#contact">KONTAK</a></li>
                </ul>
            </div>
        </div>
    </nav>

     
    <div class="wrapper2">
    <header id="home">
        <div class="overlay">
        <video autoplay muted loop style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); min-width: 100%; min-height: 100%; object-fit: cover; z-index: -1;">
        <source src="assets/vidio.mp4" type="video/mp4">
        </video>
            <div id="intro">
                <h3>MTs Assa’adah</h3>
                <p>Maju bersama kebahagian</p>
            </div>
        </div>
    </header>
</div>
  

    
<section class="description-container">
<div>
    <div>
      <h2>Sejarah Sekolah</h2>
      <p>
        MTs Assa'adah Cakung was established on October 18, 2020 on an area of ​​9770 m2 which is located on Jalan Tambun Rengas, Kec.Cakung, City.East Jakarta. At the beginning of establishment the number of existing rooms, 6 learning classrooms, 1 teacher room, administration and school principal, 1 skill room, 1 library room, 1 science laboratory room and 1 counseling guidance room, with 1 school principal, 24 teachers, 3 administrative staff, 3 school guards, and 144 students. The establishment of MTs Assa'adah Cakung because of seeing the condition of students many who had difficulty finding schools to continue their education to a higher level.
      </p>
    </div>
    <div class="description-left-footer">
      <p class="font-weight-bold"></p>
    </div>
  </div>
  <div class="swiper-container">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <img src="assets/sekolah.jpg" alt="Foto Sekolah 1" />
      </div>
      <div class="swiper-slide">
        <img src="assets/OPENa.jpg" alt="Foto Sekolah 2" />
      </div>
      <div class="swiper-slide">
        <img src="assets/student.jpg" alt="Foto Sekolah 3" />
      </div>
    </div>
    
  </div>
</section>


<style>
.swiper-container {
    height: 300px;
    margin: 0px 0;
    padding: 1 10%;
    display: flex;
    overflow: hidden;
}

.swiper-slide img {
    width: 500px;
    height: 100%;
    object-fit: cover; 
    padding: 0; 
}
</style>

   

<?php
include_once 'config/koneksi.php';

// Query to fetch the 3 newest news entries from the "berita" table
$sql = "SELECT id, title, content, image, date FROM berita ORDER BY date DESC LIMIT 3";
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

<br>
    
        <section class="contact" id="contact">

            <h1 class="heading"> <span>Kontak</span> Kami </h1>
        
            <div class="icons-container">
                <div class="icons">
                    <i class="fas fa-phone"></i>
                    <h3>our number</h3>
                    <p>089-778-7868</p>
                    <p>098-657-6546</p>
                </div>
                <div class="icons">
                    <i class="fas fa-envelope"></i>
                    <h3>our email</h3>
                    <p>MTs Assa'adah Cakung@gmail.com</p>
                    <p>education@gmail.com</p>
                </div>
            </div>
        
            <div class="row">
        
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1983.3801093195475!2d106.9656602691541!3d-6.162858903886176!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698a5725a4f7e9%3A0x610a86189f88cffd!2sMTS%20Assa&#39;adah%20Cakung!5e0!3m2!1sid!2sid!4v1685894989134!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

            </div>
        
        </section>

        <footer id="contact">
            <div class="layar-dalam">
                <div class="copyright">&copy; 2020 MTs Assa'adah Cakung</div>
            </div>
        </footer>

        <script>
  document.addEventListener("DOMContentLoaded", function () {
    const swiper = new Swiper('.swiper-container', {
      loop: true, // Looping slide
      
      autoplay: {
        delay: 5000, // 3 detik
        disableOnInteraction: false,
      },
      effect: 'slide', // Pastikan efek transisi digunakan
    });
  });
</script>


      
</body>
</html>