<?php
include('includes/db.php'); // Include database connection

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
    }

    if (isset($_POST['ids']) && isset($_POST['action']) && $_POST['action'] == 'add_to_scholar') {
        $ids = $_POST['ids']; // Array of student IDs
    
        // Prepare the placeholders for multiple IDs (e.g., '?,?,?')
        $placeholders = implode(',', array_fill(0, count($ids), '?'));
    
        // SQL query to update the is_scholar flag for multiple students
        $sql = "UPDATE students SET is_scholar = 1 WHERE id IN ($placeholders)";
        $stmt = $conn->prepare($sql);
    
        // Bind parameters dynamically
        $stmt->bind_param(str_repeat('i', count($ids)), ...$ids);  // 'i' because IDs are integers
    
        if ($stmt->execute()) {
            echo "Selected students successfully moved to Scholars list.";
        } else {
            echo "Failed to move selected students.";
        }
    
    
    
        
        $stmt->close();
    }
    
    
    // Close the database connection
    $conn->close();
} else {
    echo "Invalid request"; // Handle invalid request
}
?>
