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
    $score = $_POST['score'];
    $studio = mysqli_real_escape_string($mysqli, $_POST['studio']);
    $genres = $_POST['genres'];
    $year = $_GET["year"];
    $season = $_GET["season"];
    $season = ucfirst($season);

    $insert = $mysqli->query("INSERT INTO animes (title, image, synopsis, episodes, score, season, year, studio)
                            VALUES ('$title', '$image', '$synopsis', $episodes, $score, '$season', '$year', '$studio')");
    // var_dump(mysqli_error($mysqli));

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
    <link rel="stylesheet" href="../../style.css">
    <title>Seasonal</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .container{
            padding: 16px;
            width: 80%;
            border: 3px solid #f1f1f1;
        }
        .konten{
            display: flex;
            flex-wrap: warp;
            width: 100px;
        }
        a{
            color: cornflowerblue;
        }
    </style>
</head>

<body>
    <div class="container">
        <a href="../../admin">Kembali</a>
        <?php foreach ($response_data->anime as $response) : ?>
            <div style="margin-bottom: 40px">
                <form id="<?= $response->mal_id ?>" action="/admin/add-top-season-api?year=<?= $year ?>&season=<?= strtolower($season) ?>#<?= $response->mal_id ?>" method="POST">
                    <img type="text" name="img" src="<?= $response->image_url ?>" alt="gambar">
                    <input name="image" type="text" hidden value="<?= $response->image_url ?>">
                    <h4>Nama</h4>
                    <p><?= $response->title ?></p>
                    <input type="text" name="title" hidden value="<?= $response->title ?>">
                    <h5>Sinopsis</h5>
                    <p><?= nl2br($response->synopsis) ?></p>
                    <textarea hidden name="synopsis">
                        <?= $response->synopsis ?>
                    </textarea>
                    <h5>Episodes</h5>
                    <p nama="episodes"><?= $response->episodes ?></p>
                    <input type="text" name="episodes" hidden value="<?= $response->episodes ?>">
                    <h5>Score</h5>
                    <p name="score"><?= $response->score ?></p>
                    <input type="text" name="score" hidden value="<?= $response->score ?>">
                    <h5>Studio</h5>
                    <p><?= $response->producers[0]->name ?></p>
                    <input type="text" name="studio" hidden value="<?= $response->producers[0]->name ?>">
                    <h5>Genre</h5>
                    <?php foreach ($response->genres as $genre) : ?>
                        <span><?= $genre->name ?></span>
                        <input value="<?= $genre->name ?>" checked hidden type="checkbox" name="genres[]">
                    <?php endforeach ?>
                    <p></p>
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
                        <button type="submit" name="add-from-api" class="button">Tambahkan</button>
                    <?php else : ?>
                        <button disabled class="button">Sudah Ditambahkan</button>
                        
                    <?php endif ?>
                </form>
            </div>
        <?php endforeach ?>
    </div>
</body>

</html>