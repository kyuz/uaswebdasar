<?php
if (isset($_POST["register"])) {
    require("../services/setting.php");

    $inputnama = htmlspecialchars($_POST["nama"]);
    $inputemail = htmlspecialchars($_POST["email"]);
    $inputpassword = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $inputnohp = htmlspecialchars($_POST["no_hp"]);
    $inputalamat = htmlspecialchars($_POST["alamat"]); // Add this line
    $inputrole = "user"; // Add this line

    $query = "INSERT INTO Pengguna (nama, email, password, no_hp, alamat, role) VALUES ('$inputnama', '$inputemail', '$inputpassword', '$inputnohp', '$inputalamat', '$inputrole')";

    $result = mysqli_query($link, $query);

    if ($result) {
        header("location: ../index.php");
    } else {
        echo "Registrasi Gagal!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Pengguna</title>
    <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
  <style>
  @import url('https://fonts.googleapis.com/css2?family=Jockey+One&display=swap');

    .font-jockey-one {
    font-family: 'Jockey One', sans-serif;
    }

  </style>
</head>

<body class="bg-gray-100 h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded shadow-md w-96">
    <div class="w-full flex justify-end">
              <a class="text-[#007A83]" href="../index.php"><i class="fa-solid fa-rectangle-xmark text-xl"></i></a>
            </div>
        <h2 class="text-2xl font-bold mb-6">Registrasi</h2>
        <form action="" method="post">
            <div class="mb-4">
                <label for="nama" class="block text-gray-600 text-sm mb-2">Nama</label>
                <input type="text" id="nama" name="nama" class="w-full border px-4 py-2 rounded focus:outline-none focus:border-blue-400">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-600 text-sm mb-2">Email</label>
                <input type="email" id="email" name="email" class="w-full border px-4 py-2 rounded focus:outline-none focus:border-blue-400">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-600 text-sm mb-2">Password</label>
                <input type="password" id="password" name="password" class="w-full border px-4 py-2 rounded focus:outline-none focus:border-blue-400">
            </div>
            <div class="mb-4">
                <label for="alamat" class="block text-gray-600 text-sm mb-2">Alamat</label>
                <input type="text" id="alamat" name="alamat" class="w-full border px-4 py-2 rounded focus:outline-none focus:border-blue-400">
            </div>
            <div class="mb-4">
                <label for="no_hp" class="block text-gray-600 text-sm mb-2">No HP</label>
                <input type="text" id="no_hp" name="no_hp" class="w-full border px-4 py-2 rounded focus:outline-none focus:border-blue-400">
            </div>
            <div class="flex items-center gap-2">
                <button type="submit" name="register" class="bg-[#007A83] text-white px-4 py-2 rounded font-jockey-one">Register</button>
                <a href="login.php" class="text-gray-400 hover:text-[#007A83] font-jockey-one">Sudah punya akun? Login</a>
            </div>
        </form>
    </div>
</body>

</html>
