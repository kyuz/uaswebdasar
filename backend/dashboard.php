<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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

<body class="font-sans bg-gray-100">
    <!-- Sidebar -->
    <div class="flex flex-col fixed h-screen w-1/6 bg-[#007A83] font-jockey-one text-lg text-white p-4">
        <a href="javascript:void(0);" onclick="loadContent('berita/tampil.php')" class="py-2 px-4 rounded hover:bg-[#02abb8]">Berita</a>
        <a href="javascript:void(0);" onclick="loadContent('komentar/tampil.php')" class="py-2 px-4 rounded hover:bg-[#02abb8]">Komentar</a>
        <a href="javascript:void(0);" onclick="loadContent('pengguna/tampil.php')" class="py-2 px-4 rounded hover:bg-[#02abb8]">Pengguna</a>
    </div>

    <!-- Content -->
    <div class="ml-1/6" id="dynamic-content">

    </div>

    <!-- Logout Link -->
    <div class="fixed bottom-0 mb-4">
        <p class="text-white font-jockey-one ml-6"><a onclick="return confirm('Anda Yakin ?')" href="../auth/logout.php"><i class="fa-solid fa-right-from-bracket"></i>&nbsp;Logout</a></p>
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
