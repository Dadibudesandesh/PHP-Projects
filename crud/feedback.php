<?php
include 'components/conn.php';
if (isset($_POST['submit'])) {
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
    <title>Feedback</title>

</head>

<body>

<?php
    include 'components/nav.php';
    ?>
    <form name="frmContact" method="post" action="feedback.php">
        <legend>Give Feedback</legend>
        <p>
            <label for="name">Name : </label>
            <input type="text" name="name" id="name" required class="input" maxlength="20">
        </p>
        <p>
            <label for="email">Email : </label>
            <input type="text" name="email" id="email" required class="input" maxlength="30">
        </p>
        <p>
            <label for="phone">Phone : </label>
            <input type="text" name="phone" id="phone" required class="input" maxlength="10">
        </p>
        <p>
            <textarea name="mssg"  placeholder="Enter your feedback " maxlength="50" require></textarea>
        </p>
        <p>
            <input type="submit" name="submit" id="Submit" value="Submit" class="btn">
            <!-- <input type="button" value="BACK" onclick="history.back()" class="btn"> -->

        </p>
    </form>
</body>

</html>