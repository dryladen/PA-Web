<?php require("../config.php");

session_start();

$curr_email = $_SESSION['email'];
$query = $mysqli->query("SELECT * FROM users WHERE email='$curr_email'");
$user = mysqli_fetch_array($query);
$id = $user['id'];

$fav_animes = $mysqli->query("SELECT animes.*, fav_animes.id FROM fav_animes INNER JOIN animes ON 
fav_animes.anime_id=animes.id WHERE fav_animes.user_id=$id ORDER BY animes.title");

if (isset($_POST['btn-submit'])) {
    $fav_id = $_POST['fav_anime-id'];

    $del = $mysqli->query("DELETE FROM fav_animes WHERE id='$fav_id'");
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
    <style>
        /* Style the tab */
        .tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
        }

        /* Style the buttons that are used to open the tab content */
        .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: #ddd;
        }

        /* Create an active/current tablink class */
        .tab button.active {
            background-color: #ccc;
        }

        /* Style the tab content */
        .tabcontent {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
        }
    </style>
</head>

<body>
    <a href="/">Kembali</a>
    <div>
        <a href="/profile/favorite-anime">Anime List</a>
    </div>
    <!-- Tab links -->
    <div class="tab">
        <button class="tablinks active" onclick="openCity(event, 'London')">Favorite Anime</button>
        <button class="tablinks" onclick="openCity(event, 'Paris')">Favorite Manga</button>
        <button class="tablinks" onclick="openCity(event, 'Tokyo')">Profile</button>
    </div>

    <!-- Tab content -->
    <div id="London" class="tabcontent active" style="display: block;">
        <div class="grid">
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
                            <button title="Hapus" onclick="return confirm('Yakin?')" type="submit" class="btn btn-danger" name="btn-submit"><i data-feather="trash-2"></i></button>
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

    <div id="Paris" class="tabcontent">
        <h3>Paris</h3>
        <p>Paris is the capital of France.</p>
    </div>

    <div id="Tokyo" class="tabcontent">
        <h3>Tokyo</h3>
        <p>Tokyo is the capital of Japan.</p>
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
</body>

</html>