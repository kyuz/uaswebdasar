<?php
if(isset($_GET['id_pengguna'])) {
    // Validate that the ID is numeric
    $id = filter_var($_GET['id_pengguna'], FILTER_VALIDATE_INT);

    if ($id === false || $id <= 0) {
        echo "ID tidak valid.";
        exit;
    }

    include('../../services/setting.php');

    // Periksa koneksi
    if (mysqli_connect_errno()) {
        die("Koneksi ke database gagal: " . mysqli_connect_error());
    }

    // Buat prepared statement untuk menghapus data
    // Buat prepared statement untuk menghapus data
$query = "DELETE FROM pengguna WHERE id_pengguna = ?";

$stmt = $link->prepare($query);

if ($stmt) {
    // Bind parameter ID
    $stmt->bind_param("i", $id);

    // Execute statement
    if ($stmt->execute()) {
        header("Location: ../dashboard.php");
    } else {
        echo "Error: Gagal menghapus data.";
    }

    // Tutup statement
    $stmt->close();
} else {
    echo "Error: " . $link->error;
}


    // Tutup koneksi database
    $link->close();
} else {
    echo "ID tidak valid.";
}
?>
