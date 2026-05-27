<?php
require_one("settings.php");
$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    echo "<p> Databse connection failed.". mysqli_connect_error()."</p>";
}
    function sanitise_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $jobid = sanitise_input($_POST["job_id"]);
    $fname = sanitise_input($_POST["firstname"]);
    $lname = sanitise_input($_POST["lastname"]);
    $dob = sanitise_input($_POST["dob"]);
    $skill_list = isset($_POST["skill"]) ? $_POST["skill"] : [];
    $otherskills = sanitise_input($_POST["otherskills"]);
    $address = sanitise_input($_POST["address"]);
    $postcode = sanitise_input($_POST["postcode"]);
    $email = sanitise_input($_POST["email"]);
    $phone_no = sanitise_input($_POST["phone_no"]);
    $suburb = sanitise_input($_POST["suburb"]);
    $gender = sanitise_input($_POST["gender"]);
    $state = sanitise_input($_POST["state"]);
    $status = sanitise_input($_POST["status"]);
}

    $errors = [];
    if (empty($fname)) $errors[] = "First name is required!<br>";
    
    if (empty($lname))$errors[] =  "Last name is required!<br>";

    if (!preg_match("^[a-zA-Z0-9]{5}$", $jobid)) $errors[] = "Please enter a valid 5 digit ID!<br>";
    

    #if (empty($dob)){
    #    echo "Date of birth is required<br>"
    #}

//     if (empty($address)){
//         echo "Address is required<br>"
//     }

//     if (empty($postcode)){
//         echo"Postcode is required<br>"
//     }

//     if (empty($email)){
//         echo"Email is required<br>"
//     }

//     if (empty($phone_no)){
//         echo"Phone number is required<br>"
//     }

//     if (empty($suburb)){
//         echo"Suburb is required<br>"
//     }

//     if (empty($gender)){
//         echo"Gender is required<br>"
//     }

//     if (empty($state)){
//         echo"State is required<br>"
//     }
// }
// #review to see if all if statements apply and if validation is required.