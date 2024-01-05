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
        .berita-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 20px;
        }

        .berita-card {
            flex: 0 0 calc(33.33% - 20px);
            max-width: calc(33.33% - 20px);
            background-color: #007A83;
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s ease-in-out;
        }

        .berita-card img {
            width: 100%;
            height: 200px; /* Sesuaikan tinggi gambar */
            object-fit: cover;
            border-radius: 10px 10px 0 0;
        }

        .berita-card:hover {
            transform: scale(1.05);
        }

        .berita-content {
            padding: 15px;
            color: #fff;
        }
    </style>
</head>
<body>
    <?php
        include './komponen/navbar.php';
    ?>
    <div class="container mx-auto">
        <div class="berita-container">
            <?php
                include('./services/setting.php');
                $query = "SELECT berita.*, pengguna.nama AS nama_pengguna FROM Berita 
                          LEFT JOIN Pengguna ON berita.id_pengguna_pembuat = pengguna.id_pengguna";
                $result = mysqli_query($link, $query);
                while ($row = mysqli_fetch_object($result)) {
            ?>
                <div data-aos="fade-right" data-aos-delay="500" class="berita-card shadow-lg">
                    <!-- Add a link to the detail page with the news ID -->
                    <a href="detailberita.php?id=<?= $row->id_berita; ?>">
                        <img src="backend/assets/<?= $row->gambar; ?>" alt="">
                        <div class="berita-content">
                            <h1 class="text-xl font-jockey-one"><?= $row->judul; ?></h1>
                            <p class="text-xs truncate "><?= $row->isi; ?></p>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>

    <?php
        include './komponen/footer.php';
    ?>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
