<?php
date_default_timezone_set("Asia/Jakarta");
include('config/koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = $_POST["token"] ?? '';
    $new_password = md5($_POST["password"]); // Menggunakan MD5

    // Cek apakah token valid
    $sql = "SELECT * FROM users WHERE reset_token = ? AND reset_expiry > NOW()";
    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, "s", $token);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        // Update password dengan MD5
        $sql_update = "UPDATE users SET password = ?, reset_token = NULL, reset_expiry = NULL WHERE id = ?";
        $stmt_update = mysqli_prepare($koneksi, $sql_update);
        mysqli_stmt_bind_param($stmt_update, "si", $new_password, $user['id']);
        mysqli_stmt_execute($stmt_update);

        echo "<script>
                alert('Password berhasil diubah! Anda akan diarahkan ke halaman login.');
                window.location.href = 'login.php';
              </script>";
        exit();
    } else {
        echo "<script>alert('Token tidak valid atau kadaluarsa.');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" crossorigin="anonymous"></script>
    <style>
.card {
    background: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(5px);
    border-radius: 10px;
}

.btn-primary:hover {
    background-color:rgb(42, 92, 145);
    transition: 0.3s;
}

body {
    background: url('assets/gambar2.jpg') no-repeat center center fixed;
    background-size: cover;
}


</style>

</head>
<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="container text-center">
        <div class="card p-4 shadow" style="max-width: 400px; margin: auto;">
        <img src="assets/assadah.png" alt="Logo Sekolah" class="img-fluid mb-3" style="max-width: 200px; margin: auto;">
        <h2 class="mb-3"><i class="fas fa-lock"></i> Reset Password</h2>
            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger"> <?= $_SESSION['error'] ?> </div>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>
            <form action="reset_password.php" method="POST">
                <input type="hidden" name="token" value="<?= htmlspecialchars($_GET['token'] ?? '') ?>">
                <div class="mb-3 position-relative">
                    <label class="form-label">Password Baru</label>
                    <div class="input-group">
                        <input type="password" class="form-control" name="password" id="password" required>
                        <span class="input-group-text" onclick="togglePassword()">
                            <i class="fas fa-eye" id="eyeIcon"></i>
                        </span>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Reset Password</button>
            </form>
        </div>
    </div>
    <script>
        function togglePassword() {
            var passwordInput = document.getElementById("password");
            var eyeIcon = document.getElementById("eyeIcon");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.classList.remove("fa-eye");
                eyeIcon.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                eyeIcon.classList.remove("fa-eye-slash");
                eyeIcon.classList.add("fa-eye");
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
