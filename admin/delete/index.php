
<?php
include("../../config.php");

if (!isset($_SESSION['email']) && $_SESSION['email'] != "admin@mail.com") {
    session_destroy();
    session_unset();
    header("Location: /login");
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete = mysqli_query($mysqli, "DELETE FROM mangas WHERE id = $id");

    header('Location: /');
}

?>