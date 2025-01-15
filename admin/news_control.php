<?php
// news_control.php - Kontroler untuk operasi pada berita

function getAllNews($koneksi) {
    $sql = "SELECT id, title, content, image, date FROM berita";
    $result = $koneksi->query($sql);
    
    if (!$result) {
        die("Error saat mengambil data berita: " . $koneksi->error);
    }

    return $result;
}

function getNewsById($koneksi, $id) {
    $stmt = $koneksi->prepare("SELECT id, title, content, image, date FROM berita WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 0) {
        return null;
    }

    return $result->fetch_assoc();
}

function addNews($koneksi, $title, $content, $image, $date) {
    $stmt = $koneksi->prepare("INSERT INTO berita (title, content, image, date) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $title, $content, $image, $date);
    
    if (!$stmt->execute()) {
        die("Error saat menambahkan berita: " . $stmt->error);
    }

    return $stmt->insert_id;
}

function updateNews($koneksi, $id, $title, $content, $image, $date) {
    $stmt = $koneksi->prepare("UPDATE berita SET title = ?, content = ?, image = ?, date = ? WHERE id = ?");
    $stmt->bind_param("ssssi", $title, $content, $image, $date, $id);
    
    if (!$stmt->execute()) {
        die("Error saat memperbarui berita: " . $stmt->error);
    }

    return $stmt->affected_rows;
}

function deleteNews($koneksi, $id) {
    $stmt = $koneksi->prepare("DELETE FROM berita WHERE id = ?");
    $stmt->bind_param("i", $id);
    
    if (!$stmt->execute()) {
        die("Error saat menghapus berita: " . $stmt->error);
    }

    return $stmt->affected_rows;
}

?>
