<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css">
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
        }

        form {
            align-items: center;
            justify-content: center;
            display: flex;
            flex-direction: row;
            gap: 10px;
        }

       .btn {
            padding: 20px 30px;
            border-radius: 10px;
            background-color: transparent;
            border: 1px solid orange;
            cursor: pointer;
        }
        .btn:hover{
            background-color: rgb(134, 89, 5);
        }

        a {
            text-decoration: none;
            color: orange;
            font-weight: 700;
            font-size: 20px;
            padding: 20px 30px;
        }
        a:hover{
            color: white;
        }
        h1
        {
            align-items: center;
            justify-content: center;
            display: flex;
            min-height: 70vh;
            font-weight: 20px;
            color: orange;
            font-size: 90px;
        }
    </style>
</head>

<body>
    <header>
        <h1>
        “Never bend your head always hold it high.” 
        </h1>
        <form action="" method="post">
            <button type="submit" id="loginBtn" name="login" class="btn">
                <a href="login.php" >Login</a>
            </button>
            <button type="submit" id="registerBtn" name="SignUp" class="btn">
                <a href="signup.php">SignUp</a>
            </button>
        </form>
    </header>
</body>

</html>