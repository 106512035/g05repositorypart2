<?php
session_start();
require_once("jobsetting.php");

// Block direct access - only allow POST requests from the form
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: login.php");
    exit();
}

// connects to the database 
$conn = new mysqli($host, $username, $password, $dbname);

// checks if the form has been submitted 
if (isset($_POST['username']) && isset($_POST['password'])) 

// removes whitespacing from input 
    $input_username = trim($_POST['username']);
    $input_password = trim($_POST['password']);


// prepare statement to protect from SQL injection. 
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $input_username, $input_password);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

// checks if the user is in the record of the database and proceeds the user to manage page. 
if ($user) {
    $_SESSION['logged_in'] = true;
    $_SESSION['user'] = $user['username'];
    header("Location: manage.php");
    exit();
} else {
    // Authenticaiton failed if user enters wrong details and sends user back into login page.
    header("Location: login.php?error");
    exit();
}
?>
