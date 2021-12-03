<?php require("../config.php");

session_start();

$curr_email = $_SESSION['email'];
$query = $mysqli->query("SELECT * FROM users WHERE email='$curr_email'");
$user = mysqli_fetch_array($query);
$id = $user['id'];
$q = "profile";

$fav_animes = $mysqli->query("SELECT animes.*, fav_animes.id FROM fav_animes INNER JOIN animes ON 
fav_animes.anime_id=animes.id WHERE fav_animes.user_id=$id ORDER BY animes.title");

$fav_mangas = $mysqli->query("SELECT mangas.*, fav_mangas.id FROM fav_mangas INNER JOIN mangas ON
fav_mangas.manga_id=mangas.id WHERE fav_mangas.user_id=$id ORDER BY mangas.title");

if (isset($_POST['btn-submit-anime'])) {
    $fav_id = $_POST['fav_anime-id'];

    $del = $mysqli->query("DELETE FROM fav_animes WHERE id='$fav_id'");
    $_POST = array();
    header("Location: /profile");
} elseif (isset($_POST['btn-submit-manga'])) {
    $fav_id = $_POST['fav_manga-id'];

    $del = $mysqli->query("DELETE FROM fav_mangas WHERE id='$fav_id'");
    $_POST = array();
    header("Location: /profile");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <title>Profile</title>
</head>

<body>
    <?php include("../component/header.php") ?>
    <div class="container">

        <!-- Tab links -->
        <div class="tab">
            <button class="tablinks active" onclick="openCity(event, 'Profile')">Profile</button>
            <button class="tablinks" onclick="openCity(event, 'fav-anime')">Favorite Anime</button>
            <button class="tablinks" onclick="openCity(event, 'fav-manga')">Favorite Manga</button>
        </div>

        <!-- Tab content -->
        <!-- Ini bagian profile user -->
        <div id="Profile" class="tabcontent" style="display: block;">
            <h3>Profile</h3>
            <!-- <p>Profile is the capital of Japan.</p> -->
            <table>
                <tr>
                    <td>
                        <p>ini usernamenya</p>
                    </td>
                </tr>
                <tr>
                    <td><img src="" alt=""></td>
                </tr>
                <tr>
                    <td>
                        <p>Emailnya</p>
                    </td>
                </tr>
            </table>
        </div>

        <!-- ! Ini Bagian Favorite Anime -->
        <div id="fav-anime" class="tabcontent">
            <div class=" grid">
                <?php while ($fav_anime = mysqli_fetch_array($fav_animes)) : ?>
                    <div id="<?= $fav_anime['id'] ?>" class="grid-items">
                        <form action="" method="post">
                            <input name="fav_anime-id" hidden value="<?= $fav_anime['id'] ?>" type="text">
                            <div class="title">
                                <h3><?= $fav_anime['title'] ?></h3>
                            </div>
                            <div class="many-items">
                                <p style="white-space: nowrap;"><?= $fav_anime['studio'] ?></p>
                                <div><?= $fav_anime['episodes'] ?> eps</div>
                                <!-- <button title="Sudah Ditambahkan" type="submit" class="btn btn-added" disabled name="btn-submit"><i data-feather="check"></i></button> -->
                                <button title="Hapus" onclick="return confirm('Yakin?')" type="submit" class="btn btn-danger" name="btn-submit-anime"><i data-feather="trash-2"></i></button>
                            </div>
                            <div class="many-items">
                                <div class="genres">
                                    <?php
                                    $anime_id = $fav_anime['id'];
                                    $genres = $mysqli->query("SELECT id, name, anime_id FROM genres WHERE anime_id='$anime_id'");
                                    while ($genre = mysqli_fetch_array($genres)) : ?>
                                        <div class="genre-item"><?= $genre['name'] ?></div>
                                    <?php endwhile ?>
                                </div>
                                <div class="score">
                                    <span data-feather="star"></span> <?= $fav_anime['score'] ?>
                                </div>
                            </div>
                            <div class="detail">
                                <div class="image">
                                    <img src="<?= $fav_anime['image'] ?>" alt="gambar">
                                </div>
                                <div class="synopsis">
                                    <span>
                                        <?= nl2br($fav_anime['synopsis']) ?>
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>
                <?php endwhile ?>
            </div>
        </div>

        <!-- Ini bagian favorite manga -->
        <div id="fav-manga" class="tabcontent">
            <div class=" grid">
                <?php while ($fav_manga = mysqli_fetch_array($fav_mangas)) : ?>
                    <div id="<?= $fav_manga['id'] ?>" class="grid-items">
                        <form action="" method="post">
                            <input name="fav_manga-id" hidden value="<?= $fav_manga['id'] ?>" type="text">
                            <div class="title">
                                <h3><?= $fav_manga['title'] ?></h3>
                            </div>
                            <div class="many-items">
                                <p style="white-space: nowrap;"><?= $fav_manga['magazine'] ?></p>
                                <div><?= $fav_manga['volumes'] ?> vol</div>
                                <!-- <button title="Sudah Ditambahkan" type="submit" class="btn btn-added" disabled name="btn-submit"><i data-feather="check"></i></button> -->
                                <button title="Hapus" onclick="return confirm('Yakin?')" type="submit" class="btn btn-danger" name="btn-submit-manga"><i data-feather="trash-2"></i></button>
                            </div>
                            <div class="many-items">
                                <div class="genres">
                                    <?php
                                    $manga_id = $fav_manga['id'];
                                    $genres = $mysqli->query("SELECT id, name, manga_id FROM genres WHERE manga_id='$manga_id'");
                                    while ($genre = mysqli_fetch_array($genres)) : ?>
                                        <div class="genre-item"><?= $genre['name'] ?></div>
                                    <?php endwhile ?>
                                </div>
                                <div class="score">
                                    <span data-feather="star"></span> <?= $fav_manga['score'] ?>
                                </div>
                            </div>
                            <div class="detail">
                                <div class="image">
                                    <img src="<?= $fav_manga['image'] ?>" alt="gambar">
                                </div>
                                <div class="synopsis">
                                    <span>
                                        <?= nl2br($fav_manga['synopsis']) ?>
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>
                <?php endwhile ?>
            </div>
        </div>

    </div>

    <script>
        feather.replace()
    </script>
    <script>
        function openCity(evt, cityName) {
            // Declare all variables
            var i, tabcontent, tablinks;

            // Get all elements with class="tabcontent" and hide them
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

            // Get all elements with class="tablinks" and remove the class "active"
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }

            // Show the current tab, and add an "active" class to the button that opened the tab
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>
    <?php include("../component/footer.html") ?>
</body>

</html>