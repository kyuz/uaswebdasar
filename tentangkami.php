<!-- tentangkami.php -->
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

  <div class="container mx-auto mt-8">
    <h1 class="text-2xl text-center font-jockey-one mt-6 text-[#007A83]">Tentang Kami</h1>

    <div class="mt-4 border-2 border-gray-300 p-4 rounded-md">
      <p class="text-gray-600">
        Selamat datang di halaman "Tentang Kami". Kami adalah portal berita olahraga yang berkomitmen untuk memberikan informasi terkini, mendalam, dan terpercaya seputar dunia olahraga.
      </p>
      <p class="text-gray-600">
        Dengan tim profesional yang berdedikasi, kami hadir untuk memenuhi kebutuhan Anda akan berita, analisis, dan konten berkualitas tinggi seputar berbagai cabang olahraga.
      </p>
      <p class="text-gray-600">
        Kami menggabungkan kecepatan dalam memberikan berita terbaru dengan kualitas konten yang memadai, agar pengalaman membaca Anda menjadi lebih bermakna dan mendalam.
      </p>
      <p class="text-gray-600">
        Terima kasih atas dukungan Anda. Kami senang menjadi bagian dari komunitas pencinta olahraga yang dinamis.
      </p>
    </div>
  </div>

  <?php
    include './komponen/footer.php'
  ?>
</body>
</html>
