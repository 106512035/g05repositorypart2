<?php
session_start();
require_once("jobsetting.php");

$conn = mysqli_connect($host, $username, $password, $dbname);

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $user['username'];
        header("Location: manage.php");
        exit();
    } else {
        echo "Incorrect username or password.";
    }
}
?>
