<?php include("../config.php");

session_start();
if (isset($_POST['logout']) || !isset($_SESSION['email']) && $_SESSION['email'] != "admin@mail.com") {
    session_destroy();
    session_unset();
    header("Location: /login");
}

$animes = $mysqli->query("SELECT * FROM animes ORDER BY score DESC");
// $mangas = $mysqli->query("SELECT * FROM mangas ORDER BY score DESC");
$mangas = $mysqli->query("SELECT mangas.id, mangas.title, mangas.image, mangas.chapters, 
                            mangas.volumes, mangas.score, mangas.magazine,
                            mangas.synopsis, mangas.author_id, authors.name as author 
                            FROM mangas LEFT JOIN authors ON mangas.author_id=authors.id ORDER BY mangas.score DESC");
$authors = $mysqli->query("SELECT * FROM authors ORDER BY name");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/../style.css">
    <title>
        Admin
    </title>
</head>

<body>
    <main class="container">
        <h1>Admin</h1>
        <a href="/admin/create/">
            <button class="button">Tambah</button>
        </a>
        <a href="/admin/add-from-api?type=anime&page=1&subtype=tv">
            <button class="button">Tambah dari API (tidak penting)</button>
        </a>
        <a href="/admin/add-top-season-api?year=2021&season=fall">
            <button class="button">Tambah season API (tidak penting)</button>
        </a>
        <section class="section2">
            <h2>Anime</h2>
            <?php while ($anime = mysqli_fetch_array($animes)) : ?>
                <div class="card">
                    <img width="210" src="<?= $anime["image"] ?>" alt="gambar">
                    <div class="description">
                        <h3>
                            <a href="/admin/update-anime?id=<?= $anime["id"] ?>">
                                <?= $anime["title"] ?>
                            </a>
                        </h3>
                        <h4>Synopsis</h4>
                        <p><?= $anime["synopsis"] ?></p>
                        <h4>Episodes</h4>
                        <span><?= $anime["episodes"] ?></span>
                        <h4>Score </h4>
                        <span><?= $anime["score"] ?></span>
                        <h4>Season </h4>
                        <span><?= $anime["season"] ?></span>
                        <h4>Year </h4>
                        <span><?= $anime["year"] ?></span>
                        <h4>Studio </h4>
                        <span><?= $anime["studio"] ?></span>
                        <h4>Genre </h4>
                        <?php
                        $anime_id = $anime['id'];
                        $genres = $mysqli->query("SELECT * FROM genres WHERE anime_id='$anime_id'");
                        while ($genre = mysqli_fetch_array($genres)) : ?>
                            <span><?= $genre['name'] ?></span>
                        <?php endwhile ?>
                    </div>
                </div>
            <?php endwhile ?>
            <h2>Manga</h2>
            <?php while ($manga = mysqli_fetch_array($mangas)) : ?>
                <div class="card">
                    <img width="210" src="<?= $manga["image"] ?>" alt="gambar">
                    <div class="description">
                        <h3>
                            <a href="/admin/update-manga?id=<?= $manga["id"] ?>">
                                <?= $manga["title"] ?>
                            </a>
                        </h3>
                        <h4>Synopsis</h4>
                        <p><?= $manga["synopsis"] ?></p>
                        <h4>Volumes</h4>
                        <span><?= $manga["volumes"] ?></span>
                        <h4>Chapters </h4>
                        <span><?= $manga["chapters"] ?></span>
                        <h4>Score </h4>
                        <span><?= $manga["score"] ?></span>
                        <h4>Magazine </h4>
                        <span><?= $manga["magazine"] ?></span>
                        <h4>Author </h4>
                        <span><?= $manga["author"] ?></span>
                        <h4>Genre </h4>
                        <?php
                        $manga_id = $manga['id'];
                        $genres = $mysqli->query("SELECT * FROM genres WHERE manga_id='$manga_id'");
                        while ($genre = mysqli_fetch_array($genres)) : ?>
                            <span><?= $genre['name'] ?></span>
                        <?php endwhile ?>
                    </div>
                </div>
            <?php endwhile ?>
            <h2>Author</h2>
            <?php while ($author = mysqli_fetch_array($authors)) : ?>
                <div class="card">
                    <img width="210" src="<?= $author["image"] ?>" alt="gambar">
                    <div class="description">
                        <h3>
                            <a href="/admin/update-anime?id=<?= $author["id"] ?>">
                                <?= $author["name"] ?>
                            </a>
                        </h3>
                    </div>
                </div>
            <?php endwhile ?>
        </section>
        <form action="" method="POST" class="form">
            <button style="background-color: red; color: white" class="button" type="submit" value="logut" name="logout">Logout</button>
        </form>
    </main>
</body>

</html>