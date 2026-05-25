<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $jobid = sanitise_inout($_POST["job_id"]);
    $fname = sanitise_inout($_POST["first_name"]);
    $lname = sanitise_inout($_POST["last_name"]);
    $dob = sanitise_inout($_POST["dob"]);
    

}