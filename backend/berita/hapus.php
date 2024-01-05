<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['id_pengguna'])) {
    // Redirect to the login page if not logged in
    header("Location: ../auth/login.php");
    exit();
}

if ($_SESSION['role'] !== 'administrator') {
    // Redirect to an unauthorized page or show an error
    echo "You are not authorized to access this page.";
    exit();
}

// Retrieve user information from the session
$nama = $_SESSION['nama'];
?>