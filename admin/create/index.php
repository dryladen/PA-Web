<!DOCTYPE html>
<html lang="en">
<?php include("../../config.php");
session_start();
if (!isset($_SESSION['email']) && $_SESSION['email'] != "admin@mail.com") {
    session_destroy();
    session_unset();
    header("Location: /login");
}
$authors = mysqli_query($mysqli, "SELECT * FROM authors");
$magazines = mysqli_query($mysqli, "SELECT * FROM magazines");

// Submit Manga
if (isset($_POST['submit-manga'])) {
    $nama = $_POST['nama-manga'];
    $chapter = $_POST['chapter-manga'];
    $url_gambar = $_POST['url-img-manga'];
    $author_id =  $_POST['author-name'];
    $magazine_id =  $_POST['magazine-name'];

    $insert = mysqli_query($mysqli, "INSERT INTO mangas (nama, chapter, url_gambar, author_id, magazine_id)
    VALUES ('$nama', '$chapter', '$url_gambar', '$author_id', '$magazine_id')");
    header("Location: /");
} else if (isset($_POST['submit-magazine'])) {
    $nama = $_POST['nama-magazine'];

    $insert = mysqli_query($mysqli, "INSERT INTO magazines (nama) VALUES ('$nama')");
    header("Location: /");
} else if (isset($_POST['submit-author'])) {
    $nama = $_POST['nama-author'];
    $url_gambar = $_POST['url-img-author'];

    $insert = mysqli_query($mysqli, "INSERT INTO authors (nama, url_gambar) VALUES ('$nama', '$url_gambar')");
    header("Location: /");
}

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css">
    <title>Tambah</title>
</head>

<body>
    <a href="/">Beranda</a>
    <select class="select choose-type" class="choose-type" name="type" id="table">
        <option value="manga">Manga</option>
        <option value="author">Author</option>
    </select>
    <!-- Manga Form -->
    <form class="manga form" action="/create/" method="post">
        <label>Nama Manga</label>
        <input class="input" type="text" name="nama-manga" placeholder="Nama Manga"> <br>
        <label>Total Chapter</label>
        <input class="input" type="number" name="chapter-manga" placeholder="Total Chapter Saat Ini">
        <label>URL Gambar</label>
        <input class="input" type="url" name="url-img-manga" placeholder="https://example.com/gambar.jpg">
        <label for="authorlist">Author: </label>
        <select class="select" name="author-name" id="authorlist">
            <option value="1"> -- None -- </option>
            <?php while ($author = mysqli_fetch_array($authors)) : ?>
                <?php if ($author['name'] != "Other") : ?>
                    <option value="<?= $author['id'] ?>"><?= $author['name'] ?></option>
                <?php endif ?>
            <?php endwhile ?>
        </select>
        
        <button class="button" name="submit-manga" type="submit">Tambahkan Manga</button>
    </form>

    <!-- Author Form -->
    <form method="POST" action="/create/" class="form author hidden">
        <label>Nama Author</label>
        <input class="input" type="text" name="nama-author">
        <label>URL Gambar</label>
        <input class="input" type="url" name="url-img-author" placeholder="https://example.com/gambar.jpg">
        <button class="button" name="submit-author" type="submit">Tambahkan Author</button>
    </form>

    <script>
        const type = document.querySelector('.choose-type');
        const manga = document.querySelector('.manga');
        const magazine = document.querySelector('.magazine');
        const author = document.querySelector('.author');
        let old_type = "manga";

        type.addEventListener('change', (e) => {
            const curr_type = e.target.value;

            document.querySelector(`.${old_type}`).classList.add("hidden");
            if (curr_type === 'manga' && manga.classList.contains("hidden")) {
                manga.classList.remove('hidden');
                old_type = "manga";
            } else if (curr_type === 'magazine' && magazine.classList.contains("hidden")) {
                magazine.classList.remove('hidden');
                old_type = "magazine";
            } else if (curr_type === 'author' && author.classList.contains("hidden")) {
                author.classList.remove('hidden');
                old_type = "author";
            }
        });
    </script>
</body>

</html>