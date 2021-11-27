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
            <!-- <?php header("Location: ../login") ?> -->
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
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        form {
            border: 3px solid #f1f1f1;
            width: 600px;
        }
        input[type=email],
        input[type=text],
        input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 20px 0px;
            border: 1px solid #ccc;
            box-sizing: border-box;
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
        .container {
            padding: 16px;
        }
        h1{
            text-align: center;
        }
        a{
            color: cornflowerblue;
        }

    </style>
</head>

<body>

    <main class="main">
        <section class="section2">
            <h1>Register</h1>
            <form class="form" action="" method="POST">
                <div class="container">
                    <label for="nama-reg"><b>Username</b></label>
                    <input class="input" type="text" name="nama-reg" placeholder="Masukkan Nama">
                    <label for="email-reg"><b>Email</b></label>
                    <input class="input" type="email" name="email-reg" placeholder="Masukkan Email">
                    <label for="pass-reg"><b>Password</b></label>
                    <input class="input" type="password" name="pass-reg" placeholder="Masukkan Password">
                    <label for="pass-confirm"><b>Confirmation Password</b></label>
                    <input class="input" type="password" name="pass-confirm" placeholder="Masukkan Ulang Password">
                    <p>
                        <input class="show-pass" type="checkbox" id="test1" />
                        <label for="test1">Tampilkan Password</label>
                    </p>
                    <button class="button" type="submit" name="btn-reg">Register</button>
                </div>
            </form>
            <p>Sudah punya akun?
                <a href="../login/">Login</a>
            </p>
        </section>
    </main>
    <script src="../script.js"></script>
</body>

</html>