<?php
session_start(); // Start the session if not already started

if (isset($_POST["btnsimpan"])) {
    require("../../services/setting.php");

    // Validate and sanitize user inputs
    $nama = mysqli_real_escape_string($link, htmlspecialchars($_POST["nama"]));
    $email = mysqli_real_escape_string($link, htmlspecialchars($_POST["email"]));
    $alamat = mysqli_real_escape_string($link, htmlspecialchars($_POST["alamat"]));
    $no_hp = mysqli_real_escape_string($link, htmlspecialchars($_POST["no_hp"]));
    $role = mysqli_real_escape_string($link, $_POST["role"]);

    // Perform the insertion
    $insertQuery = "INSERT INTO Pengguna (nama, email, alamat, no_hp, role) 
                    VALUES ('$nama', '$email', '$alamat', '$no_hp', '$role')";

    $insertResult = mysqli_query($link, $insertQuery);

    if ($insertResult) {
        header("Location: ../dashboard.php");
        exit();
    } else {
        echo "Gagal menambahkan data! Error: " . mysqli_error($link);
    }

    mysqli_close($link); // Close the database connection
} else {
    echo "Invalid request. Missing 'btnsimpan' parameter.";
}
?>
