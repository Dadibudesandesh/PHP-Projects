<?php
include 'components/conn.php';
if (isset($_POST['title'])) {
    $sql = "CREATE TABLE IF NOT EXISTS USERDATA
        (
            TITLE VARCHAR(20),
            DESCR VARCHAR(100)

        );";
    $conn->query($sql);
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $sql = "INSERT INTO `userdata`(`TITLE`, `DESCR`) VALUES ('$title','$desc');";
    $conn->query($sql);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>CRUD-OPERATION</title>
</head>

<body>
<?php
    include 'components/nav.php';
    ?>

    <form method="post" action="index.php" class="form">
        <legend>Add Daily Notes</legend>
        
            <input type="text" name="title" id="name" required class="input" maxlength="20" placeholder="Note Title">
       
            <label for="mssg"></label>
            <textarea name="desc" id="" cols="90" rows="5" placeholder="Note Description  " maxlength="50" required></textarea>
        
        <p>
            <input type="submit" name="submit" id="Submit" value="ADD" class="btn">
            <input type="reset" value="RESET" class="btn">

        </p>
        </div>
    </form>
</body>

</html>