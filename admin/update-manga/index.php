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
$id = $_GET['id'];
if (isset($_GET['id'])) {
    $mangas = $mysqli->query("SELECT * FROM mangas WHERE id='$id'");
    $manga = mysqli_fetch_array($mangas);

    $authors = $mysqli->query("SELECT * FROM authors");

    if (!$mangas) {
        die;
    }
}

if (isset($_POST['submit-anime'])) {
    $title = $_POST['nama-manga'];
    $image = $_POST['url-img-manga'];
    $synopsis = $_POST['synopsis-manga'];
    $score = $_POST['score-manga'];
    $genres = $_POST['genremanga'];


    $deleteAllGenre = $mysqli->query("DELETE FROM genres WHERE manga_id='$id'");
    $mysqli->query("ALTER TABLE genres AUTO_INCREMENT = 1");

    foreach ($genres as $genre) {
        $insert_genre = $mysqli->query("INSERT INTO genres (name, manga_id) VALUES ('$genre', '$id')");
    }
}

if (isset($_POST['delete'])) {
    // ! Delete Genre First cuz' it has foreign key
    $deleteGenre = $mysqli->query("DELETE FROM genres WHERE manga_id='$id'");

    $deleteManga = $mysqli->query("DELETE FROM mangas WHERE id='$id'");

    $mysqli->query("ALTER TABLE mangas AUTO_INCREMENT = 1");
    $mysqli->query("ALTER TABLE genres AUTO_INCREMENT = 1");
    header("Location: /admin");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css">
    <title>Update</title>
</head>

<body>
    <main class="main">
        <a href="/admin">Beranda</a>
        <!-- Manga Form -->
        <form class="anime form" action="/admin/update-manga?id=<?= $id ?>" method="post">
            <label>Judul Manga</label>
            <input required class="input" value="<?= $manga['title'] ?>" type="text" name="nama-manga" placeholder="Nama Manga"> <br>
            <label>Gambar</label>
            <input class="input" type="url" value="<?= $manga['image'] ?>" name="url-img-manga" placeholder="https://example.com/gambar.jpg">
            <label>Sinopsis</label>
            <textarea class="input" value="<?= $manga['synopsis'] ?>" name="synopsis-manga" cols="30" rows="10"></textarea>
            <label>Total Chapter</label>
            <input class="input" value="<?= $manga['chapters'] ?>" type="number" name="chapter-manga" placeholder="Banyak Chapter saat ini">
            <label>Skor</label>
            <input type="number" value="<?= $manga['score'] ?>" name="score-manga" class="input" placeholder="Skor manga">
            <label>Volumes</label>
            <input type="text" value="<?= $manga['volumes'] ?>" name="volumes-manga" class="input" placeholder="Volumes manga">
            <label for="authorlist">Majalah </label>
            <select class="select" name="studio-anime">
                <option value="0"> -- None -- </option>
                <?php foreach ($json->magazine as $magazine) : ?>
                    <?php if ($manga['magazine'] !== $magazine->name) : ?>
                        <option value="<?= $magazine->name ?>"><?= $magazine->name ?></option>
                    <?php else : ?>
                        <option selected value="<?= $magazine->name ?>"><?= $magazine->name ?></option>
                    <?php endif ?>
                <?php endforeach ?>
            </select>
            <label for="authorlist">Author: </label>
            <select class="select" name="author-name" id="authorlist">
                <option value="0"> -- None -- </option>
                <?php while ($author = mysqli_fetch_array($authors)) : ?>
                    <?php if ($author['name'] != "Other") : ?>
                        <option value="<?= $author['id'] ?>"><?= $author['name'] ?></option>
                    <?php endif ?>
                <?php endwhile ?>
            </select>
            <label for="authorlist">Genre </label> <br>
            <?php foreach ($json->genre as $genre) :
                $genres = $mysqli->query("SELECT id, name, anime_id FROM genres WHERE anime_id='$id'");
                $isAdded = false;
                while ($result = mysqli_fetch_array($genres)) : ?>
                    <script>
                        console.log("<?= $result['name'] ?> === <?= $genre->name ?>")
                    </script>
                    <?php
                    if ($result['name'] === $genre->name) {
                        $isAdded = true;
                        break;
                    } else {
                        $isAdded = false;
                    }
                    ?>
                <?php endwhile ?>
                <?php if ($isAdded) : ?>
                    <label><input checked type="checkbox" value="<?= $genre->name ?>" name="genreAnime[]" /> <?= $genre->name ?></label>
                <?php else : ?>
                    <label><input type="checkbox" value="<?= $genre->name ?>" name="genreAnime[]" /> <?= $genre->name ?></label>
                <?php endif ?>
                <br>
            <?php endforeach ?>
            <button class="button" name="submit-anime" type="submit">Tambahkan Manga</button>
        </form>
        <form action="/admin/update-anime?id=<?= $id ?>" method="POST" class="form">
            <button style="background-color: red; color: white" onclick="return confirm('Yakin Ingin menghapus data?')" class="button" type="submit" value="delete" name="delete">Hapus Data</button>
        </form>
    </main>
</body>

</html>