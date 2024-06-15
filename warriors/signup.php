<?php
if (isset($_POST['submit'])) {
    include 'conn.php';
    $sql = "CREATE TABLE IF NOT EXISTS REGISTER (
userId INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(20), password VARCHAR(10),
email VARCHAR(35), mobile BIGINT(10), address VARCHAR(100) )";
    $createTable = mysqli_query($conn, $sql);
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $add = $_POST['add'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "INSERT INTO `register`(`name`, `password`, `email`, `mobile`, `address`)
VALUES ('$name','$password','$email','$phone','$add');";
    $result = mysqli_query($conn, $sql);
    $conn->close();
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

        a:hover {
            color: white;
        }
    </style>
</head>

<body>
    <header>
        <form name="frmContact" method="post" action="signup.php">
            <legend>SignUp</legend>
            <p>
                <label for="name">Name :</label>
                <input type="text" name="name" id="name" required class="input" maxlength="20" />
            </p>
            <p>
                <label for="email">Email :</label>
                <input type="text" name="email" id="email" required class="input" maxlength="30" />
            </p>
            <p>
                <label for="phone">Phone :</label>
                <input type="text" name="phone" id="phone" required class="input" maxlength="10" />
            </p>
            <p>
                <label for="add">Address :</label>
                <input type="text" name="add" id="add" required class="input" maxlength="100" />
            </p>

            <p>
                <label for="password">password :</label>
                <input type="password" name="password" id="password" required class="input" maxlength="10" />
            </p>

            <p>
                <input type="submit" name="submit" id="registerBtn" value="Submit" class="btn" />
                <button type="button" id="loginBtn" name="login" class="btn">
                    <a href="login.php" class="p-2">Login</a>
                </button>
                <!-- <input type="button" value="BACK" onclick="history.back()" class="btn"> -->
            </p>
        </form>
    </header>
</body>

</html>