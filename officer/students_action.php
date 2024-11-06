<?php
include('../includes/db.php'); // Include database connection

// Check if the request is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if it's a status update or delete request
    if (isset($_POST['status'])) {
        // Get the ID and new status from the AJAX request
        $id = $_POST['id'];
        $status = $_POST['status'];

        // Update the account status in the database
        $stmt = $conn->prepare("UPDATE students SET s_account_status = ? WHERE id = ?");
        $stmt->bind_param("si", $status, $id);

        // Execute the statement and check for success
        if ($stmt->execute()) {
            echo "Status updated successfully"; // Response to AJAX call
        } else {
            echo "Error updating status: " . $conn->error; // Return error message
        }

        // Close the statement
        $stmt->close();
    } elseif (isset($_POST['delete'])) {
        // Handle delete request
        $id = $_POST['id'];

        // Delete the student from the database
        $stmt = $conn->prepare("DELETE FROM students WHERE id = ?");
        $stmt->bind_param("i", $id);

        // Execute the statement and check for success
        if ($stmt->execute()) {
            echo "Student deleted successfully"; // Response to AJAX call
        } else {
            echo "Error deleting student: " . $conn->error; // Return error message
        }

        // Close the statement
        $stmt->close();
    } elseif (isset($_POST["action"]) && $_POST["action"] == 'acad_fetch_single') {
        // Single Acad Fetch Query
        // Prepare the SQL statement
        $stmt = $conn->prepare("
            SELECT students.*,
                   students.applied_on, 
                   family.sgfname, family.sgaddress, family.sgcontact, family.sgoccu, family.sgcompany,
                   family.sffname, family.sfaddress, family.sfcontact, family.sfoccu, family.sfcompany,
                   family.smfname, family.smaddress, family.smcontact, family.smoccu, family.smcompany
            FROM students 
            LEFT JOIN family ON students.id = family.student_id 
            WHERE students.id = ? AND students.s_scholarship_type = 'Academic'
        ");

        // Bind the parameters
        $stmt->bind_param("i", $_POST["s_id"]);


        // Execute the statement
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        $data = array();

        // Fetch the data
        if ($row = $result->fetch_assoc()) {
            // Populate data array with fetched row data
            $data['sid'] = $row['sid'];
            $data['sfname'] = $row['sfname'];
            $data['smname'] = $row['smname'];
            $data['slname'] = $row['slname'];
            $data['sfix'] = $row['sfix'];
            $data['sdbirth'] = $row['sdbirth'];
            $data['sgender'] = $row['sgender'];
            $data['sctship'] = $row['sctship'];
            $data['saddress'] = $row['saddress'];
            $data['semail'] = $row['semail'];
            $data['scontact'] = $row['scontact'];
            $data['scourse'] = $row['scourse'];
            $data['syear'] = $row['syear'];
            // Family Details
            $data['sgfname'] = $row['sgfname'];
            $data['sgaddress'] = $row['sgaddress'];
            $data['sgcontact'] = $row['sgcontact'];
            $data['sgoccu'] = $row['sgoccu'];
            $data['sgcompany'] = $row['sgcompany'];
            $data['sffname'] = $row['sffname'];
            $data['sfaddress'] = $row['sfaddress'];
            $data['sfcontact'] = $row['sfcontact'];
            $data['sfoccu'] = $row['sfoccu'];
            $data['sfcompany'] = $row['sfcompany'];
            $data['smfname'] = $row['smfname'];
            $data['smaddress'] = $row['smaddress'];
            $data['smcontact'] = $row['smcontact'];
            $data['smoccu'] = $row['smoccu'];
            $data['smcompany'] = $row['smcompany'];

            // Scholar Type
            $data['s_scholarship_type'] = $row['s_scholarship_type'];
            $data['applied_on'] = $row['applied_on'];
        }

        // Return the data as JSON
        echo json_encode($data);
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Invalid request"; // Handle invalid request
}
?>
