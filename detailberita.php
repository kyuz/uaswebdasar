<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include('./services/setting.php');

if (isset($_GET['id'])) {
    $newsId = $_GET['id'];

    $query = "SELECT berita.*, pengguna.nama AS nama_pengguna FROM Berita 
              LEFT JOIN Pengguna ON berita.id_pengguna_pembuat = pengguna.id_pengguna
              WHERE berita.id_berita = $newsId";
    $result = mysqli_query($link, $query);

    if ($result) {
        $row = mysqli_fetch_object($result);
        $isLoggedIn = isset($_SESSION['id_pengguna']);
?>

<!DOCTYPE html>
<html lang="en">

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
    <?php include './komponen/navbar.php'; ?>

    <div class="container mx-auto">
        <?php
        if (isset($row)) {
        ?>
            <div class="berita-detail mt-4">
                <img class="w-full h-[650px] rounded" src="backend/assets/<?= $row->gambar; ?>" alt="<?= isset($row->judul) ? $row->judul : 'Image Alt Text'; ?>">
                <div class="berita-content">
                    <h1 class="text-xl font-jockey-one"><?= $row->judul; ?></h1>
                    <p class="text-xs"><?= $row->isi; ?></p>
                    <p class="text-sm mt-2">Diposting oleh : <?= $row->nama_pengguna; ?></p>
                </div>
            </div>

            <div class="mt-4">
                <h2 class="text-lg font-medium mb-2">Komentar :</h2>
                <?php
                if (isset($isLoggedIn)) {
                ?>
                    <form method="post" action="submit_comment.php">
                        <textarea name="comment" id="message" rows="5" class="block p-2.5 w-96 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tinggalkan komentar anda disini.."></textarea>
                        <input type="hidden" name="news_id" value="<?= $newsId; ?>">
                        <button type="submit" class="mt-2 px-4 py-2 bg-[#007A83] text-white rounded-md">Submit</button>
                    </form>
                <?php
                } else {
                    echo '<p>Anda harus <a href="./auth/login.php">login</a> untuk memberikan komentar.</p>';
                }

                ?>
                <?php
                $commentQuery = "SELECT komentar.*, pengguna.nama AS nama_pengguna FROM Komentar
                                LEFT JOIN Pengguna ON komentar.id_pengguna_pengirim = pengguna.id_pengguna
                                WHERE komentar.id_berita_terkait = $newsId
                                ORDER BY komentar.tanggal_komentar DESC";
                $commentResult = mysqli_query($link, $commentQuery);

                if ($commentResult) {
                    while ($comment = mysqli_fetch_object($commentResult)) {
                        ?>
                        <div class="border-t border-gray-200 mt-2 pt-2">
                            <p class="text-sm"><strong><?= htmlspecialchars($comment->nama_pengguna); ?>:</strong> <?= htmlspecialchars($comment->isi_komentar); ?></p>
                            <p class="text-xs text-gray-500"><?= htmlspecialchars($comment->tanggal_komentar); ?></p>
                        </div>
                <?php
                    }
                } else {
                    echo "Error fetching comments.";
                }
                ?>
            </div>
        <?php
        } else {
            echo "News not found.";
        }
        ?>

    </div>

    <?php include './komponen/footer.php'; ?>

</body>

</html>
<?php
    } else {
        echo "Error fetching news.";
    }
} else {
    echo "Invalid request.";
}
?>
