<?php
// Import kelas PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// Load PHPMailer dari folder libs/
require 'libs/PHPMailer.php';
require 'libs/SMTP.php';
require 'libs/Exception.php';


require 'vendor/autoload.php'; // Jika menggunakan Composer
// require 'libs/PHPMailer/PHPMailer.php'; // Jika tanpa Composer, sesuaikan path
date_default_timezone_set("Asia/Jakarta");
include('config/koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];

    // Cek apakah email terdaftar
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        // Buat token unik
        $token = bin2hex(random_bytes(50));
        $expiry = date("Y-m-d H:i:s", strtotime("+1 hour"));

        // Simpan token di database
        $sql_update = "UPDATE users SET reset_token = ?, reset_expiry = ? WHERE username = ?";
        $stmt_update = mysqli_prepare($koneksi, $sql_update);
        mysqli_stmt_bind_param($stmt_update, "sss", $token, $expiry, $email);
        mysqli_stmt_execute($stmt_update);

        // Buat link reset password
        $resetLink = "http://localhost/assaadah/reset_password.php?token=$token";

        // Konfigurasi PHPMailer
        $mail = new PHPMailer(true); // true untuk mengaktifkan mode Exception


        try {
            // Konfigurasi SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'assaadah.shafa@gmail.com'; // Ganti dengan email Anda
            $mail->Password = 'zpvo iynx ijvo yovj'; // Gunakan App Password, BUKAN password Gmail
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Gunakan TLS
            $mail->Port = 587;

            // Pengirim & Penerima
            $mail->setFrom('assaadah.shafa@gmail.com', 'Admin');
            $mail->addAddress($email);

            // Konten Email
            $mail->isHTML(true);
            $mail->Subject = 'Reset Password Anda';
            $mail->Body = "Klik link berikut untuk mereset password Anda: <a href='$resetLink'>$resetLink</a>";

            // Kirim email
            if ($mail->send()) {
                echo "Email reset password telah dikirim ke $email.";
            } else {
                echo "Gagal mengirim email.";
            }
        } catch (Exception $e) {
            echo "Gagal mengirim email. Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Email tidak ditemukan.";
    }
}
?>
