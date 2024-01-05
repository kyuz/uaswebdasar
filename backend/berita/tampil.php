<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Berita</title>
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
            <h1 class="text-xl">Data Berita</h1>
        </div>
    
    <div class="container mx-auto mt-4">
        <a href="javascript:void(0);" onclick="loadContent('../backend/berita/tambah.php')" class="p-2 rounded bg-[#007A83] text-white font-jockey-one">Tambah Berita</a>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-white uppercase bg-[#007A83] dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Judul
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Isi
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tanggal Publikasi
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Gambar
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Pembuat
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include('../../services/setting.php');
                        $no = 1;
                        $query = "SELECT berita.*, pengguna.nama AS nama_pengguna FROM Berita 
                                  LEFT JOIN Pengguna ON berita.id_pengguna_pembuat = pengguna.id_pengguna";
                        $result = mysqli_query($link, $query);
                        while ($row = mysqli_fetch_object($result)) {
                    ?>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <?php echo $no++; ?>
                        </th>
                        <td class="px-6 py-4">
                            <?= $row->judul; ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row->isi; ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row->tanggal_publikasi; ?>
                        </td>
                        <td class="px-6 py-4">
                            <?php 
                                if (!empty($row->gambar)) {
                                    echo '<img src="../backend/assets/'. $row->gambar . '" alt="Gambar Berita" class="w-20 h-12">';
                                } else {
                                    echo 'Tidak ada gambar';
                                }
                            ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row->nama_pengguna; ?>
                        </td>
                        <td class="text-center px-4">
                            <a href="../backend/berita/proseshapus.php?id_berita=<?= $row->id_berita; ?>" class="font-medium text-red dark:text-blue-500 hover:underline" onclick="return confirm('Anda Yakin ?')"><i class="fa-solid fa-trash text-lg text-red-500"></i></a>
                            <a class="font-medium text-green dark:text-blue-500 hover:underline ml-2" href="javascript:void(0);" onclick="loadContent('../backend/berita/ubah.php?id_berita=<?= $row->id_berita; ?>')"><i class="fa-solid fa-file-pen text-lg text-green-700"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function loadContent(page) {
            fetch(page)
                .then(response => response.text())
                .then(data => {
                    document.getElementById('dynamic-content').innerHTML = data;
                });
        }

        // Panggil fungsi saat halaman dimuat untuk menampilkan halaman berita secara default
        document.addEventListener("DOMContentLoaded", function() {
            loadContent('berita/tampil.php');
        });
    </script>

</body>
</html>
