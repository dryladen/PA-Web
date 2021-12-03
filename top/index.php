<?php require("../config.php");

session_start();
if (isset($_POST['logout']) || !isset($_SESSION['email'])) {
    session_destroy();
    session_unset();
    header("Location: /login");
}

$curr_email = $_SESSION['email'];
$query = mysqli_query($mysqli, "SELECT * FROM users WHERE email='$curr_email'");
$user = mysqli_fetch_array($query);
$id = $user['id'];

$season = 'fall';
$year = 2021;
$q = $_GET['q'];
$types;
if ($q === "anime") {
    $types = $mysqli->query("SELECT * FROM animes ORDER BY score DESC");
} else if ($q === "manga") {
    $types = $mysqli->query("SELECT * FROM mangas ORDER BY score DESC");
} else {
    header("Location: /");
}


if (isset($_POST['btn-submit'])) {
    $fav_id = $_POST['type-id'];

    $insert_fav = $mysqli->query("INSERT INTO fav_${q}s (user_id, ${q}_id) VALUES ($id, $fav_id)");

    if (!$insert_fav) {
        var_dump(mysqli_error($mysqli));
        die;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <title>Your Anime List</title>
</head>

<body>
    <?php include("../component/header.php") ?>
    <main class="container">
        <div class="container">
            <h2>Top <?= ucfirst($q) ?></h2>
            <div class="primary">
                <div class="grid">
                    <?php while ($type = mysqli_fetch_array($types)) : ?>
                        <div id="<?= $type['id'] ?>" class="grid-items">
                            <form action="/top?q=<?= $q ?>#<?= $type['id'] ?>" method="post">
                                <input name="type-id" hidden value="<?= $type['id'] ?>" type="text">
                                <div class="title">
                                    <h3><?= $type['title'] ?></h3>
                                </div>
                                <div class="many-items">
                                    <p style="white-space: nowrap;"><?= $q === "anime" ? $type['studio'] : $type['magazine'] ?></p>
                                    <div><?= $q === "anime" ? $type['episodes'] : $type['chapters'] ?> eps</div>
                                    <?php
                                    $fav_types;
                                    $fav_types = $mysqli->query("SELECT * FROM fav_${q}s WHERE user_id='$id'");
                                    $isAdded = false;
                                    while ($fav_type = mysqli_fetch_array($fav_types)) :
                                        if ($fav_type["${q}_id"] === $type['id']) {
                                            $isAdded = true;
                                            break;
                                        } else {
                                            $isAdded = false;
                                        }
                                    ?>
                                    <?php endwhile;
                                    if ($isAdded) : ?>
                                        <button title="Sudah Ditambahkan" type="submit" class="btn btn-added" disabled name="btn-submit"><i data-feather="check"></i></button>
                                    <?php else : ?>
                                        <button title="Tambahkan ke Favorite" type="submit" class="btn btn-add" name="btn-submit"><i data-feather="plus"></i></button>
                                    <?php endif ?>
                                </div>
                                <div class="many-items">
                                    <div class="genres">
                                        <?php
                                        $type_id = $type['id'];
                                        $genres = $mysqli->query("SELECT id, name, ${q}_id FROM genres WHERE ${q}_id='$type_id'");
                                        while ($genre = mysqli_fetch_array($genres)) : ?>
                                            <div class="genre-item"><?= $genre['name'] ?></div>
                                        <?php endwhile ?>
                                    </div>
                                    <div class="score">
                                        <span data-feather="star"></span> <?= $type['score'] ?>
                                    </div>
                                </div>
                                <div class="detail">
                                    <div class="image">
                                        <img src="<?= $type['image'] ?>" alt="gambar">
                                    </div>
                                    <div class="synopsis">
                                        <span>
                                            <?= nl2br($type['synopsis']) ?>
                                        </span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    <?php endwhile ?>
                </div>
            </div>
        </div>

    </main>
    <script>
        feather.replace()
    </script>
</body>

</html>