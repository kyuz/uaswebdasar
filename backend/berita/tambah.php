<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Berita</title>
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
            <h1 class="text-xl">Tambah Berita</h1>
        </div>

        <form action="./berita/prosestambah.php" method="post" enctype="multipart/form-data">
            <label class="block mb-2 font-bold text-gray-700">Judul :</label>
            <input class="border border-gray-300 p-2 w-full" required type="text" name="judul"> <br>

            <label class="block mb-2 font-bold text-gray-700">Isi :</label>
            <textarea rows="10" class="border border-gray-300 p-2 w-full" required name="isi"></textarea> <br>

            <label class="block mb-2 font-bold text-gray-700">Tanggal Publikasi :</label>
            <input class="border border-gray-300 p-2" required type="date" name="tanggal_publikasi"> <br>

            <label class="block mb-2 font-bold text-gray-700">Gambar :</label>
            <input class="border border-gray-300 p-2" type="file" name="gambar"> <br>

            <input class="bg-[#007A83] text-white p-2 rounded cursor-pointer mt-4" type="submit" value="Simpan" name="btnsimpan">
            <a class="bg-yellow-500 text-white p-2 rounded cursor-pointer" href="dashboard.php">Batal</a>
        </form>
    </div>
</body>

</html>
