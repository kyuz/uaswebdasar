<?php
// navbar.php

// Pastikan sesi dimulai pada setiap halaman yang membutuhkan akses ke variabel sesi
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<div class="w-full h-14 bg-[#007A83]">
    <div class="container mx-auto flex justify-between p-3 text-white">
        <a class="font-jockey-one font-bold text-2xl" href="">ARENA SPORT</a>
        <nav>
            <ul class="flex gap-4 font-bold mt-1">
                <li><a href="./index.php">Beranda</a></li>
                <li><a href="berita.php">Berita</a></li>
                <li><a href="tentangkami.php">Tentang Kami</a></li>
                <?php
                // Check if the user is logged in
                if (isset($_SESSION['user_name'])) {
                    // If logged in, display the user's name
                    echo '<li>Hai,<a onclick="return confirm(\'Anda Yakin ?\')" href="./auth/logout.php">'.$_SESSION['user_name'] . '</a>&nbsp;<i class="fa-solid fa-right-from-bracket"></i></li>';
                } else {
                    // If not logged in, display the login link
                    echo '<li><a href="./auth/login.php">Login&nbsp;<i class="fa-solid fa-user"></i></a></li>';
                }
                ?>
            </ul>
        </nav>
    </div>
</div>
