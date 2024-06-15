<?php
include "conn.php";

if (isset($_POST["submit"])) {

  $name = $_POST["name"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $phone = $_POST["phone"];

  $table = "CREATE TABLE IF NOT EXISTS user
  (
      name varchar(20),
      email varchar(35),
      password varchar(8),
      phone bigint
  )";
  $conn->query($table);
  $insert = "INSERT INTO user VALUES ('$name','$email','$password','$phone')";
  $result = $conn->query($insert);
  echo '
       <script>
       alert("Data Inserted successfuly");
       </script>
      ';
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <title>Form Validation</title>
</head>

<body>
  <h1 class="heading">Form Validation</h1>
  <div class="container">
    <form action="index.php" method="post" class="form" name="myForm" onsubmit=" return validForm()">
      <div class="formElements">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" />
        <b><span class="error"></span></b>
      </div>
      <div class="formElements">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" /><b><span class="error"> </span></b>
      </div>
      <div class="formElements">
        <label for="phone">Phone</label>
        <input type="phone" id="phone" name="phone" /><b><span class="error"></span></b>
      </div>
      <div class="formElements">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" /><b><span class="error"></span></b>
      </div>
      <div class="formElements">
        <label for="cpassword">Confirm Password</label>
        <input type="password" id="cpassword" name="cpassword" /><b><span class="error"></span></b>
      </div>
      <div class="formElements">
        <input type="submit" value="Submit" name="submit" id="btn" />
      </div>
    </form>
  </div>
  <script src="script.js"></script>
</body>

</html>