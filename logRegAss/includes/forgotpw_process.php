<?php
include_once 'db.php';

// Function to sanitize input data
function sanitize($input)
{
    return htmlspecialchars(trim($input));
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $emailOrPhone = sanitize($_POST["email_or_phone"]);
    $password = sanitize($_POST["password"]);
    $confirmPassword = sanitize($_POST["confirm_password"]);

    // Validate if passwords match
    if ($password !== $confirmPassword) {
        $error = "Passwords do not match.";
    } else {
        // Check if email or phone exists in the database
        $query = "SELECT * FROM users WHERE email = '$emailOrPhone' OR phone = '$emailOrPhone'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            // Update password
            // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $updateQuery = "UPDATE users SET password = '$password' WHERE email = '$emailOrPhone' OR phone = '$emailOrPhone'";
            mysqli_query($conn, $updateQuery);
            $successMessage = "Password updated successfully.";
            echo '<script>';
            echo 'var confirmation = confirm("Password updated successfully.");';
            echo 'if (confirmation) {';
            echo 'window.location.href = "../login.php";'; // Redirect to login page if OK is clicked
            echo '}';
            echo 'else {';
            echo 'window.location.href = "../login.php";'; // Redirect to login page if OK is clicked
            echo '}';
            echo '</script>';

        } else {
            echo '<script>';
            echo 'var confirmation = confirm("Email or Phone number does not Exist.");';
            echo 'if (confirmation) {';
            echo 'window.location.href = "../pages/forgotpw.php";'; // Redirect to login page if OK is clicked
            echo '}';
            echo 'else {';
            echo 'window.location.href = "../pages/forgotpw.php";'; // Redirect to login page if OK is clicked
            echo '}';
            echo '</script>';
            // $errorMessage = "Email or phone number does not exist.";
            // $_SESSION['error'] = $errorMessage;
            // header("Location: ../pages/forgotpw.php");
            // exit();
        }
    }
}
?>