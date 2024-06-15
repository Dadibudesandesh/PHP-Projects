<?php
$upload = false;
include 'conn.php';
$db = "CREATE DATABASE IF NOT EXISTS warriors";
$createDb = mysqli_query($conn, $db);
$conn->select_db("warriors");
if (isset($_POST["submit"])) {
    $table = "CREATE TABLE IF NOT EXISTS suggestion (
    name VARCHAR(20) NOT NULL,
    url VARCHAR(35) NOT NULL,
    email varchar(40)
    )";
    $conn->query($table);
    $email=$_POST['email'];
    $imgName = $_POST["name"];
    $url = $_FILES["img"]["name"];
    $tempName = $_FILES["img"]["tmp_name"];
    $folder = "img/" . $url;
    $insertData = "INSERT INTO suggestion (name, url) VALUES ('$imgName', '$url')";
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
    <style>
        form {
            min-width: 50%;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-top: 10px;
            min-height: 100%;
            /* float: left; */
        }

        #img {
            margin-top: 30px;
            margin-bottom: 28px;
            margin-left: 104px;
            /* background: orange; */
            color: orange;
            cursor: pointer;
            border: 1px solid orange;
            border-radius: 10px;
            padding: 5px 10px;
            background: transparent;
        }

        #name,#email {
            width: 500px;
            margin-top: 30px;
            height: 40px;
            outline: none;
            background-color: transparent;
            border: none;
            border: 1px solid orange;
            border-radius: 10px;
            /* margin-left: 85px; */
            font-size: 20px;
            color: orange;
            padding: 0 10px;
        }

        h2 {
            margin-top: 10px;
            font-size: 50px;
            color: white;
        }

        #btn {
            margin-top: 40px;
            border: 1px solid orange;
            padding: 10px 50px;
            border-radius: 10px;
            background-color: transparent;
            color: orange;
            transition: 0.8ms ease;
            cursor: pointer;
        }

        #btn:hover {
            background-color: rgb(134, 89, 5);
            color: rgb(245, 245, 245);
        }
    </style>
    <title>Document</title>
</head>

<body>
    <header>
        <?php
        include "head.php";
        ?>
        <form action="suggestion.php" method="post" enctype="multipart/form-data">
            <div class="container">
                <div class="img">
                    <h2>Upload warrior Image</h2>
                    <input type="file" name="img" id="img" class="img" required />
                  <!-- <?php
                    if (!$upload) {
                        echo "<h3> File not uploaded...! </h3>";
                    } else {
                        $accessData = "SELECT * FROM suggestion where name='$imgName'";
                        $row = mysqli_fetch_assoc($conn->query($accessData));
                        echo "<img src= " . "img/" . $row["url"] . " width=100 height=100>"; 
                    }

                    ?> -->
                </div>
                <div class="name">
                    <h2>Enter Name of Warrior</h2>
                    <input type="text" name="name" id="name" required />
                </div>
                <div class="email">
                    <h2>Enter Your Email</h2>
                    <input type="email" name="email" id="email" required />
                </div>
                <div class="btn">
                    <input type="submit" value="SEND" id="btn" name="submit" />
                </div>
            </div>
        </form>
    </header>
    <?php
    if($upload){
        echo "
        <script>
            alert('Thanks for your suggestion');
            </script>
        ";
    }
    ?>
</body>

</html>