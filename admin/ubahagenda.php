<?php
include '../config/koneksi.php';

// Ambil data agenda berdasarkan ID
$id = $_GET['id'];
$query = "SELECT * FROM agenda WHERE id = $id";
$result = mysqli_query($koneksi, $query);
$agenda = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Agenda</title>
</head>
<body>
    <h1>Edit Agenda</h1>
    <form action="agenda_control.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $agenda['id']; ?>">
        
        <label for="title">Judul Agenda:</label><br>
        <input type="text" id="title" name="title" value="<?php echo $agenda['title']; ?>" required><br><br>

        <label for="date">Tanggal:</label><br>
        <input type="date" id="date" name="date" value="<?php echo $agenda['date']; ?>" required><br><br>

        <label for="description">Deskripsi:</label><br>
        <textarea id="description" name="description" rows="5" required><?php echo $agenda['description']; ?></textarea><br><br>

        <button type="submit" name="update">Update Agenda</button>
    </form>
    <a href="agenda.php">Kembali</a>
</body>
</html>
