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
$sql = "SELECT * FROM `userdata`";
$result = $conn->query($sql);

// if(isset($_POST['']))
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="notes.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>CRUD-OPERATION</title>
</head>

<body>
    <?php include "components/nav.php" ?>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">S.NO</th>
                    <th scope="col">TITLE</th>
                    <th scope="col">DESCRIPTION</th>
                    <th scope="col">DATE</th>
                    <th scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "
                        <tr>
                            <th scope='row'>" . $row['s.no'] . "</th>
                            <td>" . $row['TITLE'] . "</td>
                            <td>" . $row['DESCR'] . "</td>
                            <td>" . $row['date'] . "</td>
                            <td>
                            <input type='button' value='Delete' id='Dbtn' name='delete' class='btn'>
                            <input type='button' value='Edit' id='Ebtn' name='edit' class='btn'>
                            </td>
                        </tr>
                    ";
                } ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
        const BtnDelete=document.querySelector("#Dbtn");
        // const BtnEdit=document.querySelector("#Ebtn");
        BtnDelete.addEventListener("click",()=>{
           perent=BtnDelete.parentElement;
            perentEle=perent.parentElement;
            console.log(perentEle);
            perentEle.remove();
        });
    </script>
</body>

</html>