<?php
$upload = false;
require ('suggestion.php');
include ('conn.php');
$db = "CREATE DATABASE IF NOT EXISTS warriors";
$createDb = mysqli_query($conn, $db);
$conn->select_db("warriors");
        if (isset($_POST["submit"])) {
            $table = "CREATE TABLE IF NOT EXISTS suggestion (
            name VARCHAR(20) NOT NULL,
            url VARCHAR(35) NOT NULL
            )";
            $conn->query($table);
            $imgName = $_POST["name"];
            $img = $_FILES["img"]["name"];
            $tempName = $_FILES["img"]["tmp_name"];
            $folder = "img/" . $img;
            $insertData = "INSERT INTO suggestion (name, url) VALUES ('$imgName', '$img')";
            $conn->query($insertData);
            if (move_uploaded_file($tempName, $folder)) {
                $upload = true;
            }
        }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />

    <title>Document</title>
    <style>
        body {
            background-color: rgb(59 40 5);
        }

        table {
            width: 70vw;
            flex-direction: row;
            text-align: center;
            color: orange;
            margin: 23px 0px 0px 226px
        }

        img {
            padding: 10px;
        }
    </style>
</head>

<body>
    <header>
        <?php
        include "head.php";
        ?>
        <table cellspacing=0 cellpading=10>
            <tr>
                <th>#</th>
                <th>Worrior Name</th>
                <th>Warrior Image</th>
            </tr>
            <?php
            $sql = "SELECT * FROM SUGGESTION where email='$email' ORDER BY ID";
            $rows = mysqli_query($conn, $sql);
            $sno = 1;
            ?>
            <?php
            foreach ($rows as $row) :
            ?>
                <tr class="data">
                    <td><?php echo $sno++; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><img src="img/<?php echo $row['url']; ?>" alt="" width="100px" height="100"></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </header>
</body>
</html>