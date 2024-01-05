<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <div class="w-full h-screen bg-[#EFFDFE]">
        <div class="container mx-auto flex justify-center">
            <div class="w-[400px] h-[500px] bg-[#007A83] rounded-l mt-40 shadow-md">
                <img class="mt-8" src="https://i.ibb.co/XSxBWMG/Desain-tanpa-judul-removebg-preview-1.png" alt="">
            </div>
            <div class="w-[400px] h-[500px] bg-white rounded-r mt-40 px-5 shadow-md">
                <div class="w-full flex justify-end">
                    <a class="text-[#007A83]" href="../index.php"><i class="fa-solid fa-rectangle-xmark text-xl mt-2"></i></a>
                </div>
                <h1 class="text-center mt-24 text-2xl text-[#007A83] font-jockey-one ">ARENA SPORT</h1>

                <?php
                require('../services/setting.php');

                if (isset($_POST["btnLogin"])) {
                    $inputemail = htmlspecialchars($_POST["txtemail"]);
                    $inputpassword = $_POST["txtpassword"];
                
                    $query = "SELECT * FROM pengguna WHERE email='$inputemail'";
                    $result = mysqli_query($link, $query);
                
                    if ($result && mysqli_num_rows($result) == 1) {
                        $dataUser = mysqli_fetch_object($result);
                
                        if (password_verify($inputpassword, $dataUser->password)) {
                            session_start();
                            $_SESSION['user_id'] = $dataUser->id_pengguna;
                            $_SESSION['user_name'] = $dataUser->nama;
                
                            if ($dataUser->role == 'administrator') {
                                header("Location: ../backend/dashboard.php");
                                exit();
                            } else {
                                header("Location: ../index.php");
                                exit();
                            }
                        } else {
                            echo '<div class="alert alert-danger">Gagal Login, Silahkan periksa email / password anda.</div>';
                        }
                    } else {
                        echo '<div class="alert alert-danger">Gagal Login, Silahkan periksa email / password anda.</div>';
                    }
                }                
                ?>


                <form action="" method="post">
                    <div class="w-full h-8 mt-4 rounded border border-[#007A83] border-2">
                        <input class="w-full h-7 border-none text-lg font-jockey-one p-2" type="text" name="txtemail" placeholder="Masukkan Email Anda...">
                    </div>
                    <div class="w-full h-8 mt-4 rounded border border-[#007A83] border-2">
                        <input class="w-full h-7 border-none text-lg font-jockey-one p-2" type="password" name="txtpassword" placeholder="Masukkan Password Anda...">
                    </div>
                    <div class="w-full flex justify-center gap-2">
                        <a href="register.php" class="text-gray-400 hover:text-[#007A83] font-jockey-one mt-5">Belum punya akun? Register disini!</a>
                        <input type="submit" name="btnLogin" value="Login" class="w-20 h-9 rounded text-white bg-[#007A83] mt-4">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>

