<?php
require("../../config.php");

?>
<?php
if (isset($_GET)) :
    $type = $_GET["type"];
    $page = $_GET["page"];
    $subtype = $_GET["subtype"];
    $json_data = file_get_contents("https://api.jikan.moe/v3/top/$type/$page/$subtype");
    $response_data = json_decode($json_data);
    if ($type === "people") {
        $type = "author";
    }
?>
<?php endif ?>

<?php
// ! Top Anime and Manga
if (isset($_POST["add-from-api"])) {
    $title = $_POST['title'];
    $image = $_POST['image'];

    if ($type === "author") {
        $query = $mysqli->query("INSERT INTO authors (name, image) VALUES ('$title', '$image')");

    } elseif ($type === "anime") {
        $synopsis = "";
        $score = $_POST["score"];
        $season = "";
        $episodes = $_POST["episodes"];
        $studio = "";
        $year = "";
        $query = $mysqli->query("INSERT INTO animes (title, image, episodes, score) VALUES ('$title', '$image', '$episodes', '$score')");
    } elseif ($type === "manga") {
        $synopsis = "";
        $score = $_POST["score"];
        $season = "";
        $volumes = $_POST['volumes'];
        $magazine = "";
        $query = $mysqli->query("INSERT INTO mangas (title, image, volumes, score, magazine, synopsis)
        VALUES ('$title', '$image', '$volumes', '$score', '$magazine', '$synopsis')");
        var_dump(mysqli_error($mysqli));
    } 

    $_POST = array();
    // header("Location: /admin/add-from-api?type=$type&page=$page&subtype=$subtype");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css">
    <title>Add From API</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .tombol{
            display: flex;
            flex-wrap: wrap;
        }
        .tombol button{
            margin-left: 8px;
        }
        .container2{
            padding: 16px;
            width: 100%;
            border: 3px solid #f1f1f1;
        }
        .grid-items{
            background-color: #1e1e1e;
            padding: 2px 10px;
            min-height: 720px;
        }
        .grid-items img{
            padding-top: 8px;
            width: 250px;
            height: 350px;
        }
        footer{
            width: 100%;
        }
        a{
            color: cornflowerblue;
        }
        header{
            width: 100%;
        }

    </style>
</head>

<body>
    <?php include("../../component/header-admin.php") ?>
    <div class="container2">
        <a href="../../admin">Kembali</a>
        <div class="tombol">
            <a href="../../admin/add-from-api?type=anime&page=1&subtype=tv">
                <button class="button">Top Anime</button>
            </a>
            <a href="../../admin/add-from-api?type=manga&page=1&subtype=manga">
                <button class="button">Top Manga</button>
            </a>
            <a href="../../admin/add-from-api?type=people&page=1&subtype=">
                <button class="button">Top People</button>
            </a>
        </div>
        <div class="grid">
            <?php foreach ($response_data->top as $response) :
            ?>
            <div style="margin-bottom: 40px">
                <div class="grid-items"> 
                    <form action="" method="post">
                        <img type="text" name="img" src="<?= $response->image_url ?>" alt="gambar">
                        <input name="image" type="text" hidden value="<?= $response->image_url ?>">
                        <h4>Nama</h4>
                        <p><?= $response->title ?></p>
                        <input type="text" name="title" hidden value="<?= $response->title ?>">
                        <?php if ($type !== "author") : ?>
                            <?php if ($type === "anime") : ?>
                                <h5>Episodes</h5>
                                <p nama="episodes"><?= $response->episodes ?></p>
                                <input type="text" name="episodes" hidden value="<?= $response->episodes ?>">
                            <?php elseif ($type === "manga") : ?>
                                <h5>Volumes</h5>
                                <p nama="volumes"><?= $response->volumes ?></p>
                                <input type="text" name="volumes" hidden value="<?= $response->volumes == null ? 0 : $response->volumes ?>">
                            <?php endif ?>
                            <h5>Score</h5>
                            <p name="score"><?= $response->score ?></p>
                            <input type="text" name="score" hidden value="<?= $response->score ?>">

                        <?php endif ?>
                        <?php
                        $col = $type === "author" ? "name" : "title";
                        $titles = $mysqli->query("SELECT $col FROM ${type}s");
                        $isAdded = false;
                        while ($title = mysqli_fetch_array($titles)) :
                        ?>
                            <?php if ($title[$col] == $response->title) :
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
            </div>
            <?php endforeach ?>
        </div>
    </div>
    <?php include("../../component/footer.html") ?>
</body>

</html>