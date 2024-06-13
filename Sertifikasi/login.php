<?php
session_start();
require_once 'koneksi2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = "SELECT * FROM tbl_login WHERE username = '$username' AND password = '$password'";
  $result = mysqli_query($koneksi, $query);
  $row = mysqli_fetch_assoc($result);

  if ($row) {
      $_SESSION['id'] = $row['id'];
      $_SESSION['username'] = $username;
      $_SESSION['level'] = $row['level'];

      if ($row['level'] == 'admin') {
          header("location: index.php");
      } else {
          header("location: index.php");
      }
  } else {
      $error = "Username atau password salah.";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            background-color: rgb(153, 151, 151);
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        img {
            width: 100px;
            height: auto;
            margin-bottom: 0px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        input[type="text"], input[type="password"] {
            padding: 10px;
            margin: 5px 0;
            border: 1px solid rgb(0, 0, 0);
            border-radius: 4px;
        }
        input[type="submit"] {
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 4px;
            background-color: rgb(153, 151, 151) ;
            color: white;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: rgb(0, 0, 0);
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="image/logo.jpg" alt="Logo">
        <h2>Login</h2>
        <?php if (isset($error)) echo "<div style='color: red;'>$error</div>"; ?>
        <form action="" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>
