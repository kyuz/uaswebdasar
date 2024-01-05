<?php
// Include the database connection file
include('./services/setting.php');

// Initialize the search term
$searchTerm = isset($_GET['q']) ? mysqli_real_escape_string($link, $_GET['q']) : '';

// Fetch news articles based on the search term
$searchQuery = "SELECT * FROM Berita WHERE judul LIKE '%$searchTerm%'";
$searchResult = mysqli_query($link, $searchQuery);

?>
<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
<body>


<?php
  include './komponen/navbar.php'
?>

<div class="container mx-auto px-20 mt-8">
    <div class="flex justify-between">
    <div class="font-bold justify-items-center text-center mt-56 animate__animated animate__fadeInUp">
        <h1 class="text-[36px]">"Temukan Berita di Setiap Aktivitasmu”</h1>
        <h1 class="text-[20px]">Baca Berita , Tenangkan Harimu</h1>
    </div>
    <img class="animate__animated animate__backInRight" src="https://i.ibb.co/XSxBWMG/Desain-tanpa-judul-removebg-preview-1.png" alt="Desain-tanpa-judul-removebg-preview-1" border="0">
  </div>
  </div>

  <div class="container mx-auto w-full h-20 border-2 mt-4 rounded-md border-[#007A83]">
    <form action="pencarianberita.php" method="get" class="flex">
        <button type="submit" class="h-[78px] w-72 bg-[#007A83] rounded-l ">
            <h1 class="text-2xl text-white"><i class="fa-solid fa-magnifying-glass"></i>&nbsp;Cari Berita</h1>
        </button>
        <input class="w-full h-[76px] border-none text-2xl p-2" type="text" name="q" placeholder="&nbsp;Cari Berita Olahraga anda disini !">
    </form>
</div>


  <h1 class="text-2xl text-center font-jockey-one mt-6 text-[#007A83]">Berita Terpopuler</h1>

<div class="justify-between flex container mx-auto mt-8">

    <?php
    // Include the database connection file
    include('./services/setting.php');

    // Fetch the 3 most popular news articles based on the number of comments
    $popularNewsQuery = "
        SELECT b.id_berita, b.judul, b.isi, b.gambar, COUNT(k.id_komentar) AS jumlah_komentar
        FROM Berita b
        LEFT JOIN Komentar k ON b.id_berita = k.id_berita_terkait
        GROUP BY b.id_berita
        ORDER BY jumlah_komentar DESC
        LIMIT 3
    ";
    $popularNewsResult = mysqli_query($link, $popularNewsQuery);

    while ($news = mysqli_fetch_object($popularNewsResult)) {
        ?>
        <a href="detailberita.php?id=<?= $news->id_berita; ?>">
        <div data-aos="zoom-in" data-aos-delay="500" class="w-[490px] h-96 rounded bg-[#007A83]">
            <img class="w-[490px] h-72 rounded-t" src="backend/assets/<?= $news->gambar; ?>" alt="">
            <div class="w-[490px] h-24 p-2 bg-white border-[#007A83] rounded border-2">
                <h1 class="text-xl font-jockey-one"><?= $news->judul; ?></h1>
                <p class="text-xs font-jockey-one mt-1 text-gray-500 truncate"><?= $news->isi; ?></p>
            </div>
        </div>
        </a>
    <?php
    }
    ?>
</div>



  <h1 class="text-2xl text-center font-jockey-one mt-8 text-[#007A83]">Berita Terkini</h1>

<div class="justify-between flex container mx-auto mt-8">

    <?php
    // Include the database connection file
    include('./services/setting.php');

    // Fetch the two latest news articles from the database
    $latestNewsQuery = "SELECT * FROM Berita ORDER BY tanggal_publikasi DESC LIMIT 2";
    $latestNewsResult = mysqli_query($link, $latestNewsQuery);

    while ($news = mysqli_fetch_object($latestNewsResult)) {
        ?>
        <a href="detailberita.php?id=<?= $news->id_berita; ?>">
        <div data-aos="fade-right" data-aos-delay="500" class="w-[690px] h-96 rounded bg-[#007A83]">
            <img class="w-[690px] h-72 rounded-t" src="backend/assets/<?= $news->gambar; ?>" alt="">
            <div class="w-[690px] h-24 p-2 bg-white border-[#007A83] rounded border-2">
                <h1 class="text-xl font-jockey-one"><?= $news->judul; ?></h1>
                <p class="text-xs truncate"><?= $news->isi; ?></p>
            </div>
        </div>
      </a>
    <?php
    }
    ?>
</div>



  <?php
  include './komponen/footer.php'
  ?>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>
</html>