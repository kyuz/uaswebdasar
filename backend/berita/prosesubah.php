<?php
session_start();

if (isset($_POST["btnsimpan"])) {
    require("../../services/setting.php");

    // Validate and sanitize user inputs
    $id_berita = $_POST["id_berita"];
    $inputjudul = mysqli_real_escape_string($link, htmlspecialchars($_POST["judul"]));
    $inputisi = mysqli_real_escape_string($link, htmlspecialchars($_POST["isi"]));
    $inputtanggal = mysqli_real_escape_string($link, htmlspecialchars($_POST["tanggal_publikasi"]));
    $id_pengguna_pembuat = $_SESSION['user_id'];

    // Check if a new image is provided
    $gambarPath = '';

    if (isset($_FILES["gambar"]) && $_FILES["gambar"]["error"] == 0) {
        // Handle the new image
        $gambarName = $_FILES["gambar"]["name"];
        $gambarTmpName = $_FILES["gambar"]["tmp_name"];
        $gambarPath = "../assets/" . $gambarName;

        if (!move_uploaded_file($gambarTmpName, $gambarPath)) {
            // Handle file upload failure
            echo "Gagal mengunggah gambar!";
            exit();
        }
    } else {
        // No new image provided, use the existing image path
        $gambarPath = $_POST["current_gambar"];
    }

    // Update the Berita
    $updateQuery = "UPDATE Berita 
                    SET judul = ?, isi = ?, tanggal_publikasi = ?, id_pengguna_pembuat = ?, gambar = ?
                    WHERE id_berita = ?";

    $updateStmt = mysqli_prepare($link, $updateQuery);

    if ($updateStmt) {
        mysqli_stmt_bind_param($updateStmt, "sssssi", $inputjudul, $inputisi, $inputtanggal, $id_pengguna_pembuat, $gambarPath, $id_berita);

        if (mysqli_stmt_execute($updateStmt)) {
            // Redirect to the dashboard upon successful update
            header("Location: ../dashboard.php");
            exit();
        } else {
            // Handle database update failure
            echo "Gagal mengubah data! Error: " . mysqli_stmt_error($updateStmt);
        }

        mysqli_stmt_close($updateStmt);
    } else {
        // Handle prepared statement failure
        echo "Prepared statement failed! Error: " . mysqli_error($link);
    }

    mysqli_close($link); // Close the database connection
} else {
    echo "Invalid request. Missing 'btnsimpan' parameter.";
}
?>
