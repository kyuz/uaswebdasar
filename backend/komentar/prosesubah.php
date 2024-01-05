<?php
session_start(); // Start the session if not already started

if (isset($_POST["btnsimpan"])) {
    require("../../services/setting.php");

    // Validate and sanitize user inputs
    $id_komentar = $_POST["id_komentar"];
    $isi_komentar = mysqli_real_escape_string($link, htmlspecialchars($_POST["isi_komentar"]));

    // Update the Komentar
    $updateQuery = "UPDATE Komentar 
                    SET isi_komentar = ?
                    WHERE id_komentar = ?";

    $updateStmt = mysqli_prepare($link, $updateQuery);

    if ($updateStmt) {
        mysqli_stmt_bind_param($updateStmt, "si", $isi_komentar, $id_komentar);

        if (mysqli_stmt_execute($updateStmt)) {
            header("Location: ../dashboard.php");
            exit();
        } else {
            echo "Gagal mengubah data! Error: " . mysqli_stmt_error($updateStmt);
        }

        mysqli_stmt_close($updateStmt);
    } else {
        echo "Prepared statement failed! Error: " . mysqli_error($link);
    }

    mysqli_close($link); // Close the database connection
} else {
    echo "Invalid request. Missing 'btnsimpan' parameter.";
}
?>
