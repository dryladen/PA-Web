<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Login</title>
</head>

<body>
    <main class="main">
        <section class="section2">
            <h1>Login</h1>
            <form class="form" action="" method="POST">
                <input class="input" type="email" name="email-login" placeholder="Masukkan Email">
                <input class="input passwd" type="password" name="pass-login" id="pass-login" placeholder="Masukkan Password">
                <p>
                    <input class="show-pass" type="checkbox" id="test1" />
                    <label for="test1">Tampilkan Password</label>
                </p>
                <button class="button" type="submit" name="btn-login">Login</button>
            </form>
        </section>
        <p>Belum punya akun?
            <a href="/register/">Sign Up</a>
        </p>
    </main>
    <?php require("../config.php");
    if (isset($_POST['btn-login'])) :
        $email = mysqli_real_escape_string($mysqli, $_POST['email-login']);
        $passwd = mysqli_real_escape_string($mysqli, $_POST['pass-login']);
        $pass_decr = md5($passwd);

        if ($email != "" && $passwd != "") :

            $query = "SELECT count(*) AS cntUser FROM users WHERE email='$email' AND password='$pass_decr'";
            $result = mysqli_query($mysqli, $query);
            $row = mysqli_fetch_array($result);
            $count = $row["cntUser"];

            var_dump($count);
            var_dump($email);

            if ($count > 0 && $email == "admin@mail.com") :
                session_start();
                $_SESSION['email'] = $email;
                header("Location: /admin");
            elseif ($count > 0) :
                session_start();
                $_SESSION['email'] = $email;
                header("Location: /");
            else :
                $_POST["login"] = "Salah" ?>
                <script>
                    alert("Email dan Password tidak cocok")
                </script>
            <?php endif ?>
        <?php endif ?>
    <?php endif ?>

    <script src="../script.js"></script>
</body>

</html>