function nextStep() {
  let password = document.getElementById("password").value;
  let confirmPassword = document.getElementById("confirm_password").value;
  let passwordError = document.getElementById("passwordError");
  if (password === "" || confirmPassword === "") {
    alert("Please enter both password and confirm password.");
    return;
  }
  if (password !== confirmPassword) {
    alert("Passwords do not match.");
    return;
  }
  // Validate password format
  if (!/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#%]).{10,}/.test(password)) {
    passwordError.textContent =
      "Password must contain an uppercase letter, a lowercase letter, a number, special symbol(such as !, #, @ or %), and be at least 10 characters long.";
    return;
  } else {
    passwordError.textContent = "";
  }
}
