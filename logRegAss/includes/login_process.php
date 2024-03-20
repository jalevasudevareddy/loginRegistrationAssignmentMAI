<!-- login_process.php -->

<?php
// Include database connection
include_once 'db.php';

session_start(); // Start session to store error messages



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query to check user credentials
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Valid credentials, redirect to dashboard
        $_SESSION['email'] = $email; // Store user email in session
        header("Location: ../pages/dashboardcontent.php");
        exit();
    } else {
        // Invalid credentials, store error message in session and redirect back to login page
        $_SESSION['error'] = "Invalid email or password";
        // header("Location: ../pages/login.php");
        // exit();
        echo '<script>';
        echo 'var confirmation = confirm("Enter correct details");';
        echo 'if (confirmation) {';
        echo 'window.location.href = "../login.php";'; // Redirect to login page if OK is clicked
        echo '}';
        echo 'else {';
        echo 'window.location.href = "../login.php";'; // Redirect to login page if OK is clicked
        echo '}';
        echo '</script>';
    }
}

$conn->close(); // Close database connection
?>