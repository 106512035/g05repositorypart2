<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.php');
    exit;
}
?>



<h1>HR Manager</h1>
<p>Welcome, you are logged in!</p>
<a href="logout.php">Logout</a>