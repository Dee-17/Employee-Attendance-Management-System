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
            echo "Error";
    } else {
        // Insert the new employee with the calculated ID
        $sql = "INSERT INTO employee (full_name, address, zip, contact_number, email_address, contract, shift) 
        VALUES ('$full_name', '$address', '$zip', '$contact_number', '$email_address', '$contract', '$shift')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<div class='success-message'>Employee added successfully!</div>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    mysqli_close($conn);

?>
