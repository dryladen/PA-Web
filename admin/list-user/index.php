<?php include("../../config.php");

session_start();
if (isset($_POST['logout']) || !isset($_SESSION['email']) && $_SESSION['email'] != "admin@mail.com") {
    session_destroy();
    session_unset();
    header("Location: /login");
}

$users = $mysqli->query("SELECT * FROM users");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css">
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #3f3f3f;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #1e1e1e;
        }

        #customers tr:hover {
            background-color: #2f2f2f;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
    <title>List User</title>
</head>

<body>
    <a href="/admin">Kembali</a> <br>
    <table id="customers">
        <tr>
            <th>Image</th>
            <th>Username</th>
            <th>Email</th>
        </tr>
        <?php while ($user = mysqli_fetch_array($users)) : ?>
            <tr>
                <td><?= $user['image'] ?></td>
                <td><?= $user['username'] ?></td>
                <td><?= $user['email'] ?></td>
            </tr>
        <?php endwhile ?>
    </table>
</body>

</html>