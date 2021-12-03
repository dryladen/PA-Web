<?php include("../../config.php");

session_start();
if (isset($_POST['logout']) || !isset($_SESSION['email']) && $_SESSION['email'] != "admin@mail.com") {
    session_destroy();
    session_unset();
    header("Location: /login");
}

$animes = $mysqli->query("SELECT * FROM animes ORDER BY score DESC");
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
        <a href="../admin/list-manga">
            <button class="button">List Manga</button>
        </a>
        <form action="" method="POST" class="form">
            <button style="background-color: red; color: white" class="button" type="submit" value="logut" name="logout">Logout</button>
        </form>

        <h2 class="header2">Author</h2>
        <?php while ($author = mysqli_fetch_array($authors)) : ?>
            <div class="card">
                <img src="<?= $author["image"] ?>" alt="gambar">
                <div class="description">
                    <h3>
                        <a href="../admin/update-anime?id=<?= $author["id"] ?>">
                            <?= $author["name"] ?>
                        </a>
                    </h3>
                </div>
            </div>
        <?php endwhile ?>
    </main>
    <script>
        feather.replace()
    </script>
</body>

</html>