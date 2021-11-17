<?php include("../config.php");

session_start();
if (isset($_POST['logout']) || !isset($_SESSION['email']) && $_SESSION['email'] != "admin@mail.com") {
    session_destroy();
    session_unset();
    header("Location: /login");
}

// $mangas = mysqli_query(
//     $mysqli,
//     "SELECT mangas.id, mangas.nama as name, mangas.chapter, 
// mangas.url_gambar, authors.nama as author, magazines.nama as magazine
// from mangas 
// inner join authors on mangas.author_id=authors.id 
// inner join magazines on mangas.magazine_id=magazines.id
// order by mangas.nama"
// );
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
        </section>
        <a href="/admin/create/">
            <button class="button">Tambah</button>
        </a>
        <a href="/admin/add-from-api?page=1&subtype=tv">
            <button class="button">Tambah dari API</button>
        </a>

        <form action="" method="POST" class="form">
            <button style="background-color: red; color: white" class="button" type="submit" value="logut" name="logout">Logout</button>
        </form>

    </main>
</body>

</html>