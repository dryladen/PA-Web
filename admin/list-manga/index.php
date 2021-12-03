<?php include("../../config.php");

session_start();
if (isset($_POST['logout']) || !isset($_SESSION['email']) && $_SESSION['email'] != "admin@mail.com") {
    session_destroy();
    session_unset();
    header("Location: /login");
}

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
    <?php include("../../component/header-admin.php") ?>
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
        <a href="../admin/">
            <button class="button">Home</button>
        </a>
        <form action="" method="POST" class="form">
            <button style="background-color: red; color: white" class="button" type="submit" value="logut" name="logout">Logout</button>
        </form>
        <h2>Manga</h2>
        <div class="grid">
            <?php while ($manga = mysqli_fetch_array($mangas)) : ?>
                <div class="grid-items">
                    <input name="manga-id" hidden value="<?= $manga['id'] ?>" type="text">
                    <div class="title">
                        <h3><?= $manga['title'] ?></h3>
                    </div>
                    <div class="many-items">
                        <p style="white-space: nowrap;"><?= $manga['author'] ?></p>
                        <div><?= $manga['volumes'] == 0 || $manga['volumes'] == "" ? "?" : $manga['volumes'] ?> vol</div>
                        <a title="Ubah" class="btn btn-add" href="../admin/update-manga?id=<?= $manga['id'] ?>" name="btn-submit">
                            <i data-feather="edit-2">
                            </i>
                        </a>
                    </div>
                    <div class="many-items">
                        <div class="genres">
                            <?php
                            $manga_id = $manga['id'];
                            $genres = $mysqli->query("SELECT id, name, manga_id FROM genres WHERE manga_id='$manga_id'");
                            while ($genre = mysqli_fetch_array($genres)) : ?>
                                <div class="genre-item"><?= $genre['name'] ?></div>
                            <?php endwhile ?>
                        </div>
                        <div class="score">
                            <span data-feather="star"></span>
                            <?= $manga['score'] ?>
                        </div>
                    </div>
                    <div class="detail">
                        <div class="image">
                            <img src="<?= $manga['image'] ?>" alt="gambar">
                        </div>
                        <div class="synopsis">
                            <span>
                                <?= nl2br($manga['synopsis']) ?>
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
    <?php include("../../component/footer.html") ?>
</body>

</html>