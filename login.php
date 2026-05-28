<?php
session_start();
require_once("jobsetting.php");

$conn = new mysqli($host, $username, $password, $dbname);

if (isset($_POST['username']) && isset($_POST['password'])) {
    $input_username = trim($_POST['username']);
    $input_password = trim($_POST['password']);

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $input_username, $input_password);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        $_SESSION['logged_in'] = true;
        $_SESSION['user'] = $user['username'];
        header("Location: manage.php");
        exit();
    } else {
        echo "Incorrect username or password.";
    }
}
?>


<!DOCTYPE html>
<html>
<head><title>HR Login</title></head>
<body>
  <h2>HR Manager Login</h2>
  <form method="POST" action="login.php">
    <label>Username: <input type="text" name="username" required></label><br><br>
    <label>Password: <input type="password" name="password" required></label><br><br>
    <button type="submit">Login</button>
  </form>
</body>
</html>