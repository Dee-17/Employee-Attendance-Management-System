<?php
    include_once __DIR__ . '/../php/connection.php';

    $emp_id = $_POST['emp-id']; 
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
        echo "Error";
    } else {
        // Update the existing employee with the provided ID
        $sql = "UPDATE employee SET first_name = '$first_name', middle_name = '$middle_name', last_name = '$last_name', address = '$address', zip = '$zip', contact_number = '$contact_number', email_address = '$email_address', contract = '$contract', shift = '$shift', password = '$password' WHERE emp_id = $emp_id";
        $result = mysqli_query($conn, $sql);
    }

    mysqli_close($conn);

    header('Location: employee-maintenance.php');
    exit;

?>