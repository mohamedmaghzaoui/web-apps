function validateForm() {
  // Get form inputs
  var username = document.forms[0].username.value;
  var password = document.forms[0].password.value;
  var repeatPassword = document.forms[0].repeatPassword.value;
  var email = document.forms[0].email.value;
  var gender = document.forms[0].gender.value;
  // Validate form data
  if (username === "") {
    alert("Please enter a username");
    return false; // Prevent form submission
  }
  if (password.length < 6) {
    alert("Password must be at least 6 characters long");
    return false; // Prevent form submission
  }
  if (password !== repeatPassword) {
    alert("Passwords do not match");
    return false; // Prevent form submission
  }
  if (!validateEmail(email)) {
    alert("Please enter a valid email");
    return false; // Prevent form submission
  }
  if (gender === "") {
    alert("Please select a gender");
    return false; // Prevent form submission
  }
  return true; // enable form submission
}
function validateEmail(email) {
  var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailRegex.test(email);
}
