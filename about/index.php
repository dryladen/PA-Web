<?php
require("../config.php");

session_start();

$curr_email = $_SESSION['email'];
$query = $mysqli->query("SELECT * FROM users WHERE email='$curr_email'");
$user = mysqli_fetch_array($query);
$id = $user['id'];
$q = "about";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link rel="stylesheet" href="../style.css">
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            /* width: 70%; */
        }

        .content-about {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            width: 60%;
        }

        a {
            color: white;
        }

        table {
            width: 60%;
        }

        table td {
            width: 50%;
        }
    </style>
</head>

<body class="body-about">
    <?php include("../component/header.php") ?>
    <div class="container">
        <div class="content-about">
            <h1>OurAnimeList</h1>
            <p>
                Website ini merupakan sebuah website yang menyediakan berbagai list Anime
                seperti anime yang sedang tayang dimusim ini, musim akan datang, dan musim sebelumnya.
                Dalam website ini juga para user dapat menjadikan beberapa anime sebagai anime favorit
                dan juga dapat melakukan penilaian terhadap anime tersebut.
            </p>
        </div>
        <table>
            <tr>
                <td>LADEN</td>
                <td>YOGA</td>
                <td>IPAN</td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <h2>
                        CONTACT
                    </h2>
                </td>
                <td></td>
            </tr>
            <tr>
                <td><a href="https://instagram.com/dryladen_?utm_medium=copy_link">@dryladen_</a></td>
                <td><a href="https://instagram.com/yogatra29?utm_medium=copy_link">@yogatra29</a></td>
                <td><a href="https://instagram.com/muhammadirvaan_?utm_medium=copy_link">@muhammadirvaan_</a></td>
                </td>
            </tr>
        </table>
    </div>
    <?php include("../component/footer.html") ?>
</body>

</html>