<?php
include("../../config.php");
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
    $curr_id = $_GET['id'];
    $mangas = mysqli_query(
        $mysqli,
        "SELECT mangas.id, mangas.nama as name, mangas.chapter, 
    mangas.url_gambar, authors.nama as author, magazines.nama as magazine
    from mangas 
    inner join authors on mangas.author_id=authors.id 
    inner join magazines on mangas.magazine_id=magazines.id
    where mangas.id = $curr_id"
    );

    if (!$mangas) {
        die;
    }

    $authors = mysqli_query($mysqli, "SELECT * FROM authors");
    $magazines = mysqli_query($mysqli, "SELECT * FROM magazines");
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
        <a href="/">Beranda</a>
        <form class="manga form" action="/update?id=<?= $_GET['id'] ?>" method="post">
            <?php while ($manga = mysqli_fetch_array($mangas)) : ?>
                <label>Nama Manga</label>
                <input value="<?= $manga['name'] ?>" class="input" type="text" name="nama-manga" placeholder="Nama Manga"> <br>
                <label>Total Chapter</label>
                <input value="<?= $manga['chapter'] ?>" class="input" type="number" name="chapter-manga" placeholder="Total Chapter Saat Ini">
                <label>URL Gambar</label>
                <input value="<?= $manga['url_gambar'] ?>" class="input" type="url" name="url-img-manga" placeholder="https://example.com/gambar.jpg">
                <label for="authorlist">Author: </label>
                <select class="select" name="author-name" id="authorlist">
                    <option value="1"> -- None -- </option>
                    <?php while ($author = mysqli_fetch_array($authors)) : ?>
                        <?php if ($author['nama'] != "Other") : ?>
                            <?php if ($manga['author'] == $author['nama']) : ?>
                                <option selected value="<?= $author['id'] ?>"><?= $author['nama'] ?></option>
                            <?php else : ?>
                                <option value="<?= $author['id'] ?>"><?= $author['nama'] ?></option>
                            <?php endif ?>
                        <?php endif ?>
                    <?php endwhile ?>
                </select>
                <label for="authorlist">Magazine </label>
                <select class="select" name="magazine-name" id="magazinelist">
                    <option value="1"> -- None -- </option>
                    <?php while ($magazine = mysqli_fetch_array($magazines)) : ?>
                        <?php if ($magazine['nama'] != "Other") : ?>
                            <?php if ($manga['magazine'] == $magazine['nama']) : ?>
                                <option selected value="<?= $magazine['id'] ?>"><?= $magazine['nama'] ?></option>
                            <?php else : ?>
                                <option value="<?= $magazine['id'] ?>"><?= $magazine['nama'] ?></option>
                            <?php endif ?>
                        <?php endif ?>
                    <?php endwhile ?>
                </select>
            <?php endwhile ?>
            <button class="button" name="submit-manga" type="submit">Tambahkan Manga</button>
        </form>
    </main>
</body>

</html>