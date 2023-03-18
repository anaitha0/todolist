<?php
  include 'config.php';

  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "INSERT INTO users (name, email, password)
          VALUES ('$name', '$email', '$password')";

  if (mysqli_query($conn, $sql)) {
    echo "User created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Sign Up</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="script.js"></script>
</head>
<body>
  <form method="post" action="signup.php" onsubmit="return validateSignUp()">
    <h1>Sign Up</h1>
    <label for="name">Name</label>
    <input type="text" name="name" id="name">
    <span id="name-error"></span>
    <label for="email">Email</label>
    <input type="email" name="email" id="email">
    <span id="email-error"></span>
    <label for="password">Password</label>
    <input type="password" name="password" id="password">
    <span id="password-error"></span>
    <input type="submit" value="Sign Up">
  </form>
</body>
</html>
