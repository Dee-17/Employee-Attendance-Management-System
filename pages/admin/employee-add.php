<?php
    include_once __DIR__ . '/../php/connection.php';

    $first_name = $_POST['input-first-name'];
    $middle_name = $_POST['input-middle-name'];
    $last_name = $_POST['input-last-name'];
    $password = $_POST['input-password'];
    $address = $_POST['input-address'];
    $zip = $_POST['input-zip'];
    $contact_number = $_POST['input-contact-number'];
    $email_address = $_POST['input-email-address'];
    $contract = $_POST['input-employee-contract'];
    $shift = $_POST['input-shift'];
   
    if ((!$first_name) || (!$middle_name) || (!$last_name) || (!$address) || (!$zip) || (!$contact_number) || (!$email_address) || (!$contract) || (!$shift)) {
            echo "<script>console.log('Please fill out all the required fields!');</script>";
    } else {
        // Insert the new employee with the calculated ID
        $sql = "INSERT INTO employee (first_name, middle_name, last_name, address, zip, contact_number, email_address, contract, shift, password) 
        VALUES ('$first_name', '$middle_name', '$last_name', '$address', '$zip', '$contact_number', '$email_address', '$contract', '$shift', '$password')";
        $result = mysqli_query($conn, $sql);
        
        if ($result) {
            echo "<script>console.log('Employee added successfully!');</script>"; 
        } else {
            echo "<script>console.log('ERROR!');</script>";
        }
    }      
    
    mysqli_close($conn);

    header('Location: employee-maintenance.php');
    exit;
?>


