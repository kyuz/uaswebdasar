<?php


if(isset($_GET['id_komentar'])) {
    $id_komentar = filter_var($_GET['id_komentar'], FILTER_VALIDATE_INT);

    if ($id_komentar === false || $id_komentar <= 0) {
        echo "ID komentar tidak valid.";
        exit();
    }

    include('../../services/setting.php');

    // Periksa koneksi
    if (mysqli_connect_errno()) {
        die("Koneksi ke database gagal: " . mysqli_connect_error());
    }

    $query = "DELETE FROM Komentar WHERE id_komentar = ?";

    $stmt = $link->prepare($query);

    if ($stmt) {
        $stmt->bind_param("i", $id_komentar);

        if ($stmt->execute()) {
            header("Location: ../dashboard.php");
            exit();
        } else {
            echo "Error: Gagal menghapus komentar.";
        }

        // Tutup statement
        $stmt->close();
    } else {
        echo "Error: " . $link->error;
    }

    // Tutup koneksi database
    $link->close();
} else {
    echo "ID komentar tidak valid.";
}
?>
