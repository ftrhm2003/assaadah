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

        echo "Password berhasil diubah! Silakan <a href='login.php'>login</a>.";
    } else {
        echo "Token tidak valid atau kadaluarsa.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
    <h2>Reset Password</h2>
    <form action="reset_password.php" method="POST">
        <input type="hidden" name="token" value="<?php echo htmlspecialchars($_GET['token'] ?? ''); ?>">
        <label>Password Baru:</label>
        <input type="password" name="password" required>
        <button type="submit">Reset Password</button>
    </form>
</body>
</html>
