<?php
require("../../config.php");
?>

<?php
if (isset($_GET)) {
    $year = $_GET["year"];
    $season = $_GET["season"];
    $json_data = file_get_contents("https://api.jikan.moe/v3/season/$year/$season");
    $response_data = json_decode($json_data);
}
if (isset($_POST['add-from-api'])) {
    $title = $_POST['title'];
    $image = mysqli_real_escape_string($mysqli, $_POST['image']);
    $synopsis = mysqli_real_escape_string($mysqli, $_POST['synopsis']);
    $episodes = $_POST['episodes'] == '' ? "NULL" : $_POST['episodes'];
    $score = $_POST['score'] == '' ? "NULL" : $_POST['score'];
    $studio = mysqli_real_escape_string($mysqli, $_POST['studio']);
    $genres = $_POST['genres'];
    $year = $_GET["year"];
    $season = $_GET["season"];
    $season = ucfirst($season);

    $insert = $mysqli->query("INSERT INTO animes (title, image, synopsis, episodes, score, season, year, studio)
                            VALUES ('$title', '$image', '$synopsis', $episodes, $score, '$season', '$year', '$studio')");
    if (!$insert) {
        var_dump(mysqli_error($mysqli));
        die;
    }
    // Get ID of anime that recently being added
    $getId = mysqli_fetch_array($mysqli->query("SELECT id FROM animes WHERE title='$title'"));
    $id = $getId['id'];

    foreach ($genres as $genre) {
        // var_dump($genre);
        $genre = mysqli_real_escape_string($mysqli, $genre);
        $insert_genre = $mysqli->query("INSERT INTO genres (name, anime_id) VALUES ('$genre', '$id')");
    }
    $_POST = array();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="../../style.css">
    <title>Seasonal</title>
</head>

<body>
    <div class="container">
        <a href="../../admin">Kembali</a>
        <div class="grid">
            <?php foreach ($response_data->anime as $response) : ?>
                <div id="<?= $response->mal_id ?>" class="grid-items">
                    <form action="/admin/add-top-season-api?year=<?= $year ?>&season=<?= strtolower($season) ?>#<?= $response->mal_id ?>" method="post">
                        <input name="title" value="<?= $response->title ?>" hidden alt="gambar" type="text">
                        <div class="title">
                            <h3><?= $response->title ?></h3>
                        </div>
                        <div class="many-items">
                            <!-- Studio -->
                            <input type="text" name="studio" hidden value="<?= $response->producers[0]->name ?>">
                            <p><?= $response->producers[0]->name ?></p>
                            <!-- Episode -->
                            <input type="text" name="episodes" hidden value="<?= $response->episodes ?>">
                            <div><?= $response->episodes ?> eps</div>
                            <?php
                            $titles = $mysqli->query("SELECT title FROM animes");
                            $isAdded = false;
                            while ($title = mysqli_fetch_array($titles)) :
                            ?>
                                <?php if ($title['title'] == $response->title) :
                                    $isAdded = true;
                                    break;
                                ?>
                                <?php else :
                                    $isAdded = false;
                                ?>
                                <?php endif ?>
                            <?php endwhile ?>
                            <?php if (!$isAdded) : ?>
                                <button title="Tambahkan" type="submit" class="btn btn-add" name="add-from-api"><i data-feather="plus"></i></button>
                            <?php else : ?>
                                <button title="Sudah Ditambahkan" type="submit" class="btn btn-added" disabled name="btn-submit"><i data-feather="check"></i></button>
                            <?php endif ?>
                        </div>
                        <div class="many-items">
                            <div class="genres">
                                <!-- Genre -->
                                <?php foreach ($response->genres as $genre) : ?>
                                    <input value="<?= $genre->name ?>" checked hidden type="checkbox" name="genres[]">
                                    <div class="genre-item"><?= $genre->name ?></div>
                                <?php endforeach ?>
                            </div>
                            <div class="score">
                                <input type="text" name="score" hidden value="<?= $response->score ?>">
                                <span data-feather="star"></span> <?= $response->score ?>
                            </div>
                        </div>
                        <div class="detail">
                            <div class="image">
                                <input name="image" type="text" hidden value="<?= $response->image_url ?>">
                                <img src="<?= $response->image_url ?>" alt="gambar">
                            </div>
                            <div class="synopsis">
                                <textarea hidden name="synopsis">
                                <?= $response->synopsis ?>
                            </textarea>
                                <span>
                                    <?= nl2br($response->synopsis) ?>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
            <?php endforeach ?>
        </div>
        <?php foreach ($response_data->anime as $response) : ?>

        <?php endforeach ?>
    </div>
    <script>
        feather.replace()
    </script>
</body>

</html>