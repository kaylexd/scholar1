<?php
session_start();
include('includes/db.php');

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Get the form data
$username = $_POST['username'];
$password = $_POST['password'];

// Clear previous session data
session_unset();

// Prepare and execute the query for the admin table
$stmt = $conn->prepare('SELECT id, password FROM admin WHERE username = ?');
$stmt->bind_param('s', $username);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows === 1) {
    $stmt->bind_result($user_id, $hashedPassword);
    $stmt->fetch();

    // Verify password
    if (password_verify($password, $hashedPassword)) {
        // Check if the user is admin or officer based on the username
        if ($username === 'admin') { // Assuming 'admin' is the username for the admin
            $_SESSION['user_id'] = $user_id; 
            $_SESSION['user_type'] = 'admin';
            $_SESSION['username'] = $username;
            echo "<script>
                    alert('Login successful! Welcome.');
                    window.location.href = 'index.php'; // Admin dashboard
                  </script>";
        } else {
            $_SESSION['user_id'] = $user_id; 
            $_SESSION['user_type'] = 'officer';
            $_SESSION['username'] = $username;
            echo "<script>
                    alert('Login successful! Welcome.');
                    window.location.href = 'officer/index.php'; // Officer dashboard
                  </script>";
        }
    } else {
        echo "<script>
                alert('Invalid username or password.');
                window.location.href = 'login.php';
              </script>";
    }
} else {
    // If no admin found, check the student table
    $stmt->close(); // Close the previous statement
    $stmt = $conn->prepare('SELECT id, s_pass FROM students WHERE semail = ?');
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows === 1) {
        $stmt->bind_result($student_id, $hashedPassword);
        $stmt->fetch();

        if (password_verify($password, $hashedPassword)) {
            $_SESSION['user_id'] = $student_id; 
            $_SESSION['user_type'] = 'student';
            $_SESSION['username'] = $username;
            echo "<script>
                    alert('Login successful! Welcome.');
                    window.location.href = 'student/index.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Invalid username or password for student.');
                    window.location.href = 'login.php';
                  </script>";
        }
    } else {
        // If no student found, invalid username/password
        echo "<script>
                alert('Invalid username or password.');
                window.location.href = 'login.php';
              </script>";
    }
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
