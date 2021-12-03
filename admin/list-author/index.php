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
        <h2 class="header2 center">Author</h2>
        <div class="grid">
            <?php while ($author = mysqli_fetch_array($authors)) : ?>
                <div class="card">
                    <img src="<?= $author["image"] ?>" alt="gambar">
                    <div class="description">
                        <h3>
                            <a href="../admin/update-authors?id=<?= $author["id"] ?>">
                                <?= $author["name"] ?>
                            </a>
                        </h3>
                    </div>
                </div>
            <?php endwhile ?>
            </div>
    </main>
    <script>
        feather.replace()
    </script>
    <?php include("../../component/footer.html") ?>
</body>

</html>