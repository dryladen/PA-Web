<?php require("../../config.php");

session_start();

$curr_email = $_SESSION['email'];
$query = $mysqli->query("SELECT * FROM users WHERE email='$curr_email'");
$user = mysqli_fetch_array($query);
$id = $user['id'];

$fav_animes = $mysqli->query("SELECT animes.* FROM fav_animes INNER JOIN animes ON 
fav_animes.anime_id=animes.id WHERE fav_animes.user_id=$id ORDER BY animes.title");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css">
    <title>Anime List</title>
</head>

<body>
    <a href="/profile/">Kembali</a>
    <?php while ($anime = mysqli_fetch_array($fav_animes)) : ?>
        <div>
            <input name="anime-id" hidden value="<?= $anime['id'] ?>" type="text">
            <img width="100" src="<?= $anime['image'] ?>" alt="gambar">
            <h3><?= $anime['title'] ?></h3>
        </div>
    <?php endwhile ?>
</body>

</html>