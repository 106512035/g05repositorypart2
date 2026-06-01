<?php
session_start();

// checks if the user is logged in, if not it redirects backt to the login page. 
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.php'); // redirect to login page 
    exit; // stops the page from loading 
}
?>



<h1>HR Manager</h1>
<p>Welcome, you are logged in!</p>
<a href="logout.php">Logout</a> <!--Logout page--> 