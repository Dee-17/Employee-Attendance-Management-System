<?php
    include "connection.php";
    
    $first_name = $_POST['input-first-name'];
    $middle_name = $_POST['input-middle-name'];
    $last_name = $_POST['input-last-name'];
    $emp_id = $_POST['emp-id']; 
    $full_name = $_POST['input-first-name'] . ' ' . $_POST['input-middle-name'] . ' ' . $_POST['input-last-name'];
    $address = $_POST['input-address'];
    $zip = $_POST['input-zip'];
    $contact_number = $_POST['input-contact-number'];
    $email_address = $_POST['input-email-address'];
    $contract = $_POST['input-employee-contract'];
    $shift = $_POST['input-shift'];

    if ((!$full_name) || (!$address) || (!$zip) || (!$contact_number) || (!$email_address) || (!$contract) || (!$shift)) {
        echo "Error";
    } else {
        // Update the existing employee with the provided ID
        $sql = "UPDATE employee SET full_name = '$full_name', address = '$address', zip = '$zip', contact_number = '$contact_number', email_address = '$email_address', contract = '$contract', shift = '$shift' WHERE emp_id = $emp_id";

        
        $result = mysqli_query($conn, $sql);
    }

    mysqli_close($conn);

    header('Location: employee-edit.php?emp_id=' . $emp_id);
    exit;

?>