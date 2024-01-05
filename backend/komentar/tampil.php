<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Komentar</title>
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
            <h1 class="text-xl">Data Komentar</h1>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-white uppercase bg-[#007A83] dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Isi Komentar
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Pengguna
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tanggal Komentar
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Judul Berita
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
                    $query = "SELECT komentar.*, pengguna.nama AS nama_pengguna, berita.judul AS judul_berita FROM Komentar 
                            LEFT JOIN Pengguna ON komentar.id_pengguna_pengirim = pengguna.id_pengguna
                            LEFT JOIN Berita ON komentar.id_berita_terkait = berita.id_berita
                            ORDER BY komentar.tanggal_komentar DESC"; // Order by tanggal_komentar in descending order
                    $result = mysqli_query($link, $query);
                    while ($row = mysqli_fetch_object($result)) {
                        // Your comment display code here
                        ?>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?php echo $no++; ?>
                            </th>
                            <td class="px-6 py-4">
                                <?= $row->isi_komentar; ?>
                            </td>
                            <td class="px-6 py-4">
                                <?= $row->nama_pengguna; ?>
                            </td>
                            <td class="px-6 py-4">
                                <?= $row->tanggal_komentar; ?>
                            </td>
                            <td class="px-6 py-4">
                                <?= $row->judul_berita; ?>
                            </td>
                            <td class="px-6 py-4">
                                <a class="font-medium text-green dark:text-blue-500 hover:underline ml-2" href="javascript:void(0);" onclick="loadContent('../backend/komentar/ubah.php?id_komentar=<?= $row->id_komentar; ?>')"><i class="fa-solid fa-file-pen text-lg text-green-700"></i></a>
                                <a href="./komentar/proseshapus.php?id_komentar=<?= $row->id_komentar; ?>" class="font-medium text-red dark:text-blue-500 hover:underline" onclick="return confirm('Anda Yakin ?')"><i class="fa-solid fa-trash text-lg text-red-500"></i></a>
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
