<?php
    include "connection.php";

    $full_name = $_POST['input-first-name'] . ' ' . $_POST['input-middle-name'] . ' ' . $_POST['input-last-name'];
    $address = $_POST['input-address'];
    $zip = $_POST['input-zip'];
    $contact_number = $_POST['input-contact-number'];
    $email_address = $_POST['input-email-address'];
    $contract = $_POST['input-employee-contract'];
    $shift = $_POST['input-shift'];

    if ((!$full_name) || (!$address) || (!$zip) || (!$contact_number) || (!$email_address) || (!$contract) || (!$shift)) {
            echo "<script>console.log('Please fill out all the required fields!');</script>";
    } else {
        // Insert the new employee with the calculated ID
        $sql = "INSERT INTO employee (full_name, address, zip, contact_number, email_address, contract, shift) 
        VALUES ('$full_name', '$address', '$zip', '$contact_number', '$email_address', '$contract', '$shift')";
        $result = mysqli_query($conn, $sql);
        
        if ($result) {
            echo "<script>console.log('Employee added successfully!');</script>";
            
                
        } else {
            echo "<script>console.log('ERROR!');</script>";
        }
    }      
    
    mysqli_close($conn);

    header('Location: employee-registration.php');
    exit;
?>


