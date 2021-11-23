<?php
function formSubmit()
{
    if (isset($_POST["btn-reg"])) :
        $nama = $_POST['nama-reg'];
        $email = $_POST['email-reg'];
        $pass = $_POST['pass-reg'];
        $pass_decr = md5($pass);
        $confirm_pass = $_POST['pass-confirm'];

        if ($pass != $confirm_pass) : ?>
            <script>
                alert("Password dan Konfirmasi tidak cocok")
            </script>
        <?php return;
        endif ?>

        <?php include("../config.php");
        $query = mysqli_query($mysqli, "SELECT * FROM users WHERE email='$email'");
        if (mysqli_num_rows($query) != 0) : ?>
            <script>
                alert("Email Terdaftar")
            </script>
        <?php return;
        endif  ?>

        <?php include_once("../config.php");
        $result = $mysqli->query("INSERT INTO users(username, email, password) VALUES ('$nama', '$email', '$pass_decr')");
        var_dump(mysqli_error($mysqli));
        ?>
        <script>
            alert("Pendaftaran Berhasil")
            </script>
            <!-- <?php header("Location: /login") ?> -->
<?php endif;
} ?>

<?php formSubmit() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Register</title>
</head>

<body>

    <main class="main">
        <section class="section2">
            <h1>Register</h1>
            <form class="form" action="" method="POST">
                <input class="input" type="text" name="nama-reg" placeholder="Masukkan Nama">
                <input class="input" type="email" name="email-reg" placeholder="Masukkan Email">
                <input class="input passwd" type="password" name="pass-reg" placeholder="Masukkan Password">
                <input class="input passwd" type="password" name="pass-confirm" placeholder="Masukkan Ulang Password">
                <p>
                    <input class="show-pass" type="checkbox" id="test1" />
                    <label for="test1">Tampilkan Password</label>
                </p>
                <button class="button" type="submit" name="btn-reg">Register</button>
            </form>
        </section>
        <p>Sudah punya akun?
            <a href="/login/">Login</a>
        </p>
    </main>
    <script src="../script.js"></script>
</body>

</html>