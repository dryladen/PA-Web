<?php include("../../config.php");

$file = file_get_contents("./data.json");
$json = json_decode($file);

session_start();

// ! Check apakah admin mau logout atau langsung masuk tanpa login dulu
if (!isset($_SESSION['email']) && $_SESSION['email'] != "admin@mail.com") {
    session_destroy();
    session_unset();
    header("Location: /login");
}

$authors = mysqli_query($mysqli, "SELECT * FROM authors");
$magazines = mysqli_query($mysqli, "SELECT * FROM magazines");

if (isset($_POST['submit-anime'])) {
    $title = $_POST['nama-anime'];
    $image = $_POST['url-img-anime'];
    $synopsis = $_POST['synopsis-anime'];
    $episodes = (int) $_POST['episode-anime'];
    $score = $_POST['score-anime'];
    $season = $_POST['season-anime'];
    $year = $_POST['year-anime'];
    $studio = $_POST['studio-anime'];
    
    $checkExist = $mysqli->query("SELECT * FROM animes WHERE title='{$title}'");
    if (mysqli_num_rows($checkExist) === 0) {
        var_dump("Disini");
        $insert = $mysqli->query("INSERT INTO animes (title, image, synopsis, episodes, score, season, year, studio)
        VALUES ('$title', '$image', '$synopsis', $episodes, '$score', '$season', '$year', '$studio')");
        echo mysqli_error($mysqli);
    }
    $genres = $_POST['genreAnime'];
    var_dump($genre);
    if (!empty($genre)) {
        foreach ($genres as $genre) {
            var_dump($genre);
        }
    }


    $getId = mysqli_fetch_array($mysqli->query("SELECT id FROM animes WHERE title='$title'"));
    $id = $getId['id'];
    var_dump($id);

    // $insert_genre = $mysqli->query("INSERT INTO genres ")
}

// ! Insert Data Manga
if (isset($_POST['submit-manga'])) {
    var_dump($_POST);
    $nama = $_POST['nama-manga'];
    $chapter = $_POST['chapter-manga'];
    $url_gambar = $_POST['url-img-manga'];
    $author_id =  $_POST['author-name'];
    $magazine_id =  $_POST['magazine-name'];

    // $insert = $mysqli->query("INSERT INTO mangas (nama, chapter, url_gambar, author_id, magazine_id)
    // VALUES ('$nama', '$chapter', '$url_gambar', '$author_id', '$magazine_id')");
    // header("Location: /admin");
}
// ! Insert Data Authors
else if (isset($_POST['submit-author'])) {
    var_dump($_POST);

    $name = $_POST['nama-author'];
    $url_gambar = $_POST['url-img-author'];
    // $insert = $mysqli->query("INSERT INTO authors (name, url_gambar) VALUES ('$name', '$url_gambar')");
    // header("Location: /admin");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css">
    <title>Tambah</title>
</head>

<body>
    <a href="/admin">Beranda</a>
    <select style="margin: 20px 0;" class="select choose-type" class="choose-type" name="type" id="table">
        <option value="anime">Anime</option>
        <option value="manga">Manga</option>
        <option value="author">Author</option>
    </select>


    <!-- Anime Form -->
    <form class="anime form" action="/admin/create/" method="post">
        <label>Judul Anime</label>
        <input required class="input" type="text" name="nama-anime" placeholder="Nama Manga"> <br>
        <label>Gambar</label>
        <input class="input" type="url" name="url-img-anime" placeholder="https://example.com/gambar.jpg">
        <label>Sinopsis</label>
        <textarea class="input" name="synopsis-anime" cols="30" rows="10"></textarea>
        <label>Total Episode</label>
        <input class="input" value="0" type="number" name="episode-anime" placeholder="Banyak Episode saat ini">
        <label>Skor</label>
        <input type="number" value="0.0" name="score-anime" class="input" placeholder="Skor Anime">
        <label>Season</label>
        <input type="text" name="season-anime" class="input" placeholder="Season Anime">
        <label>Tahun</label>
        <input type="Number" value="2000" name="year-anime" class="input" placeholder="Tahun Anime">
        <label for="authorlist">Studio </label>
        <select class="select" name="studio-anime">
            <option value="0"> -- None -- </option>
            <?php foreach ($json->studio as $studio) : ?>
                <option value="<?= $studio->name ?>"><?= $studio->name ?></option>
            <?php endforeach ?>
        </select>
        <label for="authorlist">Genre </label>
        <?php foreach ($json->genre as $genre) : ?>
            <input class="input" type="checkbox" value="<?= $genre->name ?>" name="genreAnime[]" /> <?= $genre->name ?> <br>
        <?php endforeach ?>
        <button class="button" name="submit-anime" type="submit">Tambahkan Manga</button>
    </form>


    <!-- Manga Form -->
    <form class="manga form hidden" action="/admin/create/" method="post">
        <label>Manga Title</label>
        <input required class="input" type="text" name="name-manga" placeholder="Nama Manga"> <br>
        <label>URL Gambar</label>
        <input class="input" type="url" name="url-img-manga" placeholder="https://example.com/gambar.jpg">
        <label>Total Chapters</label>
        <input class="input" type="number" name="chapter-manga" placeholder="Total Chapter Saat Ini">
        <label>Total Volumes</label>
        <input class="input" type="number" name="volumes-manga" placeholder="Total Volume Saat ini">
        <label>Skor</label>
        <input class="input" type="number" name="score-manga" placeholder="Skor dari Anime">
        <label>Majalah</label>
        <input class="input" type="text" name="score-manga" placeholder="Skor dari Anime">
        <label for="authorlist">Author: </label>
        <select class="select" name="author-name" id="authorlist">
            <option value="0"> -- None -- </option>
            <?php while ($author = mysqli_fetch_array($authors)) : ?>
                <?php if ($author['name'] != "Other") : ?>
                    <option value="<?= $author['id'] ?>"><?= $author['name'] ?></option>
                <?php endif ?>
            <?php endwhile ?>
        </select>
        <button class="button" name="submit-manga" type="submit">Tambahkan Manga</button>
    </form>


    <!-- Author Form -->
    <form method="POST" action="/admin/create/" class="form author hidden">
        <label>Nama Author</label>
        <input required class="input" type="text" name="nama-author">
        <label>URL Gambar</label>
        <input class="input" type="url" name="url-img-author" placeholder="https://example.com/gambar.jpg">
        <button class="button" name="submit-author" type="submit">Tambahkan Author</button>
    </form>

    <script>
        const type = document.querySelector('.choose-type');
        const anime = document.querySelector(".anime");
        const manga = document.querySelector('.manga');
        const author = document.querySelector('.author');
        const magazine = document.querySelector('.magazine');
        let old_type = "anime";

        type.addEventListener('change', (e) => {
            const curr_type = e.target.value;

            document.querySelector(`.${old_type}`).classList.add("hidden");
            if (curr_type === 'manga' && manga.classList.contains("hidden")) {
                manga.classList.remove('hidden');
                old_type = "manga";
            } else if (curr_type === 'author' && author.classList.contains("hidden")) {
                author.classList.remove('hidden');
                old_type = "author";
            } else if (curr_type === 'anime' && anime.classList.contains("hidden")) {
                anime.classList.remove('hidden');
                old_type = "anime";
            }
        });
    </script>
</body>

</html>