<!-- pencarianberita.php -->
<?php
include('./services/setting.php');

$searchTerm = isset($_GET['q']) ? mysqli_real_escape_string($link, $_GET['q']) : '';

$searchQuery = "SELECT * FROM Berita WHERE judul LIKE '%$searchTerm%'";
$searchResult = mysqli_query($link, $searchQuery);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
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

  <div class="container mx-auto w-full h-20 border-2 mt-4 rounded-md border-[#007A83] flex">
    <form action="pencarianberita.php" method="get" class="flex">
      <button type="submit" class="h-[78px] w-72 bg-[#007A83] rounded-l">
        <h1 class="text-2xl text-white"><i class="fa-solid fa-magnifying-glass"></i>&nbsp;Cari Berita</h1>
      </button>
      <input type="text" name="q" class="w-full h-[76px] border-none text-2xl" placeholder="&nbsp;Cari Berita Olahraga anda disini !" value="<?= htmlentities($searchTerm); ?>">
    </form>
  </div>

  <div class="container mx-auto mt-8">
    <h1 class="text-2xl text-center font-jockey-one mt-6 text-[#007A83]">Hasil Pencarian</h1>

    <?php
    // Check if there are any results
    if (mysqli_num_rows($searchResult) > 0) {
      while ($row = mysqli_fetch_assoc($searchResult)) {
        echo '<div class="mt-4 border-2 border-gray-300 p-4 rounded-md">';
        echo '<h2 class="text-xl font-bold text-[#007A83]"><a href="detailberita.php?id=' . $row['id_berita'] . '">' . $row['judul'] . '</a></h2>';
        echo '</div>';
      }
    } else {
      // Display a message if no results are found
      echo '<p class="text-center text-[#007A83]">Tidak ada hasil yang ditemukan.</p>';
    }
    ?>
  </div>

  <?php
    include './komponen/footer.php'
  ?>
</body>
</html>
