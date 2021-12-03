<?php require("../config.php");

session_start();
if (isset($_POST['logout']) || !isset($_SESSION['email'])) {
    session_destroy();
    session_unset();
    header("Location: /login");
}

// Basic
$curr_email = $_SESSION['email'];
$query = mysqli_query($mysqli, "SELECT * FROM users WHERE email='$curr_email'");
$user = mysqli_fetch_array($query);
$id = $user['id'];
$passlama = $user['password'];
$q = "";


if (isset($_POST["btn-edit"])) {
    $password  = $_POST["pass-lama"];
    $pass_encr = md5($password);
    $passbaru  = $_POST["pass-baru"];
    $confirm   = $_POST["konfir-pass"];
    $passbaru_encr = md5($passbaru);
    if ($pass_encr == $passlama) {
        if ($passbaru == $confirm) {
            $passbaru = password_hash($passbaru, PASSWORD_DEFAULT);
            $query = mysqli_query($mysqli, "UPDATE users SET password='$passbaru_encr' WHERE email='$email'");

            echo "<script>
            alert('Password Berhasil Dirubah');
            </script>";
        } else {
            echo "<script>
            alert('Password Baru dan Konfirmasi Password Tidak Sesuai');
            </script>";
        }
    } else {
        echo "<script>
        alert('Password Awal Tidak Sesuai');
        </script>";
    }
    $_POST = array();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Password</title>
    <link rel="stylesheet" href="../style.css">
    <style>
        button {
            background-color: #04AA6D;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }
    </style>
</head>

<body>
    <?php include("../component/header.php") ?>
    <div class="container">
        <form action="" method="post">
            <label for="pass-lama">Password Awal</label>
            <input class="input passwd" type="password" name="pass-lama" placeholder="Masukkan Password Awal" id="test1">
            <label for="pass-baru">Password Baru</label>
            <input class="input passwd" type="password" name="pass-baru" placeholder="Masukkan Password Baru" id="test1">
            <label for="konfir-pass">Konfirmasi Password</label>
            <input class="input passwd" type="password" name="konfir-pass" placeholder="Masukkan Ulang Password" id="test1">
            <p>
                <input class="show-pass" type="checkbox" id="test1" />
                <label for="test1">Tampilkan Password</label>
            </p>
            <button class="buton" type="submit" name="btn-edit">Edit</button>
        </form>
    </div>
</body>

</html>