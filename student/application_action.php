<?php
session_start();
include('../includes/db.php');

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $errors = [];

    $user_id = $_SESSION['user_id'];
    // Form data
    $sfname = trim($_POST['sfname']);
    $smname = trim($_POST['smname']);
    $slname = trim($_POST['slname']);
    $sfix = $_POST['sfix'];
    $sdbirth = $_POST['sdbirth'];
    $sgender = $_POST['sgender'];
    $sctship = trim($_POST['sctship']);
    $saddress = trim($_POST['saddress']);
    $scontact = trim($_POST['scontact']);
    $semail = trim($_POST['semail']);
    $scourse = trim($_POST['scourse']);
    $syear = trim($_POST['syear']);
    $s_scholarship_type = 'Academic';
    $applied_on = date('Y-m-d');

    $sffname = trim($_POST['sffname']);
    $sfaddress = trim($_POST['sfaddress']);
    $sfcontact = trim($_POST['sfcontact']);
    $sfoccu = trim($_POST['sfoccu']);
    $sfcompany = trim($_POST['sfcompany']);
    $smfname = trim($_POST['smfname']);
    $smaddress = trim($_POST['smaddress']);
    $smcontact = trim($_POST['smcontact']);
    $smoccu = trim($_POST['smoccu']);
    $smcompany = trim($_POST['smcompany']);
    $sgfname = trim($_POST['sgfname']);
    $sgaddress = trim($_POST['sgaddress']);
    $sgcontact = trim($_POST['sgcontact']);
    $sgoccu = trim($_POST['sgoccu']);
    $sgcompany = trim($_POST['sgcompany']);
    
    // Check if the user already has an entry in the students table
    $stmt = $conn->prepare("SELECT id FROM students WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // If the user exists, update their information
        $stmt = $conn->prepare("UPDATE students SET sfname = ?, smname = ?, slname = ?, sfix = ?, sdbirth = ?, sgender = ?, sctship = ?, saddress = ?, scontact = ?, semail = ?, scourse = ?, syear = ?, s_scholarship_type = ?, applied_on = ? WHERE id = ?");
        $stmt->bind_param("ssssssssssssssi", $sfname, $smname, $slname, $sfix, $sdbirth, $sgender, $sctship, $saddress, $scontact, $semail, $scourse, $syear, $s_scholarship_type, $applied_on, $user_id);

        if ($stmt->execute()) {
            // Update family details for the existing student
            $familyStmt = $conn->prepare("UPDATE family SET sffname = ?, sfaddress = ?, sfcontact = ?, sfoccu = ?, sfcompany = ?, smfname = ?, smaddress = ?, smcontact = ?, smoccu = ?, smcompany = ?, sgfname = ?, sgaddress = ?, sgcontact = ?, sgoccu = ?, sgcompany = ? WHERE student_id = ?");
            $familyStmt->bind_param("sssssssssssssssi", $sffname, $sfaddress, $sfcontact, $sfoccu, $sfcompany, $smfname, $smaddress, $smcontact, $smoccu, $smcompany, $sgfname, $sgaddress, $sgcontact, $sgoccu, $sgcompany, $user_id);

            if ($familyStmt->execute()) {
                echo "<script>alert('Form successfully updated!');</script>";
                echo "<script>window.location.href = 'index.php';</script>";
            } else {
                echo "Error updating family details: " . $familyStmt->error;
            }
            $familyStmt->close();
        } else {
            echo "Error updating student details: " . $stmt->error;
        }
    } else {
        // If the user doesn't exist, insert new records
        $stmt = $conn->prepare("INSERT INTO students (id, sfname, smname, slname, sfix, sdbirth, sgender, sctship, saddress, scontact, semail, scourse, syear, s_scholarship_type, applied_on) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("issssssssssssss", $user_id, $sfname, $smname, $slname, $sfix, $sdbirth, $sgender, $sctship, $saddress, $scontact, $semail, $scourse, $syear, $s_scholarship_type, $applied_on);

        if ($stmt->execute()) {
            $student_id = $conn->insert_id;

            // Insert into family table using the student_id
            $familyStmt = $conn->prepare("INSERT INTO family (student_id, sffname, sfaddress, sfcontact, sfoccu, sfcompany, smfname, smaddress, smcontact, smoccu, smcompany, sgfname, sgaddress, sgcontact, sgoccu, sgcompany) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $familyStmt->bind_param("isssssssssssssss", $student_id, $sffname, $sfaddress, $sfcontact, $sfoccu, $sfcompany, $smfname, $smaddress, $smcontact, $smoccu, $smcompany, $sgfname, $sgaddress, $sgcontact, $sgoccu, $sgcompany);

            if ($familyStmt->execute()) {
                echo "<script>alert('Form successfully submitted!');</script>";
                echo "<script>window.location.href = 'index.php';</script>";
            } else {
                echo "Error inserting family details: " . $familyStmt->error;
            }
            $familyStmt->close();
        } else {
            echo "Error inserting student details: " . $stmt->error;
        }
    }

    $stmt->close();
    $conn->close();
}
?>
