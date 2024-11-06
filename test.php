<?php
include('includes/db.php');

$testId = 1; // Replace with an existing ID
$testStatus = 'Inactive'; // or 'Inactive'

$stmt = $conn->prepare("UPDATE students SET s_account_status = ? WHERE id = ?");
$stmt->bind_param("si", $testStatus, $testId);

if ($stmt->execute()) {
    echo "Test status updated successfully";
} else {
    echo "Error updating status: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
