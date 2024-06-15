<?php
include 'components/conn.php';
if (isset($_REQUEST['title'])) {
    $sql = "CREATE TABLE IF NOT EXISTS userdata
        (
            TITLE VARCHAR(20),
            DESCR VARCHAR(100)
        );";
    $conn->query($sql); $title = $_REQUEST['title']; $desc = $_REQUEST['desc'];
$sql = "INSERT INTO `userdata`(`TITLE`, `DESCR`) VALUES ('$title','$desc');";
$conn->query($sql); } if(isset($_REQUEST['delete'])) {
header('location:index.php'); } ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Notes</title>
    <script
      src="https://code.jquery.com/jquery-3.7.1.js"
      integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="//cdn.datatables.net/2.0.2/css/dataTables.dataTables.min.css"
    />
    <style>
      .navbar {
        /* width: 100vw; */
        height: 50px;
        justify-content: center;
        align-items: center;
        display: flex;
        flex-direction: row;
        gap: 60%;
        background-color: #2f3d7e;
      }

      .navbar ul {
        display: flex;
        list-style: none;
        float: right;
        gap: 15px;
        /* margin-right: 15px; */
        background: none;
      }

      .navbar ul li {
        background: none;
      }

      .navbar a {
        text-decoration: none;
        color: white;
        background: none;
      }

      .Dbtn {
        padding: 5px 5px;
        border-radius: 5px;
        margin-top: 10px;
        border: 2px solid #b30808;
        background: transparent;
        color: #b30404;
        transition: 0.5s ease;
        cursor: pointer;
      }

      .Dbtn:hover {
        background: #b30a04df;
        color: white;
      }

      .Ebtn {
        padding: 5px 15px;
        border-radius: 5px;
        margin-top: 10px;
        border: 2px solid #f8bf05;
        background: transparent;
        color: #f8bf05;
        transition: 0.5s ease;
        cursor: pointer;
      }

      .Ebtn:hover {
        background: #f8bf05;
        color: black;
      }

      table {
        margin-top: 20px;
      }
    </style>
  </head>

  <body>
    <?php
    include 'components/nav.php';
    ?>
    <div class="container my-5">
      <table class="table" id="myTable">
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
                $sno = 0;
                $sql = "SELECT * FROM `userdata`";
                $result = $conn->query($sql); while ($row =
          mysqli_fetch_assoc($result)) { $sno += 1; echo "
          <tr>
            <th scope='row'>" . $sno . "</th>
            <td>" . $row['TITLE'] . "</td>
            <td>" . $row['DESCR'] . "</td>
            <td>" . $row['date'] . "</td>
            <td>
                <input
                  type='button'
                  value='delete'
                  class='Dbtn'
                  name='delete'
                />
                <input
                  type='button'
                  value='Edit'
                  class='Ebtn'
                  name='edit'
                  id='editModal'
                />
            </td>
          </tr>
          "; } ?>
        </tbody>
      </table>
    </div>
    <script src="//cdn.datatables.net/2.0.2/js/dataTables.min.js"></script>
    <script>
      $(document).ready(function () {
        $("#myTable").DataTable();
      });
    </script>
    <script>
        let Dbtn=document.getElementsByClassName('Dbtn');
        Array.from(Dbtn).forEach((element)=>{
          element.addEventListener("click",(e)=>{
                console.log("delete",e);
            })
        })
    </script>
  </body>
</html>
