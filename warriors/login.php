<?php
if (isset($_POST['email'])) {
    require 'conn.php';
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT `password`, `email` FROM `register` WHERE email= '$email' and password='$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        session_start();
        $_SESSION['useremail'] = $email;
        $_SESSION['userpass'] = $password;
        header('location:home.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        header {
            background-image: linear-gradient(rgba(0, 0, 0, 0.65),
                    rgba(0, 0, 0, 0.65)),
                url(img/homepageimg.jpg);
            height: 100vh;
            background-size: cover;
            background-position: center;
            position: relative;
            color: orange;
        }

        form {
            align-items: center;
            justify-content: center;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            gap: 10px;
        }

        a {
            text-decoration: none;
            color: orange;
            font-weight: 700;
        }

        .input {
            background: transparent;
            border: none;
            border-bottom: 2px solid orange;
            width: 500px;
            color: orange;
            outline: none;
            padding: 5px 3px;
            font-size: large;
            margin-left: 5px;
        }

        textarea {
            background: transparent;
            border: none;
            border: 2px solid orange;
            width: 500px;
            color: orange;
            outline: none;
            padding: 10px;
            margin-top: 30px;
        }

        .btn {
            padding: 10px 51px;
            border-radius: 20px;
            margin-top: 10px;
            border: 2px solid orange;
            background: transparent;
            color: orange;
            transition: 0.8ms ease;
            cursor: pointer;
        }

        .btn:hover {
            background-color: rgb(134, 89, 5);
            color: white;
        }

        legend {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        label {
            cursor: pointer;
            font-weight: 10px;
            font-size: 20px;
            letter-spacing: 1px;

        }
        a:hover{
            color: white;
        }
    </style>
</head>

<body>
    <header>
        <form name="frmContact" method="post" action="login.php">
            <legend>Login</legend>

            <p>
                <label for="email">Email :</label>
                <input type="text" name="email" id="email" required class="input" maxlength="30" />
            </p>
            <p>
                <label for="password">password :</label>
                <input type="password" name="password" id="password" required class="input" maxlength="10" />
            </p>

            <p>
                <input type="submit" name="submit" id="registerBtn" value="Submit" class="btn" />
                <button type="button" id="loginBtn" name="login" class="btn">
                    <a href="signup.php" class="p-2">SignUp</a>
                </button>
                <!-- <input type="button" value="BACK" onclick="history.back()" class="btn"> -->
            </p>
        </form>
    </header>
</body>

</html>