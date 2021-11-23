<?php
include("../../config.php");
session_start();
$file = file_get_contents("../data.json");
$json = json_decode($file);
if (!isset($_SESSION['email']) && $_SESSION['email'] != "admin@mail.com") {
    session_destroy();
    session_unset();
    header("Location: /login");
}

if (isset($_POST['submit-manga'])) {
    $id = $_GET['id'];
    $nama = $_POST['nama-manga'];
    $chapter = $_POST['chapter-manga'];
    $url_gambar = $_POST['url-img-manga'];
    $author_id =  $_POST['author-name'];
    $magazine_id =  $_POST['magazine-name'];

    $update = mysqli_query($mysqli, "UPDATE mangas 
    SET nama = '$nama', chapter = '$chapter', url_gambar = '$url_gambar',
    author_id = '$author_id', magazine_id = '$magazine_id' where id = $id ");
    header("Location: /");
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $animes = $mysqli->query("SELECT * FROM animes WHERE id='$id'");
    $anime = mysqli_fetch_array($animes);

    $genres = $mysqli->query("SELECT id, name, anime_id FROM genres WHERE id='$id'");

    if (!$animes) {
        die;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Update</title>
</head>

<body>
    <main class="main">
        <a href="/admin">Beranda</a>
        <!-- Anime Form -->
        <form class="anime form" action="/admin/create/" method="post">
            <label>Judul Anime</label>
            <input required class="input" value="<?= $anime['title'] ?>" type="text" name="nama-anime" placeholder="Nama Manga"> <br>
            <label>Gambar</label>
            <input class="input" type="url" value="<?= $anime['image'] ?>" name="url-img-anime" placeholder="https://example.com/gambar.jpg">
            <label>Sinopsis</label>
            <textarea class="input" value="<?= $anime['synopsis'] ?>" name="synopsis-anime" cols="30" rows="10"></textarea>
            <label>Total Episode</label>
            <input class="input" value="<?= $anime['episodes'] ?>" type="number" name="episode-anime" placeholder="Banyak Episode saat ini">
            <label>Skor</label>
            <input type="number" value="<?= $anime['score'] ?>" name="score-anime" class="input" placeholder="Skor Anime">
            <label>Season</label>
            <input type="text" value="<?= $anime['season'] ?>" name="season-anime" class="input" placeholder="Season Anime">
            <label>Tahun</label>
            <input type="Number" value="<?= $anime['year'] ?>" value="2000" name="year-anime" class="input" placeholder="Tahun Anime">
            <label for="authorlist">Studio </label>
            <select class="select" name="studio-anime">
                <option value="0"> -- None -- </option>
                <?php foreach ($json->studio as $studio) : ?>
                    <?php if ($anime['studio'] !== $studio->name) : ?>
                        <option value="<?= $studio->name ?>"><?= $studio->name ?></option>
                    <?php else : ?>
                        <option selected value="<?= $studio->name ?>"><?= $studio->name ?></option>
                    <?php endif ?>
                <?php endforeach ?>
            </select>
            <label for="authorlist">Genre </label>
            <?php foreach ($json->genre as $genre) : ?>
                <input class="input" type="checkbox" value="<?= $genre->name ?>" name="genreAnime[]" /> <?= $genre->name ?> <br>
            <?php endforeach ?>
            <button class="button" name="submit-anime" type="submit">Tambahkan Manga</button>
        </form>
    </main>
</body>

</html>