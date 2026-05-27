<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once("settingsapply.php");
$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    echo "<p>Database connection failed." . mysqli_connect_error() . "</p>";
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
    $gender = isset ($_POST["gender"]) ? sanitise_input($_POST["gender"]) : "";
    $state = sanitise_input($_POST["state"]);

    $skill_list = isset($_POST["skill"]) ? implode (", ", array_map('sanitise_input', $_POST["skill"])) : "";

    $errors = [];
    if (empty($fname)) $errors[] = "First name is required!<br>";
    if (empty($lname)) $errors[] = "Last name is required!<br>";
    if (!preg_match("/^[a-zA-Z0-9]{5}$/", $jobid)) $errors[] = "Please enter a valid 5 digit ID!<br>";
    if (empty($dob)) $errors[] = "Date of Birth is required!<br>";
    if (empty($address)) $errors[] = "Address is required!<br>";
    if (empty($postcode)) $errors[] = "Postcode is required!<br>";
    if (empty($email)) $errors[] = "Email is required!<br>";
    if (empty($phone_no)) $errors[] = "Phone Number is required!<br>";
    if (empty($suburb)) $errors[] = "Suburb is required!<br>";
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
        echo"<h1>Form Submitted Successfully!</h1>";
        }else{
            echo"<h1>Error Submitting Form!</h2>";
        }
        mysqli_close($conn);
    }
}



//Adapt your Part 1 form to POST to process_eoi.php. DONE
//If eoi table does not exist, create it in code.
//On success, show a confirmation with the auto-generated EOInumber. HALF COMPLETE
//Block direct URL access to process_eoi.php (e.g., check required POST fields, otherwise redirect).
//Server-side validation & sanitising: trim, strip slashes, escape HTML, check required formats. REVISE
//Make sure to disable all HTML form validation at the client-side and do all validations on the server side. DONE
?>

