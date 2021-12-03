<?php
include("../../config.php");
session_start();
$file = file_get_contents("../data.json");
$json = json_decode($file);
if (!isset($_SESSION['email']) && $_SESSION['email'] != "admin@mail.com") {
    session_destroy();
    session_unset();
    header("Location: /login");
}
$id = $_GET['id'];
if (isset($_GET['id'])) {
    $authors = $mysqli->query("SELECT * FROM authors WHERE id='$id'");
    $author = mysqli_fetch_array($authors);
    if (!$authors) {
        die;
    }
}

if (isset($_POST['submit-author'])) {
    $nama = $_POST['nama-author'];
    $image = $_POST['url-img-author'];
    $update = $mysqli->query("UPDATE authors
    SET name='$nama',image='$image' WHERE id='$id'");
    header("Location: /admin");
}

if (isset($_POST['delete'])) {
    $deleteAuthor = $mysqli->query("DELETE FROM authors WHERE id='$id'");
    header("Location: /admin");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css">
    <title>Update</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        main {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .container {
            padding: 16px;
            border: 3px solid #f1f1f1;
            width: 82%;
        }

        form {
            width: 100%;
        }

        button {
            background-color: #04AA6D;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        .select {
            display: block;
            width: 50%;
            border: 1px solid cornflowerblue;
            box-sizing: border-box;
        }

        .sinopsis {
            display: block;
            border: 1px solid cornflowerblue;
            box-sizing: border-box;
            max-width: 100%;
            max-height: 400px;
            min-width: 50%;
            min-height: 250px;
        }

        input[type=text],
        input[type=number],
        input[type=url] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            border: 1px solid cornflowerblue;
            box-sizing: border-box;
        }

        a {
            color: cornflowerblue;
        }
    </style>
</head>

<body>
    <?php include("../../component/header-admin.php") ?>
    <main class="main">
        <div class="container">
            <a href="../../admin">Beranda</a>
            <form method="POST" action="/admin/update-authors?id=<?= $id ?>" class="form">
                <label>Nama Author</label>
                <input class="input" type="text" name="nama-author" value="<?= $author['name'] ?>"">
                <label>URL Gambar</label>
                <input class=" input" type="url" name="url-img-author" value="<?= $author['image'] ?>">
                <button class="button" name="submit-author" type="submit">Update</button>
            </form>
            <form action="/admin/update-authors?id=<?= $id ?>" method="POST" class="form">
            <?php $check = $mysqli->query("SELECT anime_id FROM fav_animes WHERE anime_id=$id");
            if (mysqli_num_rows($check) > 0) : ?>
                <button disable class="btn btn-danger" type="submit" value="delete">
                    Tidak dapat dihapus. Seseorang sudah menambahkan ke favorite</button>
            <?php else : ?>
                <button style="background-color: red; color: white" onclick="return confirm('Yakin Ingin menghapus data?')" class="button" type="submit" value="delete" name="delete">Hapus Data</button>
            <?php endif ?>
        </form>
        </div>
    </main>
</body>
<?php include("../../component/footer.html") ?>

</html>