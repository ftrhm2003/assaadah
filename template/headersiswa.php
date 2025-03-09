<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="e-development.tech">

  <title>Student registration application</title>

 

  <!-- Custom fonts for this template-->
  <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <!-- Bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- css datepicker -->
  <link href="../assets/vendor/datepicker/css/bootstrap-datepicker.css" rel="stylesheet">

  <style>
    
/* Sidebar Styling */
.offcanvas {
    width: 60%; /* Lebih kecil di mobile */
    max-width: 300px; /* Maksimum 300px */
}

.offcanvas-body {
    display: flex;
    flex-direction: column;
    align-items: center; /* Biar kontennya di tengah */
    text-align: center;
}

/* Pusatkan Logo */
.sidebar-brand {
    display: flex;
    justify-content: center;
    margin-bottom: 20px;
}

/* Pastikan Tombol Close Berfungsi */
.offcanvas-header .btn-close {
    z-index: 1050; /* Pastikan di atas elemen lain */
    position: absolute;
    right: 15px;
    top: 10px;
}



  </style>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">



<!-- Sidebar -->
 
<div class="d-lg-flex">
  
<div class="offcanvas-lg offcanvas-top bg-gradient-primary sidebar sidebar-dark" id="sidebarMenu">
        <div class="offcanvas-header d-lg-none">
        </div>
        
        <div class="offcanvas-body">
            <ul class="navbar-nav">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
                    <img src="../assets/LOGO_MTS.png" alt="Logo MTS" class="logo-sidebar" style="max-height: 50px;">
                </a>

                <?php if(isset($_SESSION['level']) && $_SESSION['level'] == 'siswa') { ?>

                    <!-- Dashboard -->
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">
                            <i class="fas fa-fw fa-tachometer-alt"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <!-- Edit Profile -->
                    <li class="nav-item">
                        <a class="nav-link" href="editprofil.php">
                            <i class="fas fa-fw fa-user"></i>
                            <span>Edit Profile</span>
                        </a>
                    </li>

                    <!-- Lengkapi Data -->
                    <li class="nav-item">
                        <a class="nav-link" href="registrasi_inside.php">
                            <i class="fas fa-edit"></i>
                            <span>Lengkapi Data</span>
                        </a>
                    </li>

                    <!-- Lengkapi Berkas -->
                    <li class="nav-item">
                        <a class="nav-link" href="regist_berkas.php">
                            <i class="fas fa-upload"></i>
                            <span>Lengkapi Berkas</span>
                        </a>
                    </li>

                <?php } ?>

                <?php if(isset($_SESSION['level']) && $_SESSION['level'] == 'admin') { ?>

                    <!-- Dashboard -->
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">
                            <i class="fas fa-fw fa-tachometer-alt"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <!-- Data Pendaftaran -->
                    <li class="nav-item">
                        <a class="nav-link" href="regis_data.php">
                            <i class="fas fa-fw fa-list"></i>
                            <span>Data Pendaftaran</span>
                        </a>
                    </li>

                    <!-- Berkas Data -->
                    <li class="nav-item">
                        <a class="nav-link" href="berkas_data.php">
                            <i class="fas fa-fw fa-list"></i>
                            <span>Berkas Data</span>
                        </a>
                    </li>

                    <!-- Payment Data -->
                    <li class="nav-item">
                        <a class="nav-link" href="paymentdetail.php">
                            <i class="fas fa-fw fa-list"></i>
                            <span>Payment Data</span>
                        </a>
                    </li>

                    <!-- News Data -->
                    <li class="nav-item">
                        <a class="nav-link" href="newsdetail.php">
                            <i class="fas fa-fw fa-list"></i>
                            <span>News Data</span>
                        </a>
                    </li>

                    <!-- Agenda Data -->
                    <li class="nav-item">
                        <a class="nav-link" href="agenda.php">
                            <i class="fas fa-fw fa-list"></i>
                            <span>Agenda Data</span>
                        </a>
                    </li>

                <?php } ?>

                <!-- Logout -->
                <li class="nav-item">
                    <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                        <i class="fas fa-fw fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">


          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

          <!-- Sidebar Toggle Button (Muncul di Mobile) -->
<button class="btn btn-primary d-lg-none m-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu">
    <i class="fas fa-bars"></i> 
</button>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['nama']; ?></span>
                <?php
                if(isset($data_pendaftar['foto']) && $data_pendaftar['foto'] != '') {
                    $foto = '../uploads/' . $data_pendaftar['foto'];
                } else {
                    $foto = '../assets/img/avatar.jpg';
                }
                ?>
                <img class="img-profile rounded-circle" src="<?= $foto ?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <?php if($_SESSION['level'] == 'siswa') { ?>
                
                  <a class="dropdown-item" href="<?= $base_url ?>/siswa/editprofil.php">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Edit profile
                  </a>
                  <div class="dropdown-divider"></div>

                <?php } ?>
                
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->


