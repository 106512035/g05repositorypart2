<?php
//Session is started to remember the data
session_start();
//Displays all error reportings for the PHP, but is turned off in production.
error_reporting(E_ALL);

//Ensures that process_eoi.php file is not being directly accessed and redirects the user to the apply.php page. Exit stops the rest of 
//the code from being excecuted.
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: apply.php");
    exit();
}

//This checks to see if a connection is possible with the database by using the data in the provided php.
require_once("settingsapply.php");
$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    error_log("Failed to connect to the database:" . mysqli_connect_error());
    $_SESSION['errors'][]="Something went wrong! Try again later";
    header("Location: apply.php");
    exit();
}

//This creates a table if it does not already exist within the database.
$createTable = "CREATE TABLE IF NOT EXISTS eoi (
    EOInumber INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    job_id VARCHAR(5) NOT NULL,
    first_name VARCHAR(20) NOT NULL,
    last_name VARCHAR(20) NOT NULL,
    dob DATE NOT NULL,
    gender VARCHAR(20) NOT NULL,
    address VARCHAR(255) NOT NULL,
    suburb VARCHAR(40) NOT NULL,
    state VARCHAR(3) NOT NULL,
    postcode CHAR(4) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone_no VARCHAR(12) NOT NULL,
    skill_list VARCHAR(255),
    other_skills TEXT,
    status ENUM('New', 'Current', 'Final') NOT NULL DEFAULT 'New'
)";

//If there is an error creating the table a message displayed and an error message is also logged in the server.
if (!mysqli_query($conn, $createTable)) {
    error_log("Error creating table: " . mysqli_error($conn));
    $_SESSION['errors'][]="Something went wrong! Try again later";
    header("Location: apply.php");
    exit();
}

//This sanitises the input of all data by removing unessacary spaces, slashes and handles the converting of html special characters, 
//returning the data.
function sanitise_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//This sends a posting request to the PHP file
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //Sanitising all data inputs
    $jobid = sanitise_input($_POST["jobid"]);
    $fname = sanitise_input($_POST["firstname"]);
    $lname = sanitise_input($_POST["lastname"]);
    $dob = sanitise_input($_POST["dob"]);
    $otherskills = sanitise_input($_POST["otherskills"]);
    $address = sanitise_input($_POST["streetaddress"]);
    $postcode = sanitise_input($_POST["postcode"]);
    $email = sanitise_input($_POST["email"]);
    $phone_no = sanitise_input($_POST["phoneno"]);
    $suburb = sanitise_input($_POST["suburb"]);
    $gender = isset ($_POST["gender"]) ? sanitise_input($_POST["gender"]) : ""; //This sanitises the input but if no radio button is 
    //selected then an empty string is used.
    $state = sanitise_input($_POST["state"]);

    //Creates an array for potential selected options from the skill set and seperating them each with a comma.
    $skill_list = isset($_POST["skill"]) ? implode (", ", array_map('sanitise_input', $_POST["skill"])) : "";

    //Defining all patterns for each error and its corresponding error message.
    $errors = [];
    if (!preg_match("/^[a-zA-Z0-9]{5}$/", $jobid)) $errors[] = "Please enter a valid 5 digit ID!<br>";
    if (!preg_match("/^[A-Za-z]{1,20}$/", $fname)) $errors[] = "First name is required (only alphabetic characters)!<br>";
    if (!preg_match("/^[A-Za-z]{1,20}$/", $lname)) $errors[] = "Last name is required (only alphabetic characters)!<br>";
    if (empty($dob)) $errors[] = "Date of Birth is required!<br>";
    if (empty($address)) $errors[] = "Address is required!<br>"; 
    if (!preg_match("/^[0-9]{4}$/", $postcode)) $errors[] = "A valid postcode is required!<br>";   
    if (empty($email)) $errors[] = "Email is required!<br>";
    if (!preg_match("/^[0-9]{9}$/", $phone_no)) $errors[] = "Phone Number is required! (in +61 format)<br>"; 
    if (!preg_match("/^[a-zA-Z ]{1,40}$/", $suburb)) $errors[] = "Suburb is required!<br>";   
    if (empty($gender)) $errors[] = "Gender is required!<br>";
    if (empty($state)) $errors[] = "A State is required!<br>";

    //Checks if errors were found during validation and if found displays these errors.
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['form_data'] = $_POST;
        header('Location: apply.php');
        exit();
    }else{
        //If there aren't any errors the data is inserted into the databases table.
        $sql = "INSERT INTO eoi (job_id, first_name, last_name, dob, gender, address, suburb, state, postcode, email, phone_no, skill_list, other_skills)
        VALUES ('$jobid', '$fname', '$lname', '$dob', '$gender', '$address', '$suburb', '$state', '$postcode', '$email', '$phone_no', '$skill_list', '$otherskills')";
        //Redirects back to apply.php and displays the success message with the eoi number.
        if (mysqli_query($conn, $sql)){
            $eoi_number = mysqli_insert_id($conn);
            $_SESSION['success'] = "Form Submitted Successfully! Your EOInumber is: " . $eoi_number;
            header('Location: apply.php');
            exit();
        // If errors were found then the errors are displayed.
        }else{
            $_SESSION['errors'][]="Error Submitting Form!";
            header('Location: apply.php');
            exit();
        }
        mysqli_close($conn);
    }
}
?>