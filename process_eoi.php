<?php
error_reporting(E_ALL);
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: apply.php");
    exit();
}
require_once("settingsapply.php");
$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    echo "<p>Database connection failed." . mysqli_connect_error() . "</p>"; //probably remove mysqlconnecterror after testing
}

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

if (!mysqli_query($conn, $createTable)) {
    echo "<p>Error creating table: " . mysqli_error($conn) . "</p>";
}

function sanitise_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

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
    $gender = isset ($_POST["gender"]) ? sanitise_input($_POST["gender"]) : ""; //if no it sets it do an empty string NOT GOOD. but error message dispplays??
    $state = sanitise_input($_POST["state"]);

    $skill_list = isset($_POST["skill"]) ? implode (", ", array_map('sanitise_input', $_POST["skill"])) : "";

    $errors = [];
    if (!preg_match("/[A-Za-z]{1,20}/", $fname)) $errors[] = "First name is required (only alphabetic characters)!<br>";
    if (!preg_match("/[A-Za-z]{1,20}/", $lname)) $errors[] = "Last name is required (only alphabetic characters)!<br>";
    if (!preg_match("/^[a-zA-Z0-9]{5}$/", $jobid)) $errors[] = "Please enter a valid 5 digit ID!<br>";
    if (empty($dob)) $errors[] = "Date of Birth is required!<br>";
    if (empty($address)) $errors[] = "Address is required!<br>"; 
    if (!preg_match("/^[0-9]{4}$/", $postcode)) $errors[] = "A valid postcode is required!<br>";   
    if (empty($email)) $errors[] = "Email is required!<br>";
    if (!preg_match("/^[0-9]{8,12}$/", $phone_no)) $errors[] = "Phone Number is required!<br>"; 
    if (!preg_match("/^[a-zA-Z ]{1,40}$/", $suburb)) $errors[] = "Suburb is required!<br>";   
    if (empty($gender)) $errors[] = "Gender is required!<br>";
    if (empty($state)) $errors[] = "State is required!<br>";

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error;
        }
    }else{
        $sql = "INSERT INTO eoi (job_id, first_name, last_name, dob, gender, address, suburb, state, postcode, email, phone_no, skill_list, other_skills)
        VALUES ('$jobid', '$fname', '$lname', '$dob', '$gender', '$address', '$suburb', '$state', '$postcode', '$email', '$phone_no', '$skill_list', '$otherskills')";
        if (mysqli_query($conn, $sql)){
            $eoi_number = mysqli_insert_id($conn);
            echo"<h1>Form Submitted Successfully! Your EOInumber is: " . $eoi_number . "</h1>";
        }else{
            echo"<h1>Error Submitting Form!</h2>";
        }
        mysqli_close($conn);
    }
}




?>

