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

     
    <div class="wrapper2">
    <header id="home">
        <div class="overlay">
        <video autoplay muted loop style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); min-width: 100%; min-height: 100%; object-fit: cover; z-index: -1;">
        <source src="assets/0211.mp4" type="video/mp4">
        </video>
            <div id="intro">
                <h3>MTs Assa’adah</h3>
                <p>Bahagia itu dimulai dari sini</p>
            </div>
        </div>
    </header>
</div>
  
<br>
<br>
    
<section class="gallary">
      <div class="section__container gallary__container">
        <div class="image__gallary">
          <div class="gallary__col">
            <img src="assets/gambar.png" alt="gallary" />
          </div>
          <div class="gallary__col">
            <img src="assets/gambar.png" alt="gallary" />
            <img src="assets/gambar.png" alt="gallary" />
          </div>
        </div>
        <div class="gallary__content">
          <div>
            <h2 class="section__title">
              Sejarah Sekolah
            </h2>
            <p class="section__subtitle">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
            <a href="about.php">
            <button class="btn">Tentang Sekolah</button>
            </a>
          </div>
        </div>
      </div>
    </section>


<section class="quote">
        <div class="layar-dalam">
            <p>Pendidikan bukan cuma pergi ke sekolah dan mendapatkan gelar. Pendidikan adalah tentang memperluas wawasan dan menyerap ilmu kehidupan.</p>
        </div>
</section>


<style>
.gallary {
    padding: 50px 20px;
    background-color: #f8f9fa;
    text-align: center;
}

.section__container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    gap: 20px;
}

.gallary__container {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 2rem;
}

.image__gallary {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 1rem;
  transform: translateX(190px); /* Tetap untuk tampilan besar */
}

/* Ketika layar kecil (misalnya di bawah 768px), pastikan grid di tengah */
@media (max-width: 768px) {
  .image__gallary {
    transform: translateX(0); /* Hilangkan offset pada mobile */
    justify-content: center;
    grid-template-columns: repeat(1, 1fr); /* Agar hanya 1 kolom di layar kecil */
  }
}


.gallary__col {
  display: grid;
  place-content: center;
  gap: 1rem;
}

.gallary__col img {
  width: 100%;  /* Atur ukuran sesuai keinginan, misal 70% dari ukuran aslinya */
  height: auto; /* Menjaga aspek rasio gambar */
  border-radius: 1rem;
  box-shadow: 5px 5px 20px rgba(0, 0, 0, 0.2);
  display: block; /* Menghindari space tambahan */
  margin: auto; /* Agar gambar tetap berada di tengah */
  
}


.gallary__content {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  text-align: justify;
}

.gallary__content > div {
  max-width: 400px;
}

.gallary__content .section__subtitle {
  margin-bottom: 2rem;
}

@media (width < 600px) {

  .gallary__container {
    grid-template-columns: repeat(1, 1fr);
  }
}

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

section.quote {
    background: url("assets/alam.jpg") no-repeat;
    background-attachment: fixed;
    background-position: center;
    background-size: cover;
    text-align: center;
    color: #fff;
    font-size: 20px;
    font-style: italic;
    padding: 100px;
}


section.quote .layar-dalam p {
    display: inline;
    background: url("assets/quote-icon.png") no-repeat;
    padding: 40px;
}

.tim img {
    width: 100%;
    box-shadow: 0px -10px 30px #ccc;
    border-radius: 5px;
    display: flex;
    flex-direction: row;
    justify-content: space-around;
}

.support,
.tim {
    display: flex;
    flex-direction: row;
    justify-content: space-around;
}

.support h6,
.tim h6 {
    margin: 0px;
    margin-top: 20px;
    padding: 0px;
    font-size: 18px;
    font-weight: bold;
}

.support img {
    width: 50px;
}

.support div,
.tim div {
    text-align: center;
    width: 26%;
}
/* RESPONSIVE */
@media (max-width: 768px) {
    .section__container {
        flex-direction: column;
        text-align: center;
    }

    .gallary__content {
        text-align: center;
        max-width: 100%;
    }

    .image__gallary {
        flex-direction: column;
        align-items: center;
    }

    .gallary__col img {
        max-width: 90%;
    }
}
</style>

   

<?php
include_once 'config/koneksi.php';

// Query to fetch the 3 newest news entries from the "berita" table
$sql = "SELECT id, title, content, image, date, created_at FROM berita ORDER BY created_at DESC LIMIT 3";
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


<br>
        <section class="contact" id="contact">

            <h1 class="heading"> <span>Kontak</span> Kami </h1>
        
            <div class="icons-container">
                <div class="icons">
                    <i class="fas fa-phone"></i>
                    <h3>Hubungi Kami</h3>
                    <p>
                        Telepon Sekolah: 
                        <a href="tel:02122418329">02122418329</a>
                    </p>
                    <p>
                        PPDB Center: 
                        <a href="https://wa.me/6285939384646" target="_blank">085939384646</a>
                    </p>
                </div>
                <div class="icons">
                    <i class="fas fa-envelope"></i>
                    <h3>Email Kami</h3>
                    <p>
                        Email: 
                        <a href="mailto:mtsassaadah73@gmail.com">mtsassaadah73@gmail.com</a>
                    </p>
                </div>
            </div>

        
            <div class="row">
        
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1983.3801093195475!2d106.9656602691541!3d-6.162858903886176!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698a5725a4f7e9%3A0x610a86189f88cffd!2sMTS%20Assa&#39;adah%20Cakung!5e0!3m2!1sid!2sid!4v1685894989134!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

            </div>
        
        </section>

        <footer id="contact">
            <div class="layar-dalam">
                <div class="copyright">&copy; 2025 MTs Assa'adah</div>
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