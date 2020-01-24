const errorMessage = document.getElementById('error-message');

const loginForm = document.getElementById('login-form');
const loginUsername = document.getElementById('login-username');
const loginPassword = document.getElementById('login-password');

const signupForm = document.getElementById('signup-form');
const signupUsername = document.getElementById('signup-username');
const signupEmail = document.getElementById('signup-email');
const signupPassword = document.getElementById('signup-password');
const signupPasswordRepeat = document.getElementById('signup-password-repeat');

loginForm.addEventListener('submit', (e) => {
    let errors = []

    if (loginUsername.value === '' || loginUsername.value == null) {
        errors.push('Please enter the username.');
    }

    if (loginPassword.value === '' || loginPassword.value == null) {
        errors.push('Please enter the password.');
    }

    if (errors.length > 0) {
        e.preventDefault();
        errorMessage.innerHTML = "<p>" + errors.join('</p><p>') + "</p>";
    }
})

signupForm.addEventListener('submit', (e) => {
    let errors = []

    if (signupUsername.value === '' || signupUsername.value == null) {
        errors.push('Please enter the username.');
    }

    if (!signupUsername.value.match(/^[a-zA-Z0-9]*$/)) {
        errors.push('The username you entered is invalid. Supported characters are: a-z, A-Z, 0-9.')
    }

    if (signupEmail.value === '' || signupEmail.value == null) {
        errors.push('Please enter the e-mail address. It will be needed if you ever forget your password.');
    }

    if (!signupEmail.value.match(/^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/)) {
        errors.push('The email you entered is invalid.');
    }

    if (signupPassword.value.length < 6 || signupPasswordRepeat.value.length < 6) {
        errors.push('Please enter a password that is at least 6 characters long.');
    }

    if (signupPassword.value != signupPasswordRepeat.value) {
        errors.push('The passwords you entered do not match.');
    }

    if (errors.length > 0) {
        e.preventDefault();
        errorMessage.innerHTML = "<p>" + errors.join('</p><p>') + "</p>";
    }
})

function hideError() {
    errorMessage.innerHTML = '';
}