<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Pengguna</title>
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
            <h1 class="text-xl">Tambah Data Pengguna</h1>
        </div>

        <form action="./pengguna/prosestambah.php" method="POST" class="bg-white p-8 rounded shadow-md max-w-md mx-auto">
            <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">Nama:</label>
            <input type="text" id="nama" name="nama" required
                class="w-full h-10 border border-gray-300 rounded px-3 mb-3">

            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email:</label>
            <input type="email" id="email" name="email" required
                class="w-full h-10 border border-gray-300 rounded px-3 mb-3">

            <label for="alamat" class="block text-sm font-medium text-gray-700 mb-2">Alamat:</label>
            <input type="text" id="alamat" name="alamat"
                class="w-full h-10 border border-gray-300 rounded px-3 mb-3">

            <label for="no_hp" class="block text-sm font-medium text-gray-700 mb-2">No HP:</label>
            <input type="text" id="no_hp" name="no_hp"
                class="w-full h-10 border border-gray-300 rounded px-3 mb-3">

            <label for="role" class="block text-sm font-medium text-gray-700 mb-2">Role:</label>
            <select id="role" name="role" required
                class="w-full h-10 border border-gray-300 rounded px-3 mb-3">
                <option value="administrator">Administrator</option>
                <option value="user">User</option>
            </select>

            <input type="submit" value="Tambah" name="btnsimpan"
                class="w-full bg-[#007A83] text-white h-10 rounded hover:bg-[#005e66] mt-4 cursor-pointer">
        </form>
    </div>
</body>

</html>
