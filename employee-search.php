<?php
    include "connection.php";

    if (isset($_GET["emp_id"])) {
        $emp_id = $_GET["emp_id"];

        if (!$emp_id) {
            echo "<div class='error'>Employee ID Not Specified!</div>";
            return;
        }

        $sql = "SELECT * FROM employee WHERE emp_id = '" . $emp_id . "' ";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            echo "<p class='error'>Error: " . mysqli_error() . "</p>";
            return;
        }

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["emp_id"] . "</td>";
                echo "<td>" . $row["full_name"] . "</td>";
                echo "<td>" . $row["contact_number"] . "</td>";
                echo "<td>" . $row["email_address"] . "</td>";
                echo "<td>" . $row["address"] . "</td>";
                echo "<td>" . $row["zip"] . "</td>";
                echo "<td>" . $row["contract"] . "</td>";
                echo "<td>" . $row["shift"] . "</td>";
                echo "<td>
                        <div class='btn_container me-0'>
                            <button class='btn btn-outline-dark'><a href='employee-edit.php?id=" . $row["emp_id"] . "' class='nav-link'>Edit</a></button>
                            <button class='btn btn-outline-danger'><a href='delete_employee.php?id=" . $row["emp_id"] . "' class='nav-link'>Delete</a></button>
                        </div>
                    </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='9'>Employee not found!</td></tr>";
        }
    } else {
        echo "<div class='error'>No Employee ID provided!</div>";
    }

    mysqli_close($conn);
?>