<?php require("config.php");

session_start();
if (isset($_POST['logout']) || !isset($_SESSION['email'])) {
    session_destroy();
    session_unset();
    header("Location: /login");
}

if (isset($_POST['btn-submit'])) {
    $user_id = $_POST['user-id'];
    $manga_id = $_POST['manga-id'];
    $query = mysqli_query($mysqli, "SELECT * FROM fav_mangas WHERE manga_id = '$manga_id'");

    if (mysqli_num_rows($query) != 0) {
        return;
    } else {
        $query = mysqli_query($mysqli, "INSERT INTO fav_mangas(user_id, manga_id) VALUES ('$user_id', '$manga_id')");
    }
}

$mangas = mysqli_query(
    $mysqli,
    "SELECT mangas.id, mangas.nama as name, mangas.chapter, 
mangas.url_gambar, authors.nama as author, magazines.nama as magazine
from mangas 
inner join authors on mangas.author_id=authors.id 
inner join magazines on mangas.magazine_id=magazines.id"
);
$curr_email = $_SESSION['email'];
$query = mysqli_query($mysqli, "SELECT * FROM users WHERE email='$curr_email'");
$user = mysqli_fetch_array($query);
$id = $user['id'];

$fav_mangas = mysqli_query($mysqli, "SELECT * FROM fav_mangas WHERE user_id='$id'");
// var_dump($fav_mangas); die;
echo mysqli_error($mysqli);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Your Anime List</title>
</head>

<body>
    <main class="main">
        <h1>Halo, <?= $user['nama'] ?></h1>
        <section class="section2">
            <?php while ($manga = mysqli_fetch_array($mangas)) : ?>
                <form action="" class="form" method="POST">
                    <input type="text" name="manga-id" hidden value="<?= $manga['id'] ?>">
                    <input type="text" name="user-id" hidden value="<?= $user['id'] ?>">
                    <div class="list">
                        <img height="100" src="<?= $manga['url_gambar'] ?>" alt="test">
                        <div class="desc">
                            <a>
                                <h3><?= $manga['name'] ?></h3>
                            </a>
                            <div class="not-title">
                                <?php if ($manga['author'] != "Other") : ?>
                                    <div>
                                        <span>Author: </span>
                                        <?= $manga['author'] ?>
                                    </div>
                                <?php endif ?>
                                <?php if ($manga['magazine'] != "Other") : ?>
                                    <div>
                                        <span>Magazine: </span>
                                        <?= $manga['magazine'] ?>
                                    </div>
                                <?php endif ?>
                                <div>
                                    <span>Total Chapter:</span>
                                    <?= $manga['chapter'] ?>
                                </div>
                                <div>
                                    <span>
                                        <?php
                                        $fav_mangas = mysqli_query($mysqli, "SELECT * FROM fav_mangas WHERE user_id='$id'");
                                        $isAdded = false;
                                        while ($fav = mysqli_fetch_array($fav_mangas)) : ?>
                                            <?php if ($fav['manga_id'] == $manga['id']) :
                                                $isAdded = true;
                                                break;
                                            ?>
                                            <?php else :
                                                $isAdded = false;
                                            ?>
                                            <?php endif ?>
                                        <?php endwhile ?>
                                        <?php if (!$isAdded) : ?>
                                            <button type="submit" name="btn-submit" class="button">Tambahkan ke Favorite</button>
                                        <?php else : ?>
                                            <button style="background-color: white; color: black" class="button">Sudah Ditambahkan ke Favorite</button>
                                        <?php endif ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            <?php endwhile ?>
        </section>
        <!-- <button class="button">Favorite</button> -->

        <form action="" method="POST" class="form">
            <button style="background-color: red; color: white" class="button" type="submit" value="logut" name="logout">Logout</button>
        </form>

    </main>
</body>

</html>