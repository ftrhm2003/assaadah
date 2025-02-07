<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My school</title>
    <link rel="stylesheet" href="index.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <style>
        .about {
    background: linear-gradient(to bottom right,rgb(255, 255, 255),rgb(255, 255, 255));
    padding: 50px 20px;
    font-family: 'Arial', sans-serif;
}

.title span {
    color: #0066cc;
    font-weight: bold;
}

.description {
    font-size: 1.1rem;
    line-height: 1.8;
    margin-bottom: 30px;
}

.features {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.feature {
    background: #cfd1da;
    border-radius: 30px;
    box-shadow: 1 40px 40px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    flex: 1;
    min-width: 300px;
}

.feature-img {
    display: block; /* Ensures there is no inline space around the image */
    margin: 0; /* Removes any default margin */
    width: 100%;
    height: 200px;
    object-fit: cover;
}


.feature-content {
    padding: 20px;
}

.feature h3 {
    margin-bottom: 15px;
    color: #333;
}

.feature ul {
    list-style: none;
    padding: 0;
}

.feature ul li {
    margin-bottom: 10px;
    padding-left: 20px;
    position: relative;
}

.feature ul li::before {
    content: "•";
    color: #0066cc;
    position: absolute;
    left: 0;
    top: 0;
}

.video-section {
    text-align: center;
    margin: 40px 0;
}

.video-container {
    max-width: 1020px;
    margin: 0 auto;
    position: relative;
    border-radius: 90px;
    overflow: hidden;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}

.about-video {
    width: 100%;
    height: auto;
    display: block;
}

@media (max-width: 768px) {
    .about-video {
        height: auto;
    }
}

.row {
    margin: 0;
    padding: 0;
    overflow: hidden; /* Prevents container overflow */
}


    </style>

</head>
<body>
    <section id="topbar" class="mb-2 mb-lg-0 mb-sm-0 d-none d-lg-flex align-items-center pt-2 pb-2 bg-primary text-white topbar-transparent">
        <div class="container">
          <div class="row">
            <div class="col-lg-6   text-start">
             <span class="px-3"><i class="bi bi-phone "></i> +1 5589 55488 55 </span>
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
                <img src="assets/assadah.png" alt="Logo Website">
            </div>
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

    <section class="about" id="about">
        <div class="container">
            <div class="row">
                <div class="content">
                    <h3 class="title">Apa itu <span>MTs Assa'adah?</span></h3>
                    <p class="description">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

                    </p>
                </div>
            </div>
        
           <!-- The four columns -->
<div class="row">
  <div class="column">
    <img src="assets/raort.jpg" alt="Nature" style="width:100%" onclick="myFunction(this);">
  </div>
  <div class="column">
    <img src="assets/raort.jpg" alt="Nature" style="width:100%" onclick="myFunction(this);">
  </div>
  <div class="column">
    <img src="assets/raort.jpg" alt="Nature" style="width:100%" onclick="myFunction(this);">
  </div>
  <div class="column">
    <img src="assets/raort.jpg" alt="Nature" style="width:100%" onclick="myFunction(this);">
  </div>
  <div class="column">
    <img src="assets/raort.jpg" alt="Nature" style="width:100%" onclick="myFunction(this);">
  </div>
  
  
</div>

<!-- VISI dan MISI Sections -->
<div class="row features">
    <div class="feature">
        <div class="feature-content">
            <h3><i class='bx bxs-right-top-arrow-circle'></i> VISI</h3>
            <ul>
                <li>Keunggulan dalam pelaksanaan kurikulum.</li>
                <li>Keunggulan dalam prestasi akademik.</li>
                <li>Prestasi di bidang non-akademik.</li>
                <li>Kepemimpinan dalam kegiatan OSIS.</li>
                <li>Komitmen terhadap praktik keagamaan.</li>
                <li>Apresiasi terhadap seni budaya dan kepedulian lingkungan.</li>
            </ul>
        </div>
    </div>
    
    <div class="feature">
        <div class="feature-content">
            <h3><i class='bx bx-analyse'></i> MISI</h3>
            <ul>
                <li>Melaksanakan kegiatan kurikulum secara efektif dan optimal.</li>
                <li>Memberikan pengalaman belajar yang inovatif dan menarik.</li>
                <li>Membentuk kelompok ilmiah ("Bisma Science Club").</li>
                <li>Mengembangkan Kelompok Informasi Komunikasi & Teknologi.</li>
                <li>Mendirikan Klub Percakapan Bahasa Inggris (ECC).</li>
                <li>Membuat kelas kompetisi pada tingkat paralel.</li>
            </ul>
        </div>
    </div>
</div>

    </section>

            



          
<style>
* {
  box-sizing: border-box;
}


/* The grid: Four equal columns that floats next to each other */
.column {
  float: left;
  width: 25%;
  padding: 10px;
}

/* Style the images inside the grid */


/* Mengatur tata letak row agar gambar dan teks tertata dengan baik */
.row {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
 
}


.column img {
     
    width: 100%;
    opacity: 0.8;
    cursor: pointer;
    transition: 0.3s;
    border-radius: 20px !important;
    display: block;


}

.column img:hover {
    opacity: 1;
}

/* Mengatur tata letak visi & misi */
.features {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
    margin-top: 30px;
}

.feature {
    flex: 1;
    max-width: 45%;
    background: #cfd1da;
    border-radius: 20px;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

</style>



    <footer id="contact">
        <div class="layar-dalam">
            <div class="copyright">&copy; 2020 My school</div>
        </div>
    </footer>
</body>
</html>