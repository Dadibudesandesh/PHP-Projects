<?php
if (isset($_POST['submit'])) {
    include 'conn.php';

    $table = "CREATE TABLE IF NOT EXISTS feedback (
    name VARCHAR(20) NOT NULL,
    email VARCHAR(35) NOT NULL,
    phone BIGINT(10) NOT NULL,
    mssg TEXT(100) NOT NULL
)";
    $createTable = mysqli_query($conn, $table);
    $name = $_POST['name'];
    $mail = $_POST['email'];
    $phone = $_POST['phone'];
    $mssg = $_POST['mssg'];
    $insertData = "INSERT INTO feedback (name, email, phone,mssg) VALUES ('$name', '$mail', '$phone','$mssg')";
    $result = mysqli_query($conn, $insertData);
    if($result){
        echo"<script> alert('Thanks for give the feedback')</script>";
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    <style>
        body {
            background-image: linear-gradient(rgba(0, 0, 0, 0.65), rgba(0, 0, 0, 0.65)), url(img/homepageimg.jpg);
            height: 100vh;
            background-size: cover;
            background-position: center;
            position: relative;

        }

        form {
            align-items: center;
            justify-content: center;
            display: flex;
            flex-direction: column;
            color: orange;
            max-width: 70%;
            margin-top: 2%;
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
        }
    </style>
</head>

<body>

    <?php
    include 'head.php';
    ?>
    <form name="frmContact" method="post" action="feedback.php">
        <legend>Give Feedback</legend>
        <p>
            <label for="name">Name :</label>
            <input type="text" name="name" id="name" required class="input" maxlength="20">
        </p>
        <p>
            <label for="email">Email :</label>
            <input type="text" name="email" id="email" required class="input" maxlength="30">
        </p>
        <p>
            <label for="phone">Phone :</label>
            <input type="text" name="phone" id="phone" required class="input" maxlength="10">
        </p>
        <p>
            <textarea name="mssg" id="" cols="50" rows="10" required placeholder="Enter your feedback " maxlength="50"></textarea>
        </p>
        <p>
            <input type="submit" name="submit" id="Submit" value="Submit" class="btn">
            <!-- <input type="button" value="BACK" onclick="history.back()" class="btn"> -->

        </p>
    </form>
</body>

</html>