<?php
  session_start();
  include 'config.php';

  if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit;
  }

  $email = $_SESSION['email'];
  $sql = "SELECT * FROM tasks WHERE email = '$email'";
  $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Todo List</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="script.js"></script>
</head>
<body>
  <h1>Todo List</h1>
  <form method="post" action="add_task.php" onsubmit="return validateTask()">
    <label for="task">Add a new task:</label>
    <input type="text" name="task" id="task">
    <span id="task-error"></span>
    <input type="submit" value="Add">
  </form>
  <table>
    <thead>
      <tr>
        <th>Task</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
          <td><?php echo $row['task']; ?></td>
          <td><a href="delete_task.php?id=<?php echo $row['id']; ?>">Delete</a></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
  <form method="post" action="logout.php">
    <input type="submit" value="Logout">
  </form>
</body>
</html>
