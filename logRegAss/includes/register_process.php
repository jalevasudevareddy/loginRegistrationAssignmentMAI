<?php
// register_process.php
session_start();
include_once 'db.php';

// Retrieve form data
$firstname = $_POST['confirm_firstname'];
$lastname = $_POST['confirm_lastname'];
$email = $_POST['confirm_email'];
$phone = $_POST['confirm_phone'];
$password = $_POST['password'];

// Check if email or phone number already exists
$checkQuery = "SELECT * FROM users WHERE email='$email' OR phone='$phone'";
$checkResult = mysqli_query($conn, $checkQuery);

if (mysqli_num_rows($checkResult) > 0) {
    $errorMessage = "User already exists with this email or phone number. Please sign in!";
    $_SESSION['error'] = $errorMessage;
    header("Location: ../login.php");
    exit();
}

// Insert data into database
$query = "INSERT INTO users (firstname, lastname, email, phone, password) VALUES ('$firstname', '$lastname', '$email', '$phone', '$password')";
$result = mysqli_query($conn, $query);

// Redirect to login page
if ($result) {
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User created</title>
        <link rel="stylesheet" href="../css/userRegSuccess.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
            integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>

    <body>
        <div class="con">
            <div class="popup">
                <img src="../images/404-tick.png">
                <h2> Thank You!</h2>
                <p>User successfully created. Thanks!</p>
                <button type="button" onclick="closePopup()">OK</button>
            </div>
        </div>
        <script>
            function closePopup() {
                window.location.href = "../login.php";
            }
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/fontawesome.min.js"
            integrity="sha512-C8qHv0HOaf4yoA7ISuuCTrsPX8qjolYTZyoFRKNA9dFKnxgzIHnYTOJhXQIt6zwpIFzCrRzUBuVgtC4e5K1nhA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
    </body>

    </html>
<?php } else {
    echo "Error: " . mysqli_error($conn);
}
mysqli_close($conn);

?>