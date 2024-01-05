<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include('./services/setting.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newsId = $_POST["news_id"];
    $commentText = htmlspecialchars($_POST["comment"]);

    // Check if the user is logged in
    if (isset($_SESSION['user_id'])) {
        $userId = $_SESSION['user_id'];

        // Insert the comment into the database with the current date
        $insertCommentQuery = "INSERT INTO komentar (isi_komentar, tanggal_komentar, id_pengguna_pengirim, id_berita_terkait) 
                               VALUES ('$commentText', CURRENT_DATE(), '$userId', '$newsId')";
        
        $resultInsertComment = mysqli_query($link, $insertCommentQuery);

        if ($resultInsertComment) {
            // Redirect back to the news detail page after submitting the comment
            header("Location: detailberita.php?id=$newsId");
            exit();
        } else {
            echo "Error submitting the comment: " . mysqli_error($link);
        }
    } else {
        var_dump($_SESSION);
        echo "Silahkan Login untuk memulai komen";
    }
}
?>
