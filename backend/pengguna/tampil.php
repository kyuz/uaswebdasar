<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengguna</title>
</head>
<body>
<div class="container mx-80">
        <div class="w-full h-12 p-2 bg-[#007A83] mb-4 rounded text-white font-jockey-one">
            <h1 class="text-xl">Data Pengguna</h1>
        </div>
    
    <div class="container mx-auto mt-4">
        <a href="javascript:void(0);" onclick="loadContent('../backend/pengguna/tambah.php')" class="p-2 rounded bg-[#007A83] text-white font-jockey-one">Tambah Pengguna</a>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-white uppercase bg-[#007A83] dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Alamat
                        </th>
                        <th scope="col" class="px-6 py-3">
                            No HP
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Role
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
                    $query = "SELECT * FROM Pengguna";
                    $result = mysqli_query($link, $query);
                    ?>
                    <?php while ($row = mysqli_fetch_object($result)) { ?>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?= $no++; ?>
                            </th>
                            <td class="px-6 py-4">
                                <?= $row->nama; ?>
                            </td>
                            <td class="px-6 py-4">
                                <?= $row->email; ?>
                            </td>
                            <td class="px-6 py-4">
                                <?= $row->alamat ?: '-'; ?>
                            </td>
                            <td class="px-6 py-4">
                                <?= $row->no_hp ?: '-'; ?>
                            </td>
                            <td class="px-6 py-4">
                                <?= $row->role; ?>
                            </td>
                            <td class="text-center px-4">
                                <a href="../backend/pengguna/proseshapus.php?id_pengguna=<?= $row->id_pengguna; ?>" class="font-medium text-red dark:text-blue-500 hover:underline" onclick="return confirm('Anda Yakin ?')"><i class="fa-solid fa-trash text-lg text-red-500"></i></a>
                                <a class="font-medium text-green dark:text-blue-500 hover:underline ml-2" href="javascript:void(0);" onclick="loadContent('../backend/pengguna/ubah.php?id_pengguna=<?= $row->id_pengguna; ?>')"><i class="fa-solid fa-file-pen text-lg text-green-700"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
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
