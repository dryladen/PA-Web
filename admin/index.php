<?php include("../config.php");

session_start();
if (isset($_POST['logout']) || !isset($_SESSION['email']) && $_SESSION['email'] != "admin@mail.com") {
    session_destroy();
    session_unset();
    header("Location: /login");
}

$mangas = mysqli_query(
    $mysqli,
    "SELECT mangas.id, mangas.nama as name, mangas.chapter, 
mangas.url_gambar, authors.nama as author, magazines.nama as magazine
from mangas 
inner join authors on mangas.author_id=authors.id 
inner join magazines on mangas.magazine_id=magazines.id"
);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>
        Admin
    </title>
</head>

<body>
    <main class="main">
        <h1>Admin</h1>
        <section class="section2">
            <?php while ($manga = mysqli_fetch_array($mangas)) : ?>
                <div class="list">
                    <img height="100" src="<?= $manga['url_gambar'] ?>" alt="test">
                    <div class="desc">
                        <a target="_blank" href="#">
                            <h3><?= $manga['name'] ?></h3>
                        </a>
                        <div class="not-title">
                            <?php if ($manga['author'] != "Other") : ?>
                                <div>
                                    <span>Author: </span>
                                    <?= $manga['author'] ?>
                                </div>
                            <?php endif ?>
                            <?php if ($manga['magazine'] != "Other") : ?>
                                <div>
                                    <span>Magazine: </span>
                                    <?= $manga['magazine'] ?>
                                </div>
                            <?php endif ?>
                            <div>
                                <span>Total Chapter:</span>
                                <?= $manga['chapter'] ?>
                            </div>
                            <div>
                                <span><a href="/admin/update?id=<?= $manga['id'] ?>">Update</a></span>
                                <span>
                                    <a onclick="return confirm('Yakin Ingin Menghapus?\nData yang telah dihapus tidak dapat dipulihkan')" style="color: red;" href="/admin/delete?id=<?= $manga['id'] ?>">
                                        Delete
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile ?>
        </section>
        <a href="/admin/create/">
            <button class="button">Tambah</button>
        </a>

        <form action="" method="POST" class="form">
            <button style="background-color: red; color: white" class="button" type="submit" value="logut" name="logout">Logout</button>
        </form>

    </main>
</body>

</html>