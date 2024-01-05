<?php
include('../../services/setting.php');

if (isset($_GET['id_pengguna'])) {
    $id_pengguna = $_GET['id_pengguna'];

    $query = "SELECT * FROM Pengguna WHERE id_pengguna = $id_pengguna";
    $result = mysqli_query($link, $query);

    if ($result) {
        $pengguna = mysqli_fetch_object($result);
    } else {
        echo "Error: " . mysqli_error($link);
        exit();
    }
} else {
    echo "ID Pengguna tidak valid.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = mysqli_real_escape_string($link, $_POST['nama']);
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $alamat = mysqli_real_escape_string($link, $_POST['alamat']);
    $no_hp = mysqli_real_escape_string($link, $_POST['no_hp']);
    $role = mysqli_real_escape_string($link, $_POST['role']);

    $updateQuery = "UPDATE Pengguna 
                    SET nama = '$nama', email = '$email', alamat = '$alamat', no_hp = '$no_hp', role = '$role'
                    WHERE id_pengguna = $id_pengguna";

    $updateResult = mysqli_query($link, $updateQuery);

    if ($updateResult) {
        header("Location: ../dashboard.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($link);
        exit();
    }
}

?>
