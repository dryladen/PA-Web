<?php require("config.php");

session_start();
if (isset($_POST['logout']) || !isset($_SESSION['email'])) {
    session_destroy();
    session_unset();
    header("Location: /login");
}

$curr_email = $_SESSION['email'];
$query = mysqli_query($mysqli, "SELECT * FROM users WHERE email='$curr_email'");
$user = mysqli_fetch_array($query);
$id = $user['id'];

$season = 'fall';
$year = 2021;
$animes = $mysqli->query("SELECT * FROM animes WHERE season='$season' AND year=$year ORDER BY score DESC");


if (isset($_POST['btn-submit'])) {
    $anime_id = $_POST['anime-id'];

    $insert_fav = $mysqli->query("INSERT INTO fav_animes (user_id, anime_id) VALUES ($id, $anime_id)");
    header("Location: /");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Your Anime List</title>
</head>

<body>
    <main class="main">
        <h1>Halo, <?= $user['username'] ?></h1>
        <a href="/profile/"><?= $user['username'] ?></a>
        <section class="section2">
            <?php while ($anime = mysqli_fetch_array($animes)) : ?>
                <form action="" method="post">
                    <input name="anime-id" hidden value="<?= $anime['id'] ?>" type="text">
                    <img width="100" src="<?= $anime['image'] ?>" alt="gambar">
                    <h3><?= $anime['title'] ?></h3>
                    <?php
                    $fav_animes = $mysqli->query("SELECT * FROM fav_animes WHERE user_id='$id'");
                    $isAdded = false;
                    while ($fav_anime = mysqli_fetch_array($fav_animes)) :
                        if ($fav_anime['anime_id'] === $anime['id']) {
                            $isAdded = true;
                            break;
                        } else {
                            $isAdded = false;
                        }
                    ?>
                    <?php endwhile;
                    if ($isAdded) : ?>
                        <button type="submit" disabled name="btn-submit" class="button">Sudah ditambahkan</button>
                    <?php else : ?>
                        <button type="submit" name="btn-submit" class="button">Tambahkan ke Favorite</button>
                    <?php endif ?>

                </form>
            <?php endwhile ?>
        </section>
        <form action="" method="POST" class="form">
            <button style="background-color: red; color: white" class="button" type="submit" value="logut" name="logout">Logout</button>
        </form>
    </main>
</body>

</html>