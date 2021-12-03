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
    <script src="https://unpkg.com/feather-icons"></script>
    <title>Our Anime List</title>
</head>

<body>
    <?php include("component/header.php") ?>
    <main class="container">
        <h2><?= ucfirst($season) ?> <?= $year ?></h2>
        <div class="container">
            <div class="primary">
                <div class="grid">
                    <?php while ($anime = mysqli_fetch_array($animes)) : ?>
                        <div id="<?= $anime['id'] ?>" class="grid-items">
                            <form action="#<?= $anime['id'] ?>" method="post">
                                <input name="anime-id" hidden value="<?= $anime['id'] ?>" type="text">
                                <div class="title">
                                    <h3><?= $anime['title'] ?></h3>
                                </div>
                                <div class="many-items">
                                    <p style="white-space: nowrap;"><?= $anime['studio'] ?></p>
                                    <div><?= $anime['episodes'] ?> eps</div>
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
                                        <button title="Sudah Ditambahkan" type="submit" class="btn btn-added" disabled name="btn-submit"><i data-feather="check"></i></button>
                                    <?php else : ?>
                                        <button title="Tambahkan ke Favorite" type="submit" class="btn btn-add" name="btn-submit"><i data-feather="plus"></i></button>
                                    <?php endif ?>
                                </div>
                                <div class="many-items">
                                    <div class="genres">
                                        <?php
                                        $anime_id = $anime['id'];
                                        $genres = $mysqli->query("SELECT id, name, anime_id FROM genres WHERE anime_id='$anime_id'");
                                        while ($genre = mysqli_fetch_array($genres)) : ?>
                                            <div class="genre-item"><?= $genre['name'] ?></div>
                                        <?php endwhile ?>
                                    </div>
                                    <div class="score">
                                        <span data-feather="star"></span> <?= $anime['score'] ?>
                                    </div>
                                </div>
                                <div class="detail">
                                    <div class="image">
                                        <img src="<?= $anime['image'] ?>" alt="gambar">
                                    </div>
                                    <div class="synopsis">
                                        <span>
                                            <?= nl2br($anime['synopsis']) ?>
                                        </span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    <?php endwhile ?>
                </div>
            </div>
        </div>
    </main>
    <?php include("component/footer.html") ?>
    <script>
        feather.replace()
    </script>
</body>

</html>