// script.js
let step = 1;

function nextStep() {
  if (step === 1) {
    let firstName = document.getElementById("firstname").value.trim();
    let lastName = document.getElementById("lastname").value.trim();
    if (firstName === "" || lastName === "") {
      alert("Please enter first name and last name.");
      return;
    }
  } else if (step === 2) {
    let email = document.getElementById("email").value.trim();
    let passwordError = document.getElementById("emailError");
    if (email === "") {
      alert("Please enter email.");
      return;
    }
    if (!/^[^ ]+@[^ ]+\.[a-z]{2,3}$/.test(email)) {
      passwordError.textContent = "Please enter valid email address.";
      passwordError.style.color = "#FA2802";
      passwordError.style.fontFamily = "cursive";
      return;
    } else {
      emailError.textContent = "";
    }
  } else if (step === 3) {
    let phone = document.getElementById("phone").value;
    let phoneError = document.getElementById("phoneError");
    var regx = /^[6-9]\d{9}$/;
    if (phone === "") {
      alert("Please enter phone number.");
      return;
    }
    console.log(!regx.test(phone));
    if (!regx.test(phone)) {
      phoneError.textContent =
        "Entered phone number format is not correct. Try again !";
      return;
    } else {
      phoneError.textContent = "";
    }
  } else if (step === 4) {
    let password = document.getElementById("password").value;
    let confirmPassword = document.getElementById("confirm_password").value;
    let passwordError = document.getElementById("passwordError");
    // let passwordConformError = document.getElementById("passwordConformError");
    // let passwordConformErrorValue = passwordConformError.value;
    if (password === "" || confirmPassword === "") {
      alert("Please enter both password and confirm password.");
      return;
    }
    if (password !== confirmPassword) {
      alert("Passwords do not match.");
      // passwordConformError.innerHTML = "Passwords are not matching";
      // passwordConformError.style.fontFamily = "cursive";
      return;
    }
    // Validate password format
    if (!/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#%]).{10,}/.test(password)) {
      passwordError.textContent =
        "Password must contain an uppercase letter, a lowercase letter, a number, special symbol(such as !, #,@ or %), and be at least 10 characters long.";
      return;
    } else {
      passwordError.textContent = "";
    }
  }

  document.getElementById("step" + step).style.display = "none";
  step++;
  if (step <= 4) {
    document.getElementById("step" + step).style.display = "block";
  } else if (step == 5) {
    document.getElementById("step" + step).style.display = "block";
    document.getElementById("confirm_firstname").value =
      document.getElementById("firstname").value;
    document.getElementById("confirm_lastname").value =
      document.getElementById("lastname").value;
    document.getElementById("confirm_email").value =
      document.getElementById("email").value;
    document.getElementById("confirm_phone").value =
      document.getElementById("phone").value;

    // document.getElementById("step5").style.display = "none";
    // document.getElementById("confirm_details").style.display = "block";
  }
}

document
  .getElementById("submitBtn")
  .addEventListener("click", function (event) {
    document.getElementById("registerForm").submit();
  });

document.getElementById("backBtn").addEventListener("click", function (event) {
  step--;
  document.getElementById("step" + (step + 1)).style.display = "none";
  document.getElementById("step" + step).style.display = "block";
});

document
  .getElementById("password")
  .addEventListener("keydown", function (event) {
    if (event.key === "Enter") {
      event.preventDefault();
      nextStep();
    }
  });

document
  .getElementById("confirm_password")
  .addEventListener("keydown", function (event) {
    if (event.key === "Enter") {
      event.preventDefault();
      nextStep();
    }
  });
function enableEdit(fieldId) {
  let field = document.getElementById(fieldId);
  field.readOnly = !field.readOnly;
  if (!field.readOnly) {
    field.classList.add("editable");
  } else {
    field.classList.remove("editable");
  }
}

function emailValidation() {
  var form = document.getElementById("registerForm");
  const emailInput = document.getElementById("email");
  var email = document.getElementById("email").value;
  var text = document.getElementById("emailError");
  var pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
  if (email.match(pattern)) {
    // form.classList.add("valid");
    // form.classList.remove("invalid");
    text.innerHTML = "Your email address is valid.";
    text.style.color = "#06FA02";
    text.style.fontFamily = "cursive";
    emailInput.style.border = "5px solid #06FA02";
    emailInput.style.outline = "none";
  } else {
    // form.classList.remove("valid");
    // form.classList.add("invalid");
    text.innerHTML = "Please enter valid email address.";
    text.style.color = "#FA2802";
    text.style.fontFamily = "cursive";
    emailInput.style.border = "5px solid #FA2802";
    emailInput.style.outline = "none";
  }
  if (email == "") {
    // form.classList.remove("valid");
    // form.classList.remove("invalid");
    text.innerHTML = "";
  }
}

function phoneValidation() {
  var form = document.getElementById("registerForm");
  const phoneInput = document.getElementById("phone");
  var phone = phoneInput.value;
  var text = document.getElementById("phoneError");
  var pattern = /^[6-9]\d{9}$/;
  if (pattern.test(phone)) {
    // form.classList.add("valid");
    // form.classList.remove("invalid");
    text.innerHTML = "Your phone number is valid.";
    text.style.color = "#06FA02";
    text.style.fontFamily = "cursive";
    phoneInput.style.border = "5px solid #06FA02";
    phoneInput.style.outline = "none";
  } else {
    // form.classList.remove("valid");
    // form.classList.add("invalid");
    text.innerHTML = "Please enter valid phone number.";
    text.style.color = "#FA2802";
    text.style.fontFamily = "cursive";
    phoneInput.style.border = "5px solid #FA2802";
    phoneInput.style.outline = "none";
  }
  if (phone == "") {
    // form.classList.remove("valid");
    // form.classList.remove("invalid");
    text.innerHTML = "";
  }
}

function passwordValidation() {
  var form = document.getElementById("registerForm");
  const passwordInput = document.getElementById("password");
  var password = passwordInput.value;
  var text = document.getElementById("passwordError");
  var pattern = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#%]).{10,}/;
  if (pattern.test(password)) {
    // form.classList.add("valid");
    // form.classList.remove("invalid");
    text.innerHTML = "";
    text.style.color = "#06FA02";
    text.style.fontFamily = "cursive";
    passwordInput.style.border = "5px solid #06FA02";
    passwordInput.style.outline = "none";
  } else {
    // form.classList.remove("valid");
    // form.classList.add("invalid");
    text.innerHTML =
      "Password must contain an uppercase letter, a lowercase letter, a number, special symbol(such as !, #,@ or %), and be at least 10 characters long.";
    text.style.color = "#FA2802";
    text.style.fontFamily = "cursive";
    passwordInput.style.border = "5px solid #FA2802";
    passwordInput.style.outline = "none";
  }
  if (phone == "") {
    // form.classList.remove("valid");
    // form.classList.remove("invalid");
    text.innerHTML = "";
  }
}
