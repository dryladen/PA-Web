<?php include("../../config.php");

$file = file_get_contents("../data.json");
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

// ! Insert Table Anime
if (isset($_POST['submit-anime'])) {
    $title = $_POST['nama-anime'];
    $image = $_POST['url-img-anime'];
    $synopsis = mysqli_real_escape_string($mysqli, $_POST['synopsis-anime']);
    $episodes = (int) $_POST['episode-anime'];
    $score = $_POST['score-anime'];
    $season = $_POST['season-anime'];
    $year = $_POST['year-anime'];
    $studio = $_POST['studio-anime'] === "0" ? "NULL" : mysqli_real_escape_string($mysqli,  $_POST['studio-anime']);
    $genres = $_POST['genreAnime'];

    $checkExist = $mysqli->query("SELECT * FROM animes WHERE title='{$title}'");
    if (mysqli_num_rows($checkExist) === 0) {
        var_dump("Disini");
        $insert = $mysqli->query("INSERT INTO animes (title, image, synopsis, episodes, score, season, year, studio)
        VALUES ('$title', '$image', '$synopsis', $episodes, '$score', '$season', '$year', $studio)");
        echo mysqli_error($mysqli);
    }
    $genres = $_POST['genreAnime'];
    var_dump($genre);
    if (!empty($genre)) {
        foreach ($genres as $genre) {
            var_dump($genre);
        }
    }
    // Get ID of anime that recently being added
    $getId = mysqli_fetch_array($mysqli->query("SELECT id FROM animes WHERE title='$title'"));
    $id = $getId['id'];


    foreach ($genres as $genre) {
        $insert_genre = $mysqli->query("INSERT INTO genres (name, anime_id) VALUES ('$genre', '$id')");
    }
}

// ! Insert Data Manga
if (isset($_POST['submit-manga'])) {
    $title = mysqli_real_escape_string($mysqli, $_POST['nama-manga']);
    $image = mysqli_real_escape_string($mysqli, $_POST['url-img-manga']);
    $chapters = $_POST['chapters-manga'];
    $volumes = $_POST['volumes-manga'];
    $score = $_POST['score-manga'];
    $magazine = mysqli_real_escape_string($mysqli,  $_POST['magazine-manga']);
    $synopsis = mysqli_real_escape_string($mysqli,  $_POST['synopsis-manga']);
    $author_id = $_POST['author-name'] === "0" ? "NULL" : $_POST['author-name'];


    $checkExist = $mysqli->query("SELECT * FROM mangas WHERE title='{$title}'");
    if (mysqli_num_rows($checkExist) === 0) {
        $insert = $mysqli->query("INSERT INTO mangas 
        (title, image, chapters, volumes, score, magazine, synopsis, author_id)
        VALUE ('$title', '$image', $chapters, $volumes, $score, '$magazine', '$synopsis', $author_id)");
        if (!$insert) {
            var_dump(mysqli_error($mysqli));
            die;
        }
    }
    $genres = $_POST['genreManga'];

    // Get ID of anime that recently being added
    $getId = mysqli_fetch_array($mysqli->query("SELECT id FROM mangas WHERE title='$title'"));
    $id = $getId['id'];


    foreach ($genres as $genre) {
        $insert_genre = $mysqli->query("INSERT INTO genres (name, manga_id) VALUES ('$genre', '$id')");
    }
}
// ! Insert Data Authors
if (isset($_POST['submit-author'])) {

    $name = $_POST['nama-author'];
    $url_gambar = $_POST['url-img-author'];
    $insert = $mysqli->query("INSERT INTO authors (name, image) VALUES ('$name', '$url_gambar')");
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
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .container {
            margin: 20px;
            padding: 16px;
            width: 82%;
            border: 3px solid #f1f1f1;
        }

        button {
            background-color: #04AA6D;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        .select {
            display: block;
            width: 50%;
            border: 1px solid cornflowerblue;
            box-sizing: border-box;
        }

        .sinopsis {
            display: block;
            border: 1px solid cornflowerblue;
            box-sizing: border-box;
            max-width: 100%;
            max-height: 400px;
            min-width: 50%;
            min-height: 250px;
        }

        input[type=text],
        input[type=number],
        input[type=url] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            border: 1px solid cornflowerblue;
            box-sizing: border-box;
        }

        header{
            width: 100%;
        }

        footer{
            width: 100%;
        }

        a {
            color: cornflowerblue;
        }
    </style>
</head>

<body>
    <?php include("../../component/header-admin.php") ?>
    <div class="container">
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
            <textarea class="sinopsis" name="synopsis-anime" cols="30" rows="10"></textarea>
            <label>Total Episode</label>
            <input class="input" value="0" type="number" name="episode-anime" placeholder="Banyak Episode saat ini">
            <label>Skor</label>
            <input type="number" value="0.0" step="0.01" name="score-anime" class="input" placeholder="Skor Anime">
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
            <label>Judul Manga</label>
            <input required class="input" type="text" name="nama-manga" placeholder="Nama Manga"> <br>
            <label>Gambar</label>
            <input class="input" type="url" name="url-img-manga" placeholder="https://example.com/gambar.jpg">
            <label>Sinopsis</label>
            <textarea class="input" name="synopsis-manga" cols="30" rows="10"></textarea>
            <label>Total Chapter</label>
            <input class="input" value="0" type="number" name="chapters-manga" placeholder="Banyak Chapter saat ini">
            <label>Skor</label>
            <input type="number" step="0.01" value="0" name="score-manga" class="input" placeholder="Skor manga">
            <label>Volumes</label>
            <input type="text" name="volumes-manga" value="0" class="input" placeholder="Volumes manga">
            <label>Majalah </label>
            <select class="select" name="magazine-manga">
                <option value=""> -- None -- </option>
                <?php foreach ($json->magazine as $magazine) : ?>
                    <option value="<?= $magazine->name ?>"><?= $magazine->name ?></option>
                <?php endforeach ?>
            </select>
            <label for="authorlist">Author: </label>
            <select class="select" name="author-name" id="authorlist">
                <option value="0"> -- None -- </option>
                <?php while ($author = mysqli_fetch_array($authors)) : ?>
                    <option value="<?= $author['id'] ?>"><?= $author['name'] ?></option>
                <?php endwhile ?>
            </select>
            <label for="authorlist">Genre </label> <br>
            <?php foreach ($json->genre as $genre) : ?>
                <label><input type="checkbox" value="<?= $genre->name ?>" name="genreManga[]" /> <?= $genre->name ?></label>
                <br>
            <?php endforeach ?>
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
    </div>
    <?php include("../../component/footer.html") ?>
</body>

</html>