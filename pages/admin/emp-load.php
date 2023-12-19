<?php
    // Start table row
    echo "<tr>";
    echo "<td>" . $row["emp_id"] . "</td>";
    echo "<td>" . $row["first_name"] . " " . $row["middle_name"] . " " . $row["last_name"] . "</td>";
    echo "<td>" . $row["contact_number"] . "</td>";
    echo "<td>" . $row["email_address"] . "</td>";
    echo "<td>" . $row["address"] . "</td>";
    echo "<td>" . $row["zip"] . "</td>";
    echo "<td>" . $row["contract"] . "</td>";
    echo "<td>" . $row["shift"] . "</td>";
    echo "<td>
        <div class='btn_container me-0 d-flex gap-1'>
            <a href='employee-edit.php?emp_id=" . $row["emp_id"] . "' class='nav-link'><button class='btn btn-secondary'><i class='bi bi-pencil-square'></i></button></a>
            <a href='employee-delete.php?emp_id=" . $row["emp_id"] . "' class='nav-link'><button class='btn btn-danger'><i class='bi bi-trash-fill'></i></button></a>
        </div>
    </td>";
    echo "</tr>";
?>