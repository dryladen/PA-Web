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

$curr_email = $_SESSION['email'];

$season = 'fall';
$year = 2021;
$animes = $mysqli->query("SELECT * FROM animes WHERE season='$season' AND year=$year");
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
        <h1>Halo, <?= $user['username'] ?></h1>
        <section class="section2">
            <?php while ($anime = mysqli_fetch_array($animes)) : ?>
                <img width="100" src="<?= $anime['image'] ?>" alt="gambar">
                <h3><?= $anime['title'] ?></h3>
            <?php endwhile ?>

        </section>
        <!-- <button class="button">Favorite</button> -->

        <form action="" method="POST" class="form">
            <button style="background-color: red; color: white" class="button" type="submit" value="logut" name="logout">Logout</button>
        </form>

    </main>
</body>

</html>