<?php
// Include setting.php for database connection and other configurations
require("../../services/setting.php");

// Check if 'id_berita' is set in the URL
if (isset($_GET["id_berita"])) {
    $id_berita = $_GET["id_berita"];

    // Fetch data for the specified id_berita
    $query = "SELECT * FROM Berita WHERE id_berita = ?";
    $stmt = mysqli_prepare($link, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id_berita);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result && mysqli_num_rows($result) == 1) {
            // Fetch the data
            $row = mysqli_fetch_object($result);
        } else {
            // Handle the case when the specified id_berita is not found
            echo "Berita tidak ditemukan.";
            exit();
        }

        mysqli_stmt_close($stmt);
    } else {
        // Handle the case when prepared statement fails
        echo "Prepared statement failed! Error: " . mysqli_error($link);
        exit();
    }
} else {
    // Handle the case when 'id_berita' is not set in the URL
    echo "Invalid request. Missing 'id_berita' parameter.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Berita</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Jockey+One&display=swap');

        .font-jockey-one {
            font-family: 'Jockey One', sans-serif;
        }
    </style>
</head>

<body>
    <div class="container mx-80">
        <div class="w-full h-12 bg-[#007A83] p-2 text-white font-jockey-one rounded mb-4">
            <div class="flex justify-between">
                <h2 class="text-xl">Ubah Berita</h2>
            </div>
        </div>

        <form action="./berita/prosesubah.php" method="post" enctype="multipart/form-data">
            <!-- Existing form fields -->
            <label class="block text-sm font-medium text-gray-700">Judul :</label>
            <input class="form-input w-full h-8 p-2" required type="text" name="judul" value="<?= htmlspecialchars($row->judul); ?>"> <br>

            <label class="block text-sm font-medium text-gray-700">Isi :</label>
            <textarea class="form-input w-full p-2" rows="10" required name="isi"><?= htmlspecialchars($row->isi); ?></textarea> <br>

            <label class="block text-sm font-medium text-gray-700">Tanggal Publikasi :</label>
            <input class="form-input" required type="date" name="tanggal_publikasi" value="<?= $row->tanggal_publikasi; ?>"> <br>

            <!-- Hidden input for id_berita -->
            <input type="hidden" name="id_berita" value="<?= $row->id_berita; ?>">

            <!-- Display current image -->
            <label class="block text-sm font-medium text-gray-700">Gambar:</label>
            <?php if (!empty($row->gambar)) : ?>
                <img width="550px" heigth="350px" src="../backend/assets/<?= $row->gambar; ?>" alt="Current Image" class="mb-4">
            <?php endif; ?>

            <!-- Input for selecting a new image -->
            <label class="block text-sm font-medium text-gray-700">Pilih Gambar Baru:</label>
            <input type="file" name="gambar" accept="image/*">
            <br>

            <!-- Hidden input for storing the current image path -->
            <input type="hidden" name="current_gambar" value="<?= $row->gambar; ?>">


            <!-- Submit and cancel buttons -->
            <input class="bg-[#007A83] w-20 h-9 mt-2 text-white font-bold rounded" type="submit" value="Simpan" name="btnsimpan">
            <a class="bg-[#007A83] text-white font-bold py-2 px-4 rounded" href="dashboard.php">Batal</a>
        </form>
    </div>
</body>

</html>
