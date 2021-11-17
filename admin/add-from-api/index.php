<?php
require("../../config.php");

?>
<?php if (isset($_GET)) :
    $page = $_GET["page"];
    $subtype = $_GET["subtype"];
    $json_data = file_get_contents("https://api.jikan.moe/v3/top/anime/$page/$subtype");
    $response_data = json_decode($json_data);
?>
<?php endif ?>


<?php if (isset($_POST["add-from-api"])) {
    $title = $_POST['title'];
    $image = $_POST['image'];
    $synopsis = "";
    $episodes = $_POST["episodes"];
    $score = $_POST["score"];
    $season = "";
    $year = "";
    $studio = "";

    $query = $mysqli->query("INSERT INTO animes (title, image, episodes, score) VALUES ('$title', '$image', '$episodes', '$score')");

    $_POST = array();
    header("Location: /admin/add-from-api/page=$page&subtype=$subtype");
}

?>
<?php
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css">
    <title>Add From API</title>
</head>

<body>
    <a href="/admin">Kembali</a>
    <?php foreach ($response_data->top as $response) :
    ?>
        <div style="margin-bottom: 40px">
            <form action="" method="post">
                <img type="text" name="img" src="<?= $response->image_url ?>" alt="gambar">
                <input name="image" type="text" hidden value="<?= $response->image_url ?>">
                <h4>Judul</h4>
                <p><?= $response->title ?></p>
                <input type="text" name="title" hidden value="<?= $response->title ?>">
                <h5>Episodes</h5>
                <p nama="episodes"><?= $response->episodes ?></p>
                <input type="text" name="episodes" hidden value="<?= $response->episodes ?>">
                <h5>Score</h5>
                <p name="score"><?= $response->score ?></p>
                <input type="text" name="score" hidden value="<?= $response->score ?>">
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
</body>

</html>