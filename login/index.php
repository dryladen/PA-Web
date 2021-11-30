<?php require("../config.php");
if (isset($_POST['btn-login'])) :
    $email = mysqli_real_escape_string($mysqli, $_POST['email-login']);
    $passwd = mysqli_real_escape_string($mysqli, $_POST['pass-login']);
    $pass_decr = md5($passwd);

    if ($email != "" && $passwd != "") :

        $query = "SELECT count(*) AS cntUser FROM users WHERE email='$email' AND password='$pass_decr'";
        $result = $mysqli->query($query);
        $row = mysqli_fetch_array($result);
        $count = $row["cntUser"];

        $queryAdmin = "SELECT count(*) AS cntAdmin FROM users WHERE email='$email' AND password='$passwd'";
        $resAdmin = $mysqli->query($queryAdmin);
        $rowAdmin = mysqli_fetch_array($resAdmin);
        $countAdmin = $rowAdmin["cntAdmin"];


        if ($countAdmin == 1 && $email == "admin@mail.com") :
            session_start();
            $_SESSION['email'] = $email;
            header("Location: ../admin");
        elseif ($count > 0) :
            session_start();
            $_SESSION['email'] = $email;
            header("Location: /");
        else :
            $_POST["login"] = "Salah" ?>
            <script>
                alert("Email dan Password tidak cocok ")
            </script>
        <?php endif ?>
    <?php endif ?>
<?php endif ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            display: flex;
            justify-content: center;
            
        }

        form {
            border: 3px solid #f1f1f1;
            width: 600px;
        }

        /* input[type=email],
        input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            border: 1px solid #ccc;
            box-sizing: border-box;
        } */

        button {
            background-color: #04AA6D;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            opacity: 0.8;
        }

        .cancelbtn {
            width: auto;
            padding: 10px 18px;
            background-color: #f44336;
        }

        .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
        }

        img.avatar {
            width: 40%;
            border-radius: 50%;
        }

        .container {
            padding: 16px;
        }

        span.psw {
            float: right;
            padding-top: 16px;
        }

        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
            span.psw {
                display: block;
                float: none;
            }

            .cancelbtn {
                width: 100%;
            }
        }

        h1{
            text-align: center;
            margin-top: 150px;
        }
        a{
            color: cornflowerblue;
        }
    </style>
    <title>Login</title>
</head>

<body>
    <main class="main">
        <h1>Login</h1>
        <form class="form" action="" method="POST">
            <div class="container">
                <label for="email-login"><b>Email</b></label>
                <input class="input" type="email" name="email-login" placeholder="Masukkan Email">
                <label for="pass-login"><b>Password</b></label>
                <input class="input passwd" type="password" name="pass-login" id="pass-login" placeholder="Masukkan Password">
                <label>
                    <input class="show-pass" type="checkbox" />Tampilkan Password
                </label>
            </div>
            <button class="button" type="submit" name="btn-login">Login</button>
        </form>
        <p>Belum punya akun?
            <a href="../register/">Sign Up Here</a>
        </p>
    </main>

    <script src="../script.js"></script>
</body>

</html>