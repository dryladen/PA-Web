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
    $mangas = $mysqli->query("SELECT mangas.id, mangas.title, mangas.image, mangas.chapters, 
                            mangas.volumes, mangas.score, mangas.magazine,
                            mangas.synopsis, mangas.author_id, authors.name as author 
                            FROM mangas LEFT JOIN authors ON mangas.author_id=authors.id WHERE mangas.id=$id");
    $manga = mysqli_fetch_array($mangas);

    $authors = $mysqli->query("SELECT * FROM authors");

    if (!$mangas) {
        die;
    }
}

if (isset($_POST['submit-manga'])) {
    $title = mysqli_real_escape_string($mysqli, $_POST['nama-manga']);
    $image = mysqli_real_escape_string($mysqli, $_POST['url-img-manga']);
    $synopsis = mysqli_real_escape_string($mysqli, $_POST['synopsis-manga']);
    $chapters = $_POST['chapters-manga'] === '' ? "NULL" : $_POST['chapters-manga'];
    $volumes = $_POST['volumes-manga'] === '' ? null : $_POST['volumes-manga'];
    $score = $_POST['score-manga'] === '' ? null : $_POST['score-manga'];
    $magazine = $_POST['magazine-manga'] === '' ? null : mysqli_real_escape_string($mysqli,  $_POST['magazine-manga']);
    $author_id = $_POST['author-name'] === '0' ? "NULL" : $_POST['author-name'];
    $genres = $_POST['genreManga'];

    $update = $mysqli->query("UPDATE mangas
    SET title='$title', image='$image', synopsis='$synopsis', chapters='$chapters', volumes='$volumes', score='$score',
    magazine='$magazine', author_id = $author_id WHERE id='$id'");
    var_dump(mysqli_error($mysqli));

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
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;

        }

        .container {
            margin: 20px;
            padding: 16px;
            border: 3px solid #f1f1f1;
            width: 82%;
        }
        header{
            width: 100%;
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

        a {
            color: cornflowerblue;
        }
    </style>
</head>

<body>
    <?php include("../../component/header-admin.php") ?>
    <div class="container">
        <!-- Manga Form -->
        <form class="anime form" action="/admin/update-manga?id=<?= $id ?>" method="post">
            <label>Judul Manga</label>
            <input required class="input" value="<?= $manga['title'] ?>" type="text" name="nama-manga" placeholder="Nama Manga"> <br>
            <label>Gambar</label>
            <input class="input" type="url" value="<?= $manga['image'] ?>" name="url-img-manga" placeholder="https://example.com/gambar.jpg">
            <label>Sinopsis</label>
            <textarea class="input" value="<?= $manga['synopsis'] ?>" name="synopsis-manga" cols="30" rows="10"></textarea>
            <label>Total Chapter</label>
            <input class="input" value="<?= $manga['chapters'] === null ? 0 : $manga['chapters'] ?>" type="number" name="chapters-manga" placeholder="Banyak Chapter saat ini">
            <label>Skor</label>
            <input type="number" value="<?= $manga['score'] ?>" step="0.01" name="score-manga" class="input" placeholder="Skor manga">
            <label>Volumes</label>
            <input type="text" value="<?= $manga['volumes'] ?>" name="volumes-manga" class="input" placeholder="Volumes manga">
            <label for="authorlist">Majalah </label>
            <select class="select" name="magazine-manga">
                <option value=""> -- None -- </option>
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
                    <?php if ($manga['author_id'] !== $author['id']) : ?>
                        <option value="<?= $author['id'] ?>"><?= $author['name'] ?></option>
                    <?php else : ?>
                        <option selected value="<?= $author['id'] ?>"><?= $author['name'] ?></option>
                    <?php endif ?>
                <?php endwhile ?>
            </select>
            <label for="authorlist">Genre </label> <br>
            <?php foreach ($json->genre as $genre) :
                $genres = $mysqli->query("SELECT id, name, manga_id FROM genres WHERE manga_id='$id'");
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
                    <label><input checked type="checkbox" value="<?= $genre->name ?>" name="genreManga[]" /> <?= $genre->name ?></label>
                <?php else : ?>
                    <label><input type="checkbox" value="<?= $genre->name ?>" name="genreManga[]" /> <?= $genre->name ?></label>
                <?php endif ?>
                <br>
            <?php endforeach ?>
            <button class="button" name="submit-manga" type="submit">Tambahkan Manga</button>
        </form>
        <form action="/admin/update-anime?id=<?= $id ?>" method="POST" class="form">
            <button style="background-color: red; color: white" onclick="return confirm('Yakin Ingin menghapus data?')" class="button" type="submit" value="delete" name="delete">Hapus Data</button>
        </form>
    </div>
    <?php include("../../component/footer.html") ?>
</body>

</html>