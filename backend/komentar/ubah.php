<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Komentar</title>
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
        <div class="w-full h-12 p-2 bg-[#007A83] mb-4 rounded text-white font-jockey-one">
            <h1 class="text-xl">Ubah Komentar</h1>
        </div>

        <?php
        include('../../services/setting.php');
        $id_komentar = $_GET['id_komentar'];
        $query = "SELECT * FROM Komentar WHERE id_komentar = $id_komentar";
        $result = mysqli_query($link, $query);
        $row = mysqli_fetch_object($result);
        ?>

        <form action="./komentar/prosesubah.php" method="POST" class="bg-white p-8 rounded shadow-md max-w-md mx-auto">
            <input type="hidden" name="id_komentar" value="<?= $row->id_komentar; ?>">

            <label for="isi_komentar" class="block text-sm font-medium text-gray-700 mb-2">Isi Komentar:</label>
            <textarea id="isi_komentar" name="isi_komentar" required class="w-full h-32 border border-gray-300 rounded px-3 mb-3"><?= $row->isi_komentar; ?></textarea>

            <input type="submit" value="Simpan" name="btnsimpan"
                class="w-full bg-[#007A83] text-white h-10 rounded hover:bg-[#005e66] mt-4 cursor-pointer">
        </form>
    </div>
</body>
</html>
