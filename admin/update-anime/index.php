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
    $animes = $mysqli->query("SELECT * FROM animes WHERE id='$id'");
    $anime = mysqli_fetch_array($animes);

    if (!$animes) {
        die;
    }
}

if (isset($_POST['submit-anime'])) {
    $title = $_POST['nama-anime'];
    $image = $_POST['url-img-anime'];
    $synopsis = $_POST['synopsis-anime'];
    $episodes = (int) $_POST['episode-anime'];
    $score = $_POST['score-anime'];
    $season = $_POST['season-anime'];
    $year = $_POST['year-anime'];
    $studio = $_POST['studio-anime'];
    $genres = $_POST['genreAnime'];

    $update = $mysqli->query("UPDATE animes
    SET title='$title', image='$image', synopsis='$synopsis', episodes='$episodes',
    score='$score', season='$season', year='$year', studio='$studio' WHERE id='$id'");
    var_dump(mysqli_error($mysqli));

    $deleteAllGenre = $mysqli->query("DELETE FROM genres WHERE anime_id='$id'");
    $mysqli->query("ALTER TABLE genres AUTO_INCREMENT = 1");
    
    foreach ($genres as $genre) {
        $insert_genre = $mysqli->query("INSERT INTO genres (name, anime_id) VALUES ('$genre', '$id')");
    }
}

if (isset($_POST['delete'])) {
    // ! Delete Genre First cuz' it has foreign key
    $deleteGenre = $mysqli->query("DELETE FROM genres WHERE anime_id='$id'");
    
    $deleteAnime = $mysqli->query("DELETE FROM animes WHERE id='$id'");
    
    $mysqli->query("ALTER TABLE animes AUTO_INCREMENT = 1");
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
        <!-- Anime Form -->
        <form class="anime form" action="/admin/update-anime?id=<?= $id ?>" method="post">
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
            <input type="Number" value="<?= $anime['year'] == null ? 2000 : $anime['year'] ?>" value="2000" name="year-anime" class="input" placeholder="Tahun Anime">
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