<!-- register.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="con">
        <div class="container" id="register">
            <h2 class="text-center te-st">Registration</h2>
            <form id="registerForm" action="../includes/register_process.php" method="POST">
                <!-- Step 1: First Name and Last Name -->
                <div id="step1">
                    <h3 class="te-st">Step 1: First Name and Last Name</h3>
                    <div class="form-group">
                        <label for="firstname ">First Name:</label>
                        <input type="text" id="firstname" name="firstname" required>
                    </div>
                    <div class="form-group">
                        <label for="lastname">Last Name:</label>
                        <input type="text" id="lastname" name="lastname" required>
                    </div>
                    <div class="form-group d-flex justify-content-end">
                        <button type="button" class="btn btn-primary" onclick="nextStep()">Next</button>
                    </div>
                </div>

                <!-- Step 2: Email -->
                <div id="step2" style="display: none;">
                    <h3 class="te-st">Step 2: Email</h3>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" id="email" onkeyup="emailValidation()" name="email" required
                            title="Please enter a valid email address" placeholder="example@gmail.com">
                        <label id="emailError"></label>
                    </div>
                    <div class="form-group d-flex justify-content-end">
                        <button type="button" class="btn btn-primary" onclick="nextStep()">Next</button>
                    </div>
                </div>

                <!-- Step 3: Phone Number -->
                <div id="step3" style="display: none;">
                    <h3 class="te-st">Step 3: Phone Number</h3>
                    <div class="form-group">
                        <label for="phone">Phone Number:</label>
                        <input type="tel" id="phone" name="phone" onkeyup="phoneValidation()" required
                            pattern="[6-9]\d{9}" placeholder="9912393241">
                        <label id="phoneError" style="color:red;"></label>
                    </div>
                    <div class="form-group d-flex justify-content-end">
                        <button type="button" class="btn btn-primary" onclick="nextStep()">Next</button>
                    </div>
                </div>

                <!-- Step 4: Password -->
                <div id="step4" style="display: none;">
                    <h3 class="te-st">Step 4: Password</h3>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" onkeyup="passwordValidation()" required
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!#@$^&~%]).{10,}"
                            title="Password must contain an uppercase letter, a lowercase letter, a number, special symbol(such as !, #, or %), and be at least 10 characters long.">
                        <div id="passwordError" style="color: red;" class="error-message">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password:</label>
                        <input type="password" id="confirm_password" name="confirm_password" required>
                        <!-- <div id="passwordConformError" style="color: red;" class="error-message"> -->
                    </div>
                    <div class="form-group d-flex justify-content-end">
                        <button type="button" class="btn btn-primary" onclick="nextStep()">Next</button>
                    </div>
                </div>

                <!-- Step 5: Confirm Details -->
                <div id="step5" style="display: none;">
                    <h3 class="te-st">Confirm Your Information</h3>
                    <div class="form-group">
                        <label for="confirm_firstname">First Name:</label></br>
                        <input type="text" style="width: 50%" id="confirm_firstname" name="confirm_firstname"
                            class="readonly-input" readonly>
                        <button type="button" onclick="enableEdit('confirm_firstname')"
                            class="btn btn-primary">Edit</button>
                    </div>
                    <div class="form-group">
                        <label for="confirm_lastname">Last Name:</label></br>
                        <input type="text" style="width: 50%" id="confirm_lastname" name="confirm_lastname"
                            class="readonly-input" readonly>
                        <button type="button" onclick="enableEdit('confirm_lastname')"
                            class="btn btn-primary">Edit</button>
                    </div>
                    <div class="form-group">
                        <label for="confirm_email">Email:</label></br>
                        <input type="email" style="width: 50%" id="confirm_email" name="confirm_email"
                            class="readonly-input" readonly>
                        <button type="button" onclick="enableEdit('confirm_email')"
                            class="btn btn-primary">Edit</button>
                    </div>
                    <div class="form-group">
                        <label for="confirm_phone">Phone Number:</label></br>
                        <input type="tel" style="width: 50%" id="confirm_phone" name="confirm_phone"
                            class="readonly-input" readonly>
                        <button type="button" onclick="enableEdit('confirm_phone')"
                            class="btn btn-primary">Edit</button>
                    </div>
                    <div class="form-group d-flex justify-content-between">
                        <button type="button" class="btn btn-primary" id="backBtn">Back</button>
                        <button type="button" class="btn btn-primary" id="submitBtn">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="../js/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/fontawesome.min.js"
        integrity="sha512-C8qHv0HOaf4yoA7ISuuCTrsPX8qjolYTZyoFRKNA9dFKnxgzIHnYTOJhXQIt6zwpIFzCrRzUBuVgtC4e5K1nhA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>