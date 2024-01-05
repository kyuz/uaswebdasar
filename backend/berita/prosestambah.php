<?php
session_start(); // Start the session if not already started

if (isset($_POST["btnsimpan"])) {
    require("../../services/setting.php");

    // Validate and sanitize user inputs
    $inputjudul = mysqli_real_escape_string($link, htmlspecialchars($_POST["judul"]));
    $inputisi = mysqli_real_escape_string($link, htmlspecialchars($_POST["isi"]));
    $inputtanggal = mysqli_real_escape_string($link, htmlspecialchars($_POST["tanggal_publikasi"]));
    $gambarPath = '';

    $id_pengguna_pembuat = $_SESSION['user_id'];

    if (isset($_FILES["gambar"]) && $_FILES["gambar"]["error"] == 0) {
        $gambarName = $_FILES["gambar"]["name"];
        $gambarTmpName = $_FILES["gambar"]["tmp_name"];
        $gambarPath = "../assets/" . $gambarName;
        move_uploaded_file($gambarTmpName, $gambarPath);
    }

    // Use prepared statement to prevent SQL injection
    $query = "INSERT INTO Berita (judul, isi, tanggal_publikasi, id_pengguna_pembuat, gambar) 
              VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($link, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssss", $inputjudul, $inputisi, $inputtanggal, $id_pengguna_pembuat, $gambarPath);

        if (mysqli_stmt_execute($stmt)) {
            header("Location: ../dashboard.php");
            exit();
        } else {
            echo "Data Gagal disimpan! Error: " . mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Prepared statement failed! Error: " . mysqli_error($link);
    }

    mysqli_close($link); // Close the database connection
}
?>
