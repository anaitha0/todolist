<?php
  include 'config.php';

  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) == 1) {
    session_start();
    $_SESSION['email'] = $email;
    header('Location: todo.php');
  } else {
    echo "Invalid email or password";
  }

  mysqli_close($conn);
?>
