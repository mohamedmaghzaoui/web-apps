//js code to show or hide password


//get data
const togglePassword = document.querySelector('#togglePassword');
const password = document.querySelector('#password');
//eventlistner
togglePassword.addEventListener('click', showOrHide);
//function
function showOrHide() {
  //change attribute
  const type = password.getAttribute('type');
  if (type === 'password') {
    password.setAttribute('type', 'text');
  } else {
    password.setAttribute('type', 'password');
  }
  togglePassword.classList.toggle('fa-eye');
  togglePassword.classList.toggle('fa-eye-slash');
}
