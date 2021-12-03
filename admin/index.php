<?php include("../config.php");

session_start();
if (isset($_POST['logout']) || !isset($_SESSION['email']) && $_SESSION['email'] != "admin@mail.com") {
    session_destroy();
    session_unset();
    header("Location: /login");
}

$animes = $mysqli->query("SELECT * FROM animes ORDER BY score DESC");
$authors = $mysqli->query("SELECT * FROM authors ORDER BY name");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <title>
        Admin
    </title>
    <style>
        .container {
            padding: 16px;
        }

        .card img {
            width: 344px;
            height: 500px;
        }

        a {
            color: black;
        }

        .header2 {
            padding-top: 25px;
        }
    </style>
</head>

<body>
    <main class="container">
        <h1>Admin</h1>
        <a href="../admin/create/">
            <button class="button">Tambah</button>
        </a>
        <a href="../admin/add-from-api?type=anime&page=1&subtype=tv">
            <button class="button">Tambah dari API (tidak penting)</button>
        </a>
        <a href="../admin/add-top-season-api?year=2021&season=fall">
            <button class="button">Tambah season API (tidak penting)</button>
        </a>
        <a href="../admin/list-manga">
            <button class="button">List Manga</button>
        </a>
        <a href="../admin/list-user">
            <button class="button">List User</button>
        </a>
        <form action="" method="POST" class="form">
            <button style="background-color: red; color: white" class="button" type="submit" value="logut" name="logout">Logout</button>
        </form>
        <h2>Anime</h2>
        <div class="grid">
            <?php while ($anime = mysqli_fetch_array($animes)) : ?>
                <div class="grid-items">
                    <input name="anime-id" hidden value="<?= $anime['id'] ?>" type="text">
                    <div class="title">
                        <h3><?= $anime['title'] ?></h3>
                    </div>
                    <div class="many-items">
                        <p style="white-space: nowrap;"><?= $anime['studio'] ?></p>
                        <div><?= $anime['episodes'] == 0 || $anime['episodes'] == "" ? "?" : $anime['episodes'] ?> eps</div>
                        <a title="Ubah" class="btn btn-add" href="../admin/update-anime?id=<?= $anime['id'] ?>" name="btn-submit">
                            <i data-feather="edit-2">
                            </i>
                        </a>
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
                            <span data-feather="star"></span>
                            <?= $anime['score'] ?>
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
                </div>
            <?php endwhile ?>
        </div>
    </main>
    <script>
        feather.replace()
    </script>
</body>

</html>