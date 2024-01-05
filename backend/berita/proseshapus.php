<?php
session_start(); // Start the session if not already started

if (isset($_GET["id_berita"])) {
    $id_berita = $_GET["id_berita"];

    require("../../services/setting.php");

    // Ensure that the user has the necessary permissions to delete the record
    $id_pengguna_pembuat = $_SESSION['user_id'];

    $checkPermissionQuery = "SELECT 1 FROM Berita WHERE id_berita = ? AND id_pengguna_pembuat = ?";
    $checkPermissionStmt = mysqli_prepare($link, $checkPermissionQuery);

    if ($checkPermissionStmt) {
        mysqli_stmt_bind_param($checkPermissionStmt, "ii", $id_berita, $id_pengguna_pembuat);
        mysqli_stmt_execute($checkPermissionStmt);
        mysqli_stmt_store_result($checkPermissionStmt);

        if (mysqli_stmt_num_rows($checkPermissionStmt) == 1) {
            // Delete the record
            $deleteQuery = "DELETE FROM Berita WHERE id_berita = ?";
            $deleteStmt = mysqli_prepare($link, $deleteQuery);

            if ($deleteStmt) {
                mysqli_stmt_bind_param($deleteStmt, "i", $id_berita);
                mysqli_stmt_execute($deleteStmt);

                header("Location: ../dashboard.php");
                exit();
            } else {
                echo "Gagal menghapus data! Error: " . mysqli_error($link);
            }

            mysqli_stmt_close($deleteStmt);
        } else {
            echo "Anda tidak memiliki izin untuk menghapus data ini.";
        }

        mysqli_stmt_close($checkPermissionStmt);
    } else {
        echo "Prepared statement failed! Error: " . mysqli_error($link);
    }

    mysqli_close($link); // Close the database connection
} else {
    echo "Invalid request. Missing 'id_berita' parameter.";
}
?>
